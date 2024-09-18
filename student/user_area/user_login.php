<?php 
include '../includes/connect.php';
include '../function/common_function.php';
//session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>User Login</title>
    <link rel="icon" type="image/x-icon" href="../images/cute_robot_1.png">

		<!--- bootstrap CSS link --->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    	<!--- font awesome link --->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

		<!-------- CSS ------>
	<link rel="stylesheet" type="text/css" href="../style.css">

    <style type="text/css">
    	body
    	{
    		overflow-x:hidden ;
    	}
    </style>
</head>
<body> 
	 <!-- navbar--->
     <div class="container-fluid p-0">
     	<!--- first child -->
     <!-- 	<nav class="navbar navbar-expand-lg bg-warning">
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
		          <a class="nav-link " href="user_registration.php">Regiser</a>
		        </li>
		        <li class="nav-item">
		          <a class="nav-link " href="#">Contact</a>
		        </li>
		        <li class="nav-item">
		          <a class="nav-link" href="../cart.php"><i class="fa-solid fa-cart-shopping"></i><sup><?php cart_item_number(); ?></sup></a>
		        </li>
		        <li class="nav-item">
		          <a class="nav-link " href="#">Total Price: <?php total_cart_price();  ?></a>
		        </li>


		      </ul>
		      <form class="d-flex"  method="get" action="../index.php" role="search">
		        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
		        <input class="btn btn-outline-light" type="submit" value="Search" name="search_data_product">
		        <?php search_products(); ?>
		      </form>
		    </div>
		  </div>
		</nav> -->

 <!--- second child -->
<!--         <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
        	<ul class="navbar-nav me-auto ">

        		<li class="nav-item mx-2">
		          <a class="nav-link " href="#">Welcome Guest!!!</a>
		        </li>

		        <li class="nav-item mx-2">
		          <a class="nav-link " href="../user_area/user_login.php">Login</a>
		        </li>

        	</ul>


        </nav> -->



    <!------- user login----------->

	<div class="container-fluid my-5">
		<h2 class="text-center">User Login</h2>
		<div class="row d-flex align-items-center justify-content-center">
			 <div class="col-lg-12 col-xl-6">

			 	<form action="" method="post" >

			 		<!---- username field-->
			 		<div class="mb-4">
					  <label for="username" class="form-label">User name</label>
					  <input type="text" class="form-control" id="username" placeholder="User Name" name="user_username" autocomplete="off" required='required'>
					</div>
					
					<!---- password field-->
			 		<div class="mb-4">
					  <label for="password" class="form-label">Password</label>
					  <input type="password" class="form-control" id="password" placeholder="User password" name="user_password" autocomplete="off" required='required'>
					</div>

					

					<!-- submit-->
					<div class="mt-5">
						<input type="submit" name="user_login" class="btn btn-warning" value="Login">
						<p class="small fw-bold mt-2 mb-0"> 
						Don't have any account?
						<a href="user_registration.php" class="text-danger">Register</a>
						</p>
					</div>
								 		
			 	</form>
			 </div>
		</div>

	</div>
      
</body>
</html>

<!-- php code--->
<?php 

if(isset($_POST['user_login']))
{
	$user_username=$_POST['user_username'];
	$user_password=$_POST['user_password'];

    //// for checking  whether the username registered or not
	$select_query="SELECT * FROM user_table WHERE user_name='$user_username' ";
	$result=mysqli_query($con,$select_query);
	$row_count=mysqli_num_rows($result);
	$row_data=mysqli_fetch_assoc($result);



	///for checking any cart iteam added or not
	$user_ip=getIPAddress();

	$select_query_for_cart="SELECT * FROM cart_details WHERE ip_address='$user_ip' ";
	$result=mysqli_query($con,$select_query_for_cart);
	$row_count_cart=mysqli_num_rows($result);




    // checking conditions.....
	if($row_count>0)
	{    

		 $_SESSION['username']=$user_username; 

	  if(password_verify($user_password, $row_data['user_password']))
	  { 
	  	 if($row_count_cart==0){ //$row_count_cart==0 and $row_count==1 as tutorial

	  	    $_SESSION['username']=$user_username; 
	  	 	echo "<script>alert('Login Successful')</script>";
	  	 	echo "<script>window.open('profile.php','_self')</script>";
	  	 }

	  	 else{
	  	 	 $_SESSION['username']=$user_username; 
	  	 	echo "<script>alert('Login Successful')</script>";
	  	 	echo "<script>window.open('payment.php','_self')</script>";
	  	 }
	  }

	  else{
        echo "<script>alert('Invalid Credentials')</script>";
	  }

    }

    
    else{
    	echo "<script>alert('Invalid Credentials')</script>";
    	}





}















?>