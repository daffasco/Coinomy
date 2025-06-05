<?php
session_start();
session_destroy();
header("Location: ./LoginRegis/index.php");
exit();
?>
