<?php
// including connect file
// include "./includes/connect.php";

  

// -------------------------get random products-------------------
function get_products()
{              
	            global $con;
               /// condition to check isset or not
	            if(!isset($_GET['category']) && !isset($_GET['search_data_product']))
	            {
	            	if(!isset($_GET['brand']))
	            	{
	             $select_query="SELECT * FROM products order by rand() limit 0,6";
                $result_query=mysqli_query($con,$select_query);


                while($row=mysqli_fetch_assoc($result_query))
                {
                	$product_id=$row['product_id'];
                	$product_title=$row['product_title'];
                	$product_description=$row['product_description'];
                	$product_image1=$row['product_image1'];
                	$product_price=$row['product_price'];

                	
                   echo 	"<div class='col-md-4 mb-2'><!--col-2-->
    				<div class='card' >
					  <img src='./admin/product_images/$product_image1' class='card-img-top' alt='...'>
					  <div class='card-body'>
					    <h5 class='card-title'>$product_title</h5>
					    <p>Price: $product_price /-</p>
					    <p class='card-text '>$product_description</p>
					    <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to cart</a>
					    <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View more</a>
					  </div>
					</div>
    			     </div> " ;
                }


	            	}////(!isset($_GET['brand']))

	            }///!isset($_GET['category']))


}


//-------------------------------- get all  products------------------------
function get_all_products()
{              
	            global $con;
               /// condition to check isset or not
	            if(!isset($_GET['category']) && !isset($_GET['search_data_product']))
	            {
	            	if(!isset($_GET['brand']))
	            	{
	             $select_query="SELECT * FROM products order by rand()";
                $result_query=mysqli_query($con,$select_query);


                while($row=mysqli_fetch_assoc($result_query))
                {
                	$product_id=$row['product_id'];
                	$product_title=$row['product_title'];
                	$product_description=$row['product_description'];
                	$product_image1=$row['product_image1'];
                	$product_price=$row['product_price'];

                	
                   echo 	"<div class='col-md-4 mb-2'><!--col-2-->
    				<div class='card' >
					  <img src='./admin/product_images/$product_image1' class='card-img-top' alt='...'>
					  <div class='card-body'>
					    <h5 class='card-title'>$product_title</h5>
					      <p>Price: $product_price /-</p>
					    <p class='card-text '>$product_description</p>
					    <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to cart</a>
					    <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View more</a>
					  </div>
					</div>
    			     </div> " ;
                }


	            	}////(!isset($_GET['brand']))

	            }


}

//-------------------------------------- unique categoreis
function get_unique_categories()
{              
	            global $con;
               /// condition to check isset or not
	            if(isset($_GET['category']))
	            {
	            
	             $category_id=$_GET['category'];
	             $select_query="SELECT * FROM products WHERE category_id=$category_id";	
                $result_query=mysqli_query($con,$select_query);

                $num_of_rows=mysqli_num_rows($result_query);
                if($num_of_rows==0)
                {
                	echo "
                    <div class='container-fluid'>
                    		<div class='alert alert-danger text-center'>
									<h3 class='text-danger'>No stock for this category<h3>
								</div>
                    </div>

                	";
                }
                 
                while($row=mysqli_fetch_assoc($result_query))
                {
                	$product_id=$row['product_id'];
                	$product_title=$row['product_title'];
                	$product_description=$row['product_description'];
                	$product_image1=$row['product_image1'];
                	$product_price=$row['product_price'];

                	
                   echo 	"<div class='col-md-4 mb-2'><!--col-2-->
    				<div class='card' >
					  <img src='./admin/product_images/$product_image1' class='card-img-top' alt='...'>
					  <div class='card-body'>
					    <h5 class='card-title'>$product_title</h5>
					      <p>Price: $product_price /-</p>
					    <p class='card-text '>$product_description</p>
					    <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to cart</a>
					    <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View more</a>
					  </div>
					</div>
    			     </div> " ;
                }


	            }


}

