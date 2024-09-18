
<?php
include "../includes/connect.php";

	$user_session_name=$_SESSION['username'];

	$select_query="SELECT * FROM user_table WHERE user_name='$user_session_name' ";
	$result_query=mysqli_query($con,$select_query);
	$row_fetch=mysqli_fetch_assoc($result_query);
	$user_id=$row_fetch['user_id'];
	$user_name=$row_fetch['user_name'];
	$user_email=$row_fetch['user_email'];
	$user_address=$row_fetch['user_address'];
	$user_mobile=$row_fetch['user_mobile'];
	$user_img=$row_fetch['user_image'];



if(isset($_POST['submit']))
{


			$update_id=$user_id;
			$user_name=$_POST['user_username'];
			$user_email=$_POST['user_email'];
			$user_address=$_POST['user_address'];
			$user_mobile=$_POST['user_mobile'];

	$filename=$_FILES['filename']['name'];
	$tmp_loc=$_FILES['filename']['tmp_name'];
	$uploc='user_image/';

	if(!empty($filename))
	{
		move_uploaded_file($tmp_loc,$uploc.$filename);
		// echo "<script>window.open('user_logout.php','_self')</script>";
	}
	else
	{  
		$filename=$user_img;
	    move_uploaded_file($tmp_loc,$uploc.$filename);
	}

$update_data="UPDATE `user_table` SET `user_name`='$user_name',`user_email`='$user_email',`user_image`='$filename',`user_address`='$user_address',`user_mobile`='$user_mobile' WHERE `user_id`=$update_id ";
 $result_query_update=mysqli_query($con,$update_data);
/////////////////////////---------------------------

if($result_query)
{   
	echo "<script>alert('Data updated successfully!!!✅✅✅')</script>";
	echo "<script>window.open('user_logout.php','_self')</script>";
}




}


?>
<form action="" method="post" enctype="multipart/form-data" class="my-3">

	    <div class="form-outline mb-4 w-50 m-auto ">
	    	<label class="fw-bold text-secondary">Your Name:</label>
    		<input type="text" name="user_username" class="form-control " value="<?php echo $user_name; ?>">
    	</div>

    	<div class="form-outline mb-4 w-50 m-auto ">
    		<label class="fw-bold text-secondary">Your Email:</label>
    		<input type="email" name="user_email" class="form-control " value="<?php echo $user_email; ?>">
    	</div>

    	<div class="form-outline mb-4 w-50 m-auto ">
    		<label class="fw-bold text-secondary">Your Mobile:</label>
    		<input type="text" name="user_mobile" class="form-control " value="<?php echo $user_mobile; ?>">
    	</div>  

     	<div class="form-outline mb-4 w-50 m-auto ">
     		<label class="fw-bold text-secondary">Your address:</label>
    		<input type="text" name="user_address" class="form-control " value="<?php echo $user_address; ?>">
    	</div>   



	    <div class="form-outline mb-4 w-50 m-auto d-flex">
	        <input type="file" name="filename" class="form-control">
	        <img src="./user_image/<?php echo $user_img; ?>" class="edit_img">
	    </div>



    <div class="text-center">
        <input type="submit" name="submit" value="Update" class="btn btn-warning">
    </div>
</form>


