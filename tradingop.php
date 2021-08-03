<?php include("db.php"); 
$id=$_GET['sid'];
$select="SELECT quantity FROM share WHERE sid='$id'";
$result=mysqli_query($connection,$select);
while($row=mysqli_fetch_assoc($result)){
echo $row['quantity'] ;

}
?>