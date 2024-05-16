<?php
    // Include db.php for database connection
    include 'student_db.php';

    // Get the information based on the id
    if (isset($_REQUEST['id']) && is_numeric($_REQUEST['id'])) {
        $id = $_REQUEST['id'];

        // Prepare the SQL query to select user information
        $stmt = $conn->prepare("SELECT * FROM students WHERE stud_id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            // Assign user information to variables
            $fname = $row["fname"];
            $mname = $row["mname"];
            $lname = $row["lname"];
            $suffix = $row["suffix"];
            $course = $row["course"];
            $yrsec = $row["yrsec"];
        } else {
            echo "No user found with the given ID.";
            exit(); // Stop script execution if ID not found
        }

        // Close the statement
        $stmt->close();
    } else {
        echo "No ID provided or invalid ID.";
        exit(); // Stop script execution if ID not provided
    }

    // Updates the records
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Collect form data
        $id = $_POST['id'];
        $fname = $_POST['fname'];
        $mname = $_POST['mname'];
        $lname = $_POST['lname'];
        $suffix = $_POST['suffix'];
        $course = $_POST['course'];
        $yrsec = $_POST['yrsec'];

        // Prepare and execute SQL query for update
        $stmt = $conn->prepare("UPDATE students SET fname=?, mname=?, lname=?, suffix=?, course=?, yrsec=? WHERE stud_id=?");
        $stmt->bind_param("ssssssi", $fname, $mname, $lname, $suffix, $course, $yrsec, $id);

        if ($stmt->execute()) {
            echo "<script>alert('Data updated successfully!');</script>";
        } else {
            echo "Error updating data: " . $stmt->error;
        }

        // Close the statement
        $stmt->close();
    }

    // Close connection
    mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Student</title>
    <!-- Add your CSS styles here if needed -->
    <style>
        /* Add your CSS styles here */
    </style>
</head>
<body>
    <form method="POST">
        Barangay Registration Form<br><br>
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($id); ?>"><br>
        First Name:
        <input type="text" name="fname" value="<?php echo htmlspecialchars($fname); ?>"><br><br>
        Middle Name:
        <input type="text" name="mname" value="<?php echo htmlspecialchars($mname); ?>"><br><br>
        Last Name:
        <input type="text" name="lname" value="<?php echo htmlspecialchars($lname); ?>"><br><br>
        Suffix:
        <input type="text" name="suffix" value="<?php echo htmlspecialchars($suffix); ?>"><br><br>
        Course:
        <input type="text" name="course" value="<?php echo htmlspecialchars($course); ?>"><br><br>
        Year and Section:
        <input type="text" name="yrsec" value="<?php echo htmlspecialchars($yrsec); ?>"><br><br>

        <input type="submit" value="Update"> 
        <a href="home.php"><input type="button" value="Back"></a>
    </form>
</body>
</html>
