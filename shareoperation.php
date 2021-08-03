
<?php include("db.php");
if(isset($_POST['delete']))
{
    $id=$_POST['sid'];
    $delete="UPDATE share SET status='inactive' WHERE sid='$id'";
    $result=mysqli_query($connection,$delete);
    echo "<script>
    alert('Share deleted succesfully')
    window.location='sharetable.php';
</script>";
    
}

if(isset($_POST['update']))
{
    $id=$_POST['sid'];
    $name=trim($_POST['name']);
    $qty=trim($_POST['qty']);
    $update="UPDATE share SET sname='$name',quantity='$qty' WHERE sid='$id'";
    $result=mysqli_query($connection,$update);
    echo "<script>
    alert('Share updated succesfully')
    window.location='sharetable.php';
</script>";
}

?>

