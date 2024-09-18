
<?php
 include './includes/connect.php';
 include('partials/css_link.php');
 session_start();
global $con;
$id=$_GET['id'];
$select="SELECT * FROM exam_question WHERE id=$id ";
$run=mysqli_query($con,$select);
$row=mysqli_fetch_assoc($run);


$course_code=$row['course_code'];
$department=$row['department'];
$semester=$row['semester'];
$mid_question=$row['mid_question'];
$final_question=$row['final_question'];
$mid_pdf=$row['mid_pdf'];
$final_pdf=$row['final_pdf'];    

?>


<div class="container-fluid p-0 " >

    <?php include('partials/navbar.php'); ?> <!-- Navbar -->

    <div class="row " style="background-color: #edf0ed;" >

        <?php include('partials/sidebar.php'); ?> <!-- Sidebar -->

        <div class="col-md-10  m-5 p-5 main rounded shadow" style="background-color: #ddfaca;">
            <h3 class="text-monospace">Eidt Exam Question</h3>
            <!------ form-------------->

             <form method="post"  enctype="multipart/form-data">

            <div class="modal-body row">
                <div class="mb-3 col-md-3">
                        <label class="form-label">Course Code</label>
                        <input type="text" class="form-control" name="course_code" value="<?php echo $course_code; ?>">
                </div>
                <div class="mb-3 col-md-3">
                        <label class="form-label">Department</label>
                        <input type="text" class="form-control" name="department" value="<?php echo $department; ?>">
                </div>
                <div class="mb-3 col-md-3">
                        <label class="form-label">Semester</label>
                        <input type="text" class="form-control" name="semester" value="<?php echo $semester; ?>">
                </div>
                <div class="mb-3 col-md-10">
                        <label class="form-label">Mid Questions</label>
                        <input type="text" class="form-control" name="mid_question" value="<?php echo $mid_question; ?>">
                </div> 
                <div class="mb-3 col-md-10">
                        <label class="form-label">Mid PDF</label>
                        <input type="file" class="form-control" name="mid_pdf" >
                </div>
                <div class="mb-3 col-md-10">
                        <label class="form-label">Final Questions</label>
                        <input type="text" class="form-control" name="final_question" value="<?php echo $final_question; ?>">
                </div> 

                <div class="mb-3 col-md-10">
                        <label class="form-label">Final PDF</label>
                        <input type="file" class="form-control" name="final_pdf" >
                </div>
                
            </div>
            <div class="">
                <input type="submit" class="btn text-white" style="background-color:#32a852;" name="save" value="Save">

            </div>

            </form>
            <!------ form-------------->
            
        </div>
    </div>
    <?php include "./partials/footer.php"; ?>
</div>    


<!-------------------------------------- php code-------------------------->

<?php


    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['save'])) {
        // Get form data
        $id = $_GET['id'];
        $course_code = $_POST['course_code'];
        $department = $_POST['department'];
        $semester = $_POST['semester'];
        $mid_question = $_POST['mid_question'];
        $final_question = $_POST['final_question'];
        

        //-------------------------------------testttttttttttt
        // File upload handling for PDF
        $mid_pdf = $_FILES['mid_pdf']['name'];
        $mid_pdf_Tmp = $_FILES['mid_pdf']['tmp_name'];
        $mid_pdf_Destination = "uploads/exam_question/" . $mid_pdf;

        move_uploaded_file($mid_pdf_Tmp, $mid_pdf_Destination);

        $final_pdf = $_FILES['final_pdf']['name'];
        $final_pdf_tmp = $_FILES['final_pdf']['tmp_name'];
        $final_pdf_destination = "uploads/exam_question/" . $final_pdf;
        
        move_uploaded_file($final_pdf_tmp, $final_pdf_destination);
        

            // Update query
            $sql = "UPDATE exam_question SET 
                    course_code = '$course_code', 
                    department = '$department', 
                    semester = '$semester', 
                    mid_question = '$mid_question', 
                    final_question = '$final_question',
                    mid_pdf='$mid_pdf',
                    final_pdf='$final_pdf'
                     WHERE id = $id
                    ";


        // Execute the update query
        if (mysqli_query($con, $sql)) {
           // echo "Record updated successfully";
           //header('location: all_exam_question.php' );
        } else {
           // echo "Error updating record: " . mysqli_error($con);
        }
    }
?>
