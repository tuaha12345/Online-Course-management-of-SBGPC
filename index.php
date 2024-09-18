<?php 
// include './includes/connect.php';
// include './function/all_function.php';
// session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <?php   include('homepage/partials/css_link.php'); ?>

</head>
<body>


<div class="container-fluid p-0 " >

<?php   include('homepage/partials/navbar.php'); ?> <!---------- navbar----------->

     
    <div class="row " style="background-color: #edf0ed;" >


       
       <?php   include('homepage/partials/sidebar.php'); ?> <!---sidebar --->


         
        <div class="col-md-10  m-5 main " >

            <h3 class="text-monospace text-center">
                <img src="homepage/images/logo3.png" class="logo_img" alt="images/logo2.png" height="13%" width="7%">
            SBPGC-OLC</h3>

            <!--row 1 courses-->
            <div class="row m-5 px-5 shadow  bg-white rounded">
                    <div class="text-center my-4">
                        <img src="homepage/images/bg1.png" class="my-4">
                        <div class="border border-secondary">
                            <h4 class="my-3">শেখ বোরহানুদ্দীন পোস্ট গ্রাজুয়েট কলেজ অনলাইন লার্নিং সেন্টার </h4>
                        </div>
                     </div>


                     <div class="row my-4">
                        <div class="col-md-12 p-5 shadow my-5 rounded ms-2">
                            
                            <p class="fs-4 text-center fw-bold text-secondary text-center">What is Online Learning Center?</p>
                            <p class="text-center">Online Learning Center is the digital teaching and learning hub of Daffodil International University. The platform aims to connect teachers and students effectively allowing teachers to track progress of individual students and better facilitate their learning.</p>

                        </div>

                        <div class="col-md-12 row ms-2">
                            <div class="col-md-6 mt-5">
                                <div class="card border-info shadow" >
                                  <div class="card-body">
                                    <p class="fw-bolder text-center">
                                    <i class="fas fa-user-graduate text-info"></i>
                                     Guidelines for Students</p>
                                    <p class="text-center text-secondary">Students can get guidelines on the Online Learning Center platform from here.</p>
                                    <div class="text-center">
                                    <a href="#" class=" text-info text-decoration-none fw-bold ">View guidelines</a>
                                    </div>
                                  </div>
                                </div>
                            </div>
 
                            <div class="col-md-6 mt-5">
                                <div class="card border-success shadow" >
                                  <div class="card-body">
                                    <p class="fw-bolder text-center">
                                    <i class="fas fa-chalkboard-teacher text-success"></i>
                                     Guidelines for Teachers</p>
                                    <p class="text-center text-secondary">Teachers can get guidelines on Online Learning Center platform from here.</p>
                                    <div class="text-center">
                                    <a href="#" class=" text-success text-decoration-none fw-bold ">View guidelines</a>
                                    </div>
                                  </div>
                                </div>
                            </div>
                            <div class="col-md-6 mt-4 ">
                                <div class="card border-warning shadow" >
                                  <div class="card-body">
                                    <p class="fw-bolder text-center">
                                    <i class="fas fa-folder text-warning"></i>
                                     Content Guidelines for Teachers</p>
                                    <p class="text-center text-secondary">Teachers can get guidelines on online and offline contents from here.</p>
                                    <div class="text-center">
                                    <a href="#" class=" text-warning text-decoration-none fw-bold ">View guidelines</a>
                                    </div>
                                  </div>
                                </div>
                            </div>                              
                            <div class="col-md-6 mt-4">
                                <div class="card border-danger shadow" >
                                  <div class="card-body">
                                    <p class="fw-bolder text-center">
                                    <i class="fas fa-envelope text-danger"></i>
                                     Get Support</p>
                                    <p class="text-center text-secondary">Need support on the Online Learning Center? Contact our support team here..</p>
                                    <div class="text-center">
                                    <a href="#" class=" text-danger text-decoration-none fw-bold ">Contact Support</a>
                                    </div>
                                  </div>
                                </div>
                            </div>                                                                               
                        </div>
                        <div style="height:100px;"></div>
                        <div class="col-md-12 p-5 shadow my-5 rounded  row ms-2">
                            <div class="col-md-12">
                            <p class="fs-4 text-center fw-bold text-secondary text-center">Learn About SBPGC-OLC</p>
                            </div>
                            <div class="col-md-12 d-flex justify-content-center">
                            <iframe width="560" height="315" src="https://www.youtube.com/embed/xZrkOT2b8F8?si=hoGBYD-JVl4BKIMc" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen class=""></iframe>
                            </div>

                        </div>
                        <div style="height:100px;"></div>
                         
                     </div>
                                   

               
            </div>

<!--             <div class="row m-5 px-5 shadow  bg-white rounded">
                   <p class="text-muted my-4 fs-5 fw-bold">Private files</p>
                   <p class="text-info" style='cursor: pointer;' data-bs-toggle='modal' data-bs-target='#my_files'>My files</p>
                   <p class="text-info" data-bs-toggle='modal' data-bs-target='#private_files' style='cursor: pointer;'>Manage private files...</p>

            </div> -->


        </div>


        
    </div>

  


        <!----- last child-footer --->
        <?php

            include "homepage/partials/footer.php";
        ?>



</div>






</body>
</html>
