
<html>
      <head>
        <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
         -->
        <link rel="stylesheet" href="asset/bootstrap.min.css">
  <script src="asset/jquery.js"></script>
  <script src="asset/bootstrap.bundle.min.js"></script>  
       <style> 
           
       </style>
      </head>    
    <body>
        <?php include("db.php"); ?>
        <?php include("navbar.php") ?>
           <div class="container">
            <div class="p-4 m-4">
                <div class="col-lg-5 mx-auto border rounded pt-4"> 
                    <h3 class="alert alert-light border rounded">Trading</h3>
        
                    <form action="inserttrading.php" method="POST">
                    <!-- <div class="form-group">
                        <label for="" hidden>customer id</label>
                        <input type="text"  name="cid" id="cid"  class="form-control form-control-sm" placeholder="your id">
                      </div> -->
                    <div class="row">
                  
                    <div class="form-group col-lg md-3"> 
                        <label>Select Customer Name</label> 
                    <select required onchange="getBrockage(event)" id="customer"  name="customer"  class="form-control form-control-sm col-md-11">
                    <option value="">Select customer name</option>
                  <?php 

                    $select="SELECT * FROM customer WHERE status='active'";
                    $result=mysqli_query($connection,$select);
                    while($row=mysqli_fetch_assoc($result))
                    {                   
                    ?>                  
                    <option value="<?php echo $row['cid']; ?>" ><?php echo $row['cname']; ?></option>
                   <?php } ?>
                    </select> 
                    </div>
                  
                   
                    
                    <div class="form-group col" >  
                        <label>Select Share Name</label>
                    <select required onchange="getQty(event)" id="share"  name="share"  class="form-control form-control-sm col-md-11">
                    <option value="">Select Share</option>
                    
               
                  <?php 

                    $select="SELECT * FROM share WHERE status='active'";
                    $result=mysqli_query($connection,$select);
                    while($row=mysqli_fetch_assoc($result))
                    {                   
                    ?>                  
                    <option value="<?php echo $row['sid']; ?>" ><?php echo $row['sname']; ?></option>
                   <?php } ?>
                    </select> 
                    </div>
                    </div>

                    <div class="row">
                    <div class="form-group col">
                              <label for=""> Brockage Charges</label>
                              <input type="text"  name="bcharges" id="bcharges" required class="form-control form-control-sm" placeholder="Brockage charges">
                    </div> 
                   
                   
                    
                    <div class="form-group col">
                       <label for="">Share Quantity</label>
                        <input type="number" min="1" name="qty" id="qty" required class="form-control form-control-sm" placeholder="Share Quantity">
                    </div> 
                    
                    </div>

                    <div class="row">
                    
                    <div class="form-group col">
                       <label for="">Share Price</label>
                      <input type="text" onkeyup="getTotal(event)" name="price" id="price" required class="form-control form-control-sm" placeholder="Price">
                     </div> 
                   

                    
                     <div class="form-group col">
                       <label for="">Total</label>
                       <input type="text"  name="total" id="total" required class="form-control form-control-sm" placeholder="Total">
                     </div> 
                    </div>

                    <select required id="select"  name="select"  class="form-control form-control-sm col-md-6 ">
                    <option value="buy">Buy</option>
                    <option value="sell" >Sell</option>
                    </select>
<br>
                   
                    <div class="form-group">
                        <button type="submit" class="btn btn-md btn-outline-secondary ">Submit</button>
                     </div>

                    </form>
                 </div>
                </div>
                </div>
            </div>
            
        </div>
        <script>
         function getBrockage(event)
         {
            // console.log(event.target.value)
             let id=event.target.value
             fetch(`tradingoperation.php?cid=${id}`)
             .then((result)=>{
                return result.text();
             })
             .then((data)=>{
             setcharge(data);
             }).catch((e)=>{
                 console.log(e)
             })
         }

         function setcharge(data)
         {
             let bcharge=document.getElementById('bcharges');
             bcharge.value=data;

         }

         function getQty(event)
         {
            
             let id=event.target.value
             fetch(`tradingop.php?sid=${id}`)
             .then((result)=>{
                return result.text();
             })
             .then((data)=>{
             setqty(data);
             }).catch((e)=>{
                 console.log(e)
             })
         }

         function setqty(data)
         {
             let qty=document.getElementById('qty');

             let price=document.getElementById('price');
            
             
              //console.log(d)
            qty.value=data;
        
         }
         function getTotal(event){
             let total=document.getElementById('total');
             let bcharge=+document.getElementById('bcharges').value;
             let qty=+document.getElementById('qty').value;
             let price=+event.target.value;
             total.value=(price*qty)+bcharge;
         }
        

        </script>
    </body>
</html>