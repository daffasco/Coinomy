<?php
include '../../components/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Determine if add or edit
    $id = $_POST['ID_Kelas'] ?? null;
    $nama = $_POST['Nama'] ?? '';
    $harga = $_POST['Harga'] ?? '';
    $deskripsi = $_POST['deskripsi'] ?? '';
    // var_dump($deskripsi);
    // die();
    $detail = $_POST['detail'] ?? '';
    // $materi = $_POST['Materi'] ?? '';

    if (empty($nama) || empty($harga) || empty($deskripsi) || empty($detail)) {
        echo $nama . $harga . $deskripsi . $detail;
    }

    // Handle image upload if exists
    $newFileName = null;
    if (isset($_FILES['img']) && $_FILES['img']['error'] === UPLOAD_ERR_OK) {
        $fileTmpPath = $_FILES['img']['tmp_name'];
        $fileName = $_FILES['img']['name'];
        $fileNameCmps = explode(".", $fileName);
        $fileExtension = strtolower(end($fileNameCmps));

        $allowedfileExtensions = array('jpg', 'jpeg', 'png', 'gif');
        if (in_array($fileExtension, $allowedfileExtensions)) {
            $newFileName = md5(time() . $fileName) . '.' . $fileExtension;
            $uploadFileDir = '../../img/kelas-img/';
            $dest_path = $uploadFileDir . $newFileName;

            if (!is_dir($uploadFileDir)) {
                mkdir($uploadFileDir, 0755, true);
            }

            if(!move_uploaded_file($fileTmpPath, $dest_path)) {
                die('Error moving the uploaded file.');
            }
        } else {
            die('Upload failed. Allowed file types: ' . implode(',', $allowedfileExtensions));
        }
    }

    if ($id) {
        // Edit existing
        if ($newFileName) {
            $stmt = $conn->prepare("UPDATE kelasonline SET Nama=?, Harga=?, img=?, Deskripsi=?, detail=?, Materi=? WHERE ID_Kelas=?");
            $stmt->bind_param("sdssssi", $nama, $harga, $newFileName, $deskripsi, $detail, $materi, $id);
        } else {
            $stmt = $conn->prepare("UPDATE kelasonline SET Nama=?, Harga=?, Deskripsi=?, detail=?, Materi=? WHERE ID_Kelas=?");
            $stmt->bind_param("sdsssi", $nama, $harga, $deskripsi, $detail, $materi, $id);
        }
        if ($stmt->execute()) {
            header("Location: Ctabel.php?success=edit");
            exit();
        } else {
            die("Database update error: " . $stmt->error);
        }
    } else {
        // Add new
        if (!$newFileName) {
            die('Image is required for new course.');
        }
        $stmt = $conn->prepare("INSERT INTO kelasonline (Nama, Harga, img, Deskripsi, detail) VALUES (?, ?, ?, ?, ?)");

        // var_dump($detail);
        // die();

        $stmt->bind_param("sdsss", $nama, $harga, $newFileName, $deskripsi, $detail);
        if ($stmt->execute()) {
            header("Location: Ctabel.php?success=add");
            exit();
        } else {
            die("Database insert error: " . $stmt->error);
        }
    }
} elseif ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['delete'])) {
    // Delete course
    $id = intval($_GET['delete']);

    // ambil data gambar
    $result = $conn->query("SELECT img FROM kelasonline WHERE ID_Kelas = $id");
    $row = $result->fetch_assoc();
    $img = $row['img'];

    // hapus file gambar dari db
    if (file_exists("../../img/kelas-img/$img")) {
        unlink("../../img/kelas-img/$img");
    }

    $stmt = $conn->prepare("DELETE FROM kelasonline WHERE ID_Kelas=?");
    $stmt->bind_param("i", $id);
    
    if ($stmt->execute()) {
        header("Location: Ctabel.php?success=delete");
        exit();
    } else {
        die("Database delete error: " . $stmt->error);
    }
} else {
    die("Invalid request.");
}
?>
