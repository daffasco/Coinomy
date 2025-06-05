<?php
$servername = "localhost";
$username = "root";
$password = "";
$db = "ukl_coinomy";

// Buat koneksi
$conn = new mysqli($servername, $username, $password, $db);

$sql = "SELECT * FROM kelasonline";
$result = $conn->query($sql); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Admin Table</title>
    <link rel="stylesheet" href="Ctabel.css">
</head>

<body>
    <header>
        <div class="logo">C</div>
        <nav>
            <a href="#">HOME</a>
            <a href="#">ABOUT US</a>
            <a href="#">CONTACT</a>
            <a href="#">BENEFIT</a>
        </nav>
    </header>
    <main>
        <div class="flex-wrapper">
            <aside class="sidebar">
                <ul>
                    <li><a href="../index.php">Data User</a></li>
                    <li><a href="#" class="active">Data Kelas</a></li>
                    <li><a href="../Materi/Tabelmateri.php">Data Materi</a></li>
<li><a href="../Transaksi/index.php">Data Transaksi</a></li>

                </ul>
            </aside>
            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>ID_Kelas</th>
                            <th>Nama</th>
                            <th>Harga</th>
                            <th>Foto</th>
                            <th>Deskripsi</th>
                            <th>Detail</th>
                            <th>Materi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . htmlspecialchars($row['ID_Kelas']) . "</td>";
                                echo "<td>" . htmlspecialchars($row['Nama']) . "</td>";
                                echo "<td>" . htmlspecialchars($row['Harga']) . "</td>";
                                echo "<td><img src='../../img/kelas-img/" . htmlspecialchars($row['img']) . "' alt='Foto' /></td>";
                                echo "<td>" . htmlspecialchars($row['Deskripsi']) . "</td>";
                                echo "<td>" . htmlspecialchars($row['detail']) . "</td>";
                                echo "<td>" . htmlspecialchars($row['Materi']) . "</td>";
                                echo "<td>
                        <a href='Cclass.php?edit=" . $row['ID_Kelas'] . "' style='color:#8a2be2; margin-right:10px;'>Edit</a>
                        <a href='handle_course.php?delete=" . $row['ID_Kelas'] . "' style='color:#ff4444;' onclick=\"return confirm('Are you sure you want to delete this course?');\">Delete</a>
                      </td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='8'>No data found</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
                <a href="Cclass.php" class="btn-back">Tambah Kelas</a>
            </div>
        </div>
    </main>
</body>

</html>