
<?php include("db.php"); 
        
                          $name=trim($_POST['name']);
                          $qty=trim($_POST['qty']);
                         
                          $status="active";
                          $s="INSERT INTO share (sname,quantity,status)
                           VALUES('$name','$qty','$status')";
                
                          $result=mysqli_query($connection,$s);
                                                           
                          ?>     
                          <script>
                           alert(" share Added Successfully")
                           window.location="share.php";
                          </script>