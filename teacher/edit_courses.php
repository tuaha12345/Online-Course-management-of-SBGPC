<?php 
include './includes/connect.php';
include './function/all_function.php';
session_start();
if (!isset($_SESSION['name'])) {
    // Redirect to index.php
    header("Location: ../index.php");
    exit; // Make sure to exit after the redirection
}
global $con;
$teacher_name =$_SESSION['name'];
$course_code=$_GET['course_code'];
$section=$_GET['section'];
$select_query = "SELECT * FROM courses WHERE teacher_name='$teacher_name' AND course_code='$course_code' AND section='$section' ";
$runquery = mysqli_query($con, $select_query);
$row = mysqli_fetch_array($runquery);

$welcome_Note=$row['welcome_note'];
$section=$row['section'];
$course_img=$row['course_img'];
$course_outline_img=$row['course_outline_img'];
$course_objective=$row['course_objective'];
$course_outcomes=$row['course_outcomes'];
$whatsappLink=$row['whatsapp_link'];
$telegramLink=$row['telegram_link'];
$attendance_link=$row['attendance_link'];
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
            <!-------------- Course name dynamic----->
        <?php 
            $select_query_course_name = "SELECT * FROM admin_course WHERE course_code='$course_code' ";
            $run_this_query = mysqli_query($con, $select_query_course_name);

            // Check if the query executed successfully
            if ($run_this_query) {
                // Fetch the row as an associative array
                $row_query = mysqli_fetch_assoc($run_this_query);

                // Check if the course title exists in the fetched row
                if (isset($row_query['course_title'])) {
                    // If it exists, assign it to $course_name and echo it
                    $course_name = $row_query['course_title'];
                    echo "<h3 class='text-monospace'>$course_name</h3>";
                } else {
                    // Handle the case where course title doesn't exist (optional)
                    echo "<h3 class='text-monospace'>Course title not found</h3>";
                }
            } else {
                // Handle query execution failure (optional)
                echo "Error executing query: " . mysqli_error($con);
            }
        ?>





