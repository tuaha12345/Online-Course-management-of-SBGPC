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


         
    	<div class="col-md-12  m-5 main ">
            <h3 class="text-monospace text-center text-bold">Total Enrolled Student Of Your Courses</h3>


            <div class=" m-5 px-5 rounded row py-4" style='background:#ddeaeb;'>


        <?php 

        global $con;
        $teacher_name=$_SESSION['name'];
        $query1 = "SELECT section, course_code FROM courses WHERE teacher_name='$teacher_name' ";
        $run_query1=mysqli_query($con,$query1);
        $num_rows=mysqli_num_rows($run_query1);

        // echo "<table class='table'>
        // <thead >
        //     <tr>
        //         <th scope='col' class='bg-info'>Student ID</th>
        //         <th scope='col' class='bg-info'>Student Name</th>
        //         <th scope='col' class='bg-info'>Department</th>
        //         <th scope='col' class='bg-info'>Section</th>
        //         <th scope='col' class='bg-info'>Course Code</th>
        //         <th scope='col' class='bg-info'>Action</th>
        //     </tr>
        // </thead>
        // <tbody>";

        $num_of_students=0;

        if($num_rows>0)
        {   
            echo "<table class='table'>
            <thead >
                <tr>
                    <th scope='col' class='bg-info'>Student ID</th>
                    <th scope='col' class='bg-info'>Student Name</th>
                    <th scope='col' class='bg-info'>Department</th>
                    <th scope='col' class='bg-info'>Section</th>
                    <th scope='col' class='bg-info'>Course Code</th>
                    <th scope='col' class='bg-info'>Action</th>
                </tr>
            </thead>
            <tbody>";

            while ($row = $run_query1->fetch_assoc()) {
            $section=$row['section'];
            $course_code=$row['course_code'];
            //echo $section;
            //echo $course_code;

            $query2 = "SELECT * FROM student_course WHERE section='$section' AND course_code='$course_code' ";
           
            $run_query2=mysqli_query($con,$query2);
            while ($row = $run_query2->fetch_assoc()) {
                echo "<tr>";
                echo "<td data-label='ID'>" . $row["student_id"] . "</td>";
                echo "<td data-label='ID'>" . $row["student_name"] . "</td>";
                echo "<td data-label='Department'>" . $row["department"] . "</td>";
                echo "<td data-label='Section'>" . $row["section"] . "</td>";
                echo "<td data-label='Course code'>" . $row["course_code"] . "</td>";
                $id=$row['id'];
                echo "<td data-label='Section'>
                      <a href='unenroll_student.php?id=$id' class='btn btn-danger'>Unenroll</i>
                      </a>
                    </td>";
                echo "</tr>";
                 $num_of_students+=1;
                 

            }// end while2

             


            }// end while1


            echo "<h5 class='text-secondary'>Total Enrolled Student: $num_of_students </h5>";
            echo "</tbody></table>";

        }

        else{
            echo "<h5 class='text-secondary'>Total Enrolled Student: $num_of_students </h5>"; 
        }




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
