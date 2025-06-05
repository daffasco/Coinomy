<?php
include_once "../../components/koneksi.php";

if (!isset($_GET['id_kelas'])) {
    echo "Class ID is missing.";
    exit();
}

$id = intval($_GET['id_kelas']);

$query = $conn->prepare("SELECT * FROM kelasonline WHERE id_kelas = ?");
$query->bind_param("i", $id);
$query->execute();
$result = $query->get_result();

if ($result->num_rows === 0) {
    echo "Class not found.";
    exit();
}

$class = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Detail Kelas - <?= htmlspecialchars($class['Nama']); ?></title>
    <link rel="stylesheet" href="style.css" />
</head>

<body>
    <div class="container">
        <header class="header-bar">
            <div class="logo">C</div>
            <nav class="nav-menu">
                <a href="../Home/index.php">HOME</a>
                <a href="#">ABOUT US</a>
                <a href="#">CONTACT</a>
                <a href="#">BENEFIT</a>
            </nav>
        </header>

        <main class="content">
            <section class="left-column">
                <h1><?= htmlspecialchars($class['Nama']); ?></h1>
                <div class="likes">\\\
                    <span class="thumbs-up">👍</span>
                    <span class="likes-count">27</span>
                </div>
                <div class="detail">
                    <h2>Detail Kelas</h2>
                    <p><?= nl2br(htmlspecialchars($class['detail'] ?? 'No detail available.')); ?></p>
                </div>

                <h2>Materi yang di berikan</h2>
                <div class="materials">
                    <p><?= nl2br(htmlspecialchars($class['Materi'] ?? 'No materials available.')); ?></p>
                    <?php
                    $select = $conn->query("SELECT * FROM materi");

                    while ($result = $select->fetch_assoc()) {
                    ?>
                        <h3>Pertemuan ke-<?php echo $result['Pertemuan']; ?></h3>

                        <?php if ($result['File_materi'] != null): ?>
                            <iframe src="../../admin/uploads/file_materi/<?= $result['File_materi'] ?>" frameborder="0"></iframe>
                        <?php else : ?>
                            <a href="" style="color:white"><?= $result['Video_materi'] ?></a>
                        <?php endif; ?>

                    <?php } ?>
                </div>
            </section>

            <aside class="right-column">
                <img src="../../img/kelas-img/<?= htmlspecialchars($class['img']); ?>" alt="Class Image" />
                <div class="class-info">
                    <span class="class-name"><?= htmlspecialchars($class['Nama']); ?></span>
                    <span class="class-price"><?= htmlspecialchars($class['Harga']); ?> IDR</span>
                </div>
                <div class="class-description">
                    <p><?= nl2br(htmlspecialchars($class['Deskripsi'] ?? 'No description available.')); ?></p>
                </div>
                <a href="../Transaksi/index.php?id=<?= $id ?>">Beli Kursus</a>
            </aside>
        </main>
    </div>
</body>

</html>