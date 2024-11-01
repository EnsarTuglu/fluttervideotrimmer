<?php
$host = 'localhost';
$db = 'etuglu';
$user = 'root';
$password = 'ensar123';

try {
    $dsn = new PDO("mysql:host=$host;dbname=$db;charset=UTF8", $user, $password);
    $dsn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST['name'];
        $tel = $_POST['tel'];
        $email = $_POST['email'];
        $konu = $_POST['konu'];
        $message = $_POST['message'];

        if (!empty($name) && !empty($tel) && !empty($email) && !empty($konu) && !empty($message)) {
            $sorgu = $dsn->prepare("INSERT INTO iletisim(isim, tel, email, konu, mesaj) VALUES (?, ?, ?, ?, ?)");
            $ekle = $sorgu->execute(array($name, $tel, $email, $konu, $message));
            if ($ekle) {
                echo 'Veri başarıyla eklendi.';
            } else {
                echo 'Veri eklenirken bir hata oluştu.';
            }
        } else {
            echo 'Tüm alanları doldurmalısınız.';
        }
    }
} catch (PDOException $e) {
    echo "Bağlantı hatası: " . $e->getMessage();
}
?>
