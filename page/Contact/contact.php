<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Contact</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400;700&display=swap"
        rel="stylesheet"
    />
    <!-- Fonts end -->

    <!-- Feather icon -->
    <script src="https://unpkg.com/feather-icons"></script>
    <!-- Feather icon ends -->

    <link rel="stylesheet" href="contact.css" />
</head>

<body>
    <!-- NAVBAR -->
        <?php include_once "../../components/navbar.php"; ?>
    <!-- NAVBAR END -->

    <main>
        <div class="card">
            <h2>About Me</h2>
            <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim
                ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                aliquip ex ea commodo consequat. Duis aute irure dolor in
                reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
                pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
                culpa qui officia deserunt mollit anim id est laborum.
            </p>
            <ul class="social-list">
                <li>
                    <i data-feather="twitter"></i>
                    <span>Dapmon</span>
                </li>
                <li>
                    <i data-feather="instagram"></i>
                    <span>Remonn.</span>
                </li>
                <li>
                    <i data-feather="facebook"></i>
                    <span>Dapmon</span>
                </li>
            </ul>
        </div>
    </main>

    <script>
        feather.replace();
    </script>
</body>

</html>
