<?php
$servername = "localhost";
$username = "root";
$password = "";
$db = "ukl_coinomy";

// Buat koneksi
$conn = new mysqli($servername, $username, $password, $db);


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $_POST['Nama'] ?? '';
    $harga = $_POST['Harga'] ?? '';
    $deskripsi = $_POST['Deskripsi'] ?? '';
    $detail = $_POST['detail'] ?? '';
    $materi = $_POST['Materi'] ?? '';

    // Validate required fields
    if (empty($nama) || empty($harga) || empty($deskripsi) || empty($detail) || empty($materi)) {
        die('Please fill all required fields.');
    }

    // Handle image upload
    if (isset($_FILES['img']) && $_FILES['img']['error'] === UPLOAD_ERR_OK) {
        $fileTmpPath = $_FILES['img']['tmp_name'];
        $fileName = $_FILES['img']['name'];
        $fileSize = $_FILES['img']['size'];
        $fileType = $_FILES['img']['type'];
        $fileNameCmps = explode(".", $fileName);
        $fileExtension = strtolower(end($fileNameCmps));

        $allowedfileExtensions = array('jpg', 'jpeg', 'png', 'gif');
        if (in_array($fileExtension, $allowedfileExtensions)) {
            $newFileName = md5(time() . $fileName) . '.' . $fileExtension;
            $uploadFileDir = '../../admin/uploads/';
            $dest_path = $uploadFileDir . $newFileName;

            if (!is_dir($uploadFileDir)) {
                mkdir($uploadFileDir, 0755, true);
            }

            if(move_uploaded_file($fileTmpPath, $dest_path)) {
                // Insert into database
                $stmt = $conn->prepare("INSERT INTO kelasonline (Nama, Harga, img, Deskripsi, detail, Materi) VALUES (?, ?, ?, ?, ?, ?)");
                $stmt->bind_param("sdssss", $nama, $harga, $newFileName, $deskripsi, $detail, $materi);
                if ($stmt->execute()) {
                    header("Location: Cclass.php?success=1");
                    exit();
                } else {
                    echo "Database insert error: " . $stmt->error;
                }
                $stmt->close();
            } else {
                echo "Error moving the uploaded file.";
            }
        } else {
            echo "Upload failed. Allowed file types: " . implode(',', $allowedfileExtensions);
        }
    } else {
        echo "No image uploaded or upload error.";
    }
} else {
    echo "Invalid request method.";
}
?>
