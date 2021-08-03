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
<body>
  <?php include("db.php"); ?>
  <?php include("navbar.php") ?>
  <style>
    .container{
  border: 1px solid black;
}

  </style>
<br>
<div class="container">
<?php 
  $sql="select * from share where status='active'";
  $result=mysqli_query($connection,$sql) ;

   
  ?>
  <h2 style="text-align: center;"><strong>Share Details</strong></h2>  
       
  <table class="table table-striped">
    <thead>
      <tr>   
        <th>Id</th>
        <th>Share Name</th>
        <th>Share Quantity</th>
      
              
      </tr>
    </thead>
    <tbody>
        <!-- <tr>   
            <td>1</td>
            <td>xyz</td>
            <td>2</td>
            <td>
              <a href="shareupdate.php" class="btn btn-md btn-outline-secondary"> Edit</a>
            </td>            
          </tr>   
    </tbody> -->

    <?php
    while($row=mysqli_fetch_assoc($result)){  ?>  
        <tr>         
          <td><?php echo $row['sid'];  ?></td> 
          <td><?php echo $row['sname']; ?> </td>
          <td><?php echo $row['quantity']; ?> </td> 
        
          <td>
            <form action="shareupdate.php" method="POST"> 
              <input type="text" hidden name="sid" value="<?php echo $row['sid']; ?>">
            <button type="submit" class="btn btn-md btn-outline-secondary" name="edit"> Edit</button>

            </form>
          </td>       
              
          <td>
            <form action="shareoperation.php" method="POST"> 
              <input type="text" hidden name="sid" value="<?php echo $row['sid']; ?>">
            <button type="submit" class="btn btn-md btn-outline-danger" name="delete"> Delete</button>

            </form>
          </td>                     
      </tr> 
    <?php } ?>
     
   </table>
</div>
</body>
</html>
