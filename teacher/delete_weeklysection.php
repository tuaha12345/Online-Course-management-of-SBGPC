<?php 
include './includes/connect.php';
include('partials/css_link.php');
        global $con;
                $courseCode = $_GET['week'];
                $teacherName = $_GET['t_name'];
                $section= $_GET['sec'];
                $week_no= $_GET['week'];
                $courseCode= $_GET['c_code'];

?>



<div class="text-center m-5 p-5 border border-danger">
    <h3>Are you sure to delete <?php echo $week_no ?></h3><br>
<form method='post'>
   <input type="submit" class="btn btn-danger" name='yes' value="YES">
   <a href="courses.php?course_code=<?php echo $courseCode;  ?>&teacher_name=<?php echo $teacherName;  ?>&section=<?php echo $section; ?>" class="btn btn-success">no</a>
</form>
</div>


<?php 


                 if(isset($_POST['yes']))
                 {
                   $delete_query="DELETE FROM weeklysection WHERE week_no='$week_no' AND teacher_name='$teacherName' AND course_code='$courseCode' AND section='$section' ";
                   $run_this_query=mysqli_query($con, $delete_query);
                   if($run_this_query)
                   {
                    header('Location: courses.php?course_code=' . urlencode($courseCode) . '&teacher_name=' . urlencode($teacherName) . '&section=' . urlencode($section) );
                    exit; // Ensure no further code is executed after redirection.
                    
                   }
                 }

?>