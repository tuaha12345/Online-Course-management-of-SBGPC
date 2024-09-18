<?php 
include '../includes/connect.php';
include '../function/common_function.php';
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>User Registration</title>
		<!--- bootstrap CSS link --->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body> 

	<div class="container-fluid my-5">
		<h2 class="text-center">New User Registration</h2>
		<div class="row d-flex align-items-center justify-content-center">
			 <div class="col-lg-12 col-xl-6">
			 	<form action="" method="post" enctype="multipart/form-data">

			 		<!---- username field-->
			 		<div class="mb-3">
					  <label for="username" class="form-label">User name</label>
					  <input type="text" class="form-control" id="username" placeholder="User Name" name="user_username" autocomplete="off" required='required'>
					</div>

					<!---- email field-->
			 		<div class="mb-3">
					  <label for="email" class="form-label">Email</label>
					  <input type="email" class="form-control" id="email" placeholder="Enter your email address" name="user_email" autocomplete="off" required='required'>
					</div>

					<!---- image field-->
					<div class="mb-3">
					  <label for="formFile" class="form-label">user Image</label>
					  <input class="form-control" type="file" id="formFile" name="user_image">
					</div>

					<!---- password field-->
			 		<div class="mb-3">
					  <label for="password" class="form-label">Password</label>
					  <input type="password" class="form-control" id="password" placeholder="User password" name="user_password" autocomplete="off" required='required'>
					</div>

					<!---- confirm password field-->
			 		<div class="mb-3">
					  <label for="confirm_password" class="form-label">Confirm Password</label>
					  <input type="password" class="form-control" id="confirm_password" placeholder="confirm_password " name="confirm_user_password" autocomplete="off" required='required'>
					</div>

					<!---- address field-->
			 		<div class="mb-3">
					  <label for="address" class="form-label">Address</label>
					  <input type="text" class="form-control" id="address" placeholder="User address" name="user_address" autocomplete="off" required='required'>
					</div>

					<!---- contact field-->
			 		<div class="mb-3">
					  <label for="contact" class="form-label">Contact</label>
					  <input type="text" class="form-control" id="contact" placeholder="Enter your mobile number" name="user_contact" autocomplete="off" required='required'>
					</div>
					<!-- submit-->
					<div class="">
						<input type="submit" name="user_register" class="btn btn-warning" value="Register">
						<p class="small fw-bold mt-2 mb-0"> 
							Already have an account?
							<a href="user_login.php" class="text-danger"> Login</a>
						</p>
					</div>
								 		
			 	</form>
			 </div>
		</div>

	</div>
      
</body>
</html>

<?php
if(isset($_POST['user_register']))
{
	$user_name=$_POST['user_username'];
	$user_email=$_POST['user_email'];
	$user_password=$_POST['user_password'];
	$hash_password=password_hash($user_password, PASSWORD_DEFAULT);
	$user_confirm_password=$_POST['confirm_user_password'];
	$user_address=$_POST['user_address'];
	$user_mobile=$_POST['user_contact'];

	$user_ip=getIPAddress();
	$user_image_name=$_FILES['user_image']['name'];
	$user_image_tmp=$_FILES['user_image']['tmp_name'];

	// select query
	$select_query="SELECT * FROM user_table WHERE user_name='$user_name' or user_email='$user_email' ";
	$res=mysqli_query($con,$select_query);
	$rows_count=mysqli_num_rows($res);


	if($rows_count>0)
	{
		echo "<script>alert('This Username and Email already exist')</script>";
	}
	else if($user_password!=$user_confirm_password)
	{
		echo "<script>alert('Password do not match')</script>";
	}

   else{
   	// insert query
	move_uploaded_file($user_image_tmp,"./user_image/$user_image_name");
	$insert_query="INSERT INTO user_table(user_name,user_email,user_password,user_image,user_ip,user_address,user_mobile) VALUES('$user_name','$user_email','$hash_password','$user_image_name','$user_ip','$user_address','$user_mobile')";
	$sql_execute=mysqli_query($con,$insert_query);

	echo "<script>alert('Registration Successfull!!!')</script>";
   }


/// selecting cart items

$select_cart_items="SELECT * FROM cart_details WHERE ip_address='$user_ip' ";
$result_cart=mysqli_query($con,$select_cart_items);
$rows_count_for_cart_items=mysqli_num_rows($result_cart);
if($rows_count_for_cart_items>0)
{
	$_SESSION['username']=$user_name;
	echo "<script>alert('You have items in your cart')</script>";
	echo "<script>window.open('checkout.php','_self')</script>";
}

else
{
	echo "<script>window.open('../index.php','_self')</script>";
}




}


?>