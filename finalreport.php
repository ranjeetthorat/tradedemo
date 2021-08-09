<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="asset/bootstrap.min.css">
    <script src="asset/jquery.js"></script>
    <script src="asset/bootstrap.bundle.min.js"></script>
    <title>Final report</title>
    <style>
        body{
          background-color:  #f0eff0
        }
    </style>
</head>
<body>
<?php include("db.php");
 include("navbar.php") ;
function isSell($value){
    if($value == '0' || $value == 0 )
    return true;
    return false;
  }


?>
    <div class="container-fluid text-center">
        <h3>Reports</h3>
        <br> <br>
        <?php   
        $select = "SELECT distinct(cid),cname from trading where complete=0";
      
      
        $result1 = mysqli_query($connection,$select);
       $value =  mysqli_fetch_all($result1);
     

       for($i=0;$i<count($value);$i++){


     ?>
        <div class="nameblock container">
            <h5 class="bg-secondary"> <?php echo $value[$i][1] ?> </h1>
        <table class="table table-borderd table-striped table-sm">
        <thead>
      <tr>  
          <th>sr</th>
        <th>Share Name</th>
        <th>QTY</th>
        <th>Price</th>
        <th>Brokrage</th>
        <th>Total</th>
        <th>status</th>
        <th>date</th>   
      
        
      </tr>
        <?php 
        $cid = $value[$i][0];
        $sql="select * from trading where cid='$cid' and status='active' and (buy_date = 0 or sell_date = 0)";
        $result=mysqli_query($connection,$sql) ;  
        $sr=1;
      while($row=mysqli_fetch_assoc($result)){
        
        ?>
        <tbody>
            <tr>
                <td><?php echo $sr++; ?></td>
        <td> <?php echo $row['sname'] ?> </td>
        <td> <?php if(isSell($row['sell_date']))  echo $row['buyqty']; else echo $row['sell_qty']; ?> </td>
        <td> <?php if(isSell($row['sell_date']))  echo $row['buyprice']; else echo $row['sell_price']; ?> </td>
        <td> <?php if(isSell($row['sell_date']))  echo $row['buy_bcharge']; else echo $row['sell_bcharge']; ?> </td>
        <td> <?php if(isSell($row['sell_date']))  echo $row['buy_total']; else echo $row['sell_total']; ?> </td>
        <td> <?php if(isSell($row['sell_date']))  echo 'buy'; else echo 'sell'; ?> </td>
        <td> <?php if(isSell($row['sell_date']))  echo date('Y-m-d',$row['buy_date']); else echo date('Y-m-d',$row['sell_date']); ?> </td>
        </tr>
    
    </tbody>
       <?php } ?> 
      </table>
        </div>
        
        <hr class="bg-dark">
        <br>

        <?php } ?>
    </div>
</body>
</html>