<?php

session_start();
include_once '../../components/koneksi.php';

// Check if user is logged in
if (!isset($_SESSION['user'])) {
    header("Location: ../LoginRegis/index.php");
    exit();
}

$username = $_SESSION['user'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $newName = $_POST['name'] ?? '';
    $newPhone = $_POST['phone'] ?? '';
    $newGender = $_POST['gender'] ?? '';

    // Handle profile photo upload
    if (isset($_FILES['profile_photo']) && $_FILES['profile_photo']['error'] === UPLOAD_ERR_OK) {
        $fileTmpPath = $_FILES['profile_photo']['tmp_name'];
        $fileName = $_FILES['profile_photo']['name'];
        $fileSize = $_FILES['profile_photo']['size'];
        $fileType = $_FILES['profile_photo']['type'];
        $fileNameCmps = explode(".", $fileName);
        $fileExtension = strtolower(end($fileNameCmps));

        $allowedfileExtensions = array('jpg', 'jpeg', 'png', 'gif');
        if (in_array($fileExtension, $allowedfileExtensions)) {
            // Directory where uploaded files will be saved
            $uploadFileDir = '../../admin/uploads/';
            // Create directory if not exists
            if (!is_dir($uploadFileDir)) {
                mkdir($uploadFileDir, 0755, true);
            }
            // Generate new file name to avoid conflicts
            $newFileName = md5(time() . $fileName) . '.' . $fileExtension;
            $dest_path = $uploadFileDir . $newFileName;

            if(move_uploaded_file($fileTmpPath, $dest_path)) {
                $profilePhotoPath = 'uploads/' . $newFileName;
            } else {
                $errorMessage = 'There was an error moving the uploaded file.';
            }
        } else {
            $errorMessage = 'Upload failed. Allowed file types: ' . implode(',', $allowedfileExtensions);
        }
    }

    // Basic validation (can be extended)
    if ($newName && $newPhone && $newGender) {
        if (!isset($errorMessage)) {
            if (isset($profilePhotoPath)) {
                $updateStmt = $conn->prepare("UPDATE users SET US_NAME = ?, `US_No.hp` = ?, Jenis_Kelamin = ?, FILE_KTP = ? WHERE US_NAME = ?");
                $updateStmt->bind_param("sssss", $newName, $newPhone, $newGender, $profilePhotoPath, $username);
            } else {
                $updateStmt = $conn->prepare("UPDATE users SET US_NAME = ?, `US_No.hp` = ?, Jenis_Kelamin = ? WHERE US_NAME = ?");
                $updateStmt->bind_param("ssss", $newName, $newPhone, $newGender, $username);
            }
            if ($updateStmt->execute()) {
                // Update session username if name changed
                if ($newName !== $username) {
                    $_SESSION['user'] = $newName;
                    $username = $newName;
                }
                // Reload user data after update
                $stmt = $conn->prepare("SELECT US_NAME, US_EMAIL, Jenis_Kelamin, `US_No.hp`, FILE_KTP FROM users WHERE US_NAME = ?");
                $stmt->bind_param("s", $username);
                $stmt->execute();
                $result = $stmt->get_result();
                $userData = $result->fetch_assoc();
                $successMessage = "Profile updated successfully.";
            } else {
                $errorMessage = "Failed to update profile.";
            }
        }
    } else {
        $errorMessage = "Please fill in all fields.";
    }
} else {
    // Fetch user data from database
    $stmt = $conn->prepare("SELECT US_NAME, US_EMAIL, Jenis_Kelamin, `US_No.hp`, FILE_KTP FROM users WHERE US_NAME = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $userData = $result->fetch_assoc();
}

function safeGet($array, $key) {
    return isset($array[$key]) ? $array[$key] : '';
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Profile Page</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php include_once '../../components/navbar.php'; ?>
    <main>
        <div class="profile-wrapper">
            <?php if (isset($successMessage)) : ?>
                <div class="success-message" style="color: green; margin-bottom: 10px;"><?= htmlspecialchars($successMessage) ?></div>
            <?php elseif (isset($errorMessage)) : ?>
                <div class="error-message" style="color: red; margin-bottom: 10px;"><?= htmlspecialchars($errorMessage) ?></div>
            <?php endif; ?>
<form method="POST" action="" enctype="multipart/form-data">
                <div class="profile-avatar">
                    <?php
                    $avatar = safeGet($userData, 'FILE_KTP');
                    if ($avatar) {
                        $imgSrc = '../../admin/' . htmlspecialchars($avatar);
                        $altText = 'Profile Avatar';
                        echo '<label for="profile_photo" style="cursor:pointer; display:inline-block;"><img src="' . $imgSrc . '" alt="' . $altText . '" style="width:130px; height:130px; border-radius:50%; transform: translate(-5px, -1px);"></label>';
                    }
                    ?>
                    <input type="file" name="profile_photo" id="profile_photo" accept="image/*" style="display:none;" />
                </div>
                <div class="profile-name"><?= htmlspecialchars(safeGet($userData, 'US_NAME')); ?></div>
                <div class="profile-email"><?= htmlspecialchars(safeGet($userData, 'US_EMAIL')); ?></div>
                <div class="input-group">
                    <input type="text" name="name" placeholder="Edit Nama" value="<?= htmlspecialchars(safeGet($userData, 'US_NAME')); ?>" required />
                    <div class="icon">&#9998;</div>
                </div>
                <div class="input-group">
                    <input type="text" name="phone" placeholder="Nomor Hp" value="<?= htmlspecialchars(safeGet($userData, 'US_No.hp')); ?>" required />
                    <div class="icon">&#9998;</div>
                </div>
                <div class="input-group">
                    <select name="gender" required>
                        <?php $gender = safeGet($userData, 'Jenis_Kelamin'); ?>
                        <?php if ($gender == 'Laki-laki') {  ?>
                            <option value="Laki-laki" selected>Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                            <option value="Lainya">Lainya</option>
                        <?php } elseif ($gender == 'Perempuan') {  ?>
                            <option value="Perempuan" selected>Perempuan</option>
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Lainya">Lainya</option>
                        <?php } else {  ?>
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Lainya">Lainya</option>
                            <option value="Perempuan">Perempuan</option>
                        <?php } ?>
                    </select>
                </div>
                <div class="input-group">
                    <button type="submit" style="padding: 8px 16px; cursor: pointer;">Submit</button>
                </div>
                <div class="input-group">
                    <a href="../logout.php">Logout</a>
                </div>
            </form>
        </div>
    </main>
    <?php include_once '../../components/footer.php'; ?>
</body>

</html>
