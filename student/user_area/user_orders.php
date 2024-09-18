<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php echo 'Welcome '. $_SESSION['username'];  ?></title>
	<link rel="icon" type="image/x-icon" href="../images/cute_robot_1.png">

	<!--- bootstrap CSS link --->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

	<!--- font awesome link --->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body>
	<?php 

	$username = $_SESSION['username'];
   $get_user = "SELECT * FROM user_table WHERE user_name='$username'";
   $result = mysqli_query($con, $get_user);
   
   if ($result) {
       $row_fetch = mysqli_fetch_assoc($result);
       $user_id = $row_fetch['user_id'];
       // echo $user_id;
   } else {
       echo "Error in fetching data: " . mysqli_error($con);
   }

	?>

<div class="text-center">
	<h3 class="text-success">All My Orders</h3>
	<table class="table table-bordered mt-5">
		<thead >
			
				<th class="bg-warning">Sl no</th>
				<th class="bg-warning">Amount Due</th>
				<th class="bg-warning">Total products</th>
				<th class="bg-warning">Invoice number</th>
				<th class="bg-warning">Date</th>
				<th class="bg-warning">Complete/Incomplete</th>
				<th class="bg-warning">Status</th>

		</thead>
		<tbody>
			<?php   
			$number=0;
			$get_order_details="SELECT * FROM user_orders WHERE user_id=$user_id";
			$run_query=mysqli_query($con,$get_order_details);
			while($row_orders=mysqli_fetch_array($run_query))
			{
				$order_id=$row_orders['order_id'];
				$amount_due=$row_orders['amount_due'];
				$total_products=$row_orders['total_products'];
				$invoice_num=$row_orders['invoice_number'];
				$date=$row_orders['order_date'];
				$order_status=$row_orders['order_status'];
				if($order_status=='pending')
				{
					$order_status='Incomplete';
				}
				else
				{
					$order_status='Complete';
				}
                
                
                $number+=1;
				echo "
				   <tr>
				      <td class='bg-light'>$number</td>
				      <td class='bg-light'>$amount_due</td>
				      <td class='bg-light'>$total_products</td>
				      <td class='bg-light'>$invoice_num</td>
				      <td class='bg-light'>$date</td>
				      <td class='bg-light'>$order_status</td>
				      <td class='bg-light'> "; ?> <?php
				         if($order_status=='Complete')
				         {
				         	echo "Paid";
				         }
				         else
				         {
				         	echo "<a href='confirm_payment.php?order_id=$order_id' class='btn btn-secondary '>Confirm</a> 				</td> </tr>";
				         } 

				         ?>
				         

				
			<?php 	
			}

			?>

		</tbody>
	</table>
</div>

</body>
</html>