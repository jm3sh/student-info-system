<html>
    <body>
        <h2>Student Information System</h2>
        <form method="POST">
            First Name:
            <input type="text" name="fname" required><br><br>
            Middle Name:
            <input type="text" name="mname" required><br><br>
            Last Name:
            <input type="text" name="lname" required><br><br>
            Suffix:
            <input type="text" name="suffix" required><br><br>
            Course:
            <input type="text" name="course" required><br><br>
            Year and Section:
            <input type="text" name="yrsec" required><br><br>


            <input type="submit" value="Add">
            <input type="reset" value="Clear">
            <a href="home.php"><input type="button" value="Back"></a>

        </form>
        <?php
            include 'student_db.php'; // Include db.php for database connection

            // Check if form is submitted
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // Collect form data
                $fname = $_POST['fname'];
                $mname = $_POST['mname']; 
                $lname = $_POST['lname'];
                $suffix = $_POST['suffix'];
                $course = $_POST['course'];
                $yrsec = $_POST['yrsec'];
                

                // Insert data into database
                $sql = "INSERT INTO students (fname, mname, lname, suffix, course, yrsec) VALUES ('$fname', '$mname', '$lname', '$suffix', '$course', '$yrsec')";
                
                
                if (mysqli_query($conn, $sql)) {
                    echo "<p style='color:green;'>Data added successfully!</p>";
                } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                }
            }
        ?>
    </body>
</html>
