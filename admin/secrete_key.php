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

$selectQuery = "SELECT * FROM secrete_key";
$result = mysqli_query($con, $selectQuery);

// Check if there are any rows returned
if (mysqli_num_rows($result) > 0) {
    // Fetch the data from the result set
    $row = mysqli_fetch_assoc($result);
    $adminKey = $row['admin_key'];
    $teacherKey = $row['teacher_key'];
    $studentKey = $row['student_key'];
} 

?>
<!DOCTYPE html>
<html>
<head>
	<?php   include('partials/css_link.php'); ?>

    <style>
.dot {
  height: 25px;
  width: 25px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
}


::placeholder {
            color: #00F0B8 !important; /* Change to whatever color you prefer */
        }
</style>

</head>
<body>


<div class="container-fluid p-0 " >

<?php   include('partials/navbar.php'); ?> <!---------- navbar----------->

     
    <div class="row " style="background-color: #edf0ed;" >
       
       <?php   include('partials/sidebar.php'); ?> <!---sidebar --->


         
    	<div class="col-md-10  m-5 main">
            <h3 class="text-monospace">SECRETE KEY <i class="fas fa-key text-danger"></i></h3>

    		<!--row 1 courses-->
    		<div class="row m-5 px-5 shadow rounded " style="background-color:#454747">
                   


<div class="card m-5 " style="width: 48rem; background: transparent; border: none">
  <div class="card-body">
    <form method="post">

      <div class="form-group">
        <label class="fs-5" style="color: #00C8F0;">Key for Admin: </label>
        <input type="text" class="form-control " value=<?php echo $adminKey; ?> style="background:transparent; border: 2px solid #00C8F0; color:#00C8F0" name="admin_key">

      </div><br><br>

      <div class="form-group">
        <label class="fs-5" style="color: #00C8F0;">Key for Teacher: </label>
        <input type="text" class="form-control " value=<?php echo $teacherKey; ?> style="background:transparent; border: 2px solid #00C8F0; color:#00C8F0" name="teacher_key">

      </div><br><br>

      <div class="form-group">
        <label class="fs-5" style="color: #00C8F0;">Key for Student: </label>
        <input type="text" class="form-control " value=<?php echo $studentKey; ?> style="background:transparent; border: 2px solid #00C8F0; color:#00C8F0" name="student_key">
      </div><br>

      <input type="submit" name="set_key" value="SET KEY" class="p-2 fw-bolder" style="background:#00C8F0; border:none; border-radius:5px">      
    </form>
  </div>
</div>


            </div><!----- end of row1---->

    	</div><!----- end of main---->


    	
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

<?php


if (isset($_POST['set_key'])) {
    // Retrieve form data
    $adminKey = $_POST['admin_key'];
    $teacherKey = $_POST['teacher_key'];
    $studentKey = $_POST['student_key'];

    // Sanitize input data if necessary

    // Prepare the SQL statement to insert data into the secrete_key table
    $insertQuery = "UPDATE secrete_key  SET admin_key='$adminKey', teacher_key='$teacherKey', student_key='$studentKey' WHERE id=1";

    // Execute the SQL query
    $insertResult = mysqli_query($con, $insertQuery);

    if ($insertResult) {
        // Data insertion successful
        echo "<script>alert('Secret keys have been set successfully');</script>";
    } else {
        // Error in data insertion
        echo "<script>alert('Error setting secret keys');</script>";
    }
}
?>

