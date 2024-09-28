<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Veritabanı bağlantısı
    $servername = "localhost";
    $dbusername = "root";
    $dbpassword = "123456789";
    $dbname = "logindtb";

    $conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

    if ($conn->connect_error) {
        die("Veritabanına bağlanılamadı: " . $conn->connect_error);
    }

    $sql = "SELECT id, username, password FROM users WHERE username='$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row["password"])) {
            echo "Giriş başarılı. Hoş geldiniz, " . $row["username"];
        } else {
            echo "Hatalı giriş. Lütfen tekrar deneyin.";
        }
    } else {
        echo "Kullanıcı bulunamadı.";
    }

    $conn->close();
}
?>