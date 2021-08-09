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
 
  <h2 style="text-align: center;"><strong>Trading Details</strong></h2>  
  <label>Select Customer Name</label>
                    <select required onchange="getTable(event)" id="customer"  name="customer"  class="form-control form-control-sm col-md-2">
                    <option value="">Select customer name</option>
                  <?php 
                             
                    $select2="SELECT * FROM customer  WHERE status='active'";
                    $result2=mysqli_query($connection,$select2);
                  
                    while($data=mysqli_fetch_assoc($result2))
                    {                   
                    ?>                  
                    <option value="<?php echo $data['cid']; ?>" ><?php echo $data['cname']; ?></option>
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
      <?php  if(isset($_GET['cid'])) { 
      ?>

  <table class="table table-borderd table-sm">
  <h4> Name:   <?php if(isset($_GET['cname'])) echo $_GET['cname'];?> </h4>
                
    <thead>
      <tr>   
        <th>Id</th>
        <th>Share Name</th>
        <th>QTY</th>
        <th>Price</th>
        <th>Brokrage</th>
        <th>Total</th>
        <th>status</th>
        <th>date</th>         
        <th>current price</th>
        <th>options</th>
      
        
      </tr>
      </thead>
      <tbody >
      <?php 
  $cid=$_GET['cid'];

  $sql="select * from trading where cid='$cid' and status='active' and (buy_date = 0 or sell_date = 0)";

  $result=mysqli_query($connection,$sql) ;  
  ?>
      <?php
      $sr=1;
    while($row=mysqli_fetch_assoc($result)){
        ?>  
        <form action="pendinupdate.php" method="post">
    <tr>
      
      
        <td >
          <input class="tid" hidden class="design" name="tid" type="text" readonly value="<?php echo $row['tid'];  ?>">
        <?php echo $sr++; ?></td>     
        <td> <input type="text" class="design" name="sname" id="sname" value="<?php echo $row['sname'];?>" > </td>
        <td>  <input type="text" class="design" name="qty" id="qty" value="<?php if(isSell($row['sell_date']))  echo $row['buyqty']; else echo $row['sell_qty'];    ?>" > </td>
        <td> <input type="text" class="design" name="price" id="price" value="<?php if(isSell($row['sell_date']))  echo $row['buyprice']; else echo $row['sell_price'];    ?>" > </td>
        <td><input type="text" class="design" name="bcharges" value = "<?php if(isSell($row['sell_date'])) echo $row['buy_bcharge']; else echo $row['sell_bcharge']; ?>" ></td>
        <td> <input type="text" class="design" name="total" id="total" value="<?php if(isSell($row['sell_date']))  echo $row['buy_total']; else echo $row['sell_total'];  ?>" > </td>
        <td> <input type="text" class="design" name="status" id="status" value="<?php if(isSell($row['sell_date']))  echo 'buy'; else echo 'sell';  ?>" > </td>
        <td> <input type="text" class="design" name="date" id="date" value="<?php if(isSell($row['sell_date']))   echo date('Y-m-d',$row['buy_date']); else echo date('Y-m-d',$row['sell_date']);  ?>" > </td>
        <td><input type="text" required name="current"></td>
        
       
       <td> <button type="submit" class="btn btn-md btn-outline-secondary"  name="edit"> Save</button>

      
          </td>  
         
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
        window.location.href=`reports.php?cid=${table}&cname=${name}`;
       }
     
      </script>
    </body>
     </html>     
     
     
