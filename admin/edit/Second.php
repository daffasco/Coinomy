<?php
$servername = "localhost";
$username = "root";
$password = "";
$db = "ukl_coinomy";

// Create connection
$conn = new mysqli($servername, $username, $password, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST["aksi"]) && $_POST["aksi"] == "add") {
    $id = $_GET["edit"];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];
    $file_ktp = $_FILES['file_ktp']['name'];
    $file_tmp = $_FILES['file_ktp']['tmp_name'];
    $upload_dir = "../admin/uploads/";

    // Move uploaded file
    if ($file_ktp) {
        move_uploaded_file($file_tmp, $upload_dir . $file_ktp);
        $sql = "UPDATE users SET US_NAME = '$name', US_EMAIL = '$email', Jenis_Kelamin = '$gender', FILE_KTP = '$upload_dir$file_ktp', US_Password = '$password', `US_No.hp` = '$phone' WHERE US_ID = '$id';";
    } else {
        $sql = "UPDATE users SET US_NAME = '$name', US_EMAIL = '$email', Jenis_Kelamin = '$gender', US_Password = '$password', `US_No.hp` = '$phone' WHERE US_ID = '$id';";
    }

    if ($conn->query($sql) === TRUE) {
        echo "<p style='color:green;'>RECORD UPDATED</p>";
        header("Location:../index.php");
    } else {
        echo "Connection error: " . $conn->error;
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Belajar CRUD</title>
    <link href="../style.css" rel="stylesheet"> 
</head>

<body>
    <nav class="navbar">
        <div class="container">
            <a class="navbar-brand" href="#">
                CRUD - Custom CSS
            </a>
        </div>
    </nav>
    <div class="container">
        <?php
        $id = $_GET["edit"] ?? null;
        $name_val = $email_val = $gender_val = $password_val = $phone_val = '';
        if ($id) {
            // Reopen connection for fetching data
            $conn = new mysqli("localhost", "root", "", "ukl_coinomy");
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            $sql = "SELECT US_NAME, US_EMAIL, Jenis_Kelamin, US_Password, `US_No.hp` FROM users WHERE US_ID = '$id'";
            $result = $conn->query($sql);
            if ($result && $result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $name_val = htmlspecialchars($row['US_NAME']);
                $email_val = htmlspecialchars($row['US_EMAIL']);
                $gender_val = $row['Jenis_Kelamin'];
                $password_val = htmlspecialchars($row['US_Password']);
                $phone_val = htmlspecialchars($row['US_No.hp']);
            }
            $conn->close();
        }
        ?>
        <form method="POST" enctype="multipart/form-data">
            <div class="form-group row">
                <label for="name" class="label-col">Nama Lengkap</label>
                <div class="input-col">
                    <input type="text" name="name" class="input-text" id="name" placeholder="input text" required value="<?php echo $name_val; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="email" class="label-col">Email</label>
                <div class="input-col">
                    <input type="email" name="email" class="input-text" id="email" placeholder="input email" required value="<?php echo $email_val; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="gender" class="label-col">Jenis Kelamin</label>
                <div class="input-col">
                    <select id="gender" name="gender" class="input-select" required>
                        <option disabled>Pilih Jenis Kelamin</option>
                        <option value="Laki-Laki" <?php if ($gender_val == 'Laki-Laki') echo 'selected'; ?>>Laki-laki</option>
                        <option value="Perempuan" <?php if ($gender_val == 'Perempuan') echo 'selected'; ?>>Perempuan</option>
                        <option value="Lainya" <?php if ($gender_val == 'Lainya') echo 'selected'; ?>>Lainya</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="file_ktp" class="label-col">Foto KTP</label>
                <div class="input-col">
                    <input class="input-file" type="file" name="file_ktp" id="file_ktp">
                </div>
            </div>
            <div class="form-group row">
                <label for="password" class="label-col">Password</label>
                <div class="input-col">
                    <input type="password" name="password" class="input-text" id="password" placeholder="input password" required value="<?php echo $password_val; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="phone" class="label-col">Nomor Hp</label>
                <div class="input-col">
                    <input type="text" name="phone" class="input-text" id="phone" placeholder="input phone number" required value="<?php echo $phone_val; ?>">
                </div>
            </div>
            <div class="form-group row form-buttons">
                <div class="button-col">
                    <button type="submit" name="aksi" value="add" class="btn-primary"><i class="fa fa-floppy-o"></i> Update</button>
                    <a href="../index.php" type="button" class="btn-danger"><i class="fa fa-step-reply"></i> Batal</a>
                </div>
            </div>
        </form>
    </div>
</body>
</html>