// --------------------------------------unique brands
function get_unique_brands()
{              
	            global $con;
               /// condition to check isset or not
	            if(isset($_GET['brand']))
	            {
	            
	             $brand_id=$_GET['brand'];
	             $select_query="SELECT * FROM products WHERE brand_id=$brand_id";
                $result_query=mysqli_query($con,$select_query);

                $num_of_rows=mysqli_num_rows($result_query);
                if($num_of_rows==0)
                {
                	echo "
                    <div class='container-fluid'>
                    		<div class='alert alert-danger text-center'>
									<h3 class='text-danger'>This brand is not avaliable for service<h3>
								</div>
                    </div>

                	";
                }

                while($row=mysqli_fetch_assoc($result_query))
                {
                	$product_id=$row['product_id'];
                	$product_title=$row['product_title'];
                	$product_description=$row['product_description'];
                	$product_image1=$row['product_image1'];
                	$product_price=$row['product_price'];

                	
                   echo 	"<div class='col-md-4 mb-2'><!--col-2-->
    				<div class='card' >
					  <img src='./admin/product_images/$product_image1' class='card-img-top' alt='...'>
					  <div class='card-body'>
					    <h5 class='card-title'>$product_title</h5>
					      <p>Price: $product_price /-</p>
					    <p class='card-text '>$product_description</p>
					    <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to cart</a>
					    <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View more</a>
					  </div>
					</div>
    			     </div> " ;
                }


	            }


}




// ----------------------------------search products
function search_products()
{              
	            global $con;
               /// condition to check isset or not
	            if(isset($_GET['search_data_product']))
	            {
	             $search_data=$_GET['search_data'];
	             $search_query="SELECT * FROM products WHERE product_keywords LIKE '%$search_data%' ";
                $result_query=mysqli_query($con,$search_query);
                $num_of_rows=mysqli_num_rows($result_query);
                if($num_of_rows==0)
                {
                	echo "
                    <div class='container-fluid'>
                    		<div class='alert alert-danger text-center'>
									<h3 class='text-danger'>No result match.No products found on this category!<h3>
								</div>
                    </div>

                	";
                }


                while($row=mysqli_fetch_assoc($result_query))
                {
                	$product_id=$row['product_id'];
                	$product_title=$row['product_title'];
                	$product_description=$row['product_description'];
                	$product_image1=$row['product_image1'];
                	$product_price=$row['product_price'];

                	
                   echo 	"<div class='col-md-4 mb-2'><!--col-2-->
    				<div class='card' >
					  <img src='./admin/product_images/$product_image1' class='card-img-top' alt='...'>
					  <div class='card-body'>
					    <h5 class='card-title'>$product_title</h5>
					      <p>Price: $product_price /-</p>
					    <p class='card-text '>$product_description</p>
					    <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to cart</a>
					    <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View more</a>
					  </div>
					</div>
    			     </div> " ;
                }


	         

	            }


}




/// --------------------for displaying in the sidebars

function brands()
{   
	global $con;
	         	$select_brands="SELECT * FROM brands";
         	$result_brands=mysqli_query($con,$select_brands);
         	
         	while ($row_data=mysqli_fetch_assoc($result_brands)) {
          $title=$row_data['brand_title'];
          $id=$row_data['brand_id'];
           echo " <li class='nav-item'>
         		<a href='index.php?brand=$id' class='nav-link text-light'>$title</a>
         	</li>";
           }
}

function categories()
{    
	global $con;
			         	$select_categories="SELECT * FROM categories";
		         	$result_categories=mysqli_query($con,$select_categories);
		         	
		         	while ($row_data=mysqli_fetch_assoc($result_categories)) {
		          $title=$row_data['category_title'];
		          $id=$row_data['category_id'];
		           echo " <li class='nav-item'>
		         		<a href='index.php?category=$id' class='nav-link text-light'>$title</a>
		         	</li>";
		           }
}



