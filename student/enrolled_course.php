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
                   <h4 class="text-secondary my-4">Your all enrolled courses here...</h4>                
               <?php 

                all_enrolled_courses();

               ?>
               <p class=" my-4 text-center"></p>
            </div>

            <div class="row m-5 px-5 shadow  bg-white rounded">
                   <p class="text-muted my-4 fs-5 fw-bold">Private files</p>
                   <p class="text-info" style='cursor: pointer;' data-bs-toggle='modal' data-bs-target='#my_files'>My files</p>
                   <p class="text-info" data-bs-toggle='modal' data-bs-target='#private_files' style='cursor: pointer;'>Manage private files...</p>

            </div>
<!-----------------------------My files & note-------------------------------->

   <?php 
    $id=$_SESSION['student_id'];
   private_files($id); ?>


<!------------------------------------------------------------>



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

