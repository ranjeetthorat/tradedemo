<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
  integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
  integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
  crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
  integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
  crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
  integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
  crossorigin="anonymous"></script> -->
  <link rel="stylesheet" href="asset/bootstrap.min.css">
  <script src="asset/jquery.js"></script>
  <script src="asset/bootstrap.bundle.min.js"></script>
   
  <style>
    input{
      width: 100px;
      padding: 0px;
      font-size: 15px;
    
      
    }
    input:read-only{
      width: 100px;
      padding: 0px;
      border: none;
      font-size: 15px;
      outline: none;  
    }

    td,th{
      width: 20px;
      padding: 0px;
    }
    table{
      width: 600px;
    }
.design{
  width: 100px;
      padding: 0px;
      border: none;
      font-size: 15px;
      outline: none;  
}
  </style>
   </head>
   <?php include('db.php'); ?>
   <?php include("navbar.php") ;
   
   function isSell($value){
    if($value == '0' || $value == 0 )
    return true;
    return false;
  }
   
   ?>
   <body>
 
  <h2 style="text-align: center;"><strong>Share Reports</strong></h2>  
  <label>Select Share Name</label>
                    <select required onchange="getTable(event)" id="share"  name="share"  class="form-control form-control-sm col-md-2">
                    <option value="">Select share name</option>
                  <?php 
                             
                    $select2="SELECT * FROM share  WHERE status='active' order by sname";
                    $result2=mysqli_query($connection,$select2);
                  
                    while($data=mysqli_fetch_assoc($result2))
                    {                   
                    ?>                  
                    <option value="<?php echo $data['sid']; ?>" ><?php echo $data['sname']; ?></option>
                      <?php } ?>
                    </select>
                  
                 <br><br>
             
  <?php
        function getData($data)
        {
          if($data=='0' || $data==0){
            return " ";
          } 
          else{
            return "readonly";
          }
        }
        ?>   
      <?php  if(isset($_GET['sid'])) { 
      ?>

  <table class="table table-borderd table-sm">
<?php
$sid=$_GET['sid'];
$totbuy = "select SUM(buyqty) as buy from trading where sid='$sid' and status='active' and  sell_date = 0";
$totsell = "select SUM(sell_qty) as sell from trading where sid='$sid' and status='active' and buy_date = 0";

$resultbuy = mysqli_query($connection,$totbuy);
$resultsell = mysqli_query($connection,$totsell);
$buyq='';
while($row = mysqli_fetch_assoc($resultbuy)){
  $buyq = $row['buy'];
}

while($row = mysqli_fetch_assoc($resultsell)){

$sellq=$row['sell'];
}

?>

  <h4> Name:   <?php if(isset($_GET['sname'])) echo $_GET['sname'];?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    Total Qty :    <?php echo $buyq -$sellq;  ?>

</h4>
                
    <thead>
      <tr>   
        <th>tid</th>
        <th>customer Name</th>
        <th>QTY</th>
        <th>Price</th>
        <th>Total</th>
        <th>status</th>
        <th>date</th>         
      </tr>
      <tbody >
      <?php 
  $sid=$_GET['sid'];

  $sql="select * from trading where sid='$sid' and status='active' and (buy_date = 0 or sell_date = 0)";

  $result=mysqli_query($connection,$sql) ;  
  ?>
      <?php
      $sr=1;
    while($row=mysqli_fetch_assoc($result)){
        ?>  
        <form action="" method="post">
    <tr>
      
      
        <td >
          <input class="tid" hidden class="design" name="tid" type="text" readonly value="<?php echo $row['tid'];  ?>">
        <?php echo $sr++; ?></td>     
        <td> <input type="text" class="design" name="cname" id="cname" value="<?php echo $row['cname'];?>" > </td>
        <td>  <input type="text" class="design" name="qty" id="qty" value="<?php if(isSell($row['sell_date']))  echo $row['buyqty']; else echo $row['sell_qty'];    ?>" > </td>
        <td> <input type="text" class="design" name="price" id="price" value="<?php if(isSell($row['sell_date']))  echo $row['buyprice']; else echo $row['sell_price'];    ?>" > </td>
        <td> <input type="text" class="design" name="total" id="total" value="<?php if(isSell($row['sell_date']))  echo $row['buy_total']; else echo $row['sell_total'];  ?>" > </td>
        <td> <input type="text" class="design" name="status" id="status" value="<?php if(isSell($row['sell_date']))  echo 'buy'; else echo 'sell';  ?>" > </td>
        <td> <input type="text" class="design" name="date" id="date" value="<?php if(isSell($row['sell_date']))   echo date('Y-m-d',$row['buy_date']); else echo date('Y-m-d',$row['sell_date']);  ?>" > </td> 
      </tr>  
      <input type="text" hidden name="bcharge" value = "<?php if(isSell($row['sell_date'])) echo $row['buy_bcharge']; else echo $row['sell_bcharge']; ?>" >
    </form>           
     
    <?php } ?>
     </tbody>
<?php


?>
     </table>
<?php } ?>

<script>
       function getTable(event)
       {
        
        let table=event.target.value;
       let name= event.target.options[event.target.selectedIndex].text
      // console.log(name)
        window.location.href=`sharereport.php?sid=${table}&sname=${name}`;
       }
     
      </script>
    </body>
     </html>     
     
     
