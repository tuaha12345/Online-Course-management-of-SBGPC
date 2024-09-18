<?php
include './includes/connect.php';
global $con;

if(isset($_GET['delete_id']))
{   

	$id = $_GET['delete_id'];
	$teacher_name = $_GET['teacher_name'];  

	    $checkQuery = "SELECT * FROM teacher WHERE id='$id'";
    $checkResult = mysqli_query($con, $checkQuery);
    $numOfRows = mysqli_num_rows($checkResult);

    if($numOfRows>0){
	$q = "DELETE FROM teacher WHERE id='$id'";
	$run = mysqli_query($con, $q);
	if($run)
	{
		header('location: all_teachers.php?delete_msg=  has removed from SBPGC-OLC&teacher_name='.$teacher_name );
	}

   }



}



?>