<?php 
include("../../components/koneksi.php");

if(!isset($_GET['id'])) {
    die('Kamu belum melakukan transaksi');
}

$ID_Kelas = $_GET['id'];
$stmt = $conn->prepare('SELECT * FROM kelasonline WHERE ID_Kelas = ?');
$stmt->bind_param('i', $ID_Kelas);
$stmt->execute();

$result = $stmt->get_result();
$row = $result->fetch_assoc();

$rp = "Rp. " . number_format($row['Harga'], 0, ',', '.');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Transaction Completed</title>
    <link rel="stylesheet" href="Tcomplete.css" />
</head>
<body>
    <header class="header-bar">
        <div class="side-block left"></div>
        <div class="header-title">Transaction - Completed</div>
        <div class="side-block right"></div>
    </header>

    <main class="content">
        <div class="message">your order has been delivered!</div>
        <div class="image-container">
            <img src="../../img/kelas-img/<?= $row['img'] ?>" alt="User" />
        </div>
        <div class="order-info">
            <span class="order-name"><?= $row['Nama'] ?></span>
            <span class="order-price"><?= $rp ?></span>
        </div>
        <a href="../Home" class="back-home-btn">Back to home</a>
    </main>

    <footer class="footer-bar"></footer>
</body>
</html>
