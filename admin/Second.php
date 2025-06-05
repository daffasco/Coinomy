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
    $email = $_POST['email'];
    $nama = $_POST['nama'];
    $gender = $_POST['kelamin'];
    $telepon = $_POST['telepon'];
    $password = $_POST['password'];
    $status = $_POST['status'];

    // Handle file upload
    $foto_path = null;
    if (isset($_FILES['foto']) && $_FILES['foto']['error'] == UPLOAD_ERR_OK) {
        $upload_dir = 'uploads/';
        if (!is_dir($upload_dir)) {
            mkdir($upload_dir, 0755, true);
        }
        $tmp_name = $_FILES['foto']['tmp_name'];
        $foto_name = basename($_FILES['foto']['name']);
        $foto_path = $upload_dir . time() . '_' . $foto_name;
        move_uploaded_file($tmp_name, $foto_path);
    }

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO users (US_EMAIL, US_NAME, Jenis_Kelamin, `US_No.hp`, US_Password, FILE_KTP, US_STAT) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssss", $email, $nama, $gender, $telepon, $password, $foto_path, $status);

    if ($stmt->execute()) {
        echo "Data berhasil ditambahkan.";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

// Close connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Belajar CRUD</title>
    <link href="style.css" rel="stylesheet"> 
</head>

<body>
    <nav class="navbar">
        <div class="container">
            <a class="navbar-brand" href="#">
                CRUD - Custom CSS
            </a>
        </div>
    </nav>
    <div class="container form-container">
        <form method="POST" enctype="multipart/form-data">
            <div class="form-group row">
                <label for="email" class="label-col">Email</label>
                <div class="input-col">
                    <input type="email" name="email" class="input-text" id="email" placeholder="Input text" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="nama" class="label-col">Nama Lengkap</label>
                <div class="input-col">
                    <input type="text" name="nama" class="input-text" id="nama" placeholder="Input text" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="kelamin" class="label-col">Jenis Kelamin</label>
                <div class="input-col">
                    <select id="kelamin" name="kelamin" class="input-select" required>
                        <option value="" selected disabled>Jenis kelamin</option>
                        <option value="Laki-Laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                        <option value="Lainya">Lainya</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="foto" class="label-col">Foto KTP</label>
                <div class="input-col">
                    <input class="input-file" type="file" name="foto" id="foto" accept="image/*" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="telepon" class="label-col">No. Hp Telepon</label>
                <div class="input-col">
                    <input type="text" id="telepon" name="telepon" class="input-text" placeholder="Phone number" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="alamat" class="label-col">Password</label>
                <div class="input-col">
                    <textarea id="password" name="password" class="input-textarea" placeholder="Input text" required></textarea>
                </div>
            </div>
            <div class="form-group row">
                <label for="role" class="label-col">Role</label>
                <div class="input-col">
                    <select id="status" name="status" class="input-select role-select" required>
                        <option value="ADMIN" selected>Admin</option>
                        <option value="USER">User</option>
                    </select>
                </div>
            </div>
            <div class="form-group row form-buttons">
                <div class="button-col">
                    <button type="submit" name="aksi" value="add" class="btn-primary">Tambahkan</button>
                    <a href="index.php" type="button" class="btn-danger">Batal</a>
                </div>
            </div>
        </form>
    </div>
</body>
</html>
