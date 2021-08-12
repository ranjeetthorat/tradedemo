<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="asset/bootstrap.min.css">
  <script src="asset/jquery.js"></script>
  <script src="asset/bootstrap.bundle.min.js"></script>
  <style>
 body{
          background-color:  #f0eff0
        }

 
 
    
  </style>
</head>
<body>
<?php include('db.php') ?>
   <?php include("navbar.php");
   function isSell($value){
    if($value == '0' || $value == 0 )
    return true;
    return false;
  } ?>
   <h2 style="text-align: center;"><strong>Trading Report</strong></h2>  <br>
                   
<div class="container mr-5 pl-5">


<form class="form-inline" action="" method="post">
  <div class="form-group mb-2">
    From Date &nbsp; &nbsp;
    <input type="date"  class="form-control" id="staticEmail2">
  </div>
  <div class="form-group mx-sm-3 mb-2">
    To Date &nbsp; &nbsp;
    <input type="date" class="form-control" id="inputPassword2">
  </div>
  <button type="submit" class="btn btn-primary mb-2">Submit</button>
</form>

</div>



   <div class="container-fluid text-center">
   
   
       
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
        <th>Script Name</th>
        <th>Brokrage</th>
        <th>QTY</th>
        <th>Buy Price</th>
        <th>Sell Price</th>
        <th>Total</th>
        <th>D.buy price</th>
        <th>D sell price</th>
        <th>Total</th>
        <th>date</th>   
      
        
      </tr>
        <?php 
        $cid = $value[$i][0];
        $sql="select * from trading where cid='$cid' and status='active'";
        $result=mysqli_query($connection,$sql) ;  
        $sr=1;
      while($row=mysqli_fetch_assoc($result)){
        
        ?>
        <tbody>
            <tr>
                <td><?php echo $sr++; ?></td>
                <td> <?php echo $row['sname'] ?> </td>
                <td> <?php   $bchar= $row['buy_bcharge'] +  $row['sell_bcharge']; echo "$bchar"; ?> </td>
                <?php
                 $QTY=0;
                 if($row['complete'] == '1')
                  {
                      $QTY =$row['buyqty']; 
                } elseif(isSell($row['sell_date']))
                {
                 $QTY =$row['buyqty'];
                         
                } else {
                    $QTY =$row['sell_qty'];
                 }  ?>
        <td> <?php echo $QTY; ?> </td>
        <td> <?php if(isSell($row['sell_date']))  echo $row['buyprice']; else echo $row['buyprice']; ?> </td>
        <td> <?php if(isSell($row['sell_date']))  echo $row['sell_price']; else echo $row['sell_price']; ?> </td>
        <td> <?php echo $row['final_total']; ?> </td>
        <td><?php echo $row['dealerbuy'];?></td>
        <td> <?php echo $row['dealersell'];?> </td>
        <td> <?php $dbt =$row['dealerbuy'] * $QTY; $dst=$row['dealersell'] * $QTY; $fin = $dst-$dbt + 0; echo $fin;  ?>  </td>
        <?php $pdate=0;
                 if($row['complete'] == '1')
                  {
                      $pdate =$row['buy_date']; 
                } elseif(isSell($row['sell_date']))
                {
                 $pdate =$row['buy_date'];
                         
                } else {
                    $pdate =$row['sell_date'];
                 }  ?>
        <td><?php echo date('Y-m-d',$pdate); ?></td>
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