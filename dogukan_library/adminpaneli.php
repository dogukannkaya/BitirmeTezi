<?php
require('sistem.php');


if(isset($_POST['bookname'])){
$_POST['reservationCheck'] = false;
$_POST['bookimage'] = "assets/img/kitaplar/".$_POST['bookimage'];
$addbooksql = mysqli_query($conn,"INSERT INTO books (`bookname`, `author`, `ISBN`, `pageNumber`, `language`, `reservationCheck`, `bookimage`) VALUES ('" . $_POST['bookname'] . "','" . $_POST['author'] . "','" . $_POST['ISBN'] . "','" . $_POST['pageNumber'] . "','" . $_POST['language'] . "','" . $_POST['reservationCheck'] . "','" . $_POST['bookimage'] . "')");
echo "<script>alert('Kitap Eklenmiştir.');</script>";
}else{
    echo "kitap eklenemedi.";
}
?>
<!--EKLEME VE DEĞİŞTİRME METODLARI TAMAMLANACAK-->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Admin Paneli</title>
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
            <h2 class="page-section-heading text-center text-uppercase text-dark mb-0">TÜM REZERVASYONLAR</h2>
            <div class="divider-custom">
                <div class="divider-custom-line"></div>
                <div class="divider-custom-icon"><i class="fas fa-book"></i></div>
                <div class="divider-custom-line"></div>
            </div>
            <div class="row">
                <table class="table table-bordered  table-dark">
                <tr>
			 <td>Rez. ID</td> 
             <td>Tel. No.</td>
			 <td>Giriş Tarih</td>
             <td>Çıkış Tarih</td>
			 <td>Kitap No</td>
			 <td>Kitap Adı</td>
			 <td>Müşteri Adı</td>
			 </tr>
<?php 
$sql = "SELECT * FROM  reservation JOIN customer ON reservation.phone=customer.phone AND reservation.email=customer.mail JOIN books ON reservation.bookid=books.bookid";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    // her bir satırı döker

    while($row = $result->fetch_assoc()) { ?>
        <tr>
        <td><?php echo $row["rezid"]; ?></td>
        <td><?php echo $row["phone"]; ?></td>
        <td><?php echo $row["sdate"]; ?></td>
        <td><?php echo $row["edate"]; ?></td>
        <td><?php echo $row["bookid"]; ?></td> 
        <td><?php echo $row["bookname"]; ?></td> 
        <td><?php echo $row["cusname"]; ?></td>
        <td><a href="rezervasyondegistir.php?rez=<?php echo $row['rezid'] ?>" class="btn btn-primary text-white">Değiştir</a></td> <!-- EKSİK -->
        <td><a class="btn btn-danger text-white" href="adminrezsil.php?rez=<?php echo $row['rezid'] ?>" type="submit" >Sil</a></td>
         </tr>
        

         <?php }  

} else {

    echo "0 results";

}

?>
                </table>
            </div>
        </div>
    </section>
    <section class="addbook">

    <div class="container">
            <h2 class="page-section-heading text-center text-uppercase text-dark mb-0">KİTAP EKLE</h2>
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
                                <input class="form-control" name="bookname" type="text" placeholder="Kitap ismi" required="required" />
                            </div>
                        </div>
                        <div class="control-group">
                            <div class="form-group controls mb-3 pb-2">
                                <input class="form-control" name="author" type="text" placeholder="Yazar ismi" required="required" />
                            </div>
                        </div>
                        <div class="control-group">
                            <div class="form-group controls mb-3 pb-2">
                                <input class="form-control" name="ISBN" type="text" placeholder="ISBN" required="required" />
                            </div>
                        </div>
                        <div class="control-group">
                            <div class="form-group controls mb-3 pb-2">
                                <input class="form-control" name="pageNumber" type="text" placeholder="Sayfa sayısı" required="required"/>
                            </div>
                        </div>
                        <div class="control-group">
                            <div class="form-group controls mb-3 pb-2">
                                <input class="form-control" name="language" type="text" placeholder="Kitabın dili" required="required"/>
                            </div>
                        </div>
                        <div class="control-group">
                            <div class="form-group controls mb-3 pb-2">
                                <input type="file" id="myFile" name="bookimage">
                            </div>
                        </div> 
                        <div class="mt-4 form-group"><button class="btn btn-primary" type="submit">Kitap Ekle</button></div>
                    </form>
                </div>
            </div>
        </div>

    </section>



    <div class="copyright py-4 text-center text-white">
        <div class="container"><small>Copyright © Doğukan KAYA 2023</small></div>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
    <script src="assets/js/scripts.js"></script>
</body>

</html>