<?php
include("db.php");
$today=time();
$tid= $_POST['tid'];
$tempprice = $_POST['price'];
if($_POST['status'] == 'sell'){

    $current = trim($_POST['current']);
    $diff = $_POST['price'] - $current;
    $finaltotal = $diff * $_POST['qty'];
    $newprice = $current * $_POST['qty'];
    $sell_total =$newprice + $_POST['bcharge'];
    $update ="UPDATE trading SET
     sell_price='$current',
     sell_total='$sell_total',
     final_total='$finaltotal',
     tempsell='$tempprice'
     where tid='$tid';
     ";

    $result = mysqli_query($connection,$update);
     

} else {
    $current = trim($_POST['current']);
    $diff =  $current - $_POST['price'] ;
    $finaltotal = $diff * $_POST['qty'];
    $newprice = $current * $_POST['qty'];
    $buy_total =$newprice + $_POST['bcharge'];
    $update ="UPDATE trading SET
     buyprice='$current',
     buy_total='$buy_total',
     final_total='$finaltotal',
     tempbuy='$tempprice'
     where tid='$tid';
     ";
     $result = mysqli_query($connection,$update);

}


?>

<script>
alert(" successfully updated");
window.location="reports.php";

</script>

