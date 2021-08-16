
<?php include("db.php"); 
        
        $cid=$_POST['customer'];
         $sid=$_POST['share'];
        $cname=trim($_POST['customer']);
        $sname=trim($_POST['share']);
        $qty=trim($_POST['qty']);
        $bcharge=$_POST['bcharges'];
        $price=trim($_POST['price']);
        $total=trim($_POST['total']);
        $selec=trim($_POST['select']);
        $status="active";
        $today=time();
      //echo($today);
        $a=$today;
        $cust_name='';
        $aa="SELECT * FROM customer WHERE cid='$cid'";
        $result=mysqli_query($connection,$aa);
        while($row=mysqli_fetch_assoc($result)){
          $cust_name=$row['cname'];
        }
        $share_name='';
        $aa="SELECT * FROM share WHERE sid='$sid'";
        $result=mysqli_query($connection,$aa);
        while($row=mysqli_fetch_assoc($result)){
          $share_name=$row['sname'];
        }
        if($selec=="buy")
        {
            $s="INSERT INTO trading (cid,cname,sid,sname,buy_bcharge,buyqty,buyprice,buy_total,buy_date,
            sell_bcharge,sell_qty,sell_price,sell_total,sell_date,final_total,status,dealerbuy)
             VALUES('$cid','$cust_name','$sid','$share_name','$bcharge','$qty','$price','$total','$a',
             '0','0','0','0','0','0','$status','$price')";
    
            $result=mysqli_query($connection,$s) or die( mysqli_error($connection));
            echo $result;
              // echo $s;
        }
        else
        {
            $s="INSERT INTO trading  (cid,cname,sid,sname,buy_bcharge,buyqty,buyprice,buy_total,buy_date,
            sell_bcharge,sell_qty,sell_price,sell_total,sell_date,final_total,status,dealersell)
 VALUES('$cid','$cust_name','$sid','$share_name','0','0','0','0','0','$bcharge','$qty','$price','$total','$a','0','$status','$price')";
    
            $result=mysqli_query($connection,$s) or die( mysqli_error($connection));
            echo "$result";
           //echo $s;
        }                                 
        ?>     
          <script>
         alert(" trading Added Successfully")
         window.location="trading.php";
        </script>   