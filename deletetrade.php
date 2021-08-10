<?php


include('db.php');
$tid = $_POST['tid'];
$update = "update trading set status ='inactive' where tid ='$tid'";



$result = mysqli_query($connection,$update);




?>

<script>
    alert("deleted updated");
    window.location.href = 'infotable.php';
</script>