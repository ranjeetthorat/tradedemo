
<?php include("db.php");
if(isset($_POST['delete']))
{
    $id=$_POST['cid'];
    $delete="UPDATE customer SET status='inactive' WHERE cid='$id'";
    $result=mysqli_query($connection,$delete);
    echo "<script>
    alert('User deleted succesfully')
    window.location='custtable.php';
</script>";
    
}

if(isset($_POST['update']))
{
    $id=$_POST['cid'];
    $name=trim($_POST['fullname']);
    $charges=trim($_POST['charges']);
    $update="UPDATE customer SET cname='$name',bcharge='$charges' WHERE cid='$id'";
    $result=mysqli_query($connection,$update);
    echo "<script>
    alert('User updated succesfully')
    window.location='custtable.php';
</script>";
}
?>

