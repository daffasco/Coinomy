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
?>

<html>

<head>
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <!-- Removed Bootstrap CSS and JS -->
    <!-- fontawsome -->
    <script src="https://kit.fontawesome.com/cc1d70dd01.js" crossorigin="anonymous"></script>
    <!-- fontawsome end -->
    <title> belajar_crud </title>
    <link rel="stylesheet" href="admin.css">
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar">
        <!-- <div class="container"> -->
            <a class="navbar-brand" href="#">
                CRUD - ADMIN PANEL
            </a>
        <!-- </div> -->
    </nav>
    <!-- Navbar end -->
    
    <div class="flex-wrapper">
        <aside class="sidebar">
            <ul>
                <li><a href="#" class="active">Data User</a></li>
                <li><a href="Class/Ctabel.php">Data Kelas</a></li>
                <li><a href="materi/Tabelmateri.php">Data Materi</a></li>
                <li><a href="Transaksi/index.php">Data Transaksi</a></li>
            </ul>
        </aside>
        
        <!-- Judul -->
        <div class="container">
            <figure>
                <blockquote class="blockquote">
                    <p>Data yang ada di database.</p>
                </blockquote>
                <figcaption class="blockquote-footer">
                    CRUD <cite title="Source Title">Create Read Update Delete</cite>
                </figcaption>
            </figure>
            <a href="Second.php" class="btn-primary"><i class="fa-solid fa-plus"></i> Tambah Data</a>
            <div class="table-wrapper">
                <table class="custom-table">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama Lengkap</th>
                            <th>Email</th>
                            <th>Jenis Kelamin</th>
                            <th>Foto Profil</th>
                            <th>Password</th>
                            <th>Nomor Hp</th>
                            <th>Status</th>
                            <th>Aksi</th>
                            <?php
                            //Gae nampilno data iki pokoke//
                            $sql = "SELECT * FROM users";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) { ?>
                        <tr>
                            <td><?= $row['US_ID'] ?></td>
                            <td><?= $row['US_NAME'] ?></td>
                            <td><?= $row['US_EMAIL'] ?></td>
                            <td><?= $row['Jenis_Kelamin'] ?></td>
                            <td><img src='<?= $row['FILE_KTP'] ?>' alt='<?= $row['FILE_KTP'] ?>' style='width:100px; height:auto;'></td>
                            <td><?= $row['US_Password'] ?></td>
                            <td><?= $row['US_No.hp'] ?></td>
                            <td><?= $row['US_STAT'] ?></td>
                            <td>
                                <a href='edit/Second.php?edit=<?= $row['US_ID'] ?>'><box-icon type='solid' name='pencil'></box-icon> </box-icon></a>
                                <a href='index.php?delete=<?= $row['US_ID'] ?>' onclick='return confirm("Are you sure you want to delete this record?");'><box-icon type='solid' name='trash-alt'></a>
                            </td>
                        </tr>
                <?php
                                }
                            } else {
                                echo "<tr><td colspan='6'>No records found</td></tr>";
                            }
                            //iki gae hapus data ga//
                            if (isset($_GET['delete'])) {
                                $id = $_GET['delete'];
                                $delete = "DELETE FROM users WHERE US_ID = $id";
                                $query = "SELECT FILE_KTP FROM users WHERE US_ID = $id";
                                $deldir = $conn->query($query);
                                if ($deldir && $deldir->num_rows > 0) {
                                    $row = $deldir->fetch_assoc();
                                    $fileToDelete = $row['FILE_KTP'];
                                    if (unlink($fileToDelete) && $conn->query($delete) === TRUE) {
                                        header('Location:index.php');
                                        echo 'DATA DELETED';
                                        exit;
                                    } else {
                                        echo "Error deleting record or file: " . $conn->error;
                                    }
                                } else {
                                    echo "File not found or query error.";
                                }
                            }
                ?>
                </tbody>
                </table>
            </div>

        </div>
        <!-- Judul End -->
    </div>
</body>

</html>