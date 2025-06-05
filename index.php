<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coinomy</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400;700&display=swap" rel="stylesheet">
    <!-- Fonts end -->

    <!-- Feather icon -->
    <script src="https://unpkg.com/feather-icons"></script>
    <!-- Feather icon ends -->

    <link rel="stylesheet" href="css/asik.css">
</head>

<body>
    <?php include_once "components/navbar.php"; ?>
    <!-- CONTENT -->
    <div class="content">
        <h1><span>Coinomy </span> for your investing experience and your partner</h1>
    </div>
    <div class="buttons">
        <button class="button" id="Start"><a href="page/LoginRegis/regis.php">Daftar</a></button>
        <button class="button" id="login-button"><a href="page/LoginRegis/index.php">Login</a></button>
    </div>
    <!-- CONTEN SELESAI -->

    <!-- FOOTEER -->
    <?php
    include_once 'components/footer.php';
    ?>
    <!-- FOOTER END -->

    <!-- My javascript -->
    <script src="javascript/myjs.js"></script>
</body>