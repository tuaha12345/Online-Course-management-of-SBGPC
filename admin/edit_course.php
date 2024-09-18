


<?php
 include './includes/connect.php';
global $con;
    
   if (isset($_POST['save'])) {
    // Retrieve form data
    $courseCode = $_POST['course_code'];
    $courseCredit = $_POST['course_credit'];
    $enroll_key = $_POST['enroll_key'];
    $courseTitle = $_POST['course_title'];
    $id = $_POST['id'];

    //$get_id=$_GET['my_id'];
    $get_id=$id;


// $select_query="SELECT * FROM admin_course WHERE id='$get_id' ";
// $runquery=mysqli_query($con, $select_query);
// $row=mysqli_fetch_assoc($runquery);

// $c_code=$row['course_code'];
// $credit=$row['credit'];
// $c_title=$row['course_title'];

    
$insertQuery = "UPDATE admin_course SET credit='$courseCredit',course_code='$courseCode ',enroll_key='$enroll_key',course_title='$courseTitle' WHERE id='$get_id' ";
        $insertResult = mysqli_query($con, $insertQuery);

        if($insertResult)
        {  
           echo "<script>alert('updated');</script>";
                    header('location: all_courses.php' );
           
        
        }


              
    
}




?>