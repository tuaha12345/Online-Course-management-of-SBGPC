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

// SQL query to fetch assignments for the teacher
$query = "SELECT * FROM assignment WHERE teacher_name = ?";
$stmt = $con->prepare($query);
$stmt->bind_param('s', $teacher_name);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

$assignment_no=$row['assignment_no'];
$section=$row['section'];
$course_code=$row['course_code'];
$instruction=$row['assign_instruction'];
$upload_file=$row['pdf'];
$submission_link=$row['assign_sub_link'];

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
            <h3 class="text-monospace text-center text-bold">Assignment & Presentation</h3>

            <div class=" m-5 px-5 rounded row py-4" style='background:#bef7b2;'>
               <!-- -------- assignemnt-------- -->
              <div class="border border-secondary rounded p-4">
                <form method="post" action="" enctype="multipart/form-data">
                  <div class="row">
                  <p class="fw-bolder fs-5 text-center text-secondary">Edit Assignment</p>               
                  </div>

                <div  class='col-md-12 row'>
                  <div class="col-md-4">
                  <label class="text-primary">Assignment no</label>
                  <input type="text" class="form-control" name="assignment_no" value="<?php echo $assignment_no ?>"><br>
                  </div>

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
                 <label class="text-primary">Instruction for Assignment</label>
                 <textarea class="form-control"  rows="2" name="instruction" ><?php echo $instruction ?></textarea>
                </div><br>
                <div class="col-md-12">
                    <label class="text-primary">Upload pdf</label>
                    <input type="file" class="form-control" value="<?php echo $upload_file ?>" name="pdf_file" required><br>
                </div>
                <div  class='col-md-12'>
                 <label class="text-primary">Assignment submission link</label>
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
    $assignment_no = $_POST['assignment_no'];
    $section = $_POST['section'];
    $course_code = $_POST['course_code'];
    $instruction = $_POST['instruction'];
    $submission_link = $_POST['submission_link'];
        // File upload handling for PDF
        $filename = $_FILES['pdf_file']['name'];
        $filetmp = $_FILES['pdf_file']['tmp_name'];
        $pdfFileDestination = "uploads/assignments/" . $filename ;

    //-------------------- pdf upload -------------------------------
    // File upload logic
    if (isset($_FILES['pdf_file']) && $_FILES['pdf_file']['error'] == 0) {
      $allowed = ['pdf']; // which file types are allowed
      //$filename = $_FILES['pdf_file']['name'];
      //$filetmp = $_FILES['pdf_file']['tmp_name'];
      $ext = pathinfo($filename, PATHINFO_EXTENSION);
      //move_uploaded_file($filetmp, $pdfFileDestination);
      if (in_array($ext, $allowed)) {
          $newPath = 'uploads/assignments/' . $filename; // Ensure 'uploads' directory is writable
          if (move_uploaded_file($filetmp, $newPath)) {
              echo '<div class="alert alert-success" role="alert">File uploaded successfully.</div>';
               $upload_file = $newPath; // Update the file path to store in the database
          } else {
              echo '<div class="alert alert-danger" role="alert">File upload failed.</div>';
          }
      } else {
          echo '<div class="alert alert-danger" role="alert">Invalid file type. Only PDF files are allowed.</div>';
      }
  } 

  //---------------------------------------------------------------


    // Update query
    $query = "UPDATE assignment SET section = '$section', course_code = '$course_code', assign_instruction = '$instruction', assign_sub_link = '$submission_link', pdf ='$filename',assignment_no = '$assignment_no'  WHERE id='$id' AND teacher_name ='$teacher_name' ";
    $run_query=mysqli_query($con,$query);
    
    // Update query
    
    // $query = "UPDATE assignment SET section = ?, course_code = ?, assign_instruction = ?, assign_sub_link = ?,pdf =?, assignment_no = ?  WHERE id=? AND teacher_name = ?";
    // $stmt = $con->prepare($query);
    // $stmt->bind_param('ssssssss', $section, $course_code, $instruction, $submission_link,$filename, $assignment_no, $teacher_name, $id);
    // $execute = $stmt->execute();

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
