<div class="text-center">
<h3 class="text-danger">Delete Account</h3>
<form method="post" class="mt-5">
	<div class="form-outline mb-4">
		<input type="submit" name="delete" value="Delete Account" class="form-control w-50 m-auto">
	</div>
	<div class="form-outline mb-4">
		<input type="submit" name="do_not_delete" value="Don't Delete Account" class="form-control w-50 m-auto">
	</div>
</form>
</div>

<?php
$username_session=$_SESSION['username'];
if(isset($_POST['delete']))
{
	$delete_query="DELETE FROM user_table WHERE user_name='$username_session' ";
	$result=mysqli_query($con,$delete_query);
	if($result)
	{
		session_destroy();
		echo "<script>alert('Account Delete Successfully!')</script>";
		echo "<script>window.open('../index.php','_self')</script>";
	}
}
if(isset($_POST['do_not_delete']))
{  
           
		 echo "<script>window.open('profile.php','_self')</script>";


}

?>	