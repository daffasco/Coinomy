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

if (isset($_POST["submit"]) && $_POST["submit"] == "add") {
    $email = $_POST['email'];
    $nama = $_POST['nama'];
    $gender = $_POST['gender'];
    $telepon = $_POST['telepon'];
    $NOREK = $_POST['password'];

    $foto_path = null;
    if (isset($_FILES['foto_ktp']) && $_FILES['foto_ktp']['error'] == UPLOAD_ERR_OK) {
        $upload_dir = '../../admin/uploads';
        if (!is_dir($upload_dir)) {
            mkdir($upload_dir, 0755, true);
        }
        $tmp_name = $_FILES['foto_ktp']['tmp_name'];
        $foto_name = basename($_FILES['foto_ktp']['name']);
        $file_save_path = $upload_dir . time() . '_' . $foto_name;
        move_uploaded_file($tmp_name, $file_save_path);
        $foto_path = 'upload/' . $foto_name;
    }

    $stmt = $conn->prepare("INSERT INTO users (US_EMAIL, US_NAME, Jenis_Kelamin, `US_No.hp`, US_Password, FILE_KTP) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $email, $nama, $gender, $telepon, $NOREK, $foto_path);

    if ($stmt->execute()) {
        echo "Data berhasil ditambahkan.";
        header("Location: ../LoginRegis/index.php");
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Registration</title>
    <link rel="stylesheet" href="style_compatible.css" />
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>
    <div class="main">
        <h1>REGISTRATION</h1>
        <form action="Regis.php" method="post" enctype="multipart/form-data">
            <div class="input-box">
                <input type="email" id="email" name="email" placeholder="Email" required />
                <i class='bx bxs-envelope'></i>
            </div>
            <div class="input-box">
                <input type="password" id="password" name="password" placeholder="Password" required />
                <i class='bx bxs-lock-alt'></i>
            </div>
            <div class="input-box">
                <input type="text" id="nama" name="nama" placeholder="Nama Lengkap" required />
            </div>
            <div class="input-box">
                <input type="tel" id="telepon" name="telepon" placeholder="Nomor Handphone" required pattern="[0-9]{10,15}" title="Masukkan nomor handphone yang valid" />
            </div>
            <div class="input-box">
                <label for="foto_ktp">Foto KTP:</label>
                <input type="file" id="foto_ktp" name="foto_ktp" accept="image/*" required />
            </div>
            <div class="input-box">
                <label for="jenis_kelamin">Jenis Kelamin:</label>
                <select id="gender" name="gender" required>
                    <option value="" disabled selected>Pilih Jenis Kelamin</option>
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
            </div>
            <div class="submit-box">
                <button type="submit" name="submit" value="add" class="btn">Register</button>
            </div>
        </form>
    </div>
</body>

</html>