// -------------------------view details products-------------------
function view_details()
{              
	            global $con;
               /// condition to check isset or not
	            if(!isset($_GET['category']) && !isset($_GET['search_data_product']))
	            {
	            	if(!isset($_GET['brand']))
	            	{

	            	$product_id=$_GET['product_id'];	

	             $select_query="SELECT * FROM products WHERE product_id=$product_id";
                $result_query=mysqli_query($con,$select_query);


                while($row=mysqli_fetch_assoc($result_query))
                {
                	// $product_id=$row['product_id'];
                	$product_title=$row['product_title'];
                	$product_description=$row['product_description'];
                	$product_image1=$row['product_image1'];
                	$product_image2=$row['product_image2'];
                	$product_image3=$row['product_image3'];
                	$product_price=$row['product_price'];
                	$product_details=$row['product_details'];


                	
                   echo " <div class='row'>
                      <div class='text-center mb-2'><h1 class='fw-bold text-warning'>$product_title</h1>
                      <h6>$product_description</h6>
                      <h3 class='text-danger'><strong >Price: $product_price</strong>
                      </h3>

                     <a href='index.php?add_to_cart=$product_id' class='btn btn-warning'>Add to cart</a>
					       <a href='index.php' class='btn btn-danger'>Cancel</a>
                      </div>
    				<div class='col-md-4 mb-2'> 
	    				<div class='' >
						  <img src='./admin/product_images/$product_image1' class='card-img-top' alt='$product_image1'>
						  
						</div>
	    			</div>

	    			<div class='col-md-4 mb-2'> 
	    				<div class='' >
						  <img src='./admin/product_images/$product_image2' class='card-img-top' alt='$product_image2'>
			
						</div>
	    			</div>

	    			<div class='col-md-4 mb-2'> 
	    				<div class='' >
						  <img src='./admin/product_images/$product_image3' class='card-img-top' alt='$product_image3'>
						</div>
	    			</div>
                 <p class='text-center'>Product images</p>
	    			<div class='my-5'>
	    			<h4 >Product details:</h4>
	    				$product_details
	    			</div>

    			</div>  ";


    			// 				 echo " 
            //   <div class='container'>
				//  <div id='carouselExampleControlsNoTouching' class='carousel slide w-70' data-bs-touch='false' data-bs-interval='false'>
				//   <div class='carousel-inner'>
				//     <div class='carousel-item active'>
				//       <img src='./admin/product_images/$product_image1' class='w-50' alt=''>
				//     </div>
				//     <div class='carousel-item'>
				//       <img src='./admin/product_images/$product_image2' class=' w-50' alt=''>
				//     </div>
				//     <div class='carousel-item'>
				//       <img src='./admin/product_images/$product_image3' class='d-block w-50' alt=''>
				//     </div>
				//   </div>
				//   <button class='carousel-control-prev' type='button' data-bs-target='#carouselExampleControlsNoTouching' data-bs-slide='prev'>
				//     <span class='carousel-control-prev-icon' aria-hidden='true'></span>
				//     <span class='visually-hidden'>Previous</span>
				//   </button>
				//   <button class='carousel-control-next' type='button' data-bs-target='#carouselExampleControlsNoTouching' data-bs-slide='next'>
				//     <span class='carousel-control-next-icon' aria-hidden='true'></span>
				//     <span class='visually-hidden'>Next</span>
				//   </button>
				// </div>  
				//  </div>"; 



                }


	            	}////(!isset($_GET['brand']))

	            }///!isset($_GET['category']))


}



//// get ip address function
function getIPAddress() {
    // Check for shared internet/ISP IP
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
  
    }
    // Check for IP from a proxy or load balancer
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
  
    }
    // Use the remote address as a last resort
    else {
        $ip = $_SERVER['REMOTE_ADDR'];

    }
    return $ip;
}

/////////----------------- cart function

