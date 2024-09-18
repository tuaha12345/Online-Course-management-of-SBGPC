


<?php
include './includes/connect.php';
include './function/all_function.php';
session_start();

if (!isset($_SESSION['name'])) {
    // Redirect to index.php
    header("Location: ../index.php");
    exit;
}

global $con;

// Check if the course information is present in the query string
if (isset($_GET['teacher_name']) && isset($_GET['course_code']) && isset($_GET['section'])) {
    // Collecting query parameters
    $teacherName = $_GET['teacher_name'];
    $courseCode = $_GET['course_code'];
    $section = $_GET['section'];

    // Check for confirmation
    if (isset($_POST['confirm']) && $_POST['confirm'] == 'Yes') {
        // SQL to delete a specific record
        $sql = "DELETE FROM courses WHERE teacher_name = ? AND course_code = ? AND section = ?";

        // Prepare the SQL statement
        $stmt = $con->prepare($sql);
        if (!$stmt) {
            echo "Error preparing statement: " . $con->error;
            exit;
        }

        // Bind the parameters
        $stmt->bind_param("sss", $teacherName, $courseCode, $section);

        // Execute the query
        if ($stmt->execute()) {
            echo "Course successfully deleted.";
            // Redirect back to a course list or dashboard page
            header("Location: index.php");
            exit;
        } else {
            echo "Error deleting course: " . $stmt->error;
        }

        // Close statement
        $stmt->close();
    } elseif (isset($_POST['confirm']) && $_POST['confirm'] == 'No') {
        // Redirect to index page if the user chooses not to delete
        header("Location: index.php");
        exit;
    } else {
        // Show confirmation form
        echo "<form method='post'>";
        echo "<h3>Are you sure you want to delete this course?</h3>";
        echo "<input type='submit' name='confirm' value='Yes' />";
        echo "<input type='submit' name='confirm' value='No' />";
        echo "</form>";
    }
} else {
    // Parameters are missing
    echo "Required information is missing.";
}

// Close database connection
$con->close();
?>
