<?php
session_start();
include_once "../../components/koneksi.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Coinomy Home</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400;700&display=swap" rel="stylesheet" />
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <!-- Feather Icons -->
    <script src="https://unpkg.com/feather-icons"></script>
    <!-- Custom CSS -->
    <link rel="stylesheet" href="asik.css" />
</head>

<body>
    <!-- NAVBAR -->
    <?php include_once "../../components/navbar.php"; ?>
    <!-- NAVBAR END -->

    <section class="container">
        <div class="box-list dropdown">
            <div class="container-box">
                <div class="box box-green" onclick="tombolDropdown('dropdown1')">
                    <span>Reksadana Pasar Uang</span>
                    <img alt="Money and coins icon" class="icon" src="../../img/RDPU.png" width="40" height="40" />
                </div>
                <div class="dropdown-content" id="dropdown1" style="margin-top: 0;">
                    <p>Reksadana pasar uang adalah jenis reksadana yang menginvestasikan dana ke instrumen pasar uang jangka pendek seperti deposito, surat berharga, atau obligasi yang jatuh temponya kurang dari satu tahun. Karena fokusnya pada instrumen berisiko rendah, reksadana ini menawarkan tingkat risiko paling kecil dibanding jenis reksadana lainnya. Meskipun imbal hasilnya tidak setinggi saham atau obligasi jangka panjang, return yang diberikan biasanya lebih tinggi dari tabungan biasa atau deposito. Reksadana pasar uang sangat cocok bagi investor pemula, profil konservatif, atau mereka yang ingin menyimpan dana untuk keperluan jangka pendek seperti dana darurat, liburan, atau biaya sekolah. Selain itu, fleksibilitas dan kemudahan pencairan menjadikannya pilihan menarik bagi siapa pun yang ingin berinvestasi dengan aman dan praktis.

                    </p>
                </div>
            </div>

            <div class="container-box">
                <div class="box box-blue" onclick="tombolDropdown('dropdown2')">
                    <span>Obligasi FR</span>
                    <img alt="Bank building icon" class="icon" src="../../img/ObligasiFR.png" width="40" height="40" />
                </div>
                <div class="dropdown-content" id="dropdown2">
                    <p> Obligasi FR (Fixed Rate) adalah jenis obligasi yang diterbitkan oleh pemerintah Indonesia dengan tingkat kupon (bunga) tetap sepanjang masa berlaku obligasi tersebut. Artinya, investor yang membeli obligasi FR akan menerima pembayaran bunga secara rutin (biasanya setiap 6 bulan) dengan persentase tetap, terlepas dari naik-turunnya suku bunga di pasar.

                        Obligasi FR umumnya memiliki tenor (jatuh tempo) jangka menengah hingga panjang, seperti 5, 10, atau bahkan 30 tahun. Karena diterbitkan oleh pemerintah, obligasi ini dianggap aman dan berisiko rendah, sehingga sering dijadikan acuan (benchmark) dalam pasar obligasi Indonesia.

                        Obligasi FR cocok untuk investor yang ingin pendapatan tetap dan stabil, serta lebih aman dibanding instrumen lain yang lebih fluktuatif. Selain itu, harga obligasi FR bisa naik-turun di pasar sekunder, sehingga juga bisa memberikan capital gain jika dijual sebelum jatuh tempo saat harga naik.

                        Kalau kamu mau, aku bisa bantu jelasin juga cara kerja kuponnya atau bedanya dengan jenis obligasi lain.</p>
                </div>
            </div>

            <div class="container-box">
                <div class="box box-purple" onclick="tombolDropdown('dropdown3')">
                    <span>SAHAM</span>
                    <img alt="Pie chart icon" class="icon" src="../../img/Saham.png" width="40" height="40" />
                </div>
                <div class="dropdown-content" id="dropdown3">
                    <p>Saham adalah bukti kepemilikan atas suatu perusahaan. Ketika seseorang membeli saham, artinya ia menjadi pemilik sebagian dari perusahaan tersebut, dan berhak atas sebagian keuntungan perusahaan, biasanya dalam bentuk dividen, serta potensi kenaikan harga saham di pasar.

                        Saham diperdagangkan di bursa efek, seperti Bursa Efek Indonesia (BEI), dan harganya bisa naik turun tergantung kinerja perusahaan, kondisi ekonomi, serta sentimen pasar. Investor membeli saham dengan harapan harga saham akan naik seiring waktu, sehingga bisa dijual dengan keuntungan (capital gain). Selain itu, beberapa perusahaan rutin membagikan dividen sebagai bentuk pembagian keuntungan kepada pemegang saham.

                        Investasi saham tergolong berisiko tinggi, namun juga menawarkan potensi imbal hasil yang besar dalam jangka panjang. Saham cocok bagi investor yang siap menghadapi fluktuasi pasar dan memiliki tujuan investasi jangka menengah hingga panjang.</p>
                </div>
            </div>

            <div class="container-box">

                <div class="box box-yellow" onclick="tombolDropdown('dropdown4')">
                    <span>Investasi Emas</span>
                    <img alt="Gold bar icon" class="icon" src="../../img/Emas.png" width="40" height="40" />
                </div>
                <div class="dropdown-content" id="dropdown4">
                    <p>Investasi emas adalah kegiatan membeli emas, baik dalam bentuk fisik seperti logam mulia maupun digital, dengan tujuan untuk menjaga dan meningkatkan nilai kekayaan dalam jangka panjang. Emas dikenal sebagai aset yang stabil dan tahan terhadap inflasi, sehingga sering disebut sebagai safe haven atau tempat perlindungan saat kondisi ekonomi tidak menentu.

                        Harga emas cenderung naik seiring waktu, terutama saat terjadi krisis ekonomi, penurunan nilai mata uang, atau ketidakpastian global. Karena itu, banyak orang memilih emas sebagai cara untuk mempertahankan daya beli mereka. Emas juga mudah dicairkan dan tidak tergerus inflasi, membuatnya cocok sebagai bagian dari diversifikasi portofolio investasi.

                        Meskipun keuntungan dari emas tidak sebesar saham, risikonya juga lebih rendah. Investasi emas cocok bagi investor konservatif, pemula, atau siapa pun yang ingin menyimpan nilai kekayaan dengan stabil tanpa terpengaruh gejolak pasar keuangan.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="container-card">
        <?php
        $query = "SELECT * FROM kelasonline";
        $result = $conn->query($query);
        while ($row = $result->fetch_assoc()) { ?>
            <a href="../Class_Detail/index.php?id_kelas=<?= urlencode($row['ID_Kelas']); ?>" class="card-link" style="text-decoration:none; color:inherit;">
                <div class="card">
                    <img
                        src="../../img/kelas-img/<?= htmlspecialchars($row['img']); ?>"
                        alt="Foto judul"
                        width="150"
                        height="150" />
                    <div class="like-icon">
                        <i class="fas fa-thumbs-up"></i>
                    </div>
                    <div class="card-footer">
                        <span><?= htmlspecialchars($row['Nama']); ?></span>
                        <span class="price"><?= htmlspecialchars($row['Harga']); ?></span>
                    </div>
                </div>
            </a>
        <?php } ?>
    </section>



    <!-- Container End -->
    <script src="./box-expand.js"></script>
</body>

</html>