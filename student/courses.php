<?php 
include './includes/connect.php';
// include './function/common_function.php';
include './function/all_function.php';
session_start();
if (!isset($_SESSION['student_username'])) {
    // Redirect to index.php
    header("Location: ../index.php");
    exit; // Make sure to exit after the redirection
}

// $c_code=$_GET['course_code'];
// $course_sec=$_GET['section'];
// //$teacher=$_GET['teacher_name'];
// echo "<h1>$c_code</h1>";
// echo "<h1>$course_sec</h1>";


    global $con;
    $teacher_name =$_GET['teacher_name'];
    $course_code=$_GET['course_code'];
    $section=$_GET['section'];
        $update_time=date("l, Y-m-d H:i:s");


     $student_id=$_SESSION['student_id']; 

    $update_query = "UPDATE student_course SET accessed_time='$update_time' WHERE student_id='$student_id' AND course_code='$course_code' AND section='$section'";
    $result = mysqli_query($con, $update_query);
    

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
            <div class="row">
                <div class="col-md-6">
                   <?php
                       $course_code=$_GET['course_code'];
                       $select_title = "SELECT * FROM admin_course WHERE course_code='$course_code' ";
                        $run_title_query = mysqli_query($con, $select_title);
                        $row_title = mysqli_fetch_array($run_title_query); 
                        $course_title=$row_title['course_title'];
                        echo "<h3 class='text-monospace'>$course_title</h3>";
                    ?>
                </div>
                <div class="col-md-6 d-flex flex-row-reverse ">
                    <?php
                        $select_enroll_query = "SELECT * FROM student_course WHERE student_id='$student_id' AND course_code='$course_code' AND section='$section' ";

                        $run_enroll_query = mysqli_query($con, $select_enroll_query);
                        //$row_enrolled = mysqli_fetch_array($run_enroll_query);
                        
                        if (mysqli_num_rows($run_enroll_query) > 0) {
                                // Output the number of rows
                                echo "<a href='unenrol.php?code=$course_code&student_id=$student_id' class='btn btn-danger'>Unenrol me!</a>";
                            }

                        else {
                                echo "<a href='enroll.php?code=$course_code&t_name=$teacher_name&course_img=$course_img' class='btn btn-secondary'>Enroll Now!</a>";
                            }

                    ?>




                    
                </div>

       
            </div>

<!-----------1st row (teacher info and course info)--------------------------->

            <!------------ teacher info--- row 1------>
            <div class="row m-5 px-5 pb-5 rounded" style="background-color:#E4E4E4">
                   <h5 class="text-secondary my-4">Welcome Note</h5>
                   
                   <!----- teacher greetings-->
                   <div class="pb-3">
                    <?php
                      echo $welcome_Note;
                    ?>
                    
                   </div>
                  

                   <!---------course image---->
                   <div class="d-flex justify-content-center py-3">
                       <img src='../teacher/uploads/courses/<?php echo $course_img ?>' height="300px" width=100%>
                   </div>

                   <!---------course outline image---->
                   <div class="d-flex justify-content-center py-5">
                       
                       <img src='../teacher/uploads/courses/<?php echo $course_outline_img ?>' height="300px" width=70%>
                   </div>

                 
                   <!---------Instructor info---->
                   <?php

                    $teacher_name=$_GET['teacher_name'];

                    instructor_info($teacher_name);
                    ?>              

                   <!-------------Course Objective ----------->
                   <span class="fw-bold text-info fs-4">Course Objective</span>
                   <div class="d-flex justify-content-center py-4">
                     <pre class='border border-secondary p-3 fw-bolder'><?php
                      echo $course_objective; ?>
                     </pre>
                   </div>                   


                   <!-------------Course Outcomes  ----------->
                   <span class="fw-bold text-info fs-4">Course Outcomes (CO’s)</span>
                   <div class="d-flex justify-content-center py-4">
                     <pre class='border border-secondary p-3 fw-bolder'><?php
                      echo $course_outcomes; ?>
                     </pre>

                   </div> 

                   <!-------------Grading Scheme  ----------->
                   <!-- <h1 class="text-danger">Grading Scheme make this dynamic</h1> -->
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
                         <a href='<?php echo $telegramLink; ?>' class='text-info'>
                           <?php
                            echo $telegramLink;
                            ?>
                         </a>
                     </div>
                     <div>
                         <img src="images/WhatsApp_logo.png" with='50px' height='50px'>Join Link:
                         <a href='<?php echo $whatsappLink; ?>' class='text-success'>
                           <?php
                            echo $whatsappLink;
                            ?>
                     </a>
                     </div>
                   </div> 


                   <!---------  Attendance ----------->
                   
                   <div class="text-center py-5">
                     <div class='border border-secondary p-4' style='background-color:#91eaed'>
                        <p class='fs-4 fw-bolder'>Click here for 
                          <a href="" class="link-danger">Attendance</a>
                        </p>
                     </div>
                   </div> 


            

            </div> <!------ end of row1----->




            <!-------------------- row 2------------------>
            <?php

            // $select_query = "SELECT * FROM assignment WHERE teacher_name='$teacher_name' AND course_code='$course_code' AND section='$section' ";
            $select_query_assign = "SELECT * FROM assignment WHERE teacher_name='$teacher_name' AND section='$section'AND course_code='$course_code' ";
            $runquery__assign = mysqli_query($con, $select_query_assign);

            $select_query_weeksection = "SELECT * FROM weeklysection WHERE teacher_name='$teacher_name' AND course_code='$course_code' AND section='$section' ";
            $runquery__weeksection = mysqli_query($con, $select_query_weeksection);

            $quiz_no=1;
            $ASN_no=1;
            $Week_no=1;
            //$row = mysqli_fetch_array($runquery);

            ?>

            <div class="d-flex justify-content-center m-5 px-5 rounded " style='background:#ddeaeb;'>

                <div class="border border-secondary  m-5" style='width:90%'>
                    <!-------- heading-------->
                    <p class="border-bottom border-secondary fs-2 fw-bold text-center p-3" style='background-color:#fcba03'>Navigation Link</p>

                    <!-----body------->
                    <div class="row">
                        <span class="ms-3 fw-bolder fs-4 text-secondary">Class Test:</span>
                        <p href="" class="ms-4 fw-bolder text-info col-md-1"></p>

                        <a href="" class="fw-bolder text-info col-md-1">Quiz1</a>
                        <a href="" class="fw-bolder text-info  col-md-1">Quiz2</a>
                        <a href="" class="fw-bolder text-info  col-md-1">Quiz3</a>
                    </div>

                    <div class="row my-3">
                        <span class="ms-3 fw-bolder fs-4 col-md-2 text-secondary">Assignment:</span>

                        <?php

                         while($row_assign = mysqli_fetch_array($runquery__assign))
                         {
                            $ASN_No=$row_assign['assignment_no'];
                            echo "<a href='course_assignment.php?asn_no=$ASN_No&c_code=$course_code&sec=$section&t_name=$teacher_name' class='text-info  col-md-1 fs-4 ms-3' target='_blnak'>".$ASN_No."</a>";

                         }
                         
                        ?>
                        
                    </div>

                    <div class='row'>
                        <span class="ms-3 fw-bolder fs-4 text-secondary">Presentation:</span> 
                        <p  class="ms-4 fw-bolder text-info col-md-1"></p>

                        <?php 
                        echo "<a href='course_presentation.php?c_code=$course_code&sec=$section&t_name=$teacher_name' class='ms-5 fw-bolder text-info col-md-6  ms-2' target='_blnak'>Submit your presentation here</a>";
                        ?>
                    </div>

                    <div class="row my-3">
                        <span class="ms-3 fw-bolder fs-4 text-secondary" >Week2Go:</span>
                        <p href="" class="ms-5 fw-bolder text-info col-md-1"></p>
                        <?php

                         while($row_week_section = mysqli_fetch_array($runquery__weeksection))
                         {
                            $weeks_no=$row_week_section['week_no'];
                            echo "
                            <a href='#$weeks_no' class='fw-bolder text-info col-md-1'>Week$Week_no</a>
                            ";
                            $Week_no+=1;
                            
                         }
                         ?>   


                    </div>

                    <div class="row my-4">
                        <span class="fw-bolder fs-3 text-center text-secondary" >Exam:</span>
                        <u></u>

                          <a href='mid_exam.php?course_code=<?php echo $course_code ?>' class="col-md-6 text-center fw-bolder fs-4 text-danger" target='_blank'>Mid Exam</a>
                          <a href='final_exam.php?course_code=<?php echo $course_code ?>' class="col-md-6 text-center fw-bolder fs-4 text-danger" target='_blank'>Final Exam</a>

                        

                    </div>



                </div>
            </div>



            <!-------------------- row 3------------------>
            <?php



            $select_query_enroll_course="SELECT * FROM student_course WHERE student_id='$student_id' AND section='$section' AND course_code='$course_code' ";
            $runquery__enroll_course = mysqli_query($con, $select_query_enroll_course);
            $num=mysqli_num_rows($runquery__enroll_course);
            if($num>0)
            {

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
             
             echo "
             <div class='m-5 px-5 rounded bg-white' id='$week_no'>
                <p class='text-secondary fs-6 text-right py-3 fw-bolder'>
                $week_no:</p>
                <div class='p-2' style='border-radius: 20px; border:solid 5px dimgray; background:$randomColor' >
                    <h2 class='text-center'>$week_no $topic_name</h2>
                </div>
                <!---------- chapter image-------->
                <div class='d-flex justify-content-center mt-5'>
                    <img src='../teacher/uploads/weeklysection/$topic_img' height='200px' width='400px' >       
                </div>
                 <hr>

                <!---------- Topics of discussion-------->
                <div>
                    <p style='' class='fw-bolder text-success fs-4'>Topics of discussion</p>
                    <pre>$topic_of_discussion</pre>
                </div>

                <!---------- Topics of discussion-------->
                <div>
                    <p style='color:#71c7f5;' class='fw-bolder fs-4'>Expected Learning Outcome</p>
                    <pre>$expected_outcome</pre>
                </div>



                <!---------- Discussion on Week-------->
                <div>
                    <p style='color:#b82f09;' class='fw-bolder fs-4'>Discussion on Week</p>
                        <div class='col-md-4 text-center my-4'>
                            <a href='$class_recording' class='fw-bolder fs-6 ' style='color:#0975b8'><i class='fas fa-play-circle'></i>
                            Class Recording</a>

                        </div>

                        <div class='col-md-4 text-center my-4'>
                            <strong class='fw-bolder fs-6' style='color:#0975b8'><i class='fas fa-question-circle'></i>
                            Questions & Ans</strong>
                            <pre>$question</pre>

                        </div>

                </div>
                <hr>



                <!---------- Materials  -------->
                <div>
                    <p style='color:#a171f5' class='fw-bolder fs-4 text-center'>Materials</p>
                    <div class='row border border-secondary shadow rounded'>
                        <div class='col-md-4 text-center my-4'>
                            <a href='' . $file_path . '' download='$lecture_slide' class='fw-bolder fs-5 text-danger'><i class='fas fa-file-powerpoint'></i>
                            Lecture Slide</a>
                        </div>

                        <div class='col-md-4 text-center my-4'>
                            <a href='$lecture_video' class='fw-bolder fs-5' style='color:#1eb809'><i class='fas fa-video'></i>
                            Lecture Video</a>

                        </div>

                        <div class='col-md-4 text-center my-4'>
                            <a href='' . $file_path . '' download='$pdf' class='fw-bolder fs-5 text-danger' class='fw-bolder  fs-5 text-danger'><i class='fas fa-file-pdf'></i>
                            PDF</a>
                        </div>

                    </div>
                </div>


                <br><br><br>
                <div class='text-center'>
                    <p style='color:red' class='fw-bolder fs-4 text-center'>Task Submission</p>
                    <i class='fas fa-arrow-down fa-fw moving-icon' style='font-size: 28px; color:red;'></i><br>
                    <div class='border border-secondary p-3 rounded fs-5 shadow'>
                     <a href='$task_submission_link'> Submit your task here..</a>   
                    </div> 
                       
                    
                </div>

                <br><br><br><br><br>






                
            </div><!-----end row 3-------->
                 ";



             }// end of while loop

            } // end of if 

            ?>










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
