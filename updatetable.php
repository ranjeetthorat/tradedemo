<?php include("db.php");
$tid=$_POST['tid'];
$sname = $_POST['sharename'];
$sharid = $_POST['shareid'];
$custname = $_POST['customername'];
$custid = $_POST['customerid'];
$buycharge=trim($_POST['buybcharge']);
$buyqty=$_POST['a'];
$buyprice=trim($_POST['b']);
$buytotal=trim($_POST['c']);
$sellcharge=trim($_POST['sellbcharge']);
$sellqty=$_POST['e'];
$sellprice=trim($_POST['f']);
$buydate=$_POST['d'];
$bdate=$_POST['bdate'];
$sdate=$_POST['sdate'];
$finaltotal=$_POST['i'];
//$selltotal=trim($_POST['g']);
$status="active";
$today=time();
//echo($today);
$a=$today;
 $selltotal=($sellprice*$sellqty);
$buytotal=($buyprice*$buyqty);
$cha = $sellcharge + $buycharge; 
 $finaltotal=($selltotal-$buytotal) - $cha;
 $update='';
 $txn = 1;
 if($buydate=='0')
 {
               
   if($buyqty > $sellqty){
      echo "<script>
      alert('ERROR !!! .Please check buy quantity')
       window.location='tradingtable.php?cid=true';
   </script>";

   die("error");
            
   } elseif($buyqty < $sellqty){
            
      $qtydiff =  $sellqty- $buyqty ;
      $instotal = $qtydiff * $sellprice;
      
      $ser=$buyqty*$sellprice;
      $yemp=$buyqty*$buyprice;
      $temp=$ser- $yemp - $cha;
         echo $cha;
         echo "</br>";
         echo $temp;
       // exit();
      $insert = " INSERT INTO 
      trading(cid, cname, sid, sname, buy_bcharge, buyqty, buyprice, buy_total,
       buy_date, sell_bcharge, sell_qty, sell_price, sell_total, sell_date, final_total,
        complete,status)
      values
      ('$custid','$custname','$sharid','$sname','$buycharge','$buyqty','$buyprice','$yemp',
        '$today','$sellcharge','$buyqty','$sellprice','$buyqty*$sellprice','$sdate','$temp',
        '$txn','active' ) "; 
         $ins = mysqli_query($connection,$insert);
      //echo $insert;
      echo "</br>";
    
         $upd = "UPDATE trading SET sell_qty='$qtydiff',sell_total='$instotal,sell_bcharge=0'
             WHERE tid='$tid'";
 // echo "$upd";
             $re = mysqli_query($connection,$upd);
   } else {
      $update="UPDATE trading SET buy_bcharge='$buycharge',buyqty='$buyqty',buyprice='$buyprice',
      buy_total='$buytotal',sell_bcharge='$sellcharge',sell_qty='$sellqty',sell_price='$sellprice'
      ,final_total='$finaltotal',buy_date='$today',complete='$txn' WHERE tid='$tid'";
       $result=mysqli_query($connection,$update)  or die( mysqli_error($connection));

   }



   
 }
 else{

   if($buyqty < $sellqty){
      echo "<script>
      alert('ERROR !!! .Please check sell quantity')
       window.location='tradingtable.php?cid=true';
   </script>";

   die("error");
   } elseif($buyqty > $sellqty){
            
      $qtydiff = $buyqty - $sellqty;
      $instotal = $qtydiff * $buyprice;
   
      $yemp=$sellqty*$buyprice;
      $temp=$selltotal- $yemp - $cha;
         echo $cha;
         echo "</br>";
         echo $temp;
         //die();
      $insert = " INSERT INTO 
      trading(cid, cname, sid, sname, buy_bcharge, buyqty, buyprice, buy_total,
       buy_date, sell_bcharge, sell_qty, sell_price, sell_total, sell_date, final_total,
        complete,status)
      values
      ('$custid','$custname','$sharid','$sname','$buycharge','$sellqty','$buyprice','$yemp',
        '$bdate','$sellcharge','$sellqty','$sellprice','$sellqty*$sellprice','$today','$temp',
        '$txn','active' ) "; 
         $ins = mysqli_query($connection,$insert);
      //echo $insert;
      echo "</br>";
    
         $upd = "UPDATE trading SET buyqty='$qtydiff',buy_total='$instotal,buy_bcharge=0'
             WHERE tid='$tid'";
 // echo "$upd";
             $re = mysqli_query($connection,$upd);
   } 
   
   else {
    $update="UPDATE trading SET buy_bcharge='$buycharge',buyqty='$buyqty',buyprice='$buyprice',
   sell_bcharge='$sellcharge',sell_qty='$sellqty',sell_price='$sellprice'
    ,sell_total='$selltotal',final_total='$finaltotal',sell_date='$today',complete='$txn' WHERE tid='$tid'";
 
    $result=mysqli_query($connection,$update)  or die( mysqli_error($connection));
   }  
  }  

   echo "<script>
   alert('trade updated succesfully')
    window.location='tradingtable.php?cid=truee';
</script>";

?>