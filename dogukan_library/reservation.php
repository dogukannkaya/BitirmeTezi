<?php
require('sistem.php');
// REZERVASYON VE CUSTOMER TABLOLARINA MAİLİ EKLEMİYOR GERİYE KALAN BİLGİLERİ EKSİKSİZ DBYE KAYDEDİYOR
if (isset($_POST['phone'])) {
    //kayit1  customer tablosuna fromdan aldığı değerleri ekler
    $kayit1 = mysqli_query($conn, "INSERT INTO customer (`cusname`, `phone`, `mail`) VALUES ('" . $_POST['adsoyad'] . "','" . $_POST['phone'] . "','" . $_POST['email'] . "') ");
    // kayit  reservation tablosuna formdan aldığı değerleri ekler
    $kayit = mysqli_query($conn, "INSERT INTO reservation (`sdate`, `edate`, `bookid`, `phone`,`email`) VALUES ('" . $_POST['giris'] . "','" . $_POST['cikis'] . "','" . $_POST['bookid'] . "','" . $_POST['phone'] . "','" . $_POST['email'] . "') ");
    echo "<script>alert('Kitabınız reserve edilmiştir. Rezervasyon numaranız : ".mysqli_insert_id($conn)." Lütfen rezervasyon numaranızı not alınız.');window.location.href='index.php';</script>";
    $updateReservationCheck  = mysqli_query($conn, "UPDATE books SET reservationCheck = 1 WHERE bookid = '" . $_POST["bookid"] . "'");
    
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Kitap Rezervasyon Sistemi</title>
    <script src="https://use.fontawesome.com/releases/v5.13.0/js/all.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
    <link href="assets/css/bootstrap1.min.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet" />
</head>

<body id="page-top">
<nav class="navbar navbar-expand-lg bg-navbar text-uppercase fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand js-scroll-trigger" href="index.php"><img src="assets/img/bookpansion.png" class="logo"></a>
            <button class="navbar-toggler navbar-toggler-right text-uppercase font-weight-bold bg-primary text-white rounded" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="about.php">HAKKIMIZDA</a></li>
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" id="rezervasyon" href="reservation.php">REZERVASYON</a></li>
                    
                    <a href="rezervasyonyonet.php"><button class="btn btn-danger rezbuton" type="submit">Rezervasyon Yönet</button></a>
                </ul>
            </div>
        </div>
    </nav>

    <section class="page-section" id="rezervasyon">
        <div class="container">
            <h2 class="page-section-heading text-center text-uppercase text-dark mb-0">REZERVASYON</h2>
            <div class="divider-custom">
                <div class="divider-custom-line"></div>
                <div class="divider-custom-icon"><i class="fas fa-book"></i></div>
                <div class="divider-custom-line"></div>
            </div>
            <div class="row reservation-row">
                <div class="col-lg-8 mx-auto">
                    <form method="POST" enctype="">
                        <div class="control-group">
                            <div class="form-group controls mb-3 pb-2">
                                <input class="form-control" name="adsoyad" type="text" placeholder="Ad Soyad" required="required" />
                            </div>
                        </div>
                        <div class="control-group">
                            <div class="form-group controls mb-3 pb-2">
                                <input class="form-control" name="email" type="email" placeholder="E-mail Adresi" required="required" />
                            </div>
                        </div>
                        <div class="control-group">
                            <div class="form-group controls mb-3 pb-2">
                                <input class="form-control" name="phone" type="phone" placeholder="Telefon Numarası" required="required" />
                            </div>
                        </div>
                        <div class="control-group">
                            <div class="form-group controls mb-3 pb-2">
                                <input class="form-control" name="giris" type="text" placeholder="Alış Tarihi Örn. 21/06/2023" onkeyup="
        var v = this.value;
        if (v.match(/^\d{2}$/) !== null) {
            this.value = v + '/';
        } else if (v.match(/^\d{2}\/\d{2}$/) !== null) {
            this.value = v + '/';
        }" required="required" maxlength="10" />
                            </div>
                        </div>
                        <div class="control-group">
                            <div class="form-group controls mb-3 pb-2">
                                <input class="form-control" name="cikis" type="text" placeholder="Teslim Tarihi Örn. 22/07/2023" onkeyup="
        var v = this.value;
        if (v.match(/^\d{2}$/) !== null) {
            this.value = v + '/';
        } else if (v.match(/^\d{2}\/\d{2}$/) !== null) {
            this.value = v + '/';
        }" required="required" maxlength="10" />
                            </div>
                        </div>

                        <div class="control-group">
                            <div class="form-group controls mb-3 pb-2">
                                <!--BOOK ID OLACAK--><select class="form-control" id="bookReservation" name="bookid">
                        <?php
                        //Kitap isimler getirecek
                        $sql = "SELECT * FROM books";
                        $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                             // her bir satırı döker
                            while($row = $result->fetch_assoc()) {
                                
                                if($row["reservationCheck"] == 0 ) {     ?>                          
                                <option name="bookid" value="<?php echo $row["bookid"] ?>" > <?php echo $row["bookname"]; ?> </option>
                        <?php }}}else {echo "0 results";} ?>
                        </select>
                        </div>
                        </div>
                        <div class="form-group"><button class="btn btn-primary" type="submit">Rezervasyon Yap</button></div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
    <script src="assets/js/scripts.js"></script>
</body>
</html>