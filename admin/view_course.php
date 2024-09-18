<?php 
include './includes/connect.php';
include './function/all_function.php';
session_start();
if (!isset($_SESSION['name'])) {
  // Redirect to index.php
  header("Location: ../index.php");
  exit; // Make sure to exit after the redirection
}
global $con;
?>

<?php

     include './includes/connect.php';

if(isset($_GET['view_id']))
{   

	$id = $_GET['view_id'];
	

	    $checkQuery = "SELECT * FROM admin_course WHERE id='$id'";
    $checkResult = mysqli_query($con, $checkQuery);
    $numOfRows = mysqli_num_rows($checkResult);
    $row=mysqli_fetch_assoc($checkResult);

    
    $course_code = $row['course_code'];  
    $course_credit = $row['credit']; 
    $course_title = $row['course_title']; 
    
    $for_teacher = "SELECT * FROM courses WHERE course_code='$course_code'";
    $runquery=mysqli_query($con, $for_teacher);
    $teacher_names = array();
    while($row_teacher=mysqli_fetch_array($runquery))
    {
    	$teacher_names[]=$row_teacher['teacher_name'];
    }

    $select_student= "SELECT * FROM student_course WHERE course_code='$course_code' ";
    $run_select_student=mysqli_query($con,$select_student);
    $num_enrolled_student=mysqli_num_rows($run_select_student);



}

?>
<!DOCTYPE html>
<html>
<head>
	<?php   include('partials/css_link.php'); ?>
    <!--------- custom css-------->
        <style>
        @keyframes moveUpDown {
            0%, 100% {
                transform: translateY(0);
            }
            50% {
                transform: translateY(-10px);
            }
        }

        .moving-icon {
            animation: moveUpDown 1s infinite; /* You can adjust the animation duration */
        }
    </style>


</head>
<body>


<div class="container-fluid p-0 " >

<?php   include('partials/navbar.php'); ?> <!---------- navbar----------->

     
    <div class="row " style="background-color: #edf0ed;" >
       
       <?php   include('partials/sidebar.php'); ?> <!---sidebar --->


         
    	<div class="col-md-10  m-5 main ">
            <h3 class="text-monospace text-center text-secondary">Course Details</h3>
            




<!-----------1st row --------------------------->
<div class="row m-5 px-5 pb-5 rounded justify-content-center  rounded">
           

    <div class="card shadow p-3 mb-5 bg-body rounded" style="width: 108rem;">
	  <div class="card-body row">

	    <h3 class="card-title text-info text-center col-md-12"><?php echo $course_title ?>(<span class='text-muted'><?php echo $course_code ?></span>)</h3><br><br><br>

	    <h5 class="card-subtitle mb-2 text-success col-md-6 text-center">Course teacher: <span class='text-muted'>
	    	<?php
	    	   foreach ($teacher_names as $t_name) {
                   echo "($t_name) ";
                 }
             ?></span></h5>

	    <h5 class="card-subtitle mb-2 text-success col-md-6 text-center">Course Credit: <span class='text-muted'><?php echo $course_credit
	     ?> </span></h5> 

        <br><br><br>

	    <h5 class="card-subtitle mb-2 text-success col-md-6 text-center">Total Enrolled Students: <span class='text-muted'><?php echo $num_enrolled_student ; ?> </span>
	    </h5>
	    <h5 class="card-subtitle mb-2 text-success col-md-6 text-center">
	    	<i class="fas fa-user-graduate"><sup> <?php echo $num_enrolled_student ; ?></sup></i>

	    </h5>
	    
	  </div>
	</div>





</div> <!------ end of row1----->















    	</div> 


    	
    </div>





		<!----- last child-footer --->
        <?php
            include "./partials/footer.php";
        ?>


</div>




<!--- bootstrap JS link --->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>



