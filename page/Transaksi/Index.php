<?php 
session_start();
include("../../components/koneksi.php");

if(isset($_POST['buy'])) {
    $ID_User = $_POST['ID_User'];
    $ID_Kelas = $_POST['ID_Kelas']; //id kelas kursus
    $Pesan = $_POST['Pesan'] ?? '';
    $Harga = $_POST['Harga'];
    $Waktu = $_POST['Waktu'];

    $stmt = $conn->prepare("INSERT INTO transaksi (US_ID, ID_Kelas, Pesan, Harga) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("iisi", $ID_User, $ID_Kelas, $Pesan, $Harga);
    
    if($stmt->execute()) {
        echo "<script>alert('Transaksi Berhasil!');
        window.location.href='Tcomplete.php?id=" . $ID_Kelas . "';</script>";
        exit();
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Transaction</title>
    <link rel="stylesheet" href="transaksi.css" />
</head>
<body>
    <?php 
    
    if(!isset($_GET['id'])) {
        exit('ID Tidak valid');
    }

    $id = $_GET['id'];
    $query = "SELECT * FROM kelasonline WHERE ID_Kelas = $id";
    $result = mysqli_query($conn,$query);
    $row = mysqli_fetch_array($result);

    $getHarga = "SELECT Harga FROM kelasonline WHERE ID_Kelas = $id";
    $harga = mysqli_query($conn,$getHarga);
    $harga = mysqli_fetch_array($harga);

    $rp = "Rp. " . number_format($harga['Harga'], 0, ',', '.');
    ?>
    <div class="container">
        <header>
            <div class="icon cart-icon">&#128722;</div>
            <div class="title">Transaction - Join with our class?</div>
            <div class="icon bookmark-icon">&#128278;</div>
        </header>
        <main>
            <div class="image-container">
                <img src="../../img/kelas-img/<?= $row['img'] ?>" alt="Class Image" />
            </div>
            <form method="POST" action="./?id=<?= $id ?>" class="transaction-form">
                <input type="hidden" name="ID_User" value="<?= $_SESSION['US_ID'] ?>" id="">
                <input type="hidden" name="ID_Kelas" value="<?= $row['ID_Kelas'] ?>" id="">

                <label for="">Nama Kursus</label>
                <input type="text" name="Nama" value="<?= $row['Nama'] ?>" readonly placeholder="Crypto Class bla bla bla bla" />

                <label for="">Pesan (opsional)</label>
                <input type="text" name="Pesan" placeholder="Pesan untuk author" />

                <div class="row">
                    <div class="harga">
                        <label for="harga">Harga</label><br>
                        <input type="text" name="harga_tampil" value="<?= $rp ?>" readonly />
                    </div>
                    <div class="waktu">
                        <label for="waktu">Tanggal Beli</label><br>
                        <input type="text" name="Waktu" readonly value="<?php echo date("d-m-Y",time()) ?>">
                    </div>
                </div>
                <input type="hidden" name="Harga" value="<?= $harga['Harga'] ?>" readonly />
                <button type="submit" name="buy" class="btn-buy">Buy now!</button>
            </form>
        </main>
    </div>
</body>
</html>
