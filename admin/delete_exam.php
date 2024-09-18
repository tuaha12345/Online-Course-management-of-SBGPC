<?php
// Include database connection
include './includes/connect.php';
global $con;

// Check if ID is provided
if(isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Query to fetch row with provided ID
    $query = "DELETE FROM exam_question WHERE id = $id";
    $result = mysqli_query($con, $query);
    
    if($result) {

        echo "<script>
                window.location.href = 'all_exam_question.php';
             </script>";
    } else {
        echo "No exam question found with ID: $id";
    }
} else {
    echo "ID not provided.";
}
?>




