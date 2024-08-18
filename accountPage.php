<?php
session_start();
include 'connect.php';

// Fetch user details from database
$id = $_SESSION['id'];
$sql = "SELECT * FROM user1 WHERE id = $id ";
$newrecords = mysqli_query($conn, $sql);
$result = mysqli_fetch_assoc($newrecords);

// Process form submissions
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Update user details
    if (isset($_POST['sub'])) {
        $fname = $_POST['fname'];
        $phn = $_POST['phn'];
        $dob = $_POST['dob'];
        
        $update_sql = "UPDATE user1 SET name='$fname', phone='$phn', DOB='$dob' WHERE id=$id";
        if (mysqli_query($conn, $update_sql)) {
            echo '<div class="alert alert-success" role="alert">Details updated successfully!</div>';
            // Refresh user details after update
            $result['name'] = $fname;
            $result['phone'] = $phn;
            $result['DOB'] = $dob;
        } else {
            echo '<div class="alert alert-danger" role="alert">Error updating details: ' . mysqli_error($conn) . '</div>';
        }
    }
    
    // Update password
    if (isset($_POST['subpass'])) {
        $oldp = $_POST['oldp'];
        $newp = $_POST['newp'];
        $confirmp = $_POST['confirmp'];
        
        // Verify old password before updating
        $verify_sql = "SELECT * FROM user1 WHERE id=$id AND passwd='$oldp'";
        $verify_result = mysqli_query($conn, $verify_sql);
        
        if (mysqli_num_rows($verify_result) == 1) {
            // Update password
            if ($newp === $confirmp) {
                $update_pass_sql = "UPDATE user1 SET passwd='$newp' WHERE id=$id";
                if (mysqli_query($conn, $update_pass_sql)) {
                    echo '<div class="alert alert-success" role="alert">Password updated successfully!</div>';
                } else {
                    echo '<div class="alert alert-danger" role="alert">Error updating password: ' . mysqli_error($conn) . '</div>';
                }
            } else {
                echo '<div class="alert alert-danger" role="alert">New passwords do not match!</div>';
            }
        } else {
            echo '<div class="alert alert-danger" role="alert">Incorrect old password!</div>';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Watch Web Account</title>
    <link rel="stylesheet" href="styles.css" type="text/css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-md navbar-dark bg-dark">
            <a href="homepage.php" class="navbar-brand"> <img src="images/logo.png" alt=""> </a>
            <span class="navbar-text">Watch Web</span>
            <ul class="navbar-nav">
                <li class="nav-item"> <a href="homePage.php" class="nav-link">Home</a> </li>
                <li class="nav-item"> <a href="logOut.php" class="nav-link">Logout</a> </li>
            </ul>
        </nav>
    </header>

    <div class="container">
        <h2>Account Information</h2>
        <br>
        <label><b>Email Id:</b> <?php echo $result['email']; ?></label>
        <br><br>
        <form action='' method='POST'>
            <div class="form-group">
                <label for="fname"><b>Full Name:</b></label>
                <input type='text' class='form-control' id='fname' name='fname'
                    value='<?php echo ucwords($result['name']); ?>'>
            </div>
            <div class="form-group">
                <label for="phn"><b>Mobile Number:</b></label>
                <input type='text' class='form-control' id='phn' name='phn' value='<?php echo $result['phone']; ?>'>
            </div>
            <div class="form-group">
                <label for="dob"><b>Date of Birth:</b></label>
                <input type='text' class='form-control' id='dob' name='dob' value='<?php echo $result['DOB']; ?>'>
            </div>
            <button type='submit' class='btn btn-success' name='sub' value='submit'>Update Details</button>
        </form>

        <hr>

        <h2>Change Password</h2>
        <br>
        <form action='' method='post'>
            <div class="form-group">
                <label for="oldp"><b>Old Password:</b></label>
                <input type='password' class='form-control' id='oldp' name='oldp' placeholder='Enter old password'>
            </div>
            <div class="form-group">
                <label for="newp"><b>New Password:</b></label>
                <input type='password' class='form-control' id='newp' name='newp' placeholder='Enter new password'>
            </div>
            <div class="form-group">
                <label for="confirmp"><b>Confirm Password:</b></label>
                <input type='password' class='form-control' id='confirmp' name='confirmp'
                    placeholder='Confirm new password'>
            </div>
            <div id="extra">
                <button type='submit' class='btn btn-success' name='subpass' value='submit'>Update Password</button>
            </div>
        </form>
    </div>

    <footer class="page-footer font-small blue">
        <div class="footer-copyright text-center py-3">© 2024 Copyright:
            <a href="mailto:nihalroman7@gmail.com">nihalroman7@gmail.com</a>
        </div>
    </footer>

</body>

</html>
