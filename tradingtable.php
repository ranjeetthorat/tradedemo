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
   <?php include('db.php') ?>
   <?php include("navbar.php") ?>
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
        <th style="visibility:hidden">tid</th>
      
        <th>sname</th>
        <th>buy_bcharge</th>
        <th>buyqty</th>
        <th>Buy_price</th>
        <th>Buy_total</th>
        <th>Buy_date</th>         
        <th>sell_bcharge</th>
        <th>sell_qty</th>
        <th>sell_price</th>
        <th>sell_total</th>
        <th>sell_date</th>  
        
      </tr>
      <tbody >
      <?php 
  $cid=$_GET['cid'];

  $sql="select * from trading where cid='$cid' and status='active' and (buy_date = 0 or sell_date = 0)";

  $result=mysqli_query($connection,$sql) ;  
  ?>
      <?php
    while($row=mysqli_fetch_assoc($result)){
        ?>  
    <tr>
      <form action="updatetable.php" method="Post">
        <td ><input class="tid" hidden name="tid" type="text" readonly value="<?php echo $row['tid'];  ?>"></td>
      
        <td><?php echo $row['sname'];  ?></td>
        <td><input type="text"  <?php echo getData($row['buy_bcharge']); ?> name="buybcharge" 
        value=<?php echo $row['buy_bcharge'];  ?>></td>
        <td><input  type="text" <?php echo getData($row['buyqty']); ?> name="a"  id="a"
        value=<?php echo $row['buyqty'];  ?>></td>
        <td><input type="text"  <?php echo getData($row['buyprice']); ?> name="b" id="b"
        value=<?php echo $row['buyprice'];  ?>></td>
        <td><input type="text"  class="design" <?php echo getData($row['buy_total']); ?> name="c" id="c"
         value=<?php echo $row['buy_total'];  ?>></td>   
        <td><input type="text"  class="design" <?php  echo getData($row['buy_date']); ?> name="d" id="d"
        value=<?php if($row['buy_date']==0) echo "0"; else echo date('Y-m-d',$row['buy_date']); ?>></td>  
        <td><input type="text"  <?php echo getData($row['sell_bcharge']); ?> name="sellbcharge" 
        value=<?php echo $row['sell_bcharge'];  ?>></td>
        <td><input type="text"  <?php echo getData($row['sell_qty']); ?> name="e" id="e"
        value=<?php echo $row['sell_qty'];  ?>></td>
        <td><input type="text"  <?php echo getData($row['sell_price']); ?> name="f" id="f"
        value=<?php echo $row['sell_price'];  ?>></td>
        <td><input type="text"  class="design" <?php echo getData($row['sell_total']); ?> name="g" id="g"
        value=<?php echo $row['sell_total'];  ?>></td>   
        <td><input type="text"  class="design" <?php echo getData($row['sell_date']); ?> name="h" id="h"
        value=<?php  if($row['sell_date']==0) echo "0"; else echo date('Y-m-d',$row['sell_date']); ?>></td>    
        <td>
        <td><input type="text" hidden <?php echo getData($row['final_total']); ?> name="i" id="i"
        value=<?php echo $row['final_total'];  ?>></td>
       <td> <button type="submit" class="btn btn-md btn-outline-secondary" name="edit"> Save</button>

      
          </td>  
          </form>   
    </tr>  
    <?php } ?>
     </tbody>

     </table>
<?php } ?>

<script>
       function getTable(event)
       {
        
        let table=event.target.value;
       let name= event.target.options[event.target.selectedIndex].text
      // console.log(name)
        window.location.href=`tradingtable.php?cid=${table}&cname=${name}`;
       }
     
      </script>
    </body>
     </html>     
     
     
