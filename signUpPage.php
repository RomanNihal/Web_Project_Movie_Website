<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>Registration</title>
    <link rel="stylesheet" href="styles.css" type="text/css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
    <header>
        <div class="container-fluid">
            <nav class="navbar navbar-expand-md navbar-dark bg-dark">
                <a href="index.php" class="navbar-brand">
                    <img src="images/logo.png" alt="">
                </a>
                <span class="navbar-text">Watch Web</span>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item"><a href="signInPage.php" class="nav-link">Sign In</a></li>
                </ul>
            </nav>
            <div class="container">
                <div class="jumbotron">
                    <h1>Create an account</h1>
                    <p>It's free and always will be.</p>
                    <form action="signUp.php" method="POST">
                        <div class="row">
                            <div class="col">
                                <input type="text" class="form-control" placeholder="First Name" name="fname" value="">
                            </div>
                            <div class="col">
                                <input type="text" class="form-control" placeholder="Last Name" name="lname" value="">
                            </div>
                        </div>
                        <br>
                        <input type="text" class="form-control" placeholder="Mobile Number" name="phn" value="">
                        <br>
                        <input type="email" class="form-control" placeholder="Email Address" name="mail" value="">
                        <br>
                        <input type="password" class="form-control" placeholder="Password" name="pass" value="">
                        <br>
                        <div class="form-group">
                            <label for="dob">Birthday</label>
                            <div class="row">
                                <div class="col">
                                    <select class="form-control" name="date">
                                        <option selected>Date...</option>
                                        <?php for($i=1; $i<=31; $i++) echo "<option value='$i'>$i</option>"; ?>
                                    </select>
                                </div>
                                <div class="col">
                                    <select class="form-control" name="month">
                                        <option selected>Month...</option>
                                        <?php
                                        $months = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
                                        foreach($months as $index => $month) {
                                            $value = str_pad($index + 1, 2, '0', STR_PAD_LEFT);
                                            echo "<option value='$value'>$month</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col">
                                    <select class="form-control" name="year">
                                        <option selected>Year...</option>
                                        <?php for($i=1980; $i<=2012; $i++) echo "<option value='$i'>$i</option>"; ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="signupbutton">
                            <button type="submit" class="btn btn-success btn-lg" name="sub" value="submit">Sign Up</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </header>
    <footer class="page-footer font-small blue">
        <div class="footer-copyright text-center py-3">© 2024 Copyright:
            <a href="mailto:nihalroman7@gmail.com">nihalroman7@gmail.com</a>
        </div>
    </footer>
</body>
</html>
