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
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="../startbootstrap-sb-admin-2-gh-pages/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="../startbootstrap-sb-admin-2-gh-pages/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
   <link href="../CSS/styles.css">
    <style>

        .nice-form-group {
            margin-bottom: 20px;
        }

        .nice-form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }


        input[type="file"] {
            display: block;
            width: 100%;
            padding: 10px;
            border: 1px solid #ced4da;
            border-radius: .25rem;
            background: #f8f9fa;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        input[type="file"]::-webkit-file-upload-button {
            padding: 10px;
            border: 1px solid #007bff;
            border-radius: .25rem;
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
            font-size: 16px;
        }

        input[type="file"]:hover {
            background-color: #e2e6ea;
        }


        input[type="file"]::before {

            display: inline-block;
            background: #007bff;
            color: white;
            padding: 10px;
            border-radius: .25rem;
            font-weight: bold;
            cursor: pointer;
            text-align: center;
            line-height: 1.5;
        }

        input[type="file"]:focus::before {
            background: #0056b3;
        }


        input[type="file"].custom-file-input {
            padding: 0;
            height: auto;
            overflow: hidden;
            border: 1px solid #ced4da;
            border-radius: .25rem;
        }

        input[type="file"].custom-file-input::before {
            content: 'Select file';
            display: block;
            background-color: #007bff;
            color: white;
            padding: 10px;
            border-radius: .25rem;
            cursor: pointer;
            text-align: center;
        }

        input[type="file"].custom-file-input:hover::before {
            background-color: #0056b3;
        }


        .custom-file-input + .custom-file-input {
            margin-top: 15px;
        }

        @media (max-width: 380px) {

            .sidebar.active {
                left: 0;
            }
            .sidebar-toggle {
                display: block;
                position: fixed;
                top: 15px;
                left: 15px;
                cursor: pointer;
                z-index: 1000;
            }
        }



    </style>

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
    <div id="content-wrapper" class="d-flex flex-column">
        <div id="content">
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown no-arrow d-sm-none">
                        <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-search fa-fw"></i>
                        </a>
                    </li>
                </ul>
            </nav>
            <div class="container-fluid">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Proje Ekle</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <form id="projeEkleForm" action="projeEkledb.php" method="post" enctype="multipart/form-data">
                                <section>
                                    <div class="href-target" id="input-types"></div>
                                    <div class="nice-form-group">
                                        <label>Blog Başlığı (Bitişik)</label>
                                        <input type="text" name="blogbasligi" class="form-control" placeholder="Blog Başlığı (farklı karakterler kullanmayınız örn: ? / * .)" value="" data-sb-validations="required"/>
                                    </div>
                                    <div class="nice-form-group">
                                        <label>Blog Resmi</label>
                                        <input type="file" name="blogresmi" style="height: 75px;width: 500px;" class="form-control" data-sb-validations="required"/>
                                    </div>
                                    <div class="nice-form-group">
                                        <label>Blog İç Resmi</label>
                                        <input type="file" name="blogicresmi" style="height: 75px;width: 500px;" class="form-control" data-sb-validations="required"/>
                                    </div>
                                    <div class="nice-form-group">
                                        <label>Proje Başlangıç Tarihi</label>
                                        <input type="text" name="projebaslangic" class="form-control" placeholder="Proje Başlangıcı" data-sb-validations="required"/>
                                    </div>
                                    <div class="nice-form-group">
                                        <label>Blog Açıklaması</label>
                                        <textarea name="blogaciklamasi" class="form-control" placeholder="Açıklama" data-sb-validations="required"></textarea>
                                    </div>
                                    <br>
                                    <button type="submit" class="btn btn-dark" id="gonder">Gönder</button>
                                </section>
                            </form>


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
<script src="../startbootstrap-sb-admin-2-gh-pages/vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="../startbootstrap-sb-admin-2-gh-pages/js/sb-admin-2.min.js"></script>
<script src="../startbootstrap-sb-admin-2-gh-pages/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="../startbootstrap-sb-admin-2-gh-pages/vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script src="../startbootstrap-sb-admin-2-gh-pages/js/demo/datatables-demo.js"></script>
<script>
    $(document).ready(function () {
        $("#gonder").click(function () {
            var blogbasligi = $("input[name=blogbasligi]").val();
            var blogresmi = $("input[name=blogresmi]").val();
            var blogicresmi = $("input[name=blogicresmi]").val();
            var projebaslangic = $("input[name=projebaslangic]").val();
            var blogaciklamasi = $("textarea[name=blogaciklamasi]").val();
            $.ajax({
                url: "projeEkledb.php",
                type: "POST",
                data: {
                    'blogbasligi': blogbasligi,
                    'blogresmi': blogresmi,
                    'blogicresmi': blogicresmi,
                    'projebaslangic': projebaslangic,
                    'blogaciklamasi': blogaciklamasi
                },
                success: function (result) {
                    $("input[name=blogbasligi]").val("");
                    $("input[name=blogresmi]").val("");
                    $("input[name=blogicresmi]").val("");
                    $("input[name=projebaslangic]").val("");
                    $("textarea[name=blogaciklamasi]").val("");
                    console.log(result);
                },
                error: function (xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        });
    });
</script>
</body>
</html>
<script>
    $(document).ready(function() {
        $("#sidebarToggle").click(function(event) {
            event.preventDefault();
            $("#accordionSidebar").toggleClass("active");
        });
    });

</script>