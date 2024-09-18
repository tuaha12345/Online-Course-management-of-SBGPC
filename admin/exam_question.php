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
    <?php include('partials/css_link.php'); ?>

    <style>
        .dot {
            height: 25px;
            width: 25px;
            background-color: #bbb;
            border-radius: 50%;
            display: inline-block;
        }
    </style>

</head>
<body>

<div class="container-fluid p-0 " >

    <?php include('partials/navbar.php'); ?> <!-- Navbar -->

    <div class="row " style="background-color: #edf0ed;" >

        <?php include('partials/sidebar.php'); ?> <!-- Sidebar -->

        <div class="col-md-10  m-5 main ">
            <h3 class="text-monospace">Exam Question</h3><br>

            <!-------------- mid exam-------------------->
            <div class="p-5 row" style="background-color: #dafaca;">
             <form action="exam_question.php" method="POST" enctype="multipart/form-data">
                <div class="row mb-3">
                    <div class="form-group col-md-4">
                        <label for="course_code">Course Code:</label>
                        <input type="text" class="form-control text-secondary" id="course_code" name="course_code" required placeholder="Ex-CSE000">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="department">Department:</label>
                        <input type="text" class="form-control text-secondary" id="department" name="department" required placeholder="Ex-CSE">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="semester">Semester:</label>
                        <input type="text" class="form-control text-secondary" id="semester" name="semester" required placeholder="Ex-fall2024">
                    </div>
                </div>
                 <!------------- mid exam-------------------->
                <div class='my-5 p-5 rounded shadow' style="background-color:#abf7ee;">
                   <h4 class="text-center ">Midterm Exam</h4>
                    <div class="form-group">
                        <label for="mid_question">Midterm Question Description:</label>
                        <input type="text" class="form-control" id="mid_question" name="mid_question">
                    </div><br>
                    <div class="form-group">
                        <label for="mid_pdf">Upload Midterm PDF:</label>
                        <input type="file" class="form-control-file" id="mid_pdf" name="mid_pdf">
                    </div>
                </div>
                <!-------------- final exam-------------------->
                <div class='my-5 p-5 rounded shadow' style="background-color:#e7cafa;">
                    <h4 class="text-center text-">Final Exam</h4>
                    <div class="form-group">
                        <label for="final_question">Final Exam Question Description:</label>
                        <input type="text" class="form-control" id="final_question" name="final_question">
                    </div><br>
                    <div class="form-group">
                        <label for="final_pdf">Upload Final Exam PDF:</label>
                        <input type="file" class="form-control-file" id="final_pdf" name="final_pdf">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary" name="submit">Submit</button>
            </form>
            </div>

<!-------------------------------------- php code-------------------------->

            <?php
                // Assuming $con is your database connection, and it is correctly set up elsewhere in your script
                global $con;

                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    if (isset($_POST['submit'])) {
                        // Form submission logic
                        $course_code = $_POST['course_code'];
                        $department = $_POST['department'];
                        $semester = $_POST['semester'];
                        $mid_question = $_POST['mid_question'];
                        $final_question = $_POST['final_question'];

                        // Check if similar row already exists in the database
                        $sql_check = "SELECT * FROM exam_question WHERE course_code = ? AND department = ? AND semester = ?";
                        if ($stmt_check = $con->prepare($sql_check)) {
                            $stmt_check->bind_param("sss", $course_code, $department, $semester);
                            $stmt_check->execute();
                            $result = $stmt_check->get_result();
                            if ($result->num_rows > 0) {
                                echo "Similar record already exists in the database. Insertion aborted.";
                                $stmt_check->close();
                            } else {
                                // File upload initialization
                                $mid_pdf = isset($_FILES['mid_pdf']['name']) ? $_FILES['mid_pdf']['name'] : null;
                                $final_pdf = isset($_FILES['final_pdf']['name']) ? $_FILES['final_pdf']['name'] : null;
                                $mid_pdf_target = $mid_pdf ? "uploads/exam_question/" . basename($mid_pdf) : null;
                                $final_pdf_target = $final_pdf ? "uploads/exam_question/" . basename($final_pdf) : null;

                                // Attempt to move uploaded files and prepare SQL dynamically
                                $filesUploaded = false;
                                $sql_fields = "course_code, department, semester, mid_question, final_question";
                                $sql_values = "?, ?, ?, ?, ?";
                                $types = "sssss";
                                $values = [$course_code, $department, $semester, $mid_question, $final_question];

                                if ($mid_pdf && move_uploaded_file($_FILES['mid_pdf']['tmp_name'], $mid_pdf_target)) {
                                    $sql_fields .= ", mid_pdf";
                                    $sql_values .= ", ?";
                                    $types .= "s";
                                    $values[] = $mid_pdf;
                                    $filesUploaded = true;
                                }
                                if ($final_pdf && move_uploaded_file($_FILES['final_pdf']['tmp_name'], $final_pdf_target)) {
                                    $sql_fields .= ", final_pdf";
                                    $sql_values .= ", ?";
                                    $types .= "s";
                                    $values[] = $final_pdf;
                                    $filesUploaded = true;
                                }

                                if ($filesUploaded || (!$mid_pdf && !$final_pdf)) {
                                    echo "Files have been uploaded successfully, if provided.";
                                    $sql = "INSERT INTO exam_question ($sql_fields) VALUES ($sql_values)";
                                    if ($stmt = $con->prepare($sql)) {
                                        $stmt->bind_param($types, ...$values);
                                        $stmt->execute();
                                        if ($stmt->affected_rows > 0) {
                                            echo "New record created successfully";
                                        } else {
                                            echo "Error: " . $stmt->error;
                                        }
                                        $stmt->close();
                                    } else {
                                        echo "Error preparing statement: " . $con->error;
                                    }
                                } else {
                                    echo "Failed to upload files, if any were provided.";
                                }
                            }
                        } else {
                            echo "Error preparing statement: " . $con->error;
                        }
                    } else {
                        echo "All fields are required.";
                    }
                }
            ?>



          
        </div> <!-- End of Main Section -->
    </div> <!-- End of Row -->

    <!-- Footer -->
    <?php include "./partials/footer.php"; ?>

</div> <!-- End of Container -->

<!-- Bootstrap JS link -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
