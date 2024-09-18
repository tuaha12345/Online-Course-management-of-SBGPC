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
	<title>CuteRobotics-Payment</title>
	<link rel="icon" type="image/x-icon" href="../images/cute_robot_1.png">

	<!--- bootstrap CSS link --->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

	<!--- font awesome link --->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<!------ style------>
	<style>
         img{
         	width: 90%;
         	margin:auto;
         	display: block;
         }
	</style>
</head>
<body>
	<!----------- php code to access the user id------>
	<?php 

	 $user_ip=getIPAddress();
	 $get_user="SELECT * FROM user_table WHERE user_ip='$user_ip' ";
	 $result=mysqli_query($con,$get_user);
	 $run_query=mysqli_fetch_assoc($result);
	 if($run_query>0)
	 {
	 		 $user_id=$run_query['user_id'];
	// echo $user_ip;
	 }
	 else{
	 	$user_id=null;
	 }




	?>




     <div class="container my-5">
     	<h2 class="text-center text-warning">Payment options</h2>

     	<div class="row my-5 d-flex align-items-center">
             <div class="col-md-6">
             	    <a href="https://www.paypale.com" target="_blank">
		     			<img src="../images/payment_options.jpg">
		     		</a>
             </div>

             <div class="col-md-6 text-center  ">
             	    <h2 class="">
             	    	<a href="order.php?user_id=<?php echo $user_id; ?>">Pay offline
             	    	</a>
             	    </h2>
             </div>
     	</div>
     	
     </div>
</body>
</html>
