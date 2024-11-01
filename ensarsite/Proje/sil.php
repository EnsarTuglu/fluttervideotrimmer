<?php
session_start();

if (!isset($_SESSION["user"]) || empty($_SESSION["user"])) {
    header("Location: /Proje/cikis.php");
    exit;
}

if(isset($_POST['id'])) {
    $host = 'localhost';
    $db = 'etuglu';
    $user = 'root';
    $password = 'ensar123';

    $dsn = new PDO("mysql:host=$host;dbname=$db;charset=UTF8", $user, $password);

    $id = $_POST['id'];

    $sil = "DELETE FROM iletisim WHERE id = :id";
    $stmt = $dsn->prepare($sil);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();

    echo "success";
} else {
    echo "error";
}
?>
