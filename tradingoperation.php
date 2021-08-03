<?php include("db.php"); 
$id=$_GET['cid'];
$select="SELECT bcharge FROM customer WHERE cid='$id'";
$result=mysqli_query($connection,$select);
while($row=mysqli_fetch_assoc($result)){
echo $row['bcharge'];
}
?> 


