<html>
    <head>
      <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
          <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
          <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> -->
          <link rel="stylesheet" href="asset/bootstrap.min.css">
  <script src="asset/jquery.js"></script>
  <script src="asset/bootstrap.bundle.min.js"></script>
   
    </head>
  <body>
  <?php include("db.php"); ?> 
  <?php include("navbar.php") ?>
         <div class="container">
          <div class="p-4 m-4">
              <div class="col-lg-5 mx-auto border rounded pt-4"> 
                  <h3 class="alert alert-light border rounded">share</h3>    
                  <form action="addshare.php" method="POST">                     
                    <div class="form-group">
                                
                      <label for="" hidden> id</label>
                      <input type="text" hidden name="sid" id="sid"  class="form-control form-control-sm" placeholder="your id">
                    </div>
                         <div class="form-group">
                          <label for=""> Share Name</label>
                          <input type="text"  name="name" id="name"  required class="form-control form-control-sm" placeholder="Enter name">
                        </div>
                        <div class="form-group">
                          <label for="">Share Quantity</label>
                          <input type="text"  name="qty" id="qty"    required class="form-control form-control-sm" placeholder="Enter Quantity">
                        </div>  
                    
                      
                      
                      <div class="form-group">
                          <button type="submit" name="add" class="btn btn-md btn-outline-secondary">Add</button>
                      </div>        
                  </form>
               </div>
              </div>
              </div>
          </div>         
      </div>     
  </body>
</html>