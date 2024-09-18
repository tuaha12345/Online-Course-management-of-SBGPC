<?php
include '../Database/connect.php';
//session_start();
// -------------------------course info-------------------


function course_info()
{
     global $con;



      // Check if the form is submitted
      if (isset($_POST['row1_submit'])) {

          // Retrieve form data
          $courseCode = $_POST['course_code'];
          $section = $_POST['section'];
          $welcome_Note = $_POST['welcome_note'];
          $welcomeNote=mysqli_real_escape_string($con,$welcome_Note);

          $course_Objective = $_POST['course_objective'];
          $courseObjective=mysqli_real_escape_string($con,$course_Objective);

          $course_Outcomes = $_POST['course_outcomes'];
          $courseOutcomes=mysqli_real_escape_string($con,$course_Outcomes);
          $whatsappLink = $_POST['whatsapp'];
          $telegramLink = $_POST['telegram'];

          // File upload handling
          $courseImage = $_FILES['course_img']['name'];
          $courseImageTmp = $_FILES['course_img']['tmp_name'];
          $courseOutlineImage = $_FILES['course_outline_img']['name'];
          $courseOutlineImageTmp = $_FILES['course_outline_img']['tmp_name'];

          // Move the uploaded images to the desired location
          move_uploaded_file($courseImageTmp, "uploads/courses/" . $courseImage);
          move_uploaded_file($courseOutlineImageTmp, "uploads/courses/" . $courseOutlineImage);
         
          $t_name=$_SESSION['name'];
          

          $select_query="SELECT * FROM courses WHERE teacher_name='$t_name' AND course_code='$courseCode' AND section='$section' ";
          $runquery = mysqli_query($con, $select_query);
          $rows_count=mysqli_num_rows($runquery);
          //$row=mysqli_fetch_assoc($runquery);
          // $c_code=$row['course_code'];
          // $sec=$row['section'];

          // echo $sec;

          if($rows_count<1)
          {
            $accessed_time=date("l, Y-m-d H:i:s");

          // SQL query to insert data into the courses table
          $insertQuery = "INSERT INTO courses (course_code, section,teacher_name, welcome_note, course_objective, course_outcomes, whatsapp_link, telegram_link, course_img, course_outline_img) VALUES ('$courseCode', '$section','$t_name', '$welcomeNote', '$courseObjective', '$courseOutcomes', '$whatsappLink', '$telegramLink', '$courseImage', '$courseOutlineImage')";

          // Execute the query
          $result = mysqli_query($con, $insertQuery);

          if ($result) {
              echo "<script>alert('Data inserted successfully!');</script>";
              // header("Location: index.php");
              //exit();
          } else {
              echo "<script>alert('Error inserting data.');</script>";
          }

          }// end of if($c_code!=$courseCode)


      }


}


function edit_course_info($c_code, $s, $teacher_name) { 
    global $con; // Assuming $con is your mysqli connection variable

    if (isset($_POST['edit_course_info'])) {
        $welcomeNote = $_POST['welcome_note'];
        $courseObjective = $_POST['course_objective'];
        $courseOutcomes = $_POST['course_outcomes'];
        $telegramLink = $_POST['telegram']; 
        $whatsappLink = $_POST['whatsapp'];
        $attendanceLink = $_POST['attendance_link']; 

        // Initialize variables for file paths
        $course_img = '';
        $course_outline_img = '';

        // Handle course image upload
        if(isset($_FILES['course_img']['name']) && $_FILES['course_img']['name'] != '') {
            $course_img = $_FILES['course_img']['name'];
            $courseImageTmp = $_FILES['course_img']['tmp_name'];
            move_uploaded_file($courseImageTmp, "uploads/courses/" . $course_img);
        }

        // Handle course outline image upload
        if(isset($_FILES['course_outline_img']['name']) && $_FILES['course_outline_img']['name'] != '') {
            $course_outline_img = $_FILES['course_outline_img']['name'];
            $courseOutlineImageTmp = $_FILES['course_outline_img']['tmp_name'];
            move_uploaded_file($courseOutlineImageTmp, "uploads/courses/" . $course_outline_img);
        }

        // Prepare SQL statement
        $stmt = $con->prepare("UPDATE courses SET 
                                welcome_note = ?, 
                                course_objective = ?, 
                                course_outcomes = ?, 
                                telegram_link = ?, 
                                whatsapp_link = ?, 
                                attendance_link = ?,
                                course_img = IF(? = '', course_img, ?),
                                course_outline_img = IF(? = '', course_outline_img, ?)
                              WHERE course_code = ? AND section = ? AND teacher_name = ?");

        // Bind parameters
        //$stmt->bind_param("ssssssssssss", $welcomeNote, $courseObjective, $courseOutcomes, $telegramLink, $whatsappLink, $attendanceLink, $course_img, $course_outline_img, $c_code, $s, $teacher_name);
        //$stmt->bind_param("sssssssssss", $welcomeNote, $courseObjective, $courseOutcomes, $telegramLink, $whatsappLink, $attendanceLink, $course_img, $course_img, $course_outline_img, $course_outline_img, $c_code, $s, $teacher_name);
        $stmt->bind_param("sssssssssssss", $welcomeNote, $courseObjective, $courseOutcomes, $telegramLink, $whatsappLink, $attendanceLink, $course_img, $course_img, $course_outline_img, $course_outline_img, $c_code, $s, $teacher_name);

        // Execute the statement
        if ($stmt->execute()) {
            echo "<script>alert('Info Updated Successfully!');</script>";
        } else {
            echo "<script>alert('Error Editing data.');</script>";
        }

        // Close statement
        $stmt->close();
    }

    // It might be better to close the connection outside this function if it's used elsewhere after this operation
}


function handleAssignmentForm()
{
    global $con;

    // Check if the form is submitted
    if (isset($_POST['assignment_submit'])) {

        // Retrieve form data
        $assignmentNo = $_POST['assignment_no'];
        $section = $_POST['section'];
        $courseCode = $_POST['course_code'];
        $assignment_Instruction = $_POST['assignment_instruction'];
        $assignmentInstruction=mysqli_real_escape_string($con,$assignment_Instruction);
        $assignmentSubmissionLink = $_POST['assignment_submission_link'];

        // File upload handling for PDF
        $pdfFileName = $_FILES['assignment_pdf']['name'];
        $pdfFileTmp = $_FILES['assignment_pdf']['tmp_name'];
        $pdfFileDestination = "uploads/assignments/" . $pdfFileName;



        $teacherName = $_SESSION['name'];

          

          $select_query="SELECT * FROM assignment WHERE assignment_no='$assignmentNo' AND teacher_name='$teacherName' AND section='$section' AND course_code='$courseCode' ";
          $runquery = mysqli_query($con, $select_query);
          // while ($row=mysqli_fetch_array($runquery)) {
            // code...
          $rows_count=mysqli_num_rows($runquery);
          $row=mysqli_fetch_array($runquery);
        //   $c_code=$row['course_code'];
        //   $sec=$row['section'];
        //   $assign_no=$row['assignment_no'];

          if( $rows_count<1)
          {
        // Move the uploaded PDF to the desired location
        move_uploaded_file($pdfFileTmp, $pdfFileDestination);


        // SQL query to insert data into the assignment table
        $insertQuery = "INSERT INTO assignment (assignment_no, assign_instruction, pdf, assign_sub_link, section, course_code, teacher_name) 
                        VALUES ('$assignmentNo', '$assignmentInstruction', '$pdfFileName', '$assignmentSubmissionLink', '$section', '$courseCode', '$teacherName')";

        // Execute the query
        $result = mysqli_query($con, $insertQuery);

        if ($result) {
            echo "<script>alert('Assignment data inserted successfully!');</script>";
        } else {
            echo "<script>alert('Error inserting assignment data.');</script>";
        }



         }// end of if( $rows_count<1)
//}
    
    }// end of if (isset($_POST['assignment_submit']))


} // end of handleAssignmentForm()






function handlePresentationForm($teacher_name)
{
    global $con;
    $name=$teacher_name;

    // Check if the form is submitted
    if (isset($_POST['presentation_submit'])) {

        // Retrieve form data
        $presentation__instruction = $_POST['presentation_instruction'];
        $presentation_instruction=mysqli_real_escape_string($con,$presentation__instruction);
        $presentation_submission_link = $_POST['presentation_submission_link'];
        $section = $_POST['section'];
        $courseCode = $_POST['course_code'];

          $t_name=$name;
          $select_query="SELECT * FROM presentation WHERE  teacher_name='$name' AND section='$section' AND course_code='$courseCode' ";
          $runquery = mysqli_query($con, $select_query);
          $rows_count=mysqli_num_rows($runquery);


          if( $rows_count<1)
          {

        // SQL query to insert data into the presentation table
        $insertQuery = "INSERT INTO presentation (course_code,section,teacher_name, presentation_instruction,presentation_submission_link) 
                        VALUES ('$courseCode', '$section','$t_name', '$presentation_instruction','$presentation_submission_link')";

        // Execute the query
        $result = mysqli_query($con, $insertQuery);

        if ($result) {
            echo "<script>alert('Assignment data inserted successfully!');</script>";
        } else {
            echo "<script>alert('Error inserting assignment data.');</script>";
        }



         }// end of if( $rows_count<1)
    
    }// end of if (isset($_POST['presentation_submit']))


} // end of handlePresentationForm()






function handleWeeklySectionForm()
{
    global $con;

    // Check if the form is submitted
    if (isset($_POST['weekly_section_submit'])) {

        // Retrieve form data
        $weekNo = $_POST['week_no'];
        //$section = $_POST['section'];
        $topicName = $_POST['topic_name'];
        $topicImage = $_FILES['topic_img']['name'];
        $topicImageTmp = $_FILES['topic_img']['tmp_name'];
        $topicsOfDiscussion = $_POST['topics_of_discussion'];
        $expectedOutcome = $_POST['expected_outcome'];
        $classRecording = $_POST['class_recording'];
        $lectureSlide = $_FILES['lecture_slide']['name'];
        $lectureSlideTmp = $_FILES['lecture_slide']['tmp_name'];
        $lectureVideo = $_POST['lecture_video'];
        $pdf = $_FILES['pdf']['name'];
        $pdfTmp = $_FILES['pdf']['tmp_name'];
        $question =$_POST['question'];
        $questionPdf = $_FILES['question_pdf']['name'];
        $questionPdfTmp = $_FILES['question_pdf']['tmp_name'];
        $taskSubmissionLink =$_POST['task_submission_link']; 



                // $section = "B";
        $courseCode = $_GET['course_code'];
        $teacherName = $_GET['teacher_name'];
        $section= $_GET['section'];

          //$t_name="sayed";
          $select_query="SELECT * FROM weeklysection WHERE  teacher_name='$teacherName' AND section='$section' AND course_code='$courseCode' AND week_no='$weekNo' ";
          $runquery = mysqli_query($con, $select_query);
          $rows_count=mysqli_num_rows($runquery);


          if( $rows_count<1)
          {
        
        // Move uploaded files to desired locations
        move_uploaded_file($topicImageTmp, "uploads/weeklysection/" . $topicImage);
        move_uploaded_file($lectureSlideTmp, "uploads/weeklysection/" . $lectureSlide);
        move_uploaded_file($pdfTmp, "uploads/weeklysection/" . $pdf);
        move_uploaded_file($questionPdfTmp, "uploads/weeklysection/" . $questionPdf);

        // Additional data from your session or wherever
        // $courseCode = "your_course_code";
        // $teacherName = "sayed";
        

        // SQL query to insert data into the weeklysection table
        // $insertQuery = "INSERT INTO weeklysection (course_code, section, teacher_name, week_no, topic_name, topic_img, topics_of_discussion, expected_outcome, class_recording, lecture_slide, lecture_video, pdf, question, question_pdf, task_submission_link) 
        //                 VALUES ('$courseCode', '$section', '$teacherName', '$weekNo', '$topicName', '$topicImage', '$topicsOfDiscussion', '$expectedOutcome', '$classRecording', '$lectureSlide', '$lectureVideo', '$pdf', '$question', '$questionPdf', '$taskSubmissionLink')";

        
        


        // Execute the query
        // $result = mysqli_query($con, $insertQuery);

        // if ($result) {
        //     echo "<script>alert('Weekly section data inserted successfully!');</script>";
        // } else {
        //     echo "<script>alert('Error inserting weekly section data.');</script>";
        // }

        $insertQuery = $con->prepare("INSERT INTO weeklysection (course_code, section, teacher_name, week_no, topic_name, topic_img, topics_of_discussion, expected_outcome, class_recording, lecture_slide, lecture_video, pdf, question, question_pdf, task_submission_link) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

        $insertQuery->bind_param("sssssssssssssss", $courseCode, $section, $teacherName, $weekNo, $topicName, $topicImage, $topicsOfDiscussion, $expectedOutcome, $classRecording, $lectureSlide, $lectureVideo, $pdf, $question, $questionPdf, $taskSubmissionLink);

       
        if ($insertQuery->execute()) {
            echo "<script>alert('Weekly section data inserted successfully!');</script>";
        } else {
            echo "<script>alert('Error inserting weekly section data.');</script>";
        }

        // Close the prepared statement
        $insertQuery->close();





       } // end of if( $rows_count<1)

    } // end of if (isset($_POST['weekly_section_submit']))




}// end of handleWeeklySectionForm()




function recently_accessed_courses($name)
{
    global $con;
    $t_name = $name;
    $select_query = "SELECT * FROM courses WHERE teacher_name='$t_name' ORDER BY accessed_time DESC LIMIT 3";
    $runquery = mysqli_query($con, $select_query);

    while ($row = mysqli_fetch_array($runquery)) {
        $c_img = $row['course_img'];
        $c_sec = $row['section'];
        $c_code = $row['course_code'];

        $select_query2 = "SELECT * FROM admin_course WHERE course_code='$c_code'";
        $runquery2 = mysqli_query($con, $select_query2);

        // Check if the query returned any rows
        if ($runquery2 && mysqli_num_rows($runquery2) > 0) {
            $row2 = mysqli_fetch_array($runquery2);
            $c_title = $row2['course_title'];


            // Generate random RGB values
            $red = rand(0, 255);
            $green = rand(0, 255);
            $blue = rand(0, 255);

            // Create a CSS color string
            $randomColor = "rgb($red, $green, $blue)";

             $s='B';
            $color=$randomColor;

            echo "
                <div class='card m-2' style='width: 18rem;padding:0px;'>
                    <img class='' src='uploads/courses/$c_img' alt='Card image cap' style='height:200px;width:100%;border-radius:5px 5px 0px 0px;'>
                    <div class='card-body ' style=' border-radius:0 0 5px 5px;background-color: $color;height:100px'><a href='courses.php?course_code=$c_code&teacher_name=$t_name&section=$c_sec' class='text-decoration-none'>
                        <h5 class='card-title text-center text-white'>$c_title ($c_sec)</h5></a>
                    </div>
                </div>
            ";

            // echo "
            //     <div class='card m-2 bg-warning' style='width: 18rem;padding:0px;'>
            //         <img class=' bg-primary' src='uploads/courses/$c_img' alt='Card image cap' style='height:200px;width:100%;'>
            //         <div class='card-body bg-danger' >
            //             <h5 class='card-title text-center text-white'>$c_title ($c_sec)</h5>
            //         </div>
            //     </div>
            // ";

        } else {
            // Handle the case where no rows were returned
            //echo "No data found.";
        }
    }
}


function teacher_info($teacher_name)
{ 
  global $con;
  $select_query="SELECT * FROM teacher WHERE name='$teacher_name' ";
  $result_query=mysqli_query($con,$select_query);
  $row=mysqli_fetch_assoc($result_query);

  $teacher_full_name=$row['name'];
  $office_room=$row['office_room'];
  $office_hour=$row['office_hour'];
  $contact_number=$row['contact_number'];
  $email=$row['email'];
  $web_profile=$row['web_profile'];
  $teacher_img=$row['teacher_img'];


  echo "    
            <div class='row d-flex justify-content-center py-5'>
                      
                    <img src='../teacher/teacher_images/$teacher_img' class='col-md-3 p-0 border border-secondary'>
                      
                   <div class='col-md-9 border border-secondary fw-bold text-secondary p-3 ''>
                       <th class='fs-4'> <span class='text-success fw-bolder fs-4'>Instructor :</span> <span class='fs-4 fw-bolder'>$teacher_full_name</span></th><br>
                       <th class='fw-bolder'> <span class='text-success fw-bolder'>Office Room:</span> $office_room</th><br>
                       <th class=''> <span class='text-success fw-bolder'>Office Hour:</span> $office_hour</th><br>
                       <th class=> <span class='text-success fw-bolder'>Contact Number:</span>$contact_number</th><br>
                       <th class=> <span class='text-success fw-bolder'>Email:</span>$email</th><br>
                       <th class=> <span class='text-success fw-bolder'>Web Profile:</span><a href=''>$web_profile</a></th>
                   </div>
             </div> ";



  
}




function show_courses($t_name,$c_name,$sec)
{
    global $con;
    $teacher_name =$t_name;
    $course_code=$c_name;
    $section=$sec;
    $select_query = "SELECT * FROM courses WHERE teacher_name='$teacher_name' AND course_code='$course_code' AND section='$section' ";
    $runquery = mysqli_query($con, $select_query);
    $row = mysqli_fetch_array($runquery);
    
    $welcome_Note=$row['welcome_note'];
    $section=$row['section'];
    $course_img=$row['$course_img'];
    $course_outline_img=$row['$course_outline_img'];
    $course_objective=$row['course_objective'];
    $course_outcomes=$row['course_outcomes'];
    $whatsappLink=$row['whatsapp_link'];
    $telegramLink=$row['telegram_link'];
    
 
}


function all_courses()
{
    global $con;
    $name    = $_SESSION['name'] ;
    //$name    = 'tuahaa' ;
    $select_query = "SELECT * FROM courses WHERE teacher_name='$name' ORDER BY accessed_time DESC ";
    $runquery = mysqli_query($con, $select_query);

    while ($row = mysqli_fetch_array($runquery)) {
        $c_img = $row['course_img'];
        $c_sec = $row['section'];
        $c_code = $row['course_code'];
        $t_name=$row['teacher_name'];

        $select_query2 = "SELECT * FROM admin_course WHERE course_code='$c_code'";
        $runquery2 = mysqli_query($con, $select_query2);

        // Check if the query returned any rows
        if ($runquery2 && mysqli_num_rows($runquery2) > 0) {
            $row2 = mysqli_fetch_array($runquery2);
            $c_title = $row2['course_title'];


            // Generate random RGB values
            $red = rand(0, 255);
            $green = rand(0, 255);
            $blue = rand(0, 255);

            // Create a CSS color string
            $randomColor = "rgb($red, $green, $blue)";

             $s='B';
            $color=$randomColor;

            echo "
                <div class='card m-2' style='width: 18rem;padding:0px;'>
                    <img class='' src='../teacher/uploads/courses/$c_img' alt='Card image cap' style='height:200px;width:100%;border-radius:5px 5px 0px 0px;'>
                    <div class='card-body ' style=' border-radius:0 0 5px 5px;background-color: $color;height:100px'><a href='courses.php?course_code=$c_code&teacher_name=$t_name&section=$c_sec' class='text-decoration-none'>
                        <h5 class='card-title text-center text-white'>$c_title ($c_sec)</h5><p class='card-title text-center text-white'>By $t_name</p></a>
                    </div>
                </div>
            ";



        } else {
            // Handle the case where no rows were returned
            //echo "No data found.";
        }
    }
}

//--------- search ----all courses
function search_all_courses($c_code)
{
    global $con;
    $code=$c_code;
    $name = $_SESSION['name'];
    $select_query = "SELECT * FROM courses WHERE teacher_name='$name' AND course_code='$code' ORDER BY  accessed_time DESC";
    $runquery = mysqli_query($con, $select_query);

    while ($row = mysqli_fetch_array($runquery)) {
        $c_img = $row['course_img'];
        $c_sec = $row['section'];
        $c_code = $row['course_code'];
        $t_name=$row['teacher_name'];

        $select_query2 = "SELECT * FROM admin_course WHERE course_code='$c_code'";
        $runquery2 = mysqli_query($con, $select_query2);

        // Check if the query returned any rows
        if ($runquery2 && mysqli_num_rows($runquery2) > 0) {
            $row2 = mysqli_fetch_array($runquery2);
            $c_title = $row2['course_title'];


            // Generate random RGB values
            $red = rand(0, 255);
            $green = rand(0, 255);
            $blue = rand(0, 255);

            // Create a CSS color string
            $randomColor = "rgb($red, $green, $blue)";

             $s='B';
            $color=$randomColor;

            echo "
                <div class='card m-2' style='width: 18rem;padding:0px;'>
                    <img class='' src='../teacher/uploads/courses/$c_img' alt='Card image cap' style='height:200px;width:100%;border-radius:5px 5px 0px 0px;'>
                    <div class='card-body ' style=' border-radius:0 0 5px 5px;background-color: $color;height:100px'><a href='courses.php?course_code=$c_code&teacher_name=$t_name&section=$c_sec' class='text-decoration-none'>
                        <h5 class='card-title text-center text-white'>$c_title ($c_sec)</h5><p class='card-title text-center text-white'>By $t_name</p></a>
                    </div>
                </div>
            ";



        } else {
            // Handle the case where no rows were returned
            //echo "No data found.";
        }
    }
}


function instructor_info($teacher_name)
{
        global $con;
        // Fetch information from the teacher table
        $teacher_name = $teacher_name;
        $select_query = "SELECT * FROM teacher WHERE name='$teacher_name'";
        $run_query = mysqli_query($con, $select_query);
        $row = mysqli_fetch_assoc($run_query);

        // Assign fetched values to variables
        $office_room = $row['office_room'];
        $office_hour = $row['office_hour'];
        $contact_number = $row['contact_number'];
        $email = $row['email'];
        $web_profile = $row['web_profile'];
        $teacher_img = $row['teacher_img'];

        echo " <div class='row d-flex justify-content-center py-5'>
            <img src='teacher_images/$teacher_img' class='col-md-3 p-0 '>
            <div class='col-md-9 border border-secondary fw-bold text-secondary p-3 '>
                <th class='fs-4'> <span class='text-success fw-bolder fs-4'>Instructor :</span> <span class='fs-4 fw-bolder'> $teacher_name</span></th><br>
                <th class='fw-bolder'> <span class='text-success fw-bolder'>Office Room:</span> $office_room</th><br>
                <th class=''> <span class='text-success fw-bolder'>$office_hour</th><br>
                <th class=''> <span class='text-success fw-bolder'>Contact Number:</span> $contact_number</th><br>
                <th class=''> <span class='text-success fw-bolder'>Email:</span> $email</th><br>
                <th class=''> <span class='text-success fw-bolder'>Web Profile:</span><a href='$web_profile'> $web_profile</a></th>
            </div>
        </div>
         ";


}



// --------------------teacher_private notes & files-------------------

function private_files($name)
{ 
  global $con;
  
  $select_file_query="SELECT * FROM teacher WHERE name='$name' ";
  $result_file_query=mysqli_query($con,$select_file_query);
  $row_file=mysqli_fetch_assoc($result_file_query); 

  $private_note=$row_file['private_note'];
  $private_file=$row_file['private_file'];

  $file_path = 'uploads/private_file/'.$private_file;

    echo "<!-- Modal -->
<div class='modal fade' id='my_files' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
  <div class='modal-dialog'>
    <div class='modal-content'>
      <div class='modal-header '>
        <h5 class='modal-title' id='exampleModalLabel'>Your Private Files</h5>
        <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
      </div>
      <div class='modal-body'>

       <pre>$private_note</pre>
        <a href='' . $file_path . '' download='$private_file'class='fw-bolder fs-5 text-danger'>$private_file</a>

      </div>

  
    </div>
  </div>
</div>
<!------------------------------------------------------------>            
<!---------------------------------Manage files------------------------------>


<!-- Modal -->
<div class='modal fade' id='private_files' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
  <div class='modal-dialog'>
    <div class='modal-content'>
      <div class='modal-header'>
        <h5 class='modal-title' id='exampleModalLabel'>Your Private Files</h5>
        <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
      </div>
      <div class='modal-body'>
    <form method='post' enctype='multipart/form-data'>
          <div class='mb-3'>
            <label for='floatingTextarea2 '>Write your notes here..</label>
            <textarea class='form-control ' name='note'>$private_note</textarea>
          </div>
          <div class='mb-3'>
            <input type='file' class='form-control' name='fileToUpload'>
          </div>
          <div>
          <p class='fw-bolder'>Please refresh your page after updating your info..</p>
          </div>
       </div>

      <div class='modal-footer'>

        <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Close</button>
        <button type='submit' class='btn btn-primary' name='save' >Save changes</button>
      </div>
    </form>      
    </div>
  </div>
</div>
";





if (isset($_POST['save'])) {
    $p_note = $_POST['note'];

    // Check if a file is uploaded
    if (!empty($_FILES['fileToUpload']['name'])) {
        $file_name = $_FILES['fileToUpload']['name'];
        $file_tmp_location = $_FILES['fileToUpload']['tmp_name'];
        $file_destination = "uploads/private_file/" . $file_name;

        // Move the uploaded file to the destination
        if (move_uploaded_file($file_tmp_location, $file_destination)) {
            // Prepare the SQL statement using a prepared statement
            $update_file_query = "UPDATE teacher SET private_note=?, private_file=? WHERE name=?";
            $stmt = mysqli_prepare($con, $update_file_query);

            // Bind the parameters
            mysqli_stmt_bind_param($stmt, "sss", $p_note, $file_name, $name);

            // Execute the statement
            if (mysqli_stmt_execute($stmt)) {
                //echo "File uploaded successfully and database updated.";
            } else {
                echo "Error updating database: " . mysqli_error($con);
            }

            // Close the statement
            mysqli_stmt_close($stmt);
        } else {
            echo "Error moving uploaded file.";
        }
    } else {
        // No file uploaded, update the database with only the note
        $update_note_query = "UPDATE teacher SET private_note=? WHERE name=?";
        $stmt = mysqli_prepare($con, $update_note_query);

        // Bind the parameters
        mysqli_stmt_bind_param($stmt, "ss", $p_note, $name);

        // Execute the statement
        if (mysqli_stmt_execute($stmt)) {
            //echo "Note updated successfully.";
        } else {
            echo "Error updating note: " . mysqli_error($con);
        }

        // Close the statement
        mysqli_stmt_close($stmt);
    }
}

}





?>