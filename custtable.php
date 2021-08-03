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
   
</head>
<?php include('db.php') ?>
<?php include("navbar.php") ?>
<body>
  <style>
    .container{
  border: 1px solid black;
}
  </style><br>
<div class="container">
  <?php 
  $sql="select * from customer where status='active'";
  $result=mysqli_query($connection,$sql) ;

   
  ?>
  <h2 style="text-align: center;"><strong>Customer Details</strong></h2>      
  <table class="table table-striped">
    <thead>
      <tr>   
        <th>Id</th>
        <th>Full_Name</th>
        <th>Brokage_Charges</th>
        <th>Edit</th>
        <th>Delete</th>      
      </tr>
    </thead>
    <tbody >
      <?php
    while($row=mysqli_fetch_assoc($result)){  ?>  
        <tr>         
          <td><?php echo $row['cid'];  ?></td> 
          <td><?php echo $row['cname']; ?> </td>
          <td><?php echo $row['bcharge']; ?> </td> 
          <td>
            <form action="custupdate.php" method="POST"> 
              <input type="text" hidden name="cid" value="<?php echo $row['cid']; ?>">
            <button type="submit" class="btn btn-md btn-outline-secondary" name="edit"> Edit</button>

            </form>
          </td>       
              
          <td>
            <form action="custoperation.php" method="POST"> 
              <input type="text" hidden name="cid" value="<?php echo $row['cid']; ?>">
            <button type="submit" class="btn btn-md btn-outline-danger" name="delete"> Delete</button>

            </form>
          </td>                     
      </tr> 
    <?php } ?>
      
      </tbody>
   </table>
  </div>
</body>
</html>
