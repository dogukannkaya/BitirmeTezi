<?php 
require('sistem.php');
if(isset($_GET['rez'])){
    $kontrol = mysqli_query($conn, "SELECT * FROM reservation WHERE phone = '" . $_GET["rez"] . "'");
    if (!mysqli_num_rows($kontrol)) {
        header("location:index.php");
        exit();
    }
    else{
        $sil = mysqli_query($conn, "DELETE FROM reservation WHERE phone = '" . $_GET["rez"] . "'");
        echo "<script>alert('Rezervasyonunuz silinmiştir.');window.location.href='index.php';</script>";
    }
}
else{
    header("location:index.php");
    exit();
}

?>