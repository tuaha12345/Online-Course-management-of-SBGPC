<?php 
include './includes/connect.php';
include './function/all_function.php';
session_start();
if (!isset($_SESSION['name'])) {
  // Redirect to index.php
  header("Location: ../index.php");
  exit; // Make sure to exit after the redirection
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
            <h3 class="text-monospace text-center text-bold">Assignment & Presentation</h3>


            <div class=" m-5 px-5 rounded row py-4" style='background:#ddeaeb;'>
                <p class="fw-bolder fs-4 text-center" style="color:#2e7874">Navigation Link</p>

                 <!-- -------- assignemnt-------- -->
                <div class="border border-secondary rounded p-4">
                <form method="post" action="" enctype="multipart/form-data">
                  <div class="row">
                  <p class="fw-bolder fs-5 text-center text-secondary">Assignment</p>
                  <div class="d-flex justify-content-end">
                  <a href="all_assignment.php"class="text-end btn btn-secondary text-white"><i class="bi bi-eye"></i> All Assignment</a>
                  </div>
                  
                  </div>

                <div  class='col-md-12 row'>
                  <div class="col-md-4">
                  <label class="text-primary">Assignment no</label>
                  <input type="text" class="form-control" name="assignment_no" placeholder="Ex-ASN1" required><br>
                  </div>

                  <div class="col-md-4">
                  <label class="text-primary">Section</label>
                  <input type="text" class="form-control" name="section" placeholder="Ex-A" required><br>
                  </div>

                  <div class="col-md-4">
                  <label class="text-primary">Course Code</label>
                  <input type="text" class="form-control" name="course_code" placeholder="Ex-CSE111" required><br>
                  </div>
                  
                </div>
                
                <div  class='col-md-12'>
                 <label class="text-primary">Instruction for Assignment</label>
                 <textarea class="form-control"  rows="2" name="assignment_instruction" required></textarea>
                </div><br>
                <div class="col-md-12">
                    <label class="text-primary">Upload pdf</label>
                    <input type="file" class="form-control" name="assignment_pdf" required><br>
                </div>
                <div  class='col-md-12'>
                 <label class="text-primary">Assignment submission link</label>
                 <input type="text" class="form-control" name="assignment_submission_link" required><br>
                </div>
                  <button type="submit" class="btn btn-primary mt-2" name="assignment_submit">Submit</button>
                 </form>
                </div>
                <?php 
               // Call the function to handle form submission
                    handleAssignmentForm();
                 ?>



                 <!-- presenataion -->
                <div class="border border-secondary rounded p-4 my-5">

                <form method="post" action="" enctype="multipart/form-data">
                <p class="fw-bolder fs-5 text-center text-secondary">Presentation</p>
                <div class="d-flex justify-content-end">
                  <a href="all_presentation.php"class="text-end btn btn-secondary text-white"><i class="bi bi-eye"></i> All Presenation</a>
                </div>

                <div  class='col-md-12 row'>
                  <div class="col-md-4">
                  <label class="text-primary">Section</label>
                  <input type="text" class="form-control" name="section" placeholder="Ex-A" required><br>
                  </div>

                  <div class="col-md-4">
                  <label class="text-primary">Course Code</label>
                  <input type="text" class="form-control" name="course_code" placeholder="Ex-CSE111" required><br>
                  </div>
                  
                </div>

                <div  class='col-md-12'>
                 <label class="text-primary">Instruction for Presentation</label>
                 <textarea class="form-control"  rows="2" name="presentation_instruction"></textarea>
                </div><br>
                <div  class='col-md-12'>
                 <label class="text-primary">Presenation submission link</label>
                 <input type="text" class="form-control" name="presentation_submission_link"><br>
                </div>
                  <button type="submit" class="btn btn-primary mt-2" name="presentation_submit">Submit</button>
                 </form>

                </div>

                <?php
                  $teacher_name=$_SESSION['name'];

                  handlePresentationForm($teacher_name);
                ?>

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
