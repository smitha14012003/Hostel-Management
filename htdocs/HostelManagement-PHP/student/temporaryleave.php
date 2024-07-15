<?php
session_start();
include('../includes/dbconn.php');
include('../includes/check-login.php');
check_login();

if (isset($_POST['submit'])) {
    $reason = $_POST['reason'];
    $leave_from = $_POST['leave_from'];
    $leave_to = $_POST['leave_to'];
    $regNo = $_POST['regNo']; // Retrieve registration number from the form

    // Insert into student_leaves table
    $query = "INSERT INTO student_leaves (regNo, leave_from, leave_to, reason) VALUES (?, ?, ?, ?)";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param('ssss', $regNo, $leave_from, $leave_to, $reason);
    $stmt->execute();
    echo "<script>alert('Leave application submitted successfully!');</script>";
}
?>

<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Temporary Leave Application</title>
</head>
<body>
    <!-- Leave application form -->
    <form method="POST">
        <!-- Leave application form fields -->
        <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Temporary Leave Application Form</h4>
        <div class="row">
            <!-- Registration Number -->
            <div class="col-sm-12 col-md-6 col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Registration Number</h4>
                        <div class="form-group mb-4">
                            <input type="text" name="regNo" class="form-control" required>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Reason -->
            <div class="col-sm-12 col-md-6 col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Reason</h4>
                        <div class="form-group mb-4">
                            <input type="text" name="reason" class="form-control" required>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Leave From -->
            <div class="col-sm-12 col-md-6 col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Leave From</h4>
                        <div class="form-group">
                            <input type="date" name="leave_from" class="form-control" required>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Leave To -->
            <div class="col-sm-12 col-md-6 col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Leave To</h4>
                        <div class="form-group">
                            <input type="date" name="leave_to" class="form-control" required>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Submit button -->
        <div class="form-actions">
            <div class="text-center">
                <button type="submit" name="submit" class="btn btn-success">Submit</button>
                <button type="reset" class="btn btn-dark">Reset</button>
            </div>
        </div>
    </form>
    <!-- End of Leave application form -->
</body>
</html>
