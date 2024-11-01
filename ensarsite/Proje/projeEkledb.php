<?php
$host = 'localhost';
$db = 'etuglu';
$user = 'root';
$password = 'ensar123';

try {
    $dsn = new PDO("mysql:host=$host;dbname=$db;charset=UTF8", $user, $password);
    $dsn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $blogbasligi = $_POST['blogbasligi'];
        $projebaslangic = $_POST['projebaslangic'];
        $blogaciklamasi = $_POST['blogaciklamasi'];

        $target_dir = "../uploads/";
        $blogresmi = $_FILES["blogresmi"]["name"];
        $blogicresmi = $_FILES["blogicresmi"]["name"];
        $target_file = $target_dir . basename($blogresmi);
        $target_file2 = $target_dir . basename($blogicresmi);

        if (move_uploaded_file($_FILES["blogresmi"]["tmp_name"], $target_file)) {
            $sorgu = $dsn->prepare("INSERT INTO projeekle (blogbasligi, blogresmi, blogicresmi, projebaslangic, blogaciklamasi) VALUES (?, ?, ?, ? ,?)");
            $ekle = $sorgu->execute([$blogbasligi, $target_file ,$target_file2, $projebaslangic, $blogaciklamasi]);
            if ($ekle) {
                header("Location:projeekle.php");
            }
            else
            {
                echo 'Veri eklenirken bir hata oluştu.';
            }
        } else {
            echo 'Dosya yüklenirken bir hata oluştu.';
        }
    }
} catch (PDOException $e) {
    echo "Bağlantı hatası: " . $e->getMessage();
}
?>
