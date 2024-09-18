<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Total Students</title>
    <style>
        /* Style for the total student count */
        #totalStudents {
            font-size: 24px;
            color: blue;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <h1>Total Students:</h1>
    <div id="totalStudents">0</div>

<?php 

    $num=50;
    echo "fakjfdk";

   echo  "<script>
        // Get the total student count element
        const totalStudentsElement = document.getElementById('totalStudents');
        // Set the initial count to 0
        let count = 0;

        // Function to increment count and update the display
        function updateCount() {
            // Increment the count
            count++;
            // Update the display with the new count
            totalStudentsElement.textContent = count;

            // If count is less than 27, schedule the next update after a random delay (for effect)
            if (count < $num) {
                setTimeout(updateCount,100); // Random delay between 0 and 2000 milliseconds
            }
        }

        // Call the updateCount function to start the counting effect
        updateCount();
    </script>";
?>
</body>
</html>
