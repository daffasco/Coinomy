<?php
session_start();
include_once '../../components/koneksi.php';

// proses untuk registrasi
if (isset($_POST["submit"]) && $_POST["submit"] == "add") {
    $email = htmlspecialchars($_POST['email']);
    $nama = htmlspecialchars($_POST['nama']);
    $gender = htmlspecialchars($_POST['gender']);
    $telepon = htmlspecialchars($_POST['telepon']);
    $password = htmlspecialchars($_POST['password']);

    $foto_path = null;
    if (isset($_FILES['foto_ktp']) && $_FILES['foto_ktp']['error'] == UPLOAD_ERR_OK) {
        $upload_dir = '../../admin/uploads/';
        if (!is_dir($upload_dir)) {
            mkdir($upload_dir, 0755, true);
        }
        $tmp_name = $_FILES['foto_ktp']['tmp_name'];
        $foto_name = basename($_FILES['foto_ktp']['name']);
        $file_save_path = $upload_dir . $foto_name;
        if (move_uploaded_file($tmp_name, $file_save_path)) {
            $foto_path = 'uploads/' . $foto_name;
        } else {
            $foto_path = null;
        }
    }

    $stmt = $conn->prepare("INSERT INTO users (US_EMAIL, US_NAME, Jenis_Kelamin, `US_No.hp`, US_Password, FILE_KTP) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $email, $nama, $gender, $telepon, $password, $foto_path);

    if ($stmt->execute()) {
        header("Location: ./index.php");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

// proses untuk login
if (isset($_POST['submit']) && $_POST['submit'] == "sign_in") {
    $pw = htmlspecialchars($_POST['pw']);
    $email = htmlspecialchars($_POST['email']);

    $query = "SELECT * FROM users WHERE US_Password = ? AND US_EMAIL = ?";
    $query = $conn->prepare($query);
    $query->bind_param('ss', $pw, $email);
    if ($query->execute()) {
        $result = $query->get_result();
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $_SESSION['US_ID'] = $row['US_ID'];  // Set user_id session for all logged in users
        $_SESSION['user'] = $row['US_NAME'];  // Set user session for all logged in users
        $_SESSION['username'] = $row['US_NAME'];
        $_SESSION['email'] = $row['US_EMAIL'];
        $_SESSION['gender'] = $row['Jenis_Kelamin'];
        $_SESSION['nomor_hp'] = $row['US_No.hp'];
        $_SESSION['avatar'] = $row['FILE_KTP'] ?? '';  // Add avatar path to session
        if ($row['US_STAT'] == "ADMIN") {
            $_SESSION['role'] = $row['US_STAT'];
            header('Location: ../../admin/index.php');
            exit();
        }
        session_regenerate_id(true);

    header('Location: ../Home/index.php');
    exit();
} else {
    echo "<script> alert('email atau password salah') </script>";
}
    } else {
        echo "Error: " . $query->error;
    }
}
