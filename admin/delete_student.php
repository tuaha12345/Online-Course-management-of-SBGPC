<?php
include './includes/connect.php';
global $con;

if(isset($_GET['delete_id']))
{   

	$id = $_GET['delete_id'];
	$student_name = $_GET['student_name'];  

	    $checkQuery = "SELECT * FROM student WHERE id='$id'";
    $checkResult = mysqli_query($con, $checkQuery);
    $numOfRows = mysqli_num_rows($checkResult);

    if($numOfRows>0){
	$q = "DELETE FROM student WHERE id='$id'";
	$run = mysqli_query($con, $q);
	if($run)
	{
		header('location: all_students.php?delete_msg=  has removed from SBPGC-OLC&teacher_name='.$student_name );
	}

   }



}



?>