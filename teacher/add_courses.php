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
            <h3 class="text-monospace text-center">Create Your New Course</h3>





<!-----------1st row (teacher info and course info)--------------------------->

            <!------------ teacher info--- row 1------>

      <form method="post" enctype="multipart/form-data" name="row1" action="add_courses.php"> 
           <div class="row m-5 px-5 pb-5 rounded justify-content-center" style="background:bisque;">
               <h1 class="text-center pt-3"><i class="fas fa-clipboard text-secondary"></i></h1>

               <div class="col-md-4">
                <label class="fw-bold text-secondary">Course Code</label>
                <input type="text" class="form-control" placeholder="course code" name="course_code" required>
                </div><br><br>
                <div class="col-md-4">
                <label class="fw-bold text-secondary">Section</label>
                <input type="text" class="form-control" placeholder="Enter section" name="section" required><br>
                </div>
           </div>

            
    		<div class="row m-5 px-5 pb-5 rounded " style="background-color:#E4E4E4">
                   <h5 class="text-secondary text-center fs-4 py-4 fw-bold">Welcome Note</h5>

                   
                   <!----- teacher greetings-->
                  <div class="form-group">
                    <label  class="text-primary pb-3">Write your welcome note here</label>
                    <textarea class="form-control"  rows="3" name="welcome_note"></textarea><br>
                  </div>


                  

                   <!---------course image---->
                     <div class="form-group pb-3 text-primary">
                        <label >Upload course image here</label>
                        <input type="file" class="form-control-file " name="course_img">
                     </div>

                   <!---------course outline image---->
                    <div class="form-group text-primary pb-3">
                        <label for="exampleFormControlFile1">Upload course outline image here</label>
                        <input type="file" class="form-control-file " id="exampleFormControlFile1" name="course_outline_img">
                    </div><br><br><hr>


                   <!-------------Course Objective & Outcomes----------->
                   <span class="fw-bold text-secondary text-center fs-4 py-4">Course Objective & Outcomes </span>

                      <div class="form-group pb-3">
                        <label for="exampleFormControlTextarea1" class="text-primary">Course Objective</label><br><br>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="course_objective"></textarea>
                      </div>
                  


                   <!-------------Course   ----------->

                      <div class="form-group pb-3">
                        <label class="text-primary">Course Outcomes (CO’s)</label><br><br>
                        <textarea class="form-control"  rows="3" name="course_outcomes"></textarea>
                      </div>

                   <hr>


                   <!---------Join telegram & whatsapp group ----------->
                   <span class="fw-bold text-secondary text-center fs-4 py-4">Join Link</span>

                   <div class="row text-primary">
                       <div  class='col-md-6'>
                         <label >Whatsapp Group Join Link</label>
                         <input type="text" class="form-control" name="whatsapp"><br>
                       </div>

                       <div  class='col-md-6'>
                         <label >Telegram Group Join Link</label>
                         <input type="text" class="form-control" name="telegram"><br>
                       </div>
                    </div>


         
         <input type="submit" class="btn btn-primary mt-5" value="Submit" name="row1_submit">
        </form>

    		</div> <!------ end of row1----->

            <?php
            course_info();
            ?>




            <!-------------------- row 2------------------>

            <!-- <div class=" m-5 px-5 rounded row py-4" style='background:#ddeaeb;'>
                <p class="fw-bolder fs-4 text-center" style="color:#2e7874">Navigation Link</p> -->

                 <!-- -------- assignemnt-------- -->
                <!-- <div class="border border-secondary rounded p-4">
                <form method="post" action="" enctype="multipart/form-data">
                  <p class="fw-bolder fs-5 text-center text-secondary">Assignment</p>
                <div  class='col-md-2'>
                 <label class="text-primary">Assignment no</label>
                 <input type="text" class="form-control" name="assignment_no" placeholder="ASN1"><br>
                </div>
                <div  class='col-md-12'>
                 <label class="text-primary">Instruction for Assignment</label>
                 <textarea class="form-control"  rows="2" name="assignment_instruction"></textarea>
                </div><br>
                <div class="col-md-12">
                    <label class="text-primary">Upload pdf</label>
                    <input type="file" class="form-control" name="assignment_pdf"><br>
                </div>
                <div  class='col-md-12'>
                 <label class="text-primary">Assignment submission link</label>
                 <input type="text" class="form-control" name="assignment_submission_link"><br>
                </div>
                  <button type="submit" class="btn btn-primary mt-2" name="assignment_submit">Submit</button>
                 </form>
                </div> -->
                <?php 
               // Call the function to handle form submission
                    //handleAssignmentForm();
                 ?>



                 <!-- presenataion -->
                <!-- <div class="border border-secondary rounded p-4 my-5">
                <form method="post" action="" enctype="multipart/form-data">
                <p class="fw-bolder fs-5 text-center text-secondary">Presentation</p>
                <div  class='col-md-12'>
                 <label class="text-primary">Instruction for Presentation</label>
                 <textarea class="form-control"  rows="2" name="presentation_instruction"></textarea>
                </div><br>
                <div  class='col-md-12'>
                 <label class="text-primary">Presenation submission link</label>
                 <input type="text" class="form-control" name="presentation_submission_link"><br>
                </div>
                  <button type="submit" class="btn btn-primary mt-2" name="presentation_submit">Submit</button>
                 </form>
                </div>
 -->
                <?php
                 // handlePresentationForm();
                ?>

            <!-- </div> -->



            <!-------------------- row 3------------------>

        <form method="post" action="" enctype="multipart/form-data">  
 
            <div class=" m-5 px-5 rounded bg-white">
                <p class="fw-bolder fs-4 text-center pt-5" style="color:#198a03">WeeklySection</p>

                <!---------- input----------->
                <div class="row text-primary ">
                    <div  class='col-md-6 my-4'>
                      <label >Week no</label>
                      <input type="text" class="form-control" name="week_no" placeholder="ex-Week-00"><br>
                    </div> 

                    <div  class='col-md-6 my-4'>
                      <label >Section</label>
                      <input type="text" class="form-control" name="section"><br>
                    </div> 

                    <div  class='col-md-12 my-4'>
                      <label >Topic name</label>
                      <input type="text" class="form-control" name="topic_name"><br>
                    </div>

                    <div class="col-md-12">
                        <label >Topic image</label>
                        <input type="file" class="form-control-file mb-3" name="topic_img"><br>

                        <label >Topics of discussion</label>
                        <textarea class="form-control" rows="3" name="topics_of_discussion"></textarea><br>

                        <label >Expected Learning Outcome</label>
                        <textarea class="form-control" rows="3" name="expected_outcome"></textarea><br>

                        <label >Class Recording</label>
                        <input type="text" class="form-control" name="class_recording"><br> 

                        <label >Lecture Slide</label>
                        <input type="file" class="form-control" name="lecture_slide"><br>
                        <label >Lecture Video</label>
                        <input type="text" class="form-control" name="lecture_video"><br>

                        <label >PDF</label>
                        <input type="file" class="form-control" name="pdf"><br>                                                                     
                    </div>               
                </div>
                
                <hr>



                <!---------- Materials  -------->
              


                <br><br>
                <div class="">
                    <p style="color:#5b6df5; text-shadow: 1px 1px #070912; text-decoration: #5b6df5  underline;" class="fw-bolder fs-5 text-center">Weekly Task</p><u></u>

                    <label class="text-primary">Write question</label><br>
                    <textarea class="form-control"  rows="3" name="question"></textarea><br>

                    <label class="text-primary">Upload pdf</label>
                    <input type="file" class="form-control" name="question_pdf"><br>                      
                    <label class="text-primary">Task submission link</label><br>
                    <textarea class="form-control"  rows="3" name="task_submission_link"></textarea>

                    
                                           
                    <button type="submit" class="btn btn-primary mt-5 col-md-12" name="weekly_section_submit">Submit</button>
                </div>

                <br><br><br><br><br>
                
            
            </form> 
        
        <?php
           handleWeeklySectionForm();
        ?>

                
            </div><!-----end row 3-------->









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
