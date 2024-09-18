<?php
include '../Database/connect.php';

//--------- all courses
function all_courses()
{
    global $con;
    $section = $_SESSION['student_section'];
    $select_query = "SELECT * FROM courses WHERE section='$section' ORDER BY accessed_time DESC ";
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
    $section = $_SESSION['student_section'];
    $select_query = "SELECT * FROM courses WHERE section='$section' AND course_code='$code' ORDER BY accessed_time DESC";
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

//--------- enrolled courses --------------
function enrolled_courses()
{
    global $con;
    $section = $_SESSION['student_section'];
    //$department="CSE";
    $student_id=$_SESSION['student_id'];
    $select_query = "SELECT * FROM student_course WHERE student_id='$student_id' ORDER BY accessed_time DESC LIMIT 3";
    $runquery = mysqli_query($con, $select_query);


    while ($row = mysqli_fetch_array($runquery)) {
        $c_img = $row['course_img'];
        $c_sec = $row['section'];
        $c_code = $row['course_code'];
        //$t_name=$row['teacher_name'];
         //$t_name='hahahhaahahaha';

        $select_query1 = "SELECT * FROM courses WHERE course_code='$c_code' AND section='$c_sec' ";
        $runquery1 = mysqli_query($con, $select_query1);
        $num_row=mysqli_num_rows($runquery1);

        if($num_row>0)
        {

        
                $row1 = mysqli_fetch_array($runquery1);
                $t_name=$row1['teacher_name'];

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

                    //$s='B';
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
        }  // end first if     
    }// end while
}

//---------------- All enrolled courses --------------
function all_enrolled_courses()
{
    global $con;
    $section = $_SESSION['student_section'];
    //$department="CSE";
    $student_id=$_SESSION['student_id'];
    $select_query = "SELECT * FROM student_course WHERE student_id='$student_id' ORDER BY accessed_time DESC ";
    $runquery = mysqli_query($con, $select_query);

    while ($row = mysqli_fetch_array($runquery)) {
        $c_img = $row['course_img'];
        $c_sec = $row['section'];
        $c_code = $row['course_code'];
        //$t_name=$row['teacher_name'];
         //$t_name='hahahhaahahaha';

        $select_query1 = "SELECT * FROM courses WHERE course_code='$c_code' AND section='$c_sec' ";
        $runquery1 = mysqli_query($con, $select_query1);

        $num_row=mysqli_num_rows($runquery1);

        if($num_row>0)
        {

        $row1 = mysqli_fetch_array($runquery1);
        $t_name=$row1['teacher_name'];

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

                //$s='B';
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

       }// end of if

    }//end of while
}


// -------------------------teacher info-------------------

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



// --------------------student_private notes & files-------------------

function private_files($id)
{ 
  global $con;
  $student_id=$id;
  $select_file_query="SELECT * FROM student WHERE student_id='$student_id' ";
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



// if (isset($_POST['save'])) {
//     $p_note = $_POST['note'];
//     $file_name = $_FILES['fileToUpload']['name'];
//     $file_tmp_location = $_FILES['fileToUpload']['tmp_name'];
//     $file_destination = "uploads/private_file/" . $file_name;

//     // Move the uploaded file to the destination
//     if (move_uploaded_file($file_tmp_location, $file_destination)) {
//         // Prepare the SQL statement using a prepared statement
//         $update_file_query = "UPDATE student SET private_note=?, private_file=? WHERE student_id=?";
//         $stmt = mysqli_prepare($con, $update_file_query);

//         // Bind the parameters
//         mysqli_stmt_bind_param($stmt, "sss", $p_note, $file_name, $student_id);

//         // Execute the statement
//         if (mysqli_stmt_execute($stmt)) {
//             //echo "File uploaded successfully and database updated.";
//         } else {
//             echo "Error updating database: " . mysqli_error($con);
//         }

//         // Close the statement
//         mysqli_stmt_close($stmt);
//     } else {
//         echo "Error moving uploaded file.";
//     }
// }

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
            $update_file_query = "UPDATE student SET private_note=?, private_file=? WHERE student_id=?";
            $stmt = mysqli_prepare($con, $update_file_query);

            // Bind the parameters
            mysqli_stmt_bind_param($stmt, "sss", $p_note, $file_name, $student_id);

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
        $update_note_query = "UPDATE student SET private_note=? WHERE student_id=?";
        $stmt = mysqli_prepare($con, $update_note_query);

        // Bind the parameters
        mysqli_stmt_bind_param($stmt, "ss", $p_note, $student_id);

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



///-------------------------------------------- instruction info-----------------------
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
            <img src='../teacher/teacher_images/$teacher_img' class='col-md-3 p-0 '>
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



















?>