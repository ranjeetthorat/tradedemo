
<?php include("db.php"); 
        
        $name=trim($_POST['fullname']);
        $charge=trim($_POST['charges']);
        $status=trim($_POST['status']);
        $status="active";
        $s="INSERT INTO customer (cname,bcharge,status)
         VALUES('$name','$charge','$status')";
        $result=mysqli_query($connection,$s);
                                         
        ?>     
        <script>
         alert(" Customer Added Successfully")
         window.location="customer.php";
        </script>