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

$teacher_name = $_SESSION['name']; // You might want to dynamically set this

// SQL query to fetch presentations for the teacher
$query = "SELECT * FROM presentation WHERE teacher_name = ?";
$stmt = $con->prepare($query);
$stmt->bind_param('s', $teacher_name);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

$section=$row['section'];
$course_code=$row['course_code'];
$instruction=$row['presentation_instruction'];
$submission_link=$row['presentation_submission_link'];

$id=$_GET['id'];
// echo "<h1>$id</h1>";



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
            <h3 class="text-monospace text-center text-bold">presentation & Presentation</h3>

            <div class=" m-5 px-5 rounded row py-4" style='background:#bef7b2;'>
               <!-- -------- assignemnt-------- -->
              <div class="border border-secondary rounded p-4">
                <form method="post" action="" enctype="multipart/form-data">
                  <div class="row">
                  <p class="fw-bolder fs-5 text-center text-secondary">Edit presentation</p>               
                  </div>

                <div  class='col-md-12 row'>
                  <div class="col-md-4">
                  <label class="text-primary">Section</label>
                  <input type="text" class="form-control" name="section" value="<?php echo $section ?>" ><br>
                  </div>

                  <div class="col-md-4">
                  <label class="text-primary">Course Code</label>
                  <input type="text" class="form-control" name="course_code" value="<?php echo $course_code ?>" ><br>
                  </div>
                  
                </div>
                
                <div  class='col-md-12'>
                 <label class="text-primary">Instruction for presentation</label>
                 <textarea class="form-control"  rows="2" name="instruction" ><?php echo $instruction ?></textarea>
                </div><br>
                
                <div  class='col-md-12'>
                 <label class="text-primary">presentation submission link</label>
                 <input type="text" class="form-control" value="<?php echo $submission_link ?>" name='submission_link'><br>
                </div>
                  <button type="submit" class="btn btn-success mt-2" name="update">Update</button>
                 </form>
                </div>
            </div>



    	</div> <!------ end of main--->


    	
    </div>

  <?php 

  if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update'])) {
    // Collecting form data
    $section = $_POST['section'];
    $course_code = $_POST['course_code'];
    $instruction = $_POST['instruction'];
    $submission_link = $_POST['submission_link'];


    // Update query
    $query = "UPDATE presentation SET section = '$section', course_code = '$course_code', presentation_instruction = '$instruction', presentation_submission_link = '$submission_link'  WHERE id='$id' AND teacher_name ='$teacher_name' ";
    $run_query=mysqli_query($con,$query);
    

    if ($run_query) {
        echo '<div class="alert alert-success" role="alert">Update Successful!</div>';
    } else {
        echo '<div class="alert alert-danger" role="alert">Update Failed!</div>';
    }

    $stmt->close();
  }

  ?>



		<!----- last child-footer --->
        <?php
            include "./partials/footer.php";
        ?>


</div>            
</body>
</html>
