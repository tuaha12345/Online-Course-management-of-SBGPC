<?php

$con=mysqli_connect('localhost','root','','test');
if($con)
{
	// echo "connection successful";

}
else{
	die(mysqli_error($con));
}






?>