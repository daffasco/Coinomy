<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include_once 'koneksi.php';

$userPhoto = null;
if (isset($_SESSION['user'])) {
    $username = $_SESSION['user'];
    $stmt = $conn->prepare("SELECT * FROM users WHERE US_NAME = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $userData = $result->fetch_assoc();
    if ($userData && !empty($userData['FILE_KTP'])) {
        $userPhoto = '../../admin/' . $userData['FILE_KTP'];
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        /* Navbar */

.navbar {
    z-index: 99999;
    position: fixed;    
    top: 0;
    left: 0;
    right: 0;
    background-color: #ffffffcf;
    box-shadow: -1px 3px 4px 1px rgba(0, 0, 0, 0.6);
    -webkit-box-shadow: -1px 3px 4px 1px rgba(0, 0, 0, 0.6);
    -moz-box-shadow: -1px 3px 4px 1px rgba(0, 0, 0, 0.6);
    display: flex;
    justify-content: space-between;
    padding: 0 ;
    align-items: center;
    height: 80px;
    
}

.navbar .navbar-logo {
 text-align: left;
 padding: 0 5.5rem;
 font-size: 1.4rem;
 font-weight: 700;
 display: flex;
 color:#7b45d1;
 text-decoration: none;
}

.navbar .container-extra a {
 color: #000000;
 margin: 0 0.5rem;
}

.navbar .container-extra a:hover {
    color: var(--primary);

}

#menu { 
    display: none;
}

.ul-navbar {
    padding: 0 2rem;
    display: flex;
}

.ul-navbar .li-navbar {
    gap: 1rem;
    display: flex;
    list-style: none;
    justify-content: center;
    align-items: center;
}

.navbar .ul-navbar .li-navbar a {
    text-decoration: none;
    font-size: 1.1rem;
    font-family: Verdana, Tahoma, sans-serif;
    color: rgb(0, 0, 0);
    padding: 10px;
    transition: all;
    transition-duration: 0.5s;
    border-bottom: 1px solid #302340(0, 0, 0, 0);
    display: flex;
}

.navbar .container-navbar {
    padding-top: 100%;
    display: flex;
    position: fixed;
    padding: 0 2rem;
}

.navbar .ul-navbar .li-navbar a:hover {
    color: #7b45d1;
    border-bottom: 1px solid #7b45d1;
}

/* Navbar End */
@media (max-width: 768px) {
    #menu {
        display: inline-block;
    }
    .navbar .ul-navbar {
        position: absolute;
        top: 100%;
        right: -100%;
        background-color: white;
        width: 20rem;
        height: 100vh;
        transition:0.5s;
    }
    .navbar .ul-navbar.active {
        right: 0;
    }

    .navbar .ul-navbar a {
        color: var(--bg);
        display: block;
        margin: 1.5rem;
        padding: 0.5rem;
        font-size: 2rem;
    }
}

/* mobile phone */
@media (max-width: 450px) {
    #menu {
        display: inline-block;
    }
}

/* media queries end */
.navbar-profile-photo {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    object-fit: cover;
    margin-right: 0.5rem;
    vertical-align: middle;
}
    </style>
</head>
<body>
    <!-- NAVBAR -->
    <nav class="navbar">
        <div class="container-navbar">
            <img src="<?php $_SERVER['DOCUMENT_ROOT'] ?>/UKLREMON/img/coin.png" width="50px" lengt="100px">
        </div>

        <a href="#" class="navbar-logo"> oinomy </a>

        <div class="container-extra">
            <a href id="search"><i data-feather="search"></i></a>
            <a href id="menu"><i data-feather="menu"></i></a>
        </div>

        <ul class="ul-navbar">
            <li class="li-navbar"> <a href="<?php $_SERVER['DOCUMENT_ROOT']; ?>/UKLREMON/page/Home/index.php"">HOME</a></li>
            <li class="li-navbar"> <a href="<?php $_SERVER['DOCUMENT_ROOT']; ?>/UKLREMON/page/About/index.php">ABOUT US</a></li>
            <li class="li-navbar"> <a href="<?php $_SERVER['DOCUMENT_ROOT']; ?>/UKLREMON/page/contact/contact.php">CONTACT</a></li>
            <li class="li-navbar"> <a href="<?php $_SERVER['DOCUMENT_ROOT']; ?>/UKLREMON/page/profil/index.php">PROFILE</a></li>
            <?php if ($userPhoto): ?>
                <li class="li-navbar" style="display:flex; align-items:center; gap: 0.2rem; margin-left: 1rem;"><img src="<?= htmlspecialchars($userPhoto) ?>" alt="Profile Photo" class="navbar-profile-photo" style="margin-right: 0.2rem;" /><span style="margin-left: 0; font-size: 1rem; color: #000;"><?= htmlspecialchars($_SESSION['user']) ?></span></li>
            <?php endif; ?>
        </ul>
    </nav>
    <!-- NAVBAR END -->
</body>
</html>