<!-----------1st row (teacher info and course info)--------------------------->

            <!------------ teacher info--- row 1------>

        <form method="post" action="" enctype="multipart/form-data">

            
    		<div class="row m-5 px-5 pb-5 rounded" style="background-color:#E4E4E4">
                   <h5 class="text-secondary my-4">Welcome Note</h5>

                   
                   <!----- teacher greetings-->
                  <div class="form-group">
                    <label for="exampleFormControlTextarea1" class="text-primary p-2">Edit your welcome note here</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="5" name="welcome_note"><?php echo $welcome_Note ?></textarea>
                  </div><br><br>


                  

                   <!---------course image---->
                     <div class="form-group text-primary">
                        <label for="exampleFormControlFile1" class="pt-4">Edit course image here</label>
                        <input type="file" class="form-control-file " id="exampleFormControlFile1" name="course_img" value="<?php echo $course_img ?>">
                      </div>
                   <div class="d-flex justify-content-center py-3">
                       <img src='uploads/courses/<?php echo $course_img ?>' height="300px" width=100%>
                   </div>

                   <!---------course outline image---->
                    <div class="form-group text-primary">
                        <label for="exampleFormControlFile1" >Edit course outline image here</label>
                        <input type="file" class="form-control-file " id="exampleFormControlFile1" name="course_outline_img" value="<?php echo $course_outline_img ?>">
                    </div>

                   <div class="d-flex justify-content-center py-5">
                       <img src='uploads/courses/<?php echo $course_outline_img ?>' height="300px" width=70%>
                   </div>

                   <!---------Instructor info---->
                    <?php

                     $teacher_name=$_SESSION['name'];

                     instructor_info($teacher_name);
                     ?>

                   <!-------------Course Objective ----------->
                   
                      

          <span class="fw-bold text-info fs-4">Course Objective</span>
                   <div class="d-flex justify-content-center py-4">
                     
                      <textarea class="form-control border-secondary p-3 fw-normal text-secondary" id="exampleFormControlTextarea1 text-secondary " rows="7" name="course_objective"><?php echo $course_objective ?>
                      </textarea>
                     
                   </div>                   


                   <!-------------Course Outcomes  ----------->


                   <span class="fw-bold text-info fs-4">Course Outcomes (CO’s)</span>
                   <div class="d-flex justify-content-center py-4">
                    <textarea class="form-control border-secondary p-3 fw-normal text-secondary" id="exampleFormControlTextarea1 text-secondary " rows="7" name="course_outcomes"><?php echo $course_outcomes ?>
                     </textarea>
                   </div> 

                   <!-------------Grading Scheme  ----------->
                   <span class="fw-bold text-info fs-4">Grading Scheme</span>
                   <div class="d-flex justify-content-center row py-4">
                    <!-------- theory class---->
                       <div class="col-md-6 col-sm-6 border border-secondary fw-bold
                       px-3 py-3">
                           <p class="text-center fs-5 text-success fw-bolder" >Theory Class</p>
                           <tr>Attendance: 7%</tr><br>
                           <tr>Class Tests/Quizzes:  15% </tr><br>
                           <tr>Assignment: 5%</tr><br>
                           <tr>Presentation (using video/ppt): 8%</tr><br>
                           <tr>Midterm Exam: 25%</tr><br>
                           <tr>Final Exam: 40%</tr><br>

                       </div>
                            <!-------- Lab class---->
                       <div class="col-md-6 col-sm-6 border border-secondary fw-bold
                       px-3 py-3">
                           <p class="text-center fs-5 text-success fw-bolder" >Lab Class</p>
                           <tr>Lab Attendance: 10%</tr><br>
                           <tr>Lab Performance Test: 25%</tr><br>
                           <tr>Assignment + Viva: 10%</tr><br>
                           <tr>Project: 25%</tr><br>
                           <tr>Lab Final: 30%</tr><br>
                       </div>
                   </div> 



                   <!---------Join telegram & whatsapp group ----------->


                   <span class="fw-bold text-info fs-4 py-4">Join With Us</span>
                   <div class="">
                     <div>
                         <img src="images/telegram_logo.png" with='70px' height='70px'>Join Link:
                        <input type="text" class="form-control text-info" name="whatsapp" value="<?php echo $telegramLink ?>">
                     </div><br>
                     <div>
                         <img src="images/WhatsApp_logo.png" with='50px' height='50px'>Join Link:
                         <input type="text" class="form-control text-success" name="telegram" value="<?php echo $whatsappLink ?>">
                     </div>
                   </div> 


                   <!---------  Attendance ----------->
                   
                   <div class="text-center py-5">
                     <div class='border border-secondary p-4' style='background-color:#91eaed'>
                        <p class='fs-4 fw-bolder'>Click here for 
                          <a href="<?php echo $attendance_link ?>" class="link-danger" target='blnak'>Attendance</a>
                        </p>Edit Attendance link:
                        <input type="text" class="form-control text-success" name="attendance_link" value="<?php echo $attendance_link ?>">
                     </div>
                   </div> 
         
                   <input type="hidden" name="edit_course_info" value="1">
         <button type="submit" class="btn btn-primary" value="">Submit</button>
         

        </form>
        
        <?php 
           edit_course_info($course_code,$section,$teacher_name);
        ?>
    		</div> <!------ end of row1----->




            <!-------------------- row 2------------------>

 



            <!-------------------- row 3------------------>
            <?php

             $select_query_week = "SELECT * FROM weeklysection WHERE teacher_name='$teacher_name' AND course_code='$course_code' AND section='$section' ";
            // $select_query_week = "SELECT * FROM assignment WHERE teacher_name='$teacher_name'";
            $runquery__week = mysqli_query($con, $select_query_week);

             while($row_week = mysqli_fetch_array($runquery__week))
             {

             $week_no=$row_week['week_no'];
             $topic_name=$row_week['topic_name'];
             $topic_img=$row_week['topic_img'];
             $topic_of_discussion=$row_week['topics_of_discussion'];
             $expected_outcome=$row_week['expected_outcome'];
             $class_recording=$row_week['class_recording'];
             $lecture_slide=$row_week['lecture_slide'];
             $lecture_video=$row_week['lecture_video'];
             $pdf=$row_week['pdf'];
             $question=$row_week['question'];
             $question_pdf=$row_week['question_pdf'];
             $task_submission_link=$row_week['task_submission_link'];

             $file_path = 'uploads/weeklysection/'.$lecture_slide;


            // Generate random RGB values
            $red = rand(0, 255);
            $green = rand(0, 255);
            $blue = rand(0, 255);

            // Create a CSS color string
            $randomColor = "rgb($red, $green, $blue)";
             
             echo " <form method='post' action='' enctype='multipart/form-data' >  
             <div class='m-5 px-5 rounded bg-white py-4'>
             <label class='px-2 text-primary'>Edit Week no </label>
             <input type='text' class='form-control' name='week_no' value='$week_no'><br>
             <label class='px-2 text-primary'>Edit Topic Name </label>
             <input type='text' class='form-control' name='topic_name' value='$topic_name'><br><br>
                <div class='p-2' style='border-radius: 20px; border:solid 5px dimgray; background:$randomColor' >
                    <h2 class='text-center'>$week_no $topic_name</h2>
                </div>
                
                <!---------- chapter image-------->
                <div class='d-flex justify-content-center mt-5'>
                    <div>
                    <label class='px-2'>Edit Topic image </label>
                    <input type='file' class='form-control-file mb-3' name='topic_img' value='$topic_img' required><br>
                        <img src='uploads/weeklysection/$topic_img' height='200px' width='400px' >   
                    </div>    
                </div>
                 <hr>

                <!---------- Topics of discussion-------->
                <div>
                    <p style='' class='fw-bolder text-success fs-4'>Topics of discussion</p>
                    <textarea class='form-control' rows='3' name='topics_of_discussion' >$topic_of_discussion</textarea><br>
                </div>

                <!---------- Topics of discussion-------->
                <div>
                    <p style='color:#71c7f5;' class='fw-bolder fs-4'>Expected Learning Outcome</p>
                    <textarea class='form-control' rows='3' name='expected_outcome' >$expected_outcome</textarea><br>
                </div>



                <!---------- Discussion on Week-------->
                <div>
                    <p style='color:#b82f09;' class='fw-bolder fs-4'>Discussion on Week</p>
                        <div class='col-md-4 text-center mt-3 mb-2'>
                            <a href='$class_recording' class='fw-bolder fs-6 ' style='color:#0975b8'><i class='fas fa-play-circle'></i>
                            Class Recording</a>    
                        </div>
                        <input type='text' class='form-control text-primary' name='class_recording' value='$class_recording'><br>

                        <div class='col-md-4 text-center mt-3 mb-2'>
                            <strong class='fw-bolder fs-6' style='color:#0975b8'><i class='fas fa-question-circle'></i>
                            Questions & Ans</strong>
                        </div>
                        <textarea class='form-control'  rows='3' name='question'>$question</textarea><br>
                        <input type='file' name='question_pdf' required>

                        

                </div>
                <hr>



                <!---------- Materials  -------->
                <div>
                    <p style='color:#a171f5' class='fw-bolder fs-4 text-center'>Materials</p>
                    <div class='row border border-secondary shadow rounded'>
                        <div class='col-md-4 text-center my-4'>
                            <a href='' . $file_path . '' download='$lecture_slide' class='fw-bolder fs-5 text-danger'><i class='fas fa-file-powerpoint'></i>
                            Lecture Slide</a>
                            <input type='file' class='form-control text-danger' name='lecture_slide' value='$lecture_slide' required><br>
                        </div>

                        <div class='col-md-4 text-center my-4'>
                            <a href='$lecture_video' class='fw-bolder fs-5' style='color:#1eb809'><i class='fas fa-video'></i>
                            Lecture Video</a>
                            <input type='text' class='form-control text-success' name='lecture_video' value='$lecture_video'><br>

                        </div>

                        <div class='col-md-4 text-center my-4'>
                            <a href='' . $file_path . '' download='$pdf' class='fw-bolder fs-5 text-danger' class='fw-bolder  fs-5 text-danger'><i class='fas fa-file-pdf'></i>
                            PDF</a>
                            <input type='file' class='form-control text-danger' name='pdf' value='$pdf' required><br> 
                        </div>

                    </div>
                </div>


                <br><br><br>
                <div class='text-center'>
                    <p style='color:red' class='fw-bolder fs-4 text-center'>Task Submission</p>
                    <i class='fas fa-arrow-down fa-fw moving-icon' style='font-size: 28px; color:red;'></i><br>
                    <div class='border border-secondary p-3 rounded fs-5 shadow'>
                     <a href='$task_submission_link'> Submit your task here..</a> 
                     <input class='form-control text-primary'  name='task_submission_link' value='$task_submission_link'></input> 
                      
                    </div> 
                       
                    
                </div>
                <button type='update' class='btn btn-success mt-5 col-md-12' name='weekly_section_update'>Update</button>
                </form>

                <br><br><br><br><br>






                
            </div>
            
            

            
            <!-----end row 3-------->
                 ";

             ////-----------------------update data-----------------------------------------////

             if(isset($_POST['weekly_section_update'])) {

               //$week_no = mysqli_real_escape_string($con, $_POST['week_no']);
               // $topic_name = mysqli_real_escape_string($con, $_POST['topic_name']);
                // Continue for other fields...

                // Retrieve form data
                $in_weekNo = $_POST['week_no'];
                $in_topicName = $_POST['topic_name'];
                $in_topicImage = $_FILES['topic_img']['name'];
                $in_topicImageTmp = $_FILES['topic_img']['tmp_name'];
                $in_topicsOfDiscussion = $_POST['topics_of_discussion'];
                $in_expectedOutcome = $_POST['expected_outcome'];
                $in_classRecording = $_POST['class_recording'];
                $in_lectureSlide = $_FILES['lecture_slide']['name'];
                $in_lectureSlideTmp = $_FILES['lecture_slide']['tmp_name'];
                $in_lectureVideo = $_POST['lecture_video'];
                $in_pdf = $_FILES['pdf']['name'];
                $in_pdfTmp = $_FILES['pdf']['tmp_name'];
                $in_question = $_POST['question'];
                $in_questionPdf = $_FILES['question_pdf']['name'];
                $in_questionPdfTmp = $_FILES['question_pdf']['tmp_name'];
                $in_taskSubmissionLink = $_POST['task_submission_link'];
            


                $courseCode = $_GET['course_code'];
                $teacherName = $_GET['teacher_name'];
                $section= $_GET['section'];

                // Move uploaded files to desired locations
                    move_uploaded_file($in_topicImageTmp, "uploads/weeklysection/" . $in_topicImage);
                    move_uploaded_file($in_lectureSlideTmp, "uploads/weeklysection/" . $in_lectureSlide);
                    move_uploaded_file($in_pdfTmp, "uploads/weeklysection/" . $in_pdf);
                    move_uploaded_file($in_questionPdfTmp, "uploads/weeklysection/" . $in_questionPdf);

                //     $update_query = "UPDATE weeklysection SET 
                //     topic_name='$in_topicName',
                //     topic_img='$in_topicImage',
                //     topics_of_discussion='$in_topicsOfDiscussion',
                //     expected_outcome='$in_expectedOutcome',
                //     class_recording='$in_classRecording',
                //     lecture_slide='$in_lectureSlide',
                //     lecture_video='$in_lectureVideo',
                //     pdf='$in_pdf',
                //     question='$in_question',
                //     question_pdf='$in_questionPdf',
                //     task_submission_link='$in_taskSubmissionLink'
                //  WHERE week_no='$in_weekNo' AND teacher_name='$teacherName' AND course_code='$courseCode' AND section='$section'";

            
                // if(mysqli_query($con, $update_query)) {
                //     echo "Record updated successfully!!!!";
                // } else {
                //     echo "Error updating record: " . mysqli_error($con);
                // }

                    // Prepare an update statement
                $update_query = $con->prepare("UPDATE weeklysection SET topic_name=?, topic_img=?, topics_of_discussion=?, expected_outcome=?, class_recording=?, lecture_slide=?, lecture_video=?, pdf=?, question=?, question_pdf=?, task_submission_link=? WHERE week_no=? AND teacher_name=? AND course_code=? AND section=?");

                // Bind parameters
                $update_query->bind_param("sssssssssssssss", $in_topicName, $in_topicImage, $in_topicsOfDiscussion, $in_expectedOutcome, $in_classRecording, $in_lectureSlide, $in_lectureVideo, $in_pdf, $in_question, $in_questionPdf, $in_taskSubmissionLink, $in_weekNo, $_GET['teacher_name'], $_GET['course_code'], $_GET['section']);

                // Execute the query
                if ($update_query->execute()) {
                    echo "Record updated successfully!!!!";
                } else {
                    echo "Error updating record: " . $update_query->error;
                }
                    // Close the prepared statement
                $update_query->close();
            }

             }// end of while 

             //EditWeeklySectionForm();



            ?>
            
            
            <!-----end row 3-------->









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
