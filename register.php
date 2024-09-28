<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $email = $_POST["email"];
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

    // Şifre güvenliği için hash oluştur
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Veritabanına kayıt ekleme işlemi
    $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$hashed_password')";

    if ($conn->query($sql) === TRUE) {
        echo "Kayıt başarıyla tamamlandı.";
    } else {
        echo "Hata: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
