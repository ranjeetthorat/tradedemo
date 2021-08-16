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

 .hiderow{
            display: none;
 }
 .hidesrow{
     visibility: hidden;
     height:1px;
     border:none;
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
   <h2 style="text-align: center;"><strong>Script trade Report</strong></h2>  <br>
                   
<div class="container mr-5 pl-5">


<form class="form-inline" action="" method="post">
  <div class="form-group mb-2">
    From Date &nbsp; &nbsp;
    <input type="date"  name="fromdate" class="form-control" id="staticEmail2">
  </div>
  <div class="form-group mx-sm-3 mb-2">
    To Date &nbsp; &nbsp;
    <input type="date" name="todate" class="form-control" id="inputPassword2">
  </div>
  <button type="submit" class="btn btn-primary mb-2">Submit</button>
</form>

</div>


<?php if(isset($_POST['fromdate'])) {
   $todate=strtotime($_POST['todate']) ; 
   $fromdate=strtotime($_POST['fromdate']);  
   $todate = $todate + 24*60*60;
 
  
  ?>

   <div class="container-fluid text-center">
   
   
       
        <br> <br>
        <?php   
        $select = "SELECT distinct(sid),sname from trading order by sname ";
 
      
        $result1 = mysqli_query($connection,$select);
       $value =  mysqli_fetch_all($result1);
     
    $dealertot =0;
    $customertot =0;
       for($i=0;$i<count($value);$i++){


     ?>
        <div class="nameblock container">
            <!-- <h5 class="bg-secondary"> <?php echo $value[$i][1] ?> </h1> -->
        <table class="table table-borderd table-striped table-sm">
        <thead>
      <tr <?php if($i != 0) echo "class='hidesrow'"; ?>>  
        <th>Date</th>
        <th>Script Name</th>
        <th class="hiderow">Brokrage</th>
        <th>QTY</th>
        <th class="hiderow">Buy Price</th>
        <th class="hiderow">Sell Price</th>
        <th class="hiderow"> Customer Total</th>
        <th>D.buy price</th>
        <th>D sell price</th>
        <th> Dealer Total</th>
        <th class="hiderow">date</th>   
      
        
      </tr>
        <?php 
        $cid = $value[$i][0];
        $sql="select * from trading where sid='$cid' and status='active'
        and complete='1' and
        ( (buy_date >= '$fromdate' and buy_date <= '$todate') or (sell_date >= '$fromdate' and sell_date <= '$todate') ) order by buy_date,sell_date ";
        $result=mysqli_query($connection,$sql) ; 
       // echo $sql; 
        $sr=1;
        $tempdeal =0;
          $tempcust =0;
      while($row=mysqli_fetch_assoc($result)){
          
        ?>
        <tbody>
            <tr>
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
                <td> <?php echo $row['sname'] ?> </td>
                <td class="hiderow"> <?php   $bchar= $row['buy_bcharge'] +  $row['sell_bcharge']; echo "$bchar"; ?> </td>
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
        <td class="hiderow"> <?php if(isSell($row['sell_date']))  echo $row['buyprice']; else echo $row['buyprice']; ?> </td>
        <td class="hiderow"> <?php if(isSell($row['sell_date']))  echo $row['sell_price']; else echo $row['sell_price']; ?> </td>
        <td class="hiderow"> <?php $customertot = $customertot + $row['final_total'];
            $tempcust = $tempcust + $row['final_total'];
        echo $row['final_total'];  ?> </td>
        <td ><?php echo $row['dealerbuy'];?></td>
        <td> <?php echo $row['dealersell'];?> </td>
        <td> 
          
          <?php 
          $fin=0;
          if($row['dealerbuy'] == 0 || $row['dealersell'] == 0  )
          {
            $fin =0;
          } else {
            $dbt =$row['dealerbuy'] * $QTY; $dst=$row['dealersell'] * $QTY; 
            $fin = $dst-$dbt + 0; 
          }
          $dealertot =$dealertot + $fin; $tempdeal=  $tempdeal + $fin;
          
         echo $fin;  ?>  </td>
        
     
        <td class="hiderow" ><?php echo date('Y-m-d',$pdate); ?></td>
        </tr>
        <?php } ?> 
        <tr >
          <td class="total">TOTAL</td>
          <td>-</td>
          <td class="hiderow"> </td>
          <td >-</td>
          <td class="hiderow"></td>
          <td class="hiderow"></td>
          <td class="hiderow"><?php echo $tempcust ?> </td>
          <td>-</td>
          <td>-</td>
          <td><?php echo $tempdeal ?></td>
          <td class="hiderow"></td>
        </tr>
    </tbody>
       
      </table>
        </div>
        
        <!-- <hr class="bg-dark"> -->
        

        <?php }
         ?>
         <!-- <span class="cust"> Grand Customer total:<b><?php echo $customertot; ?></b></span> &nbsp;&nbsp;&nbsp; -->
         <span class="cust"> Grand Dealer total:<b><?php echo $dealertot; ?></b></span>
        
    </div>
    <?php } ?>
</body>
</html>