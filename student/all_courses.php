<?php 
include './includes/connect.php';
include './function/all_function.php';
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

</head>
<body>


<div class="container-fluid p-0 " >

<?php   include('partials/navbar.php'); ?> <!---------- navbar----------->

     
    <div class="row " style="background-color: #edf0ed;" >
       
       <?php   include('partials/sidebar.php'); ?> <!---sidebar --->


         
        <div class="col-md-10  m-5 main">
            <h3 class="text-monospace">SBPGC-OLC: Dashboard</h3>

            <!--row 1 courses-->
            <div class="row m-5 px-5 shadow  bg-white rounded">
                <div class="row col-md-12">
                <div class="col-md-8 my-3">
                   <h4 class="text-secondary my-4">All courses</h4> 
                </div>
                <div class="col-md-4 d-flex align-items-center my-3">
                      <form class="d-flex"  method="post"  role="search">
                        <input class="form-control " type="search" placeholder=" Search" aria-label="Search" name="search_data">                
                        <button class="btn " type="submit" name="search">
                            <i style="font-size:20px" class="fa">&#xf002;</i>
                        </button>                             
                      </form>
                </div>
                </div>    

               <?php 
                   global $con;
                   $num_rows=0;
                   if (isset($_POST['search'])) {
                    $search_data = mysqli_real_escape_string($con, $_POST['search_data']); // Prevent SQL injection

                    $select_search_query = "SELECT * FROM admin_course WHERE course_title LIKE '%$search_data%'";
                    $run_this_query = mysqli_query($con, $select_search_query);
                    $num_rows=mysqli_num_rows($run_this_query);
                    //echo $num_rows;
                    if($num_rows>0)
                    { 
                       while($search_row=mysqli_fetch_array($run_this_query))
                       {
                         $code=$search_row['course_code'];
                         search_all_courses($code);
                       }
                    }
                    else
                    {
                        echo "<p class='my-4 text-center text-danger fs-5'>No Courses Found!!!</p>";
                    }




                }

                else
                {
                  all_courses(); 
                }

                

               ?>
               <p class=" my-4 text-center"><a href='' class='text-decoration-none text-info'></a></p>
            </div>

            <div class="row m-5 px-5 shadow  bg-white rounded">
                   <p class="text-muted my-4 fs-5 fw-bold">Private files</p>
                   <p class="text-info" style='cursor: pointer;' data-bs-toggle='modal' data-bs-target='#my_files'>My files</p>
                   <p class="text-info" data-bs-toggle='modal' data-bs-target='#private_files' style='cursor: pointer;'>Manage private files...</p>

            </div>
               <?php 
                $id='192-15-13129';//***********************************************
               private_files($id); ?>

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
