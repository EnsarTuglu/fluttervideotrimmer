<?php
session_start();

if (isset($_POST["username"], $_POST["password"])) {
    if ($_POST["username"] == "ensarvts" && $_POST["password"] == "5nbrsxlezu1") {
        $_SESSION["user"] = $_POST["username"];
        header("location:panel.php");
        exit();
    } else {
        echo "<script>document.addEventListener('DOMContentLoaded', function() { showErrorScreen(); });</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Add icon library -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Ensar | Full Stack Developer</title>
    <link rel="icon" href="../İmg/Logo.ico" type="image/x-icon">
    <style>
        body {font-family: Arial, Helvetica, sans-serif;}
        * {box-sizing: border-box;}

        .input-container {
            display: -ms-flexbox; /* IE10 */
            display: flex;
            width: 100%;
            margin-bottom: 15px;
        }

        .icon {
            padding: 10px;
            background: dodgerblue;
            color: white;
            min-width: 50px;
            text-align: center;
        }

        .input-field {
            width: 100%;
            padding: 10px;
            outline: none;
        }

        .input-field:focus {
            border: 2px solid dodgerblue;
        }

        /* Set a style for the submit button */
        .btn {
            background-color: dodgerblue;
            color: white;
            padding: 15px 20px;
            border: none;
            cursor: pointer;
            width: 100%;
            opacity: 0.9;
        }

        .btn:hover {
            opacity: 1;
        }

        .loader-container {
            display: none; /* Yükleniyor ekranını gizle */
            position: fixed; /* Ekranın üstünde sabitle */
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(255, 255, 255, 0.8); /* Yarı saydam beyaz arka plan */
            justify-content: center;
            align-items: center;
            z-index: 9999; /* En üstte göster */
        }

        .loader {
            display: flex;
            justify-content: space-between;
            width: 80px;
        }

        .loader div {
            width: 16px;
            height: 16px;
            background-color: #FF5C35;
            border-radius: 50%;
            animation: grow-shrink 1.5s infinite;
        }

        .loader div:nth-child(1) {
            animation-delay: 0s;
        }

        .loader div:nth-child(2) {
            animation-delay: 0.3s;
        }

        .loader div:nth-child(3) {
            animation-delay: 0.6s;
        }

        @keyframes grow-shrink {
            0%, 100% {
                transform: scale(1);
            }
            50% {
                transform: scale(1.5);
            }
        }

        #login-form {
            display: inline-block;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }


        .error-container {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(255, 255, 255, 0.8);
            justify-content: center;
            align-items: center;
            z-index: 9998;
        }

        .circle-border {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            background: #f86;
            position: absolute;
            transform: scale(1.1);
            animation: circle-anim 400ms ease;
        }

        .circle {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            background: white;
            position: relative;
            z-index: 1;
            animation: success-anim 700ms ease;
        }

        .error::before,
        .error::after {
            content: "";
            display: block;
            height: 4px;
            background: #f86;
            position: absolute;
        }

        .error::before {
            width: 80px;
            top: 48%;
            left: 16%;
            transform: rotateZ(50deg);
        }

        .error::after {
            width: 80px;
            top: 48%;
            left: 16%;
            transform: rotateZ(-50deg);
        }

        @keyframes success-anim {
            0% {
                transform: scale(0);
            }
            30% {
                transform: scale(0);
            }
            100% {
                transform: scale(1);
            }
        }

        @keyframes circle-anim {
            from {
                transform: scale(0);
            }
            to {
                transform: scale(1.1);
            }
        }
    </style>
    <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>
<div id="loading" class="loader-container">
    <div class="loader">
        <div></div>
        <div></div>
        <div></div>
    </div>
</div>

<div id="error" class="error-container">
    <div class="circle-border"></div>
    <div class="circle">
        <div class="error"></div>
    </div>
</div>

<section class="bg-light p-3 p-md-4 p-xl-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-xxl-11">
                <div class="card border-light-subtle shadow-sm">
                    <div class="row g-0">
                        <div class="col-12 col-md-6">
                            <img class="img-fluid rounded-start w-100 h-100 object-fit-cover" loading="lazy" src="../İmg/galatakulesi1.jpeg" style="max-height: 900px;">
                        </div>
                        <div class="col-12 col-md-6 d-flex align-items-center justify-content-center">
                            <div class="col-12 col-lg-11 col-xl-10">
                                <div class="card-body p-3 p-md-4 p-xl-5">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="mb-5">
                                                <div class="text-center mb-4">
                                                    <a href="#!"></a>
                                                </div>
                                                <h4 class="text-center">Admin Paneli</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <form id="login-form" action="" method="POST" onsubmit="showLoadingScreen(event)">
                                        <div class="row gy-3 overflow-hidden">
                                            <div class="col-12">
                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" name="username" placeholder="Ad Soyad" required>
                                                    <label for="username" class="form-label">Ad Soyad</label>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-floating mb-3">
                                                    <input type="password" class="form-control" name="password" placeholder="Şifre" required>
                                                    <label for="password" class="form-label">Şifre</label>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="d-grid">
                                                    <button class="btn btn-dark btn-lg" type="submit">Giriş Yap</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    function showLoadingScreen(event) {
        event.preventDefault(); // Formun normal şekilde gönderilmesini engelle
        document.getElementById('loading').style.display = 'flex'; // Yükleniyor ekranını göster
        document.getElementById('login-form').style.display = 'none'; // Giriş formunu gizle

        // 2 saniye bekledikten sonra formu gönder
        setTimeout(function() {
            document.getElementById('login-form').submit();
        }, 2000);
    }

    function showErrorScreen() {
        console.log("Error screen should be shown");
        document.getElementById('error').style.display = 'flex'; // Hata ekranını göster
        setTimeout(function() {
            document.getElementById('error').style.display = 'none'; // Hata ekranını gizle
        }, 2000); // 2000 milisaniye = 2 saniye
    }
</script>
</body>
</html>
</html>
</html>
