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
            <h3 class="text-monospace">Course name(dynamic)</h3>

  


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
