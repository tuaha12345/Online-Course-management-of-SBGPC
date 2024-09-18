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

<?php
    ///---------------- Total Courses------------//
    $select_course_query = "SELECT * FROM admin_course  ";
    $run_course_query = mysqli_query($con, $select_course_query);
	  $num_course=mysqli_num_rows($run_course_query);

  ///---------------- Total Teachers -----------//
    $select_teacher_query = "SELECT * FROM teacher  ";
    $run_teacher_query = mysqli_query($con, $select_teacher_query);
	  $num_teacher=mysqli_num_rows($run_teacher_query);
    
  ///---------------- Total Students------------//
    $select_student_query = "SELECT * FROM student  ";
    $run_student_query = mysqli_query($con, $select_student_query);
	  $num_student=mysqli_num_rows($run_student_query);
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
</style>

</head>
<body>


<div class="container-fluid p-0 " >

<?php   include('partials/navbar.php'); ?> <!---------- navbar----------->

     
    <div class="row " style="background-color: #edf0ed;" >
       
       <?php   include('partials/sidebar.php'); ?> <!---sidebar --->


         
    	<div class="col-md-10  m-5 main">
            <h3 class="text-monospace">SBPGC-OLC: Admin Panel Dashboard</h3>

    		<!--row 1 courses-->
    		<div class="row m-5 px-5 shadow  bg-white rounded">
                   

                <div class="row d-flex justify-content-center p-5">

                <!---------- total teachers--------------->
                
                <div class="card p-0 col-4 me-4 shadow mt-5" style="width: 15rem;border-radius:7%"><a href="all_teachers.php" class="text-decoration-none">
                  <div class="card-body p-5" style="">
                    <h6 class="card-subtitle mb-2 text-muted">Total Teachers:</h6>
                    <div class=" text-center ">
                        <i class="fas fa-user-tie fs-1 p-3" ><sup id="totalTeachers"></sup></i>
                    </div>
                   
                  </div></a>
                </div>


                <!---------- total students--------------->
                <div class="card p-0 col-4 me-4 shadow mt-5" style="width: 15rem;border-radius:7%"><a href="all_students.php" class="text-decoration-none">
                  <div class="card-body p-5" style="">
                    <h6 class="card-subtitle mb-2 text-muted">Total Students:</h6>
                    <div class=" text-center ">
                        <i class="fas fa-user-graduate fs-1 p-3" ><sup class="text-danger" id="totalStudents"></sup></i>
                    </div>
                   
                  </div></a>
                </div>

                <!---------- total courses--------------->
                <div class="card p-0 col-4 shadow mt-5" style="width: 15rem;border-radius:7%"><a href="all_courses.php" class="text-decoration-none">
                  <div class="card-body p-5" style="">
                    <h6 class="card-subtitle mb-2 text-muted">Total Courses:</h6>
                    <div class=" text-center ">
                        <i class="fas fa-file-alt fs-1 p-3" ><sup id="totalCourses"></sup></i>
                    </div>
                   
                  </div></a>
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

    $num_student=$num_student;
    $num_teacher=$num_teacher;
    $num_course=$num_course;

   echo  "<script>
        const totalStudentsElement = document.getElementById('totalStudents');
        const totalTeachersElement = document.getElementById('totalTeachers');
        const totalCoursesElement = document.getElementById('totalCourses');
        let count1 = 0;
        let count2 = 0;
        let count3 = 0;

        // Function to increment count and update the display
        function updateCount1() {
            count1++;
            totalStudentsElement.textContent = count1;
            if (count1 < $num_student) {
                setTimeout(updateCount1); 
               }
           }
        updateCount1();

        // Function to increment count and update the display
        function updateCount2() {
            count2++;
            totalTeachersElement.textContent = count2;
            if (count2 < $num_teacher) {
                setTimeout(updateCount2,5); 
               }
           }
        updateCount2();

        // Function to increment count and update the display
        function updateCount3() {
            count3++;
            totalCoursesElement.textContent = count3;
            if (count3 < $num_course) {
                setTimeout(updateCount3,10); 
               }
           }
        updateCount3();            



    </script>";
?>