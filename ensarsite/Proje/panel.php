
<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Ensar | Full Stack Developer</title>
    <link rel="icon" href="../İmg/Logo.ico" type="image/x-icon">

    <link href="../startbootstrap-sb-admin-2-gh-pages/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
            href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
            rel="stylesheet">

    <link href="../startbootstrap-sb-admin-2-gh-pages/css/sb-admin-2.min.css" rel="stylesheet">

    <link href="../startbootstrap-sb-admin-2-gh-pages/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">
<div id="wrapper">
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
        <a class="sidebar-brand d-flex align-items-center justify-content-center" >
            <img src="../İmg/Logo.jpg" style="width: 35px;height: 35px">
            <div class="sidebar-brand-text mx-3">Admin Paneli </div>
        </a>
        <li class="nav-item active">
            <a class="nav-link" href="panel.php">
                <i class="fas fa-fw fa-phone"></i>
                <span>İletişim</span></a>
        </li>
        <li class="nav-item active">
            <a class="nav-link" href="projeEkle.php">
                <i class="fas fa-cogs"></i>
                <span>Proje Ekle</span></a>
        </li>
        <li class="nav-item active">
            <a class="nav-link" href="projelistele.php">
                <i class="fas fa-list"></i>
                <span>Projelerimi Gör</span>
            </a>
        </li>

        <li class="nav-item active">
            <a class="nav-link" href="../index.php">
                <i class="fas fa-fw fa-home"></i>
                <span>AnaSayfa</span></a>
        </li>
        <hr class="sidebar-divider d-none d-md-block">
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>
    </ul>
    <div id="content-wrapper" class="d-flex flex-column">
        <div id="content">
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown no-arrow d-sm-none">
                        <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-search fa-fw"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                             aria-labelledby="searchDropdown">
                            <form class="form-inline mr-auto w-100 navbar-search">
                                <div class="input-group">
                                    <input type="text" class="form-control bg-light border-0 small"
                                           placeholder="Search for..." aria-label="Search"
                                           aria-describedby="basic-addon2">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="button">
                                            <i class="fas fa-search fa-sm"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </li>
                </ul>
            </nav>
            <div class="container-fluid">

                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">İletişim Tablosu</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="customers" width="100%" cellspacing="0">
                                <thead>
                                <tr>
                                    <th>Ad Soyad</th>
                                    <th>Telefon</th>
                                    <th>Email</th>
                                    <th>Konu</th>
                                    <th>Mesaj</th>
                                </tr>
                                </thead>

                                <?php
                                if (!isset($_SESSION["user"]) || empty($_SESSION["user"])) {
                                    echo "<script>window.location.href='/Proje/cikis.php'</script>";
                                } else {
                                    $host = 'localhost';
                                    $db = 'etuglu';
                                    $user = 'root';
                                    $password = 'ensar123';

                                    $dsn = new PDO("mysql:host=$host;dbname=$db;charset=UTF8", $user, $password);

                                    $sec = "Select * From iletisim";
                                    $sonuc = $dsn->query($sec);

                                    if($sonuc->rowCount() > 0){
                                        while ($cek = $sonuc->fetch(PDO::FETCH_ASSOC))
                                        {
                                            echo"
    <tr id='table1'>
        <td>".$cek['isim']."</td>
        <td>".$cek['Tel']."</td>
        <td>".$cek['Email']."</td>
        <td>".$cek['Konu']."</td>
        <td>".$cek['Mesaj']."</td>
        <td><button class='btn btn-danger sil-btn' data-id='".$cek['id']."'>Sil</button></td>
    </tr>
";
                                        }
                                    }
                                    else{
                                        echo "veritabanında veri bulunmuyor";
                                    }
                                }
                                ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer class="sticky-footer bg-white">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>Copyright &copy; Your Website 2020</span>
                </div>
            </div>
        </footer>
    </div>
</div>

<script src="../startbootstrap-sb-admin-2-gh-pages/vendor/jquery/jquery.min.js"></script>
<script src="../startbootstrap-sb-admin-2-gh-pages/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="../startbootstrap-sb-admin-2-gh-pages/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="../startbootstrap-sb-admin-2-gh-pages/js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="../startbootstrap-sb-admin-2-gh-pages/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="../startbootstrap-sb-admin-2-gh-pages/vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="../startbootstrap-sb-admin-2-gh-pages/js/demo/datatables-demo.js"></script>
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
</body>

</html>

<script>
    $(document).ready(function() {
        $(".sil-btn").click(function() {
            var id = $(this).data("id");
            var btn = $(this);

            $.ajax({
                url: 'sil.php',
                type: 'post',
                data: { id: id },
                success: function(response) {
                    btn.closest('tr').remove();
                },
            });
        });
    });
</script>