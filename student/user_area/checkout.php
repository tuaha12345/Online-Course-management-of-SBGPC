<?php 
include '../includes/connect.php';
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>CuteRobotics__checkout__page</title>
	<link rel="icon" type="image/x-icon" href="../images/cute_robot_1.png">

	<!--- bootstrap CSS link --->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

	<!--- font awesome link --->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

	<!-------- CSS ------>
	<link rel="stylesheet" type="text/css" href="../style.css">

</head>
<body>

     <!-- navbar--->
     <div class="container-fluid p-0">
     	<!--- first child -->
     	<nav class="navbar navbar-expand-lg bg-warning">
		  <div class="container-fluid">
		    <img src="../images/cute_robot_1.png" class="logo_img">
		    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		      <span class="navbar-toggler-icon"></span>
		    </button>
		    <div class="collapse navbar-collapse " id="navbarSupportedContent">
		      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
		        <li class="nav-item">
		          <a class="nav-link active " aria-current="page" href="../index.php">Home</a>
		        </li>
		        <li class="nav-item">
		          <a class="nav-link " href="../display_all.php">Products</a>
		        </li>
		        <li class="nav-item">
		          <a class="nav-link " href="#">Regiser</a>
		        </li>
		        <li class="nav-item">
		          <a class="nav-link " href="#">Contact</a>
		        </li>

		      </ul>
		      <form class="d-flex"  method="get" action="../index.php" role="search">
		        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
		        <input class="btn btn-outline-light" type="submit" value="Search" name="search_data_product">
		      </form>
		    </div>
		  </div>
		</nav>




        <!--- second child -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
        	<ul class="navbar-nav me-auto ">

        		<?php 

        		   if(!isset($_SESSION['username']))
        		   {
        		   	echo "<li class='nav-item mx-2'>
				          <a class='nav-link' href='#d'>Welcome Guest!!!</a>
				        </li>
				        <li class='nav-item mx-2'>
				          <a class='nav-link' href='checkout.php'>Login</a>
				        </li> ";
        		   }

        		   else
        		   {
        		   	echo "<li class='nav-item mx-2'>
				          <a class='nav-link' href='#'>Welcome".$_SESSION['username']."</a>
				        </li>
				        <li class='nav-item mx-2'>
				          <a class='nav-link' href='user_logout.php'>Logout</a>
				        </li> ";
        		   }

		        ?>

        	</ul>


        </nav>

    <!--- 3rd child ---->

    <div class="bg-light">
    	<h3 class="text-center p-3">Hidden Store</h3>
    	<p class="text-center pb-3">Communications is at the heart of e-commerce and community</p>
    	
    </div>
   

   <!-------- four child------->
   <div>
   	  <?php 
         if(!isset($_SESSION['username']))
         {
         	include('user_login.php');
         }
         
         else
         {
         	include('payment.php');
         }
   	  ?>
   </div>
    
      







    </div>



		<!----- last child-footer --->
           <?php
               include "../includes/footer.php";
           ?>


     </div>





<!--- bootstrap JS link --->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>

