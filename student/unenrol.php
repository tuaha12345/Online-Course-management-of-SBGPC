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


.my_color {
            color: #00F0B8 !important; /* Change to whatever color you prefer */
        }
</style>

</head>
<body>

<div class="container-fluid p-0 " >

 <!---------- navbar----------->

     
    <div class="row " >
       
       <!---sidebar --->
         
        <div class="col-md-11  m-5 main ">
            <!-- <h3 class="text-monospace">SBPGC-OLC: Dashboard</h3> -->

            <!--row 1 courses-->
            <div class="row m-5 px-5 shadow  bg-white rounded d-flex justify-content-center" style="border:2px solid #00F0B8 ">
                   <h4 class="text-secondary my-4 text-center my_color">Are you sure to unenrol this course?</h4>    
   
                <div class="card m-5 " style="width: 48rem; background: transparent; border: none">
                  <div class="card-body d-flex justify-content-center">

                    <form method="post">
                    <a href='enrolled_course.php' class='btn btn-success'>No</a>
                     
                      <input type="submit" name="unenroll" value="YES" class="p-2 text-white btn" style="background:red; border:none; border-radius:5px">      
                    </form>
                  </div>
                </div>

       
            </div>
          
        </div>
       
    </div>

  
<?php

global $con;

            $code=$_GET['code'];
            $student_id=$_GET['student_id'];


    if(isset($_POST['unenroll']))
    {


            // $student_name = 'sayed';
            // $department = "CSE";
            // $student_id = "2023001";
            // $section = "B";
           
              
            $deleteQuery = "DELETE FROM student_course WHERE  student_id='$student_id' AND course_code='$code' ";                

            // Execute the query
            if (mysqli_query($con, $deleteQuery)) {
                 header("Location:enrolled_course.php");



            } else {

                echo "Error: " . mysqli_error($con);
            }

            // Close the database connection
            mysqli_close($con);


    }


?>  


        


</div>

</body>
</html>

