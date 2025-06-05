<?php 
session_start();
include_once("../../components/koneksi.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Tambah Materi</title>
    <link rel="stylesheet" href="Addmateri.css" />
</head>
<body>
    <div class="container">
        <h2 class="title">Tambah Materi</h2>
        <form action="submit_materi.php" method="POST" enctype="multipart/form-data" class="form-materi">
            <label for="nama_kelas" class="label">Tambah Materi untuk Kelas</label>
            <select name="ID_kelas" id="ID_kelas" required>
                <?php 
                $query = $conn->query("SELECT * FROM kelasonline");
                while ($row = $query->fetch_assoc()) {
                ?>
                <option value="<?= $row['ID_Kelas'] ?>"><?= $row['Nama'] ?></option>
                <?php } ?>
            </select>

            <div class="section">
                <div class="file-uploads">

                    <label class="section-title">Upload Materi File</label>
                    <label for="">Pertemuan ke-satu</label>
                    <input type="file" name="materi_file_1" accept=".pdf" required>

                    <label for="">Pertemuan ke-dua</label>
                    <input type="file" name="materi_file_2" accept=".pdf" required>

                    <label for="">Pertemuan ke-tiga</label>
                    <input type="file" name="materi_file_3" accept=".pdf" required>
                </div>
                <div class="video-urls">
                    <label class="section-title">Tambahkan URL - Video</label>
                    <input type="url" name="video_url_4" placeholder="Pertemuan ke-empat" required>
                    <input type="url" name="video_url_5" placeholder="Pertemuan ke-lima" required>
                </div>
            </div>

            <button type="submit" class="btn-submit">Tambah Materi</button>
        </form>
        <a href="Tabelmateri.php" class="btn-back">Back to home</a>
    </div>
</body>
</html>
