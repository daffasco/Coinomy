<?php
include_once("../../components/koneksi.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_kelas = $_POST['ID_kelas'] ?? '';
    $nama_kelas = $_POST['nama_kelas'] ??'';

    if (empty($id_kelas)) {
        die('Nama Kelas is required.');
    }

    // Prepare materi data arrays
    $file_materi = [
        $_FILES['materi_file_1'] ?? null,
        $_FILES['materi_file_2'] ?? null,
        $_FILES['materi_file_3'] ?? null,
    ];

    $video_materi = [
        $_POST['video_url_4'] ?? '',
        $_POST['video_url_5'] ?? '',
    ];

    // Create or get class ID from nama_kelas
    // Check if class exists
    // $stmt = $conn->prepare("SELECT ID_Kelas FROM materi WHERE Nama = ?");
    // $stmt->bind_param("s", $nama_kelas);
    // $stmt->execute();
    // $stmt->store_result();
    // if ($stmt->num_rows > 0) {
    //     $stmt->bind_result($id_kelas);
    //     $stmt->fetch();
    // } else {
    //     // Insert new class with minimal data
    //     $insert_stmt = $conn->prepare("INSERT INTO materi (ID_Kelas, Harga, Deskripsi, detail, Materi, img) VALUES (?, 0, '', '', '', '')");
    //     $insert_stmt->bind_param("s", $nama_kelas);
    //     if (!$insert_stmt->execute()) {
    //         die("Failed to create class: " . $insert_stmt->error);
    //     }
    //     $id_kelas = $conn->insert_id;
    //     $insert_stmt->close();
    //     echo "<script>alert('Kelas tidak ditemukan'); window.location.href = '../'</script>";
    // }
    // $stmt->close();

    // Upload materi files and insert into materi table
    $uploadDir = '../../admin/uploads/file_materi/';
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0755, true);
    }

    // Assuming a new table 'materi' with columns: id, id_kelas, pertemuan, file_name, video_url
    foreach ($file_materi as $index => $file) {
        if ($file && $file['error'] === UPLOAD_ERR_OK) {
            $fileTmpPath = $file['tmp_name'];
            $fileName = $file['name'];
            $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
            $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif', 'pdf', 'docx', 'pptx', 'mp4', 'avi', 'mkv'];

            if (in_array($fileExtension, $allowedExtensions)) {
                $newFileName = md5(time() . $fileName) . '.' . $fileExtension;
                $destPath = $uploadDir . $newFileName;
                if (move_uploaded_file($fileTmpPath, $destPath)) {
                    $pertemuan = $index + 1;
                    $insertMateri = $conn->prepare("INSERT INTO materi (ID_Kelas, Pertemuan, File_materi, Video_materi) VALUES (?, ?, ?, '')");
                    $insertMateri->bind_param("iis", $id_kelas, $pertemuan, $newFileName);
                    $insertMateri->execute();
                    $insertMateri->close();
                }
            }
        }
    }

    // Insert video URLs for pertemuan 4 and 5
    foreach ($video_materi as $index => $url) {
        $url = trim($url);
        if (!empty($url)) {
            $pertemuan = $index + 4;
            $insertVideo = $conn->prepare("INSERT INTO materi (id_kelas, pertemuan, file_materi, video_materi) VALUES (?, ?, '', ?)");
            $insertVideo->bind_param("iis", $id_kelas, $pertemuan, $url);
            $insertVideo->execute();
            $insertVideo->close();
        }
    }

    echo "<script>alert('Materi sukses ditambahan'); window.location.href='Tabelmateri.php';</script>";
    // header("Location: Tabelmateri.php");
    exit();
} else {
    echo "Invalid request method.";
}
?>
