<?php 
include './includes/connect.php';

include './function/all_function.php';
session_start();
if (!isset($_SESSION['name'])) {
    // Redirect to index.php
    header("Location: ./index.php");
    exit; // Make sure to exit after the redirection
}




    global $con;
        // Set session variables
        $department=$_SESSION['department'];
        $course_code=$_GET['course_code'];
    


    $select_query = "SELECT * FROM exam_question WHERE  course_code='$course_code'  AND department='$department' ";

    $runquery = mysqli_query($con, $select_query);

    $num_rows=mysqli_num_rows($runquery);
    if($num_rows>0)
    {
        $row = mysqli_fetch_assoc($runquery);

        $semester=$row['semester'];
        $final_question=$row['final_question'];
        $final_pdf=$row['final_pdf'];
        //echo $semester;
    
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
        <h3 class="text-monospace text-center">final Exam Question</h3><br>
            <div class="row rounded shadow" style="background-color: #faeeca;">
               
                <div class="col-md-12 m-5 row">

                        <div class="form-group col-md-3">
                                <label for="course_code" class="fw-bold ">Course Code:</label>
                                <strong class="text-secondary"><?php echo $course_code ?></strong>
                        </div>

                        <div class="form-group col-md-3">
                                <label for="course_code" class="fw-bold ">Semester:</label>
                                <strong class="text-secondary"><?php echo $semester ?></strong>
                        </div>

                        <div class="form-group col-md-3">
                                <label for="course_code" class="fw-bold ">Department:</label>
                                <strong class="text-secondary"><?php echo $department ?></strong>
                        </div>

                        <div class="col-md-6 my-3">
                           <label for="course_code" class="fw-bold ">final Exam:</label><br>
                            <strong class="text-secondary"><?php echo $final_question ?></strong> 
                        </div>

                        <div class="col-md-12 my-3 text-center">

                           <a href="../admin/uploads/exam_question/<?php echo $final_pdf; ?>" download class="fw-bold text-danger fs-4">Download Question Here</a><br>

                            
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





<!--- bootstrap JS link --->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
