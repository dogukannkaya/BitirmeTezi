<?php 
require('sistem.php');


if (isset($_POST["adminusername"])) {
    $adminkayit = mysqli_query($conn, "INSERT INTO admin (`username`, `password`) VALUES ('" . $_POST['adminusername'] . "','" . $_POST['adminpassword'] . "') ");
    echo "<script>alert('Admin kayıt işlemi tamamlanmıştır. Admin id no : ".mysqli_insert_id($conn)."');window.location.href='adminpaneligiris.php';</script>";
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Admin Kayıt Sayfası</title>
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
            <button class="navbar-toggler navbar-toggler-right text-uppercase font-weight-bold bg-primary text-white rounded" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars"></i>
            </button>
        </div>
    </nav>
    <!-- BURAYA ADMİN PANELİNE GİRİŞ KISMI GELECEK -->
    <section class="page-section" id="adminpanelkayit">
        <div class="container" id="adminpanelgiris">
            <h2 class="page-section-heading text-center text-uppercase text-dark mb-0">ADMİN KAYIT</h2>
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
                                <input class="form-control" name="adminusername" type="text" placeholder="Kullanıcı Adı" required="required" />
                            </div>
                            <div class="form-group controls mb-3 pb-2">
                                <input class="form-control" name="adminpassword" type="password" placeholder="Şifre" required="required" />
                            </div>
                        </div>
                        <div class="form-group girisbuton"><button class="btn btn-danger" type="submit">Kayıt Ol</button></div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <div class="copyright py-4 text-center text-white">
        <div class="container"><small>Copyright © Doğukan KAYA 2023</small></div>
    </div>
</body>

</html>