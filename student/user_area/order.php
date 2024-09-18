<?php 

include '../includes/connect.php';
include '../function/common_function.php';

if(isset($_GET['user_id']))
{  

	$user_id=$_GET['user_id'];
	//echo $user_id;
	if($user_id==null)
	{
     echo "<script>alert('Please Login!!!')</script>";
     echo "<script>window.open('user_login.php','_self')</script>";
	}

}



// getting totoal items and total price of all items

// $get_ip_adderss=getIPAddress();
// $total_price=0;
// $select_cart_items="SELECT * FROM cart_details WHERE ip_address='$get_ip_adderss' ";
// $cart_query=mysqli_query($con,$select_cart_items);
// $invoice_num=mt_rand();
// $status='pending';
// echo $invoice_num;
// $count_cart_items=mysqli_num_rows($cart_query);
// while ($row_price=mysqli_fetch_array($count_cart_items)) {
// 	// code...
// 	$product_price=array($row_price['product_price']);
// 	$product_price_sum=array_sum($product_price);
// 	$total_price+=$product_price_sum;
// }










// getting quantity form cart
// $get_cart="SELECT * FROM cart_details";
// $run_cart=mysqli_query($con,$get_cart);
// $get_item_quantity=mysqli_fetch_array($run_cart);
// $quantity=$get_item_quantity['quantity'];
// if($quantity=0)
// {
// 	$quantity=1;
// 	$subtotal=$total_price;
// }
// else{
// 	$quantity=$quantity;
// 	$subtotal=$total_price*$quantity;
// }




// my query............>


$invoice_num=mt_rand();
$status='pending';

	global $con;
	$get_id_address=getIPAddress();
	$total_price=0;
	$total_quantity=0;
	$cart_query="SELECT * FROM cart_details WHERE ip_address='$get_id_address'";
	$result=mysqli_query($con,$cart_query);
	while($row=mysqli_fetch_array($result))
	{  
		$quantities = $row['quantity'];
		$total_quantity=$total_quantity+$quantities;
		$product_id=$row['product_id'];
		
		$select_products="SELECT * FROM products WHERE product_id='$product_id'";
		$result_products=mysqli_query($con,$select_products);

		$row_product_price=mysqli_fetch_array($result_products);
		$product_price=array($row_product_price['product_price']);
		$product_price_sum=array_sum($product_price);

		$total_price+=$product_price_sum*$quantities;

    }




// insert into user_orders
$insert_orders="INSERT INTO user_orders(user_id,amount_due,invoice_number,total_products,order_date,order_status) VALUES ($user_id,$total_price,$invoice_num,$total_quantity,NOW(),'$status') ";
$result_query=mysqli_query($con,$insert_orders);
if($result_query)
{
	echo "<script>alert('Orders are submitted successfully')</script>";
	echo "<script>window.open('profile.php','_self')</script>";
}

//insert into order pending

$insert_orders_pending = "INSERT INTO orders_pending (user_id, invoice_number, product_id, quantity, order_status) VALUES ($user_id, $invoice_num, $product_id, $total_quantity, '$status')";

$result_order_pending_query=mysqli_query($con,$insert_orders_pending);


// delete items from cart 
$empty_cart="DELETE FROM cart_details WHERE ip_address='$get_id_address' ";
$delete_query=mysqli_query($con,$empty_cart);





?>