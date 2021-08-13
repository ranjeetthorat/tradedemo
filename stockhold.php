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
        .hidecol{
          display:none;
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
        <h3>Holding share  of dealer</h3>
        <br> <br>
        <?php   
        $select = "SELECT * from trading where  status = 'active' and complete=0 and (dealersell != '0' or dealerbuy !='0') order by sname";
    
      
        $result1 = mysqli_query($connection,$select);
      
     

      


     ?>
        <div class="nameblock container">
        <table class="table table-borderd table-striped table-sm">
        <thead>
      <tr>  
          <th>sr</th>
        <th>Share Name</th>
        <th>QTY</th>
        <th>Price</th>
        <th class="hidecol">Brokrage</th>
        <th>Total</th>
        <th>status</th>
        <th>date</th>   
      
        
      </tr>
        <?php 
        $sr=1;
      while($row=mysqli_fetch_assoc($result1)){
        
        ?>
        <tbody>
            <tr>
                <td><?php echo $sr++; ?></td>
        <td> <?php echo $row['sname'] ?> </td>
        <td> <?php if(isSell($row['sell_date']))  echo $row['buyqty']; else echo $row['sell_qty']; ?> </td>
        <td> <?php if(isSell($row['sell_date']))  echo $row['dealerbuy']; else echo $row['dealersell']; ?> </td>
        <td class="hidecol"> <?php if(isSell($row['sell_date']))  echo $row['buy_bcharge']; else echo $row['sell_bcharge']; ?> </td>
        <td> <?php if(isSell($row['sell_date']))  echo $row['dealerbuy']*$row['buyqty']; else echo $row['sell_qty']*$row['dealersell']; ?> </td>
        <td> <?php if(isSell($row['sell_date']))  echo 'buy'; else echo 'sell'; ?> </td>
        <td> <?php if(isSell($row['sell_date']))  echo date('Y-m-d',$row['buy_date']); else echo date('Y-m-d',$row['sell_date']); ?> </td>
        </tr>
    
    </tbody>
       <?php } ?> 
      </table>
        </div>
        
        <hr class="bg-dark">
        <br>

    
    </div>
</body>
</html>