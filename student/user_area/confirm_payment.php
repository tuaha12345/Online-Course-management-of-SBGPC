<?php 
include '../includes/connect.php';
session_start();
if(isset($_GET['order_id']))
{
  $order_id=$_GET['order_id'];
  // echo "<h1>$order_id</h1>";
  $select_data="SELECT * FROM user_orders WHERE order_id=$order_id";
  $res=mysqli_query($con,$select_data);
  $row=mysqli_fetch_assoc($res);
  $invoice_num=$row['invoice_number'];
  $amount_due=$row['amount_due'];
 

	    if(isset($_POST['confirm_payment']))
	  {
	    $invoice_num = $_POST['invoice_number'];
	    $amount = $_POST['amount'];
	    $payment_mode = $_POST['payment_mode']; // Added this line to get the payment mode

	    $payment_query = "INSERT INTO user_payments (order_id, invoice_number, amount, payment_mode, date) 
	                      VALUES ($order_id, '$invoice_num', $amount, '$payment_mode', NOW())";

	    $result_run = mysqli_query($con, $payment_query);

	    if($result_run)
	    {
	      echo "<h3 class='text-center'>Successfully completed the payment</h3>";
	      echo "<script>window.open('profile.php?my_orders','_self')</script>";
	    }
	    $update_orders="UPDATE user_orders SET order_status='Complete' WHERE order_id=$order_id";
	    $result_order=mysqli_query($con,$update_orders);
	  }


}
else{
	echo 'nothing founded';
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Confirm payment</title>
	<link rel="icon" type="image/x-icon" href="../images/cute_robot_1.png">

	<!--- bootstrap CSS link --->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

	<!--- font awesome link --->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body class="bg-light">
	<div class="container my-5">
		<h1 class="text-center text-warning">Confirm Payment</h1>
		<form action="" method="post" class=" border">
			<div class="form-outline my-4 text-center w-50 m-auto">
				Invoice number: <input type="text" name="invoice_number" value="<?php echo $invoice_num ?>">
			</div>
			<div class="form-outline my-4 text-center w-50 m-auto">
				Amount: <input type="text" name="amount" value="<?php echo $amount_due ?>">
			</div>
			<div class="form-outline my-4 text-center w-50 m-auto">
				<select name="payment_mode" class="form-select w-50 m-auto">
					<option>Select Payment Mode</option>
					<option>UPI</option>
					<option>Netbanking</option>
					<option>Paypal</option>
					<option>Cash on Delivery</option>
					<option>Payoffline</option>
				</select>
			</div>
			<div class="form-outline my-4 text-center w-50 m-auto">
				<input type="submit" name="confirm_payment" class="btn btn-warning" value="Confirm">
			</div>						
		</form>
	</div>

</body>