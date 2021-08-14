
 <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
 integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
 integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
 crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
 integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
 crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
 integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
 crossorigin="anonymous"></script> -->
 <link rel="stylesheet" href="asset/bootstrap.min.css?1">
<script src="asset/jquery.js?2"></script>
<script src="asset/bootstrap.bundle.min.js?3"></script>
<!DOCTYPE html>
<html>
<head>

 </head> 
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body 
{
  font-family: "Lato", sans-serif;
}
.mq-bread-crumbs li,
.mq-bread-crumbs a{ 
	display:none;
	padding-left:1000 px;
	font-size: 40;
 	color: rgb(243, 235, 235);
   height: 100;
  
}
.grid-container {
  margin-right: 10px;
  padding-right: 0px; 
  margin-left: 10px;
  padding-left: 10px;
  display: grid;
  grid-gap: 50px;
  background-color:#3d0d39;
  padding: 10px;
  justify-content: right;
  border:1px solid;
  grid-template-columns: repeat(auto-fill, 220px);
  grid-template-rows: repeat(auto-fill, 150px) ;
}
.grid-container > div {
  background-color:  rgb(224, 221, 221);
  text-align: center;
  padding: 20px 0;
  font-size: 30px;
  color: #003f5c;
  height: 150;
  width: 250;
  margin-left: 50px;
  border-radius: 8px;
  box-shadow: aqua  ;
  animation: mymove 5s infinite;
}  
@keyframes mymove {
  from {background-color: rgb(235, 176, 220);}
  to {background-color: rgb(205, 205, 206);}
}
a{
  color: #420e46;
}
.zoom {
  padding: 50px;
  background-color: rgb(87, 90, 87);
  transition: transform .2s;
  width: 100px;
  height: 100px;
  margin: 0 auto;
}

.zoom:hover {
  -ms-transform: scale(1.1); 
  -webkit-transform: scale(1.1); 
  transform: scale(1.1); 
}
* {
  box-sizing: border-box;
}
.grid-container> div:hover {
  box-shadow: 0 4px 8px 0 rgba(146, 164, 224, 0.932), 0 6px 20px 0  rgba(146, 164, 224, 0.932);
}


.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  border-radius: 8px;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  padding: 12px 16px;
  z-index: 1;
}

.dropdown:hover .dropdown-content {
  display: block;
}
</style>
<body  style="background-color: #3d0e39 ;">
  <div class="mq-container">
    <div class="mq-bread-crumbs">
      <ul><br>
        <li><a >DASHBOARD</a></li><h1 style="text-align: center;color: aliceblue;">DASHBOARD</h1>
        <form action="#" method="POST">
             <li><a href="#"></a></li>
      </ul>
    </div><br>
    <div class="grid-container">
        <div class="dropdown zoom">
            <span>Customer</span>
            <div class="dropdown-content">
            <a href="customer.php"> 1.Add</a><br>
            <a href="custtable.php">2.Details</a><br>
          </div>
        </div>
        <div class="dropdown zoom" >
            <span>Share</span>
            <div class="dropdown-content">
            <a href="share.php"> 1.Add</a><br>
            <a href="sharetable.php">2.Details</a>
          </div>
        </div>
      <div class="zoom"><a href="trading.php">First Trade</a></div>
      <div class="zoom"><a href="tradingtable.php">Second Trade</a></div><br>
      <div class="zoom"><a href="reports.php">Pending Trade</a></div>
       <div class="zoom"><a href="infotable.php">Complete Trade Report</a></div>
          <div class="zoom"><a href="sharereport.php">Share Report</a></div>
      <div class="zoom"><a href="finalreport.php">Total Panding Report</a></div><br> 
      <div class="zoom"><a href="customreport.php">Total Reports</a></div>
      <div class="zoom"><a href="missingdealer.php">Missing Trade of Dealer</a></div>
      <div class="zoom"><a href="Stockhold.php">Stock Hold of Dealer</a></div>
       </div>   
  </div>    
</body>
</html> 

