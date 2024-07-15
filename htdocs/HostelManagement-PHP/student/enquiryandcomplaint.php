<?php
session_start();
include('../includes/dbconn.php');
include('../includes/check-login.php');
check_login();

if (isset($_POST['submit'])) {
    $type = $_POST['type']; // Type of enquiry or complaint
    $regNo = $_POST['regNo']; // Registration number
    $complaintType = $_POST['complaint_type']; // Complaint type
    $description = $_POST['description']; // Description of the enquiry or complaint

    // Insert into student_enquiry_complaint table
    $query = "INSERT INTO student_enquiry_complaint (regNo, enquiry_type, complaint_type, description) VALUES (?, ?, ?, ?)";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param('ssss', $regNo, $type, $complaintType, $description);
    $stmt->execute();
    echo "<script>alert('Enquiry/Complaint submitted successfully!');</script>";
}
?>

<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enquiry/Complaint Form</title>
</head>
<body>
    <!-- Enquiry/Complaint form -->
    <form method="POST">
        <!-- Type selection -->
        <div class="form-group">
            <label for="type">Type:</label>
            <select name="type" id="type" class="form-control" required onchange="showFields()">
                <option value="enquiry">Enquiry</option>
                <option value="complaint">Complaint</option>
            </select>
        </div>
        <!-- Registration Number -->
        <div class="form-group" id="regNoField">
            <label for="regNo">Registration Number:</label>
            <input type="text" name="regNo" class="form-control" required>
        </div>
        <!-- Complaint Type -->
        <div class="form-group" id="complaintTypeField" style="display: none;">
            <label for="complaintType">Complaint Type:</label>
            <select name="complaint_type" id="complaintType" class="form-control" required>
                <option value="househelp">House Help</option>
                <option value="maintenance">Maintenance</option>
                <option value="food">Food</option>
                <option value="staff">Staff</option>
                <option value="room_related">Room Related</option>
            </select>
        </div>
        <!-- Description -->
        <div class="form-group">
            <label for="description">Description:</label>
            <textarea name="description" id="description" class="form-control" rows="4" required></textarea>
        </div>
        <!-- Submit button -->
        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        <!-- Reset button -->
        <button type="reset" class="btn btn-secondary">Reset</button>
    </form>
    <!-- End of Enquiry/Complaint form -->

    <script>
        function showFields() {
            var type = document.getElementById("type").value;
            if (type === "complaint") {
                document.getElementById("complaintTypeField").style.display = "block";
            } else {
                document.getElementById("complaintTypeField").style.display = "none";
            }
        }
    </script>
</body>
</html>
