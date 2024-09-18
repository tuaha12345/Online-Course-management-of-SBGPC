<?php 
include '../includes/connect.php';
include '../function/common_function.php';
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php echo 'Welcome '. $_SESSION['username'];  ?></title>
	<link rel="icon" type="image/x-icon" href="../images/logo.png">

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
    	.profile_img{
    		width:90%;
    		object-fit:content;
    		margin: auto;
    		display:block;
    	}
    	.edit_img{
			width:100px;
			height: 100px;
			object-fit:content;
		}
    </style>

</head>
<body>

    
     <div class="container-fluid p-0">
     	<!--- first child -->
     	 <!-- navbar--->
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
		          <a class="nav-link " href="profile.php">My Account</a>
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
		      </form>
		    </div>
		  </div>
		</nav>

<!---------- calling cart funcation---->
				<?php
				cart();
				?>

  <!--------- second child --------------------->
        <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
        	<ul class="navbar-nav me-auto ">

        		<?php 

        		   if(!isset($_SESSION['username']))
        		   {
        		   	echo "<li class='nav-item mx-2'>
				          <a class='nav-link' href='#d'>Welcome Guest!!!</a>
				        </li>
				        <li class='nav-item mx-2'>
				          <a class='nav-link' href='user_area/checkout.php'>Login</a>
				        </li> ";
        		   }

        		   else
        		   {
        		   	echo "<li class='nav-item mx-2'>
				          <a class='nav-link' href='#'>Welcome".$_SESSION['username']."</a>
				        </li>
				        <li class='nav-item mx-2'>
				          <a class='nav-link' href='user_area/user_logout.php'>Logout</a>
				        </li> ";
        		   }

		        ?>

        	</ul>


        </nav>

    <!--- 3rd child -->

    <div class="bg-light">
    	<h3 class="text-center p-3">Hidden Store</h3>
    	<p class="text-center pb-3">Communications is at the heart of e-commerce and community</p>
    	
    </div>

    <!----- fourth child---->
    <div class="row">
        
        <div class="col-md-2 ">
        	<ul class="navbar-nav text-center bg-secondary">
		        <li class="nav-item bg-warning">
		          <a class="nav-link text-light"  href="#"><h4>Your Profile</h4></a>
		        </li>
		        <?php 
                   $username=$_SESSION['username'];
                   $select_img="SELECT * FROM user_table WHERE user_name='$username' ";
                   $run_selecting_img_query=mysqli_query($con,$select_img);
                   $fetch_img=mysqli_fetch_assoc($run_selecting_img_query);
                   $user_img=$fetch_img['user_image'];
                   echo "<li>
				        	<img src='user_image/$user_img' class='profile_img my-3'>
				        </li>";
		        ?>

		        <li class="nav-item">
		          <a class="nav-link text-light"  href="profile.php">Pending Orders</a>
		        </li>
		        <li class="nav-item">
		          <a class="nav-link text-light"  href="profile.php?edit_account">Edit Account</a>
		        </li>
		        <li class="nav-item">
		          <a class="nav-link text-light"  href="profile.php?my_orders">My Orders</a>
		        </li>
		        <li class="nav-item">
		          <a class="nav-link text-light"  href="profile.php?delete_account">Delete Account</a>
		        </li>
		        <li class="nav-item">
		          <a class="nav-link text-light"  href="user_logout.php">Logout</a>
		        </li>		        		        		        
		    </ul>

        	
        </div>
        

        <div class="col-md-10">
        	<?php 
        	get_user_details();
        	 if(isset($_GET['edit_account']))
        	 {
        	 	include 'edit_account.php';
        	 }

        	 if(isset($_GET['my_orders']))
        	 {
        	 	include 'user_orders.php';
        	 }

        	 if(isset($_GET['delete_account']))
        	 {
        	 	include 'delete_account.php';
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
