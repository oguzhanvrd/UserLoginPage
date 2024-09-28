<?php
session_start();

if (isset($_SESSION["username"])) {
    $username = $_SESSION["username"];
    echo "Hoş geldiniz, $username!";
    echo "<a href='logout.php'>Çıkış Yap</a>";
} else {
    echo "Oturumunuz bulunmuyor.";
}
?>