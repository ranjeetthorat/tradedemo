<?php include("db.php");
$tid=$_POST['tid'];
$buycharge=trim($_POST['buybcharge']);
$buyqty=$_POST['a'];
$buyprice=trim($_POST['b']);
$buytotal=trim($_POST['c']);
$sellcharge=trim($_POST['sellbcharge']);
$sellqty=$_POST['e'];
$sellprice=trim($_POST['f']);
$buydate=$_POST['d'];
$finaltotal=$_POST['i'];
//$selltotal=trim($_POST['g']);
$status="active";
$today=time();
//echo($today);
$a=$today;
 $selltotal=($sellprice*$sellqty)+$sellcharge;
$buytotal=($buyprice*$buyqty)+$buycharge;
$cha = $sellcharge + $buycharge; 
 $finaltotal=($selltotal-$buytotal) - $cha;
 $update='';
 $txn = 1;
 if($buydate=='0')
 {
    $update="UPDATE trading SET buy_bcharge='$buycharge',buyqty='$buyqty',buyprice='$buyprice',
    buy_total='$buytotal',sell_bcharge='$sellcharge',sell_qty='$sellqty',sell_price='$sellprice'
    ,final_total='$finaltotal',buy_date='$today',complete='$txn' WHERE tid='$tid'";
 }
 else{
    $update="UPDATE trading SET buy_bcharge='$buycharge',buyqty='$buyqty',buyprice='$buyprice',
   sell_bcharge='$sellcharge',sell_qty='$sellqty',sell_price='$sellprice'
    ,sell_total='$selltotal',final_total='$finaltotal',sell_date='$today',complete='$txn' WHERE tid='$tid'";
 }
    $result=mysqli_query($connection,$update)  or die( mysqli_error($connection));
    echo "$result";

   echo "<script>
   alert('User updated succesfully')
    window.location='tradingtable.php?cid=true';
</script>";

?>