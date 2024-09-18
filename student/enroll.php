<?php 
include './includes/connect.php';
session_start();
if (!isset($_SESSION['student_username'])) {
    // Redirect to index.php
    header("Location: ../index.php");
    exit; // Make sure to exit after the redirection
}
?>
<!DOCTYPE html>
<html>
<head>
    <?php   include('partials/css_link.php'); ?>
<style>


::placeholder {
            color: #00F0B8 !important; /* Change to whatever color you prefer */
        }
</style>

</head>
<body>
    
<div class="container-fluid p-0 " >

 <!---------- navbar----------->

     
    <div class="row " style="background-color: #edf0ed;" >
       
       <!---sidebar --->
         
        <div class="col-md-10  m-5 main ">
            <!-- <h3 class="text-monospace">SBPGC-OLC: Dashboard</h3> -->

            <!--row 1 courses-->
            <div class="row m-5 px-5 shadow  bg-white rounded">
                   <h4 class="text-secondary my-4 text-center ">Enroll this course</h4>    
   
                <div class="card m-5 " style="width: 48rem; background: transparent; border: none">
                  <div class="card-body">
                    <form method="post">

                      <div class="form-group">
                        <label class="fs-5" style="color: #00C8F0;">Enter Course Enroll Key: </label>
                        <input type="text" class="form-control "  style="background:transparent; border: 2px solid #00C8F0; color:#00C8F0" name="enroll_key">

                      </div><br>

                      <input type="submit" name="set_key" value="SET KEY" class="p-2 text-white" style="background:#00C8F0; border:none; border-radius:5px">      
                    </form>
                  </div>
                </div>

       
            </div>
          
        </div>
       
    </div>

  
<?php

global $con;

$code=$_GET['code'];

   $select_query_key = "SELECT * FROM admin_course WHERE  course_code='$code' ";
    $run_query_key = mysqli_query($con, $select_query_key);
    $row_key = mysqli_fetch_assoc($run_query_key);
    $get_enroll_key=$row_key['enroll_key'];

    //echo "<h1>$get_enroll_key</h1>";

    if(isset($_POST['set_key']))
    {
        $post_enroll_key=$_POST['enroll_key'];

        if($post_enroll_key==$get_enroll_key)
        {
           echo "<h1>$get_enroll_key</h1>"; 
           
            // Assuming you have received values via a form or some other means
            
            $course_code=$_GET['code'];
            $course_img=$_GET['course_img'];
            $teacher_name=$_GET['t_name'];
           


            $student_name = $_SESSION['student_username'];
            $department = $_SESSION['student_department'];
            $student_id = $_SESSION['student_id'];
            $section = $_SESSION['student_section'];
            //$student_name = 'sayed';
            // $department = 'CSE';
            // $student_id = '123';
            // $section ='B';
            $accessed_time = date("Y-m-d H:i:s"); // Assuming you want to insert the current timestamp

            // Construct the INSERT query
            $insert_query = "INSERT INTO student_course (student_name, department, student_id, section,course_code,course_img,accessed_time) 
                             VALUES ('$student_name', '$department', '$student_id', '$section','$course_code','$course_img','$accessed_time')";

            // Execute the query
            if (mysqli_query($con, $insert_query)) {
                 header("Location:courses.php?course_code=$course_code&teacher_name=$teacher_name&section=$section&course_img=$course_img");



            } else {

                echo "Error: " . mysqli_error($con);
            }

            // Close the database connection
            mysqli_close($con);


        }

        else {


            echo "<script>alert('Your enrollment key is not correct! Please try again')</script>"; 
        }

    }


?>  


        


</div>





<!--- bootstrap JS link --->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>

