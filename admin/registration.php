<?php
include "inc/connection.php";
include "inc/functions.php";
ob_start();
session_start();
if (!empty($_SESSION['u_email'])) {
    header('Location: dashboard.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up Form by Colorlib</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="LoginRegAssets/fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="LoginRegAssets/css/style.css">
</head>

<body>

    <div class="main">

        <!-- Sign up form -->
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">Sign up</h2>
                        <form method="POST" class="register-form" id="register-form">
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="name" id="name" placeholder="Your Name" />
                            </div>
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email"></i></label>
                                <input type="email" name="email" id="email" placeholder="Your Email" />
                            </div>
                            <div class="form-group">
                                <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="pass" id="pass" placeholder="Password" />
                            </div>
                            <div class="form-group">
                                <label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
                                <input type="password" name="re_pass" id="re_pass" placeholder="Repeat your password" />
                            </div>
                            <!-- <div class="form-group">
                                <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" />
                                <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all statements in <a href="#" class="term-service">Terms of service</a></label>
                            </div> -->
                            <div class="form-group form-button">
                                <input type="submit" name="signup" class="form-submit" value="Register" />
                            </div>
                        </form>

                        <?php

                        if (isset($_POST['signup'])) {
                            $name = $_POST['name'];
                            $email = $_POST['email'];
                            $pass = $_POST['pass'];
                            $re_pass = $_POST['re_pass'];

                            if ($pass  == $re_pass) {
                               //echo "pass";
                                $passsha = sha1($pass);

                                $signup_sql = "INSERT INTO users(u_name,u_email,u_password) VALUES ('$name','$email','$passsha')";
                                $signup_result = mysqli_query($db, $signup_sql);

                                //echo $signup_sql;

                                if ($signup_result) {
                                    header('Location: index.php');
                                } else {
                                    //echo '<script>alert("Registration Error")</script>';
                                    echo "Registration Error";
                                    // die("reister  Users details failed" . mysqli_error($db));
                                }
                            } else {
                                echo '<script>alert("Password and Re-Password not match ")</script>';
                            }
                        }
                        ?>

                    </div>
                    <div class="signup-image">
                        <figure><img src="LoginRegAssets/images/signup-image.jpg" alt="sing up image"></figure>
                        <a href="index.php" class="signup-image-link">I am already member</a>
                    </div>
                </div>
            </div>
        </section>

    </div>

    <!-- JS -->
    <script src="LoginRegAssets/vendor/jquery/jquery.min.js"></script>
    <script src="LoginRegAssets/js/main.js"></script>

    <?php
    ob_end_flush();
    ?>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>