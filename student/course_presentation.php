<?php 
include './includes/connect.php';
include './function/all_function.php';
session_start();
if (!isset($_SESSION['student_username'])) {
    // Redirect to index.php
    header("Location: ../index.php");
    exit; // Make sure to exit after the redirection
}
global $con;

$course_code=$_GET['c_code'];
$section=$_GET['sec'];
$teacher_name=$_GET['t_name'];

// SQL query to fetch assignments for the teacher
$query = "SELECT * FROM presentation WHERE teacher_name ='$teacher_name' AND course_code='$course_code' AND section='$section'  ";

$run=mysqli_query($con,$query);

$num_rows=mysqli_num_rows($run);
if($num_rows>0)
{
  $row=mysqli_fetch_assoc($run);

 $instruction=$row['presentation_instruction'];
 $submission_link=$row['presentation_submission_link'];
}

else{
  // echo "<h3>No presentation added...</h3>";
  header("Location: index.php");
  exit;
 }










?>
<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
	<?php   include('partials/css_link.php'); ?>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
<div class="container-fluid p-0 " >

<?php   include('partials/navbar.php'); ?> <!---------- navbar----------->

     
    <div class="row " style="background-color: #edf0ed;" >
       
       <?php   include('partials/sidebar.php'); ?> <!---sidebar --->


         
    	<div class="col-md-10  m-5 main ">
            <h3 class="text-monospace text-center text-bold text-secondary">Presentaion </h3>

            <!-- <div class=" m-5 px-5 rounded row py-4" style='background:#bef7b2;'> -->
            <div class=" m-5 px-5 rounded row py-4" style='background:#caecfa;'>
               <!-- -------- assignemnt-------- -->
              <div class="border border-secondary rounded p-4">
                

                <div  class='col-md-12 row'>
                  <div class="col-md-10">
                  <label class="text-primary">Presentaion Instruction</label>
                  <p class="text-secondary"><?php echo $instruction; ?></p>
                  </div>

                  <div class="col-md-4">
                  <label class="text-primary">Section: <strong class="text-secondary"><?php echo $section; ?></strong></label>
                  </div>

                  <div class="col-md-4">
                  <label class="text-primary">Coruse Code: <strong class="text-secondary"><?php echo $course_code; ?></strong></label>
                  </div>
                  <div class="col-md-4">
                  <label class="text-primary">Course Teacher: <strong class="text-secondary"><?php echo $teacher_name; ?></strong></label>
                  </div>
                  
                </div>
                 <br>


                <div  class='col-md-12'>
                 <label class="text-primary">Assignment submission link: </label><br>
                 <a href="<?php echo $submission_link ?>" class='text-danger' target="_blank"><?php echo $submission_link ?></a>
                 
                </div>
                 
                 
                </div>
            </div>



    	</div> <!------ end of main--->


    	
    </div>





		<!----- last child-footer --->
        <?php
            include "./partials/footer.php";
        ?>


</div>            
</body>
</html>
