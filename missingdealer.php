<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
 
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
      /* font-weight:800; */
    }
h2{
    text-align:center
}
 
 
    
  </style>
   </head>
   <?php include('db.php') ?>
   <?php include("navbar.php") ?>
   <body>
       <div class="container-fluid">
        
               <h2 ><strong>Missing trade of dealer</strong></h2>  <br>

           
   
                 <form action="" name="report" method="get">

                  <label>Select from date:&nbsp;</label>
                  <input type="date"  id="fromdate"  name="fromdate"  class="form-control form-control-sm col-md-2"> &nbsp;
                  <label>Select To date:</label>&nbsp;
                  <input  type="date"   id="todate"  name="todate"  class="form-control form-control-sm col-md-2 ">
                    <button type="submit" name="btn" class="btn btn-md btn-outline-secondary printhide">submit</button>&nbsp;
                    <button  onclick="window.print()" class="btn btn-md btn-outline-secondary printhide">print</button>
                    </form>
                    </h3> 
                 <br>

      <?php  if(isset($_GET['todate'])) {
         $todate=strtotime($_GET['todate']) ; 
         $fromdate=strtotime($_GET['fromdate']);  
      ?>

  <table class="table table-borderd table-sm">
  
    <thead>
      <tr>   
        <th style="visibility:hidden">tid</th>
      
        <th>Buy Date</th>         
        <th>Customer Name</th>         
        <th>Script Name</th>
        <th>Buy Qty</th>
        <th>Buy Price</th>
        <!-- <th>Buy Total</th> -->
         <th class="printhide">Dealer Buy price</th> 
        <th>Sell Qty</th>
        <th>Sell Price</th>
        <th class="printhide" >dealer sell price</th>
        <th class="printhide" > sell date</th>
        <!-- <th>Sell Total</th> -->
        <th >Total</th>
        <th class="printhide">Action</th> 
        
      </tr>
       
      <tbody >
      <?php 
 

  
$todate = $todate + 24*60*60;
  $sql="select * from trading where  status='active' and (dealersell = 0 or dealerbuy = 0) and 
   ( (buy_date >= '$fromdate' and buy_date <= '$todate') or (sell_date >= '$fromdate' and sell_date <= '$todate') )   order by sname ";

   //echo $sql;
  $result=mysqli_query($connection,$sql) ;  
  ?>
      <?php
      $finaltot = 0;
    while($row=mysqli_fetch_assoc($result)){
        ?>  
         <form action="mdealer.php" method="post">
           <tr <?php if($row['buy_bcharge'] == 0 || $row['sell_bcharge']==0)echo "class='boldrow'" ?> >
            <td ><input class="tid" hidden name="tid" type="text" readonly value="<?php echo $row['tid'];  ?>"></td>
            <td><?php if($row['buy_date']==0) echo "0"; else echo date('Y-m-d',$row['buy_date']); ?></td>
      
        <td class="design"><?php echo $row['cname'];  ?></td>
        <td class="design"><?php echo $row['sname'];  ?></td>
    
        <td><?php echo $row['buyqty'];  ?></td>
        <td><?php echo $row['buyprice'];  ?></td>
        <!-- <td><?php echo $row['buy_total'];  ?></td>    -->
        <td class="printhide"><input type="text" required value = "<?php echo $row['dealerbuy']; ?>" name="dealerbuy"></td>
        
        <td><?php echo $row['sell_qty'];  ?></td>
        <td><?php echo $row['sell_price'];  ?></td>
        <td class="printhide"><input type="text" required value = "<?php echo $row['dealersell']; ?>" name="dealersell"></td>
        <td><?php  if($row['sell_date']==0) echo "0"; else echo date('Y-m-d',$row['sell_date']); ?></td>     
        <!-- <td><?php echo $row['sell_total'];  ?></td>    -->
        <td><?php echo $row['final_total'];  ?></td>   
        <td class="printhide">
          <button type="submit" class="btn btn-sm btn-outline-info">update</button>
        </td>  
         
      
           
      </tr>   
      </form>    
    <?php $finaltot = $finaltot +$row['final_total']; ?>

    <?php } ?>
    <tr>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
 
      <td></td>
      <td class="printhide"></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td class="printhide">Total</td>
      <td><?php echo $finaltot; ?></td>

      
    </tr>

     </tbody>

     </table>
     </div>
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
     
     
