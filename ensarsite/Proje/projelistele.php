
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

    <!-- Custom CSS for portfolio items -->
    <style>
        /* Görsel kapsayıcı */
        .portfolio-item {
            margin-bottom: 30px; /* Fotoğraflar arasındaki boşluğu ayarlar */
        }

        /* Görsellerin boyutları ve düzeni */
        .portfolio-item img {
            width: 100%; /* Kapsayıcı genişliğine göre ayarlar */
            height: 300px; /* Belirli bir yükseklik verir */
            object-fit: cover; /* Görsellerin kapsayıcıyı doldurmasını sağlar */
        }
    </style>
</head>

<body id="page-top">
<div id="wrapper">
    <!-- Sidebar and other content here -->


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
                        <span>Proje Ekle</span>
                    </a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="projelistele.php">
                        <i class="fas fa-list"></i>
                        <span>Projelerimi Gör</span></a>
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

            <div class="container-fluid">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Projelerimi Listele</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <section class="page-section bg-light" id="portfolio">
                                <div class="container">
                                    <div class="text-center">
                                        <h2 class="section-heading text-uppercase">Portfolio</h2>
                                    </div>

                                    <div class="container">
                                        <div class="row">
                                            <?php


                                            if (!isset($_SESSION["user"]) || empty($_SESSION["user"])) {
                                                echo "<script>window.location.href='/Proje/cikis.php'</script>";
                                                exit();
                                            }

                                            $host = 'localhost';
                                            $db = 'etuglu';
                                            $user = 'root';
                                            $password = 'ensar123';

                                            try {
                                                $dsn = new PDO("mysql:host=$host;dbname=$db;charset=UTF8", $user, $password);
                                                $dsn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                                                $sec = "SELECT id, blogbasligi, blogresmi, blogicresmi, projebaslangic, blogaciklamasi FROM projeekle";
                                                $sonuc = $dsn->query($sec);
                                            } catch (PDOException $e) {
                                                echo "Bağlantı hatası: " . $e->getMessage();
                                                exit();
                                            }

                                            if($sonuc->rowCount() > 0) {
                                                while ($cek = $sonuc->fetch(PDO::FETCH_ASSOC)) {
                                                    echo "
                <div class='col-lg-4 col-sm-6 mb-4'>
                    <div class='portfolio-item'>
                        <a class='portfolio-link' data-bs-toggle='modal' href='#portfolioModal" . $cek['blogbasligi'] . "'>
                            <div class='portfolio-hover'>
                                <div class='portfolio-hover-content'><i></i></div>
                            </div>
                            <img class='img-fluid' src='" . $cek['blogresmi'] . "' alt='...' />
                        </a>
                        <div class='portfolio-caption'>
                            <div class='portfolio-caption-heading'>" . $cek['blogbasligi'] . "</div>
                            <div class='portfolio-caption-subheading text-muted'>" . $cek['projebaslangic'] . "</div>
                          <button class='btn btn-danger sil-btn' data-id='" . $cek['id'] . "'>Sil</button>
                        </div>
                    </div>
                </div>
                 
                <!-- Modal -->
                <div class='portfolio-modal modal fade' id='portfolioModal" . $cek['blogbasligi'] . "' tabindex='-1' aria-labelledby='portfolioModalLabel" . $cek['blogbasligi'] . "' aria-hidden='true'>
                    <div class='modal-dialog modal-xl'>
                        <div class='modal-content'>
                            <div class='modal-header'>
                                <h5 class='modal-title' id='portfolioModalLabel" . $cek['blogbasligi'] . "'>" . $cek['blogbasligi'] . "</h5>
                                <button class='close' type='button' data-bs-dismiss='modal' aria-label='Close'>
                                    <span aria-hidden='true'>&times;</span>
                                </button>
                            </div>
                            <div class='modal-body'>
                                <div class='container'>
                                    <div class='row justify-content-center'>
                                        <div class='col-lg-8'>
                                            <img class='img-fluid d-block mx-auto' src='" . $cek['blogresmi'] . "' alt='...' />
                                            <p>" . $cek['blogaciklamasi'] . "</p>
                                            <ul class='list-inline'>
                                                <li>Başlangıç Tarihi: " . $cek['projebaslangic'] . "</li>
                                            </ul>
                                            <button class='btn btn-primary' data-bs-dismiss='modal'>
                                                <i class='fas fa-times fa-fw'></i>
                                                Kapat
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>";
                                                }
                                            } else {
                                                echo "Veritabanında veri bulunmuyor.";
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </section>
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

<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="../startbootstrap-sb-admin-2-gh-pages/vendor/jquery/jquery.min.js"></script>
<script src="../startbootstrap-sb-admin-2-gh-pages/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../startbootstrap-sb-admin-2-gh-pages/vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="../startbootstrap-sb-admin-2-gh-pages/js/sb-admin-2.min.js"></script>
<script src="../startbootstrap-sb-admin-2-gh-pages/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="../startbootstrap-sb-admin-2-gh-pages/vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script src="../startbootstrap-sb-admin-2-gh-pages/js/demo/datatables-demo.js"></script>

<script>
    $(document).ready(function() {
        $(".sil-btn").click(function() {
            var id = $(this).data("id");
            var btn = $(this);

            $.ajax({
                url: 'projesil.php',
                type: 'post',
                data: { id: id },
                success: function(response) {
                    btn.closest('.portfolio-item').remove();
                },
            });
        });
    });
</script>
</body>

</html>