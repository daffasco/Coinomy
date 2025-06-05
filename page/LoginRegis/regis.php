<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Registration</title>
    <link rel="stylesheet" href="style_compatible.css" />
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>
    <div class="main">
        <h1>REGISTRATION</h1>
        <form action="proses.php" method="post" enctype="multipart/form-data">
            <div class="input-box">
                <input type="email" id="email" name="email" placeholder="Email" required />
                <i class='bx bxs-envelope'></i>
            </div>
            <div class="input-box">
                <input type="password" id="password" name="password" placeholder="Password" required />
                <i class='bx bxs-lock-alt'></i>
            </div>
            <div class="input-box">
                <input type="text" id="nama" name="nama" placeholder="Nama Lengkap" required />
            </div>
            <div class="input-box">
                <input type="tel" id="telepon" name="telepon" placeholder="Nomor Handphone" required pattern="[0-9]{10,15}" title="Masukkan nomor handphone yang valid" />
            </div>
            <div class="input-box">
                <label for="foto_ktp">Foto KTP:</label>
                <input type="file" id="foto_ktp" name="foto_ktp" accept="image/*" required />
            </div>
            <div class="input-box">
                <label for="jenis_kelamin">Jenis Kelamin:</label>
                <select id="gender" name="gender" required>
                    <option value="" disabled selected>Pilih Jenis Kelamin</option>
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
            </div>
            <div class="submit-box">
                <button type="submit" name="submit" value="add" class="btn">Register</button>
            </div>
        </form>
    </div>
</body>

</html>
