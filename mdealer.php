<?php

include('db.php');

$tid= trim($_POST['tid']);
$dealersell= trim($_POST['dealersell']);
$dealerbuy= trim($_POST['dealerbuy']);
$update = "update trading SET dealersell='$dealersell',dealerbuy='$dealerbuy' where tid ='$tid'";
$result = mysqli_query($connection,$update);

?>

<script>
    alert("succesful updated");
    window.location.href = 'missingdealer.php';
</script>