
<?php
include './includes/connect.php';
global $con;

if(isset($_GET['delete_id']))
{   


	$id = $_GET['delete_id'];
	$course_code = $_GET['course_code'];  

	    $checkQuery = "SELECT * FROM admin_course WHERE id='$id'";
    $checkResult = mysqli_query($con, $checkQuery);
    $numOfRows = mysqli_num_rows($checkResult);


    if($numOfRows>0){
	$q = "DELETE FROM admin_course WHERE id='$id'";
	$run = mysqli_query($con, $q);
	if($run)
	{
		header('location: all_courses.php?delete_msg= course has  delected &c_code='.$course_code );
	}

   }



}


?>


