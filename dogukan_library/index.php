<?php
require('sistem.php');
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
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet" />
</head>

<body id="page-top">
    <nav class="navbar navbar-expand-lg bg-navbar text-uppercase fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand js-scroll-trigger" href="#page-top"><img src="assets/img/bookpansion.png" class="logo"></a>
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
    <header class="masthead text-white text-center">  <!--HEADER REVİZE EDİLECEK-->
        <img src="assets/img/bookpansionbanner.png" class="responsive">
        <div class="banner-yazi">
            <div class="divider-custom divider-light">
            </div>
        </div>
    </header>
    <section class="page-section portfolio" id="kitaplar">   <!--KİTAPLAR BULUNACAK-->
        <div class="container">
            <h2 class="page-section-heading text-center text-uppercase text-dark mb-0">KİTAPLARIMIZ</h2>
            <div class="row">
                <?php 
                $sql = "SELECT * FROM  books";
                $result = $conn->query($sql);
                
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) { 
                        $id = $row["bookid"];
                        if($row["reservationCheck"] == 0 ) { ?>
                <div class="divider-custom">
                                    <div class="divider-custom-line"></div>
                                    <div class="divider-custom-icon"><i class="fas fa-book"></i></div>
                                    <div class="divider-custom-line"></div>
                                </div>
                <div class="container mb-5">
                        <div class="row justify-content-center text-center">
                            <div class="col-lg-8">
                                <h2 class="portfolio-modal-title text-dark text-uppercase mb-4 mt-4" id="portfolioModal1Label"><?php echo $row["bookname"]; ?></h2>
                                <div class="row">
                                    <div class="col">
                                        <img class="img-fluid" src="<?php echo $row["bookimage"]; ?>" alt="">
                                    </div>
                                    <div class="col d-flex justify-content-center mt-4">
                                        <div class="bookInfo">
                                            <h5>Yazar : <?php echo $row["author"]; ?></h5>
                                            <h5>Sayfa Sayısı : <?php echo $row["pageNumber"]; ?></h5>
                                            <h5>Dil : <?php echo $row["language"]; ?></h5>
                                            <h5>ISBN : <?php echo $row["ISBN"]; ?></h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>       
    <?php }  }
            }else {
                echo "0 results";
            }
                ?>  
        </div> <!--div.row-->
        </div> <!--div.container-->
    </section> <!--section.kitaplar-->

 
    


    <footer class="footer text-center">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h4 class="mb-4">Bizi Tercih Ettiğiniz İçin Teşekkürler !</h4>

                </div>

            </div>
        </div>
    </footer>
    <div class="copyright py-4 text-center text-white">
        <div class="container"><small>Copyright © Doğukan KAYA 2023</small>
        <a href="adminpaneligiris.php" id="adminlink">Admin Paneli</a></div>
    </div>
    <div class="scroll-to-top d-lg-none position-fixed">
        <a class="js-scroll-trigger d-block text-center text-white rounded" href="#page-top"><i class="fa fa-chevron-up"></i></a>
    </div>
</div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
    <script src="assets/js/scripts.js"></script>
    <script>      
        // function kitapSec(kitapIndex) {
        //     if ($('.modal.show').length) {
        //         $('.modal.show').modal('hide');
        //     }
        //     $('reservation.php').click();
        //     document.getElementById("odaselect").selectedIndex = kitapIndex;
        // }
    </script>
    <script>
$("body").on("click", ".open_modal", function (button) {
  var id=$(this).data('id'); // data-attr içindeki id yi aldık.
  $.ajax({
   type: 'POST',
   url: 'modal.php', // veriyi&modalı alacağımız yol
   data: {id:id}, // id parametremizi yolladık
   dataType:'JSON', //veriyi json olarak alacağız
   error: function (hata) {
     console.log(hata);
   },
   success: function (data) {
    console.log(data); //testiniz bittikten sonra başına slash ekleyebilirsiniz. 
    try {                  
      $("#my_modal").remove(); // Eski modal varsa sildik
      $("body").append(data.modal); // yeni modalı ekledik
      button.preventDefault();
      $('#my_modal').modal({
        autofocus: false
      }).modal('show');
    } catch (e) {
     console.log(e + "data:" + data);
    }

   }
  });
});
</script>
</body>

</html>