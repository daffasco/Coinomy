<?php
$servername = "localhost";
$username = "root";
$password = "";
$db = "ukl_coinomy";

// Buat koneksi
$conn = new mysqli($servername, $username, $password, $db);


$id = $_GET['edit'] ?? null;
$nama = $harga = $deskripsi = $detail = $materi = $img = '';
$editMode = false;

if ($id) {
    $editMode = true;
    $stmt = $conn->prepare("SELECT * FROM kelasonline WHERE ID_Kelas = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();
        $nama = htmlspecialchars($row['Nama']);
        $harga = htmlspecialchars($row['Harga']);
        $deskripsi = htmlspecialchars($row['Deskripsi']);
        $detail = htmlspecialchars($row['detail']);
        // $materi = htmlspecialchars($row['Materi']);
        $img = htmlspecialchars($row['img']);
    } else {
        echo "Course not found.";
        exit;
    }
    $stmt->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title><?php echo $editMode ? 'Edit Class' : 'Add Class'; ?></title>
    <link rel="stylesheet" href="Cclass.css">
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const imageUpload = document.getElementById('image-upload');
            const imagePreview = document.getElementById('image-preview');
            const placeholder = document.querySelector('.image-placeholder');

            placeholder.addEventListener('click', () => {
                imageUpload.click();
            });

            imageUpload.addEventListener('change', function () {
                const file = this.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function (e) {
                        imagePreview.src = e.target.result;
                        imagePreview.style.display = 'block';
                        placeholder.classList.add('has-image');
                    };
                    reader.readAsDataURL(file);
                } else {
                    imagePreview.src = '';
                    imagePreview.style.display = 'none';
                    placeholder.classList.remove('has-image');
                }
            });
        });
    </script>
</head>
<body>
    <header><?php echo $editMode ? 'Edit Class' : 'Add Class'; ?></header>
    <div class="container">
        <div class="wrapper">
            <form action="handle_course.php" method="POST" enctype="multipart/form-data" id="create-class-form">
                    <section class="left-panel">
                        <div class="image-placeholder" title="Add Image">
                            <input type="file" id="image-upload" name="img" accept="image/*" <?php echo $editMode ? '' : 'required'; ?> />
                            <?php if ($editMode && $img): ?>
                                <img id="image-preview" src="../admin/uploads/<?php echo $img; ?>" alt="Image Preview" />
                            <?php else: ?>
                                <img id="image-preview" src="" alt="" style="display:none;" />
                            <?php endif; ?>
                        </div>
                        <div class="form-group" style="margin-bottom: 15px; width: 100%; justify-content: center;">
                            <label for="harga" style="width: auto; margin-right: 10px; color: white;">Set - Price</label>
                            <input type="number" id="harga" name="Harga" placeholder="100000" value="<?php echo $harga; ?>" required style="flex: none; width: 100px; border-radius: 6px; padding: 8px;" />
                        </div>
                        <button type="submit" form="create-class-form" class="btn-add-class"><?php echo $editMode ? 'Update Class' : 'Add Class'; ?></button>
                    </section>
                    <section class="right-panel">
                        <?php if ($editMode): ?>
                            <input type="hidden" name="ID_Kelas" value="<?php echo $id; ?>" />
                        <?php endif; ?>
                        <div class="form-group">
                            <label for="nama-kelas">Nama Kelas</label>
                            <input type="text" id="nama-kelas" name="Nama" placeholder="Input text" value="<?php echo $nama; ?>" required />
                        </div>
                        <div class="form-group">
                            <label for="deskripsi">Deskripsi</label>
                            <textarea id="deskripsi" name="deskripsi" placeholder="Input text" rows="4" value="" required><?= $deskripsi ?></textarea>
                        </div>
                        <!-- <div class="form-group">
                            <label for="materi">Materi</label>
                            <input type="text" id="materi" name="Materi" placeholder="Input text" value="<?php echo $materi; ?>" required />
                        </div> -->
                        <div class="form-group">
                            <label for="detail">Detail</label>
                            <textarea id="detail" name="detail" placeholder="Input text" required><?php echo $detail; ?></textarea>
                        </div>
                    </section>
            </form>
        </div>
    </div>
    <?php include_once '../../components/footer.php'; ?>
</body>
</html>
</body>
</html>