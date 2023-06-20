<?php 
require('sistem.php');
if(isset($_GET['rez'])){
    $kontrol = mysqli_query($conn, "SELECT * FROM reservation WHERE rezid = '" . $_GET["rez"] . "'");
    $updateReservationCheck  = mysqli_query($conn, "UPDATE books SET reservationCheck = 0 WHERE bookid = '" . $_POST["bookid"] . "'");
    if (!mysqli_num_rows($kontrol)) {
        header("location:index.php");
        exit();
    }
    else{
        $sil = mysqli_query($conn, "DELETE FROM reservation WHERE rezid = '" . $_GET["rez"] . "'");
        echo "<script>alert('Rezervasyonunuz silinmiştir.');window.location.href='adminpaneli.php';</script>";
    }
}
else{
    header("location:index.php");
    exit();
}

?>