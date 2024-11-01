<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Ensar | Full Stack Developer</title>
    <link rel="icon" href="İmg/Logo.ico" type="image/x-icon">
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
    <link href="CSS/styles.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>

</head>
<body id="page-top">
<!-- Navigation-->
<nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
    <div class="container-fluid" >
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            Menu
            <i class="fas fa-bars ms-1"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav text-uppercase ms-3">
                <li class="nav-item"><a class="nav-link" href="#portfolio">Kişisel Bilgilerim</a></li>
                <li class="nav-item"><a class="nav-link" href="#about">Hakkımda</a></li>
                <li class="nav-item"><a class="nav-link" href="#team">Takımım</a></li>
                <li class="nav-item"><a class="nav-link" href="#contact">İletişim</a></li>
            </ul>
        </div>
    </div>
</nav>
<!-- Masthead-->
<header class="masthead">
    <div class="container">
        <div class="masthead-subheading">Web Siteme Hoşgeldiniz</div>
        <div class="masthead-heading text-uppercase">Ensar Tuğlu</div>
    </div>
</header>


<section class="page-section bg-light" id="portfolio">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase">Portfolio</h2>
        </div>
        <div class="row">
            <?php

            $host = 'localhost';
            $db = 'etuglu';
            $user = 'root';
            $password = 'ensar123';

            try {
                $dsn = new PDO("mysql:host=$host;dbname=$db;charset=UTF8", $user, $password);
                $dsn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                // Veritabanından verileri çekiyoruz
                $sec = "SELECT blogbasligi, blogresmi, blogicresmi, projebaslangic, blogaciklamasi FROM projeekle";
                $sonuc = $dsn->query($sec);
            } catch (PDOException $e) {
                echo "Bağlantı hatası: " . $e->getMessage();
                exit();
            }

            if ($sonuc->rowCount() > 0) {
                while ($cek = $sonuc->fetch(PDO::FETCH_ASSOC)) {
                    echo "
                    <div class='col-lg-4 col-sm-6 mb-4'>
                        <div class='portfolio-item'>
                            <a class='portfolio-link' data-bs-toggle='modal' href='#portfolioModal" . $cek['blogbasligi'] . "'>
                                <div class='portfolio-hover'>
                                    <div class='portfolio-hover-content'><i class='fas fa-plus fa-3x'></i></div>
                                </div>
                                <img class='img-fluid' src='" . $cek['blogresmi'] . "' alt='...' />
                            </a>
                            <div class='portfolio-caption'>
                                <div class='portfolio-caption-heading'>" . $cek['blogbasligi'] . "</div>
                                <div class='portfolio-caption-subheading text-muted'>" . $cek['projebaslangic'] . "</div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal -->
                    <div class='portfolio-modal modal fade' id='portfolioModal" . $cek['blogbasligi'] . "' tabindex='-1' aria-labelledby='portfolioModalLabel" . $cek['blogbasligi'] . "' aria-hidden='true'>
                        <div class='modal-dialog modal-xl'>
                            <div class='modal-content'>
                                <div class='modal-header'>
                                    <h5 class='modal-title' id='portfolioModalLabel" . $cek['blogbasligi'] . "'>" . $cek['blogbasligi'] . "</h5>
                                </div>
                                <div class='modal-body'>
                                    <div class='container'>
                                        <div class='row justify-content-center'>
                                            <div class='col-lg-8'>
                                                <img class='img-fluid d-block mx-auto' src='" . $cek['blogicresmi'] . "' alt='...' />
                                                <p class='blog-content' style='white-space:pre-wrap;'>" . $cek['blogaciklamasi'] . "</p>
                                                <ul class='list-inline'>
                                                    <li>Yayınlama Tarihi: " . $cek['projebaslangic'] . "</li>
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
                echo "";
            }
            ?>
        </div>
    </div>
</section>


<!-- About-->
<section class="page-section" id="about">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase">Hakkımda</h2>
        </div>
        <ul class="timeline">
            <li>
                <div class="timeline-image"><img class="rounded-circle img-fluid" src="assets/img/about/1.jpg" alt="..." /></div>
                <div class="timeline-panel">
                    <div class="timeline-heading">
                        <h4 class="subheading">Başlangıç</h4>
                    </div>
                    <div class="timeline-body"><p class="text-muted">Merhaba Ben Ensar. 2007 yılında doğdum. İstanbul/Sultangazi de İkamet etmekteyim. Klavyenin başında bir mucit olarak, teknolojinin sınırlarını zorluyor ve kodların büyülü dünyasında yeni ufuklara yelken açıyorum. </p></div>
                </div>
            </li>
            <li class="timeline-inverted">
                <div class="timeline-image"><img class="rounded-circle img-fluid" src="assets/img/about/2.jpg" alt="..." /></div>
                <div class="timeline-panel">
                    <div class="timeline-heading">
                        <h4>2023 Ocak</h4>
                        <h4 class="subheading">Kodlamaya Giriş</h4>
                    </div>
                    <div class="timeline-body"><p class="text-muted">2023 yılının başlarında kodlamaya ilk kez başlamaya karar verdim. O zamandan beri Bilgisayar ekranının karşısında geçirdiğim her an, bir problemi çözmek ya da bir fikri kodlarla hayata geçirmek için bir fırsat olarak görüyorum.</p></div>
                </div>
            </li>
            <li>
                <div class="timeline-image"><img class="rounded-circle img-fluid" src="assets/img/about/3.jpg" alt="..." /></div>
                <div class="timeline-panel">
                    <div class="timeline-heading">
                        <h4>2023 ağustos</h4>
                        <h4 class="subheading">İlk Projem</h4>
                    </div>
                    <div class="timeline-body"><p class="text-muted">Kendi kendimi geliştirmek amacıyla, bir blog sitesi oluşturdum."SpaceJourney".Bu projede, HTML, CSS ve JavaScript kullanarak kullanıcı dostu bir arayüz tasarladım. Ardından, kullanıcıların deneyimini artırmak için ASP.NET Core ve Entity Framework gibi araçları kullanarak dinamik içerik yönetimi ve veritabanı işlemleri sağladım.</p></div>
                </div>
            </li>
            <li class="timeline-inverted">
                <div class="timeline-image"><img class="rounded-circle img-fluid" src="assets/img/about/4.jpg" alt="..." /></div>
                <div class="timeline-panel">
                    <div class="timeline-heading">
                        <h4>2024 Şubat</h4>
                        <h4 class="subheading">Ekibim</h4>
                    </div>
                    <div class="timeline-body"><p class="text-muted">Amatör yazılım tutkunları olarak, kendi çapımızda bir araya gelerek yazılım dünyasında keşif yolculuğuna çıktık. İşbirliği ve paylaşımcılık ruhuyla, birlikte öğreniyor, deneyimlerimizi paylaşıyor ve birbirimizi destekliyoruz. Her birimiz farklı yeteneklerle donanmış olabiliriz, ancak ortak hedefimizde birleşiyoruz: yazılımın büyülü dünyasında ilerlemek ve projelerimizle kendimizi geliştirmek.</p></div>
                </div>
            </li>
            <li class="timeline-inverted">
                <div class="timeline-image">
                    <h4>
                        Hikayem
                        <br />
                        Burada
                        <br />
                        Bitiyor
                    </h4>
                </div>
            </li>
        </ul>
    </div>
</section>
<!-- Team-->
<section class="page-section bg-light" id="team">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase">Ekibim</h2>
            <h3 class="section-subheading text-muted"></h3>
        </div>
        <div class="row">
            <div class="col-lg-4">
                <div class="team-member">
                    <img class="mx-auto rounded-circle" src="assets/img/team/ensar.jpg" alt="" />
                    <h4>Ensar Tuğlu</h4>
                    <p class="text-muted">Full Stack Developer</p>
                    <a class="btn btn-dark btn-social mx-2" href="https://www.instagram.com/ensarvts61/" aria-label="Ensar Tuğlu Instagram Profile"><i class="fab fa-instagram"></i></a>
                    <a class="btn btn-dark btn-social mx-2" href="https://github.com/EnsarTuglu" aria-label="Ensar Tuğlu GitHub Profile"><i class="fab fa-github"></i></a>
                    <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Ensar Tuğlu LinkedIn Profile"><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="team-member">
                    <img class="mx-auto rounded-circle" src="assets/img/team/karanfil.jpg" alt="" />
                    <h4 >Emin Karanfil</h4>
                    <a href="http://thekaranfil.online/" class="text-muted">Game Developer</a>
                    <br>
                    <br>
                    <a class="btn btn-dark btn-social mx-2" href="https://www.instagram.com/lkaranfil69/" aria-label="Muhammed Emin Karanfil Instagram Profile"><i class="fab fa-instagram"></i></a>
                    <a class="btn btn-dark btn-social mx-2" href="https://www.youtube.com/channel/UC-jj8LeVnNd-nL2PQ2-JoPw" aria-label="Muhammed Emin Karanfil GitHub Profile"><i class="fab fa-youtube"></i></a>
                    <a class="btn btn-dark btn-social mx-2" href="https://www.linkedin.com/in/muhammed-karanfil/" aria-label="Muhammed Emin Karanfil LinkedIn Profile"><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="team-member">
                    <img class="mx-auto rounded-circle" src="assets/img/team/salih.jpg" alt="" />
                    <h4>Salih Kaya</h4>
                    <p class="text-muted">Web Designer</p>
                    <a class="btn btn-dark btn-social mx-2" href="https://www.instagram.com/salihhs37/" aria-label="Salih Kaya Instagram Profile"><i class="fab fa-instagram"></i></a>
                    <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Salih Kaya GitHub Profile"><i class="fab fa-github"></i></a>
                    <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Salih Kaya LinkedIn Profile"><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
        </div>
    </div>

</section>

<section class="page-section" id="contact">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase">Bana Ulaşın</h2>
            <h3 class="section-subheading text-muted">Fikirleriniz Ve Önerileriniz Benim İçin Çok Önemli</h3>
        </div>
        <form id="contactForm" data-parsley-validate>
            <div class="row align-items-stretch mb-5">
                <div class="col-md-6">
                    <div class="form-group">
                        <input class="form-control" id="name" name="isim" type="text" placeholder="Ad Soyad" required />
                        <div class="invalid-feedback">İsim Seçilmedi</div>
                    </div>
                    <div class="form-group">
                        <input class="form-control" id="email" type="email" name="email" placeholder="Email" required />
                        <div class="invalid-feedback">Email Bulunamadı</div>
                    </div>
                    <div class="form-group mb-md-0">
                        <input class="form-control" id="phone" type="tel" name="tel" placeholder="Telefon Numarası" required />
                        <div class="invalid-feedback">Telefon Numarası Girilmedi</div>
                    </div>
                    <br>
                    <div class="form-group mb-md-0">
                        <input class="form-control" id="subject" type="text" name="konu" placeholder="Konu" required />
                        <div class="invalid-feedback">Konu Seçilmedi</div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group form-group-textarea mb-md-0">
                        <textarea class="form-control" id="message" name="mesaj" placeholder="Mesajınız" required></textarea>
                        <div class="invalid-feedback">Mesaj Girilmedi</div>
                    </div>
                </div>
            </div>
            <div class="d-none" id="submitSuccessMessage">
                <div class="text-center text-white mb-3">
                    <div class="fw-bolder"></div>
                    <br />
                </div>
            </div>
            <div class="d-none" id="submitErrorMessage"><div class="text-center text-danger mb-3">Hata</div></div>
            <div class="text-center"><button class="btn btn-primary btn-xl text-uppercase" id="submitButton" type="submit">Mesaj Gönder</button></div>
        </form>
    </div>
</section>




<footer class="footer py-4">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-4 text-lg-start">Copyright &copy; Ensar | Full Stack Developer 2023</div>
            <div class="col-lg-4 my-3 my-lg-0">
                <a class="btn btn-dark btn-social mx-2" href="https://github.com/EnsarTuglu" aria-label="Twitter"><i class="fab fa-github"></i></a>
                <a class="btn btn-dark btn-social mx-2" href="https://www.instagram.com/ensarvts61/" aria-label="Facebook"><i class="fab fa-instagram"></i></a>
                <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
            </div>
            <div class="col-lg-4 text-lg-end">
                <a class="link-dark text-decoration-none me-3">Privacy Policy</a>
                <a class="link-dark text-decoration-none" >Terms of Use</a>
            </div>
        </div>
    </div>
</footer>

<script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.9.2/parsley.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="js/scripts.js"></script>
<script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
</body>
</html>
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script>
    $(document).ready(function (){
        $("#submitButton").click(function (event){
            event.preventDefault(); 
            var name = $("input[name=isim]").val();
            var tel = $("input[name=tel]").val();
            var email = $("input[name=email]").val();
            var konu = $("input[name=konu]").val();
            var message = $("textarea[name=mesaj]").val();
            $.ajax({
                url: "api.php",
                type: "POST",
                data: {
                    'name': name,
                    'tel': tel,
                    'email': email,
                    'konu': konu,
                    'message': message
                },
                success: function(result) {
                    $("input[name=isim]").val("");
                    $("input[name=tel]").val("");
                    $("input[name=email]").val("");
                    $("input[name=konu]").val("");
                    $("textarea[name=mesaj]").val("");
                    console.log(result);

                    swal({
                        title: "Mesaj Gönderildi!",
                        text: "Mesajınız başarıyla gönderildi.",
                        type: "success",
                        confirmButtonText: "Tamam"
                    });
                },
                error: function(xhr, status, error) {
                    swal({
                        title: "Hata!",
                        text: "Mesaj gönderilirken bir hata oluştu.",
                        type: "error",
                        confirmButtonText: "Tamam"
                    });
                }
            });
        });
    });

</script>

