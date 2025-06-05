


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<link rel="stylesheet" href="style.css">
<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

<body>

    <form action="proses.php" method="post">
        <div class="main">
            <h1>LOGIN</h1>
            <div class="boxin">
                <div class="input-box">
                    <input type="email" id="email" name="email" placeholder="Email">
                    <i class='bx bxs-envelope'></i>
                </div>
                <div class="input-box">
                    <input type="password" id="pw" name="pw" placeholder="Password">
                    <box-icon type='solid' name='lock-alt'></box-icon>
                    <i class='bx bxs-lock-alt'></i>
                </div>
            </div>
            <div class="coco">
                <label><input type="checkbox" class="check">Remember me </label>
                <a href="Regis.php">Register</a>
            </div>
            <div class="masuk">
                <button type="submit" name="submit" value="sign_in" class="btn">Sign in</button>
            </div>
        </div>
    </form>
</body>

</html>