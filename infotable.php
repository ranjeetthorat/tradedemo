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

    /* td,th{
      width: 20px;
      padding: 0px;
    } */
    table{
      width: 600px;
    }
    @media print{
      .form-control,button,label,.printhide{
           display: none;
      }
    }
    form{
      display: flex;
      flex-flow: row wrap;
      align-items: center;
    }
    input,label{
      vertical-align:middle;
    }
    .boldrow{
      font-weight:800;
    }

 
 
    
  </style>
   </head>
   <?php include('db.php') ?>
   <?php include("navbar.php") ?>
   <body>
   <h2 style="text-align: center;"><strong>Trading Report</strong></h2>  <br>
   
   <form action="infotable.php" name="report" method="get">
  
  
 
   
 
  <label>Select Cust Name:</label>
 
                    <select required onchange="getTable(event)" id="customer"  name="cid" 
                     class="form-control form-control-sm col-md-2" >
                    <option value="">Select customer name</option> &nbsp;
                  <?php                             
                    $select2="SELECT * FROM customer  WHERE status='active'";
                    $result2=mysqli_query($connection,$select2);                 
                    while($data=mysqli_fetch_assoc($result2))
                    {                   
                    ?>                  
                    <option value="<?php echo $data['cid']; ?>" ><?php echo $data['cname']; ?></option>
                      <?php } ?> 
                    </select>
    
                   
                  <input type="text" hidden  name="cname" id="cname" >           
                  <label>Select from date:&nbsp;</label>
                  <input type="date"  id="fromdate"  name="fromdate"  class="form-control form-control-sm col-md-2"> &nbsp;
                  
                  
                  <label>Select To date:</label>&nbsp;
                  <input  type="date"   id="todate"  name="todate"  class="form-control form-control-sm col-md-2 ">
                    <button type="submit" name="btn" class="btn btn-md btn-outline-secondary printhide">submit</button>&nbsp;
                    <button  onclick="window.print()" class="btn btn-md btn-outline-secondary printhide">print</button>
                    </form>
                    </h3> 
                 <br><br><br><br>

      <?php  if(isset($_GET['cid'])) {
         $todate=strtotime($_GET['todate']) ; 
         $fromdate=strtotime($_GET['fromdate']);  
      ?>

  <table class="table table-borderd table-sm">
  <h4>Name:<?php if(isset($_GET['cname'])) echo $_GET['cname'];?> </h4>
    <thead>
      <tr>   
        <th style="visibility:hidden">tid</th>
      
        <th>Buy Date</th>         
        <th>Script Name</th>
        <th class="bcharge" >Brokerage</th>
        <th>Buy Qty</th>
        <th>Buy Price</th>
        <!-- <th>Buy Total</th> -->
         <th class="printhide">Dealer Buy price</th> 
        <th>Brokerage</th>
        <th>Sell Qty</th>
        <th>Sell Price</th>
        <th class="printhide" >dealer sell price</th>
        <!-- <th>Sell Total</th> -->
        <th >Total</th>
        <th class="printhide">Action</th> 
        <th class="printhide">Delete</th> 
      </tr>
      
      <tbody >
      <?php 
  $cid=$_GET['cid'];

  
$todate = $todate + 24*60*60;
  $sql="select * from trading where cid='$cid' and status='active' and
   ( (buy_date >= '$fromdate' and buy_date <= '$todate') or (sell_date >= '$fromdate' and sell_date <= '$todate') )   order by complete DESC ";

   //echo $sql;
  $result=mysqli_query($connection,$sql) ;  
  ?>
      <?php
      $finaltot = 0;
    while($row=mysqli_fetch_assoc($result)){
        ?>  
         <form action="dealers.php" method="post">
           <tr <?php if($row['buy_date'] == 0 || $row['sell_date']==0)echo "class='boldrow'" ?> >
            <td ><input class="tid" hidden name="tid" type="text" readonly value="<?php echo $row['tid'];  ?>"></td>
            <td><?php if($row['buy_date']==0) echo "0"; else echo date('Y-m-d',$row['buy_date']); ?></td>
      
        <td class="design"><?php echo $row['sname'];  ?></td>
        <td class="bcharge"><?php echo $row['buy_bcharge'];  ?></td>
        <td><?php echo $row['buyqty'];  ?></td>
        <td><?php echo $row['buyprice'];  ?></td>
        <!-- <td><?php echo $row['buy_total'];  ?></td>    -->
        <td class="printhide"><input type="text" required value = "<?php echo $row['dealerbuy']; ?>" name="dealerbuy"></td>
        <td><?php echo $row['sell_bcharge'];  ?></td>
        <td><?php echo $row['sell_qty'];  ?></td>
        <td><?php echo $row['sell_price'];  ?></td>
        <td class="printhide"><input type="text" required value = "<?php echo $row['dealersell']; ?>" name="dealersell"></td>
        <!-- <td><?php echo $row['sell_total'];  ?></td>    -->
        <td><?php echo $row['final_total'];  ?></td>   
        <!-- <td><?php  if($row['sell_date']==0) echo "0"; else echo date('Y-m-d',$row['sell_date']); ?></td>     -->
        <td class="printhide">
          <button type="submit" class="btn btn-sm btn-outline-info">update</button>
        </td>  
         
        <td class="printhide">
          <button type="submit" form="<?php echo $row['tid']; ?>" class="btn btn-sm btn-outline-danger">delete</button>
        </td>
           
      </tr>   
      </form>  
       <form action="deletetrade.php" id="<?php echo $row['tid']; ?>" method="post">
       <input class="tid" hidden name="tid" type="text" readonly value="<?php echo $row['tid'];  ?>">
       </form>        
    <?php $finaltot = $finaltot +$row['final_total']; ?>

    <?php } ?>
    <tr>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td class="printhide"></td>
      <td></td>
      <td></td>
      <td></td>
      <td class="printhide">Total</td>
      <td><?php echo $finaltot; ?></td>

      
    </tr>

     </tbody>

     </table>
<?php } ?>

      <script>
       function getTable(event)
       {
        
        let cid = event.target.value;
        let cname = document.getElementById('cname');
        cname.value=event.target.options[event.target.selectedIndex].text;
   
       }
     
      </script>
    </body>
     </html>     
     
     