function cart()
{
	if(isset($_GET['add_to_cart']))
	{
     global $con;
     $ip=getIPAddress();
     $get_products_id=$_GET['add_to_cart'];

     $select_query="SELECT * FROM cart_details WHERE ip_address='$ip' and product_id=$get_products_id";
     $result_query=mysqli_query($con,$select_query);
     $num_of_rows=mysqli_num_rows($result_query);

     if($num_of_rows>0)
     {
     	echo "<script>alert('This iteam is already present inside the cart✋✋')</script>";
     	echo "<script>window.open('index.php','_self')</script>";
     }

     else{
     	$insert_query="INSERT INTO cart_details(product_id,ip_address,quantity)
     	values($get_products_id,'$ip',1)";
     	$result_query=mysqli_query($con,$insert_query);
     	echo "<script>alert('Item is added to cart 🛒✔️')</script>";
     	echo "<script>window.open('index.php','_self')</script>";
     }



	}


}

/////////----------------- function to get cart item numbers

function cart_item_number()
{
	if(isset($_GET['add_to_cart']))
	{
     global $con;
     $ip=getIPAddress();
     $get_products_id=$_GET['add_to_cart'];

     $select_query="SELECT * FROM cart_details WHERE ip_address='$ip'";
     $result_query=mysqli_query($con,$select_query);
     $count_cart_items=mysqli_num_rows($result_query);

   }

     else{
     global $con;
     $ip=getIPAddress();
     $select_query="SELECT * FROM cart_details WHERE ip_address='$ip'";
     $result_query=mysqli_query($con,$select_query);
     $count_cart_items=mysqli_num_rows($result_query);
     }

     echo $count_cart_items;



}




// ------------ total price --------

function total_cart_price()
{
	global $con;
	$get_id_address=getIPAddress();
	$total_price=0;
	$cart_query="SELECT * FROM cart_details WHERE ip_address='$get_id_address'";
	$result=mysqli_query($con,$cart_query);
	while($row=mysqli_fetch_array($result))
	{  
		$quantities = $row['quantity'];
		$product_id=$row['product_id'];
		//$product_quantity=$row['product_quantity'];
		$select_products="SELECT * FROM products WHERE product_id='$product_id'";
		$result_products=mysqli_query($con,$select_products);

		$row_product_price=mysqli_fetch_array($result_products);
		$product_price=array($row_product_price['product_price']);
		$product_price_sum=array_sum($product_price);
		// $total_price+=$product_price_sum;
		$total_price+=$product_price_sum*$quantities;





		// while ($row_product_price=mysqli_fetch_array($result_products)) {
					
		// $product_price=array($row_product_price['product_price']);
		// $product_price_sum=array_sum($product_price);
		// $total_price+=$product_price_sum;
		// }
		

	}

	echo $total_price;
}



// get user details--------------------
function get_user_details()
{
	global $con;
	$username=$_SESSION['username'];
	$get_details="SELECT * FROM user_table WHERE user_name='$username' ";
	$get_details_query=mysqli_query($con,$get_details);
	while($row=mysqli_fetch_array($get_details_query))
	{
		$user_id=$row['user_id'];

		if(!isset($_GET['edit_account']) AND !isset($_GET['my_orders']) AND !isset($_GET['delete_account']) )
		{
         $get_orders="SELECT * FROM user_orders WHERE user_id='$user_id' AND order_status='pending' ";
         $get_orders_query=mysqli_query($con,$get_orders);
         $row_count=mysqli_num_rows($get_orders_query);//-- for counting how many times the user order from this site.....
         // $orders_pending=0;
         // while ($orders=mysqli_fetch_array($get_orders_query)) {
         // 	$orders_pending+=$orders['total_products'];
         // }

         if($row_count>0)
         {
         	echo "<h3 class='text-center text-success'> You have <span class='text-danger'>$row_count</span>  pending orders</h3>
         	<p class='text-center'><a href='profile.php?my_orders' class='text-dar'>Order Details</a></p>";
         	
         }
         else
         {
         	echo "<h3 class='text-center text-success'> You have 0 pending orders</h3>
         	    <p class='text-center'><a href='../index.php' class='text-dar'>Explore products</a></p>";
         }
       
		}
		
	}
	
}


?>