<?php
$servername = "localhost";
$username = "root";
$password = "";
$db = "ukl_coinomy";

// Buat koneksi
$conn = new mysqli($servername, $username, $password, $db);

// Pokok iki ngecek konek ta gak aslie
if ($conn->connect_error) {
    echo "Connection failed: {$conn->connect_error}";
}

$query = "SELECT t.ID_Transaksi AS id_transaksi, u.US_NAME as username, k.Nama AS nama_kelas, t.Harga as harga, t.Waktu AS waktu, t.Pesan as pesan FROM transaksi t JOIN users u ON t.US_ID=u.US_ID JOIN kelasonline k ON t.ID_kelas = k.ID_Kelas ORDER BY t.ID_Transaksi ASC;";
$result = $conn->query($query);
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabel Transaksi</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/Ctabel.css">
    <link rel="stylesheet" href="../admin.css">
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }
    </style>
</head>

<body>
    <div class="flex-wrapper">
        <aside class="sidebar">
            <ul>
                <li><a href="../index.php">Data User</a></li>
                <li><a href="../Class/Ctabel.php">Data Kelas</a></li>
                <li><a href="../materi/Tabelmateri.php">Data Materi</a></li>
                <li><a href="index.php" class="active">Data Transaksi</a></li>
            </ul>
        </aside>
        <div class="container">
            <figure>
                <blockquote class="blockquote">
                    <p>Data yang ada di database.</p>
                </blockquote>
                <figcaption class="blockquote-footer">
                    CRUD <cite title="Source Title">Create Read Update Delete</cite>
                </figcaption>
            </figure>
            <table>
                <th>
                    <tr>
                        <th>ID Transaksi</th>
                        <th>Username</th>
                        <th>Nama Kelas</th>
                        <th>Harga</th>
                        <th>Waktu</th>
                        <th>Pesan</th>
                        <th>Opsi</th>
                    </tr>
                    <style>
                        table th {
                            background-color: #e9ecef;
                        }
                        table td {
                            border: 1px solid #dee2e6;
                            padding: 10px;
                            color: white;
                        }
                    </style>
                    <?php while ($row = $result->fetch_assoc()) { ?>
                        <tr id="tr-<?= $row['id_transaksi'] ?>">
                            <td><?= $row['id_transaksi'] ?></td>
                            <td><?= $row['username'] ?></td>
                            <td><?= $row['nama_kelas'] ?></td>
                            <td><?= $row['harga'] ?></td>
                            <td><?= $row['waktu'] ?></td>
                            <td><?= $row['pesan'] ?></td>
                            <td>
                                <button id="btnTerima" onclick="alert('Mantap');">Terima</button>
                            </td>
                        </tr>
                    <?php } ?>
                </th>
            </table>
        </div>
    </div>
</body>

</html>