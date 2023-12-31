<?php
session_start();
require('sistem.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Admin Giriş Sayfası</title>
    <script src="https://use.fontawesome.com/releases/v5.13.0/js/all.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/css/styles.css" rel="stylesheet" />
</head>

<body id="page-top">
    <nav class="navbar navbar-expand-lg bg-navbar text-uppercase fixed-top" id="adminnav">
        <div class="container">
            <a class="navbar-brand js-scroll-trigger" href="index.php"><img src="assets/img/bookpansion.png" class="logo"></a>
        </div>
    </nav>
    <section class="page-section" id="adminpanelgiris">
        <div class="container" >
            <h2 class="page-section-heading text-center text-uppercase text-dark mb-0">ADMİN GİRİŞ</h2>
            <div class="divider-custom">
                <div class="divider-custom-line"></div>
                <div class="divider-custom-icon"><i class="fas fa-book"></i></div>
                <div class="divider-custom-line"></div>
            </div>
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <form method="POST">
                        <div class="control-group">
                            <div class="form-group controls mb-3 pb-2">
                                <input class="form-control" name="username" type="text" placeholder="Kullanıcı Adı" required="required" />
                            </div>
                            <div class="form-group controls mb-3 pb-2">
                                <input class="form-control" name="password" type="password" placeholder="Şifre" required="required" />
                            </div>
                        </div>
                        <div class="form-group"><button class="btn btn-primary" type="submit">Giriş Yap</button>
                        <a class="btn btn-danger text-white" href="adminpanelkayit.php" type="submit">Kayıt Ol</a></div>
                    </form>
                    <!-- ADMİNİN USERNAME VE PASSWORD KONTROLÜ YAPILIP ADMİN PANELİNE YÖNLENDİRİLECEK -->
                    <?php
                    if (isset($_POST['username']) && isset($_POST['password'])) {
                        $adminkontrol = mysqli_query($conn, "SELECT `username`,`password` FROM `admin` WHERE `username` = '".$_POST["username"]."' AND `password` = '".$_POST["password"]."'");
                        if(mysqli_num_rows($adminkontrol))
                        {
                            $isim=$_POST['username'];
                            $_SESSION['admin'] = true;
                            header("location:adminpaneli.php"); // BURADA SESSION KULLANILARAK ADMİN PANELİNE GİRİŞ YAPILACAK.
                            exit();
                        }
                        else {
                            echo 'Girilen kriterlere ait admin bulunamadı!';
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </section>
    <div class="copyright py-4 text-center text-white">
        <div class="container"><small>Copyright © Doğukan KAYA 2023</small></div>
    </div>
</body>

</html>