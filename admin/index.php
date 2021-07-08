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

        <!-- Sing in  Form -->
        <section class="sign-in">
            <div class="container">
                <div class="signin-content">
                    <div class="signin-image">
                        <figure><img src="LoginRegAssets/images/signin-image.jpg" alt="sing up image"></figure>
                        <a href="registration.php" class="signup-image-link">Create an account</a>
                    </div>
                    <div class="signin-form">
                        <h2 class="form-title">Sign up</h2>
                        <form method="POST" class="register-form" id="login-form">
                            <div class="form-group">
                                <label for="your_email"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="email" name="your_email" id="your_email" placeholder="Your Email" />
                            </div>
                            <div class="form-group">
                                <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="your_pass" id="your_pass" placeholder="Password" />
                            </div>
                            <!-- <div class="form-group">
                                <input type="checkbox" name="remember-me" id="remember-me" class="agree-term" />
                                <label for="remember-me" class="label-agree-term"><span><span></span></span>Remember me</label>
                            </div> -->
                            <div class="form-group form-button">
                                <input type="submit" name="signin" id="signin" class="form-submit" value="Log in" />
                            </div>
                        </form>

                        <?php

                        if (isset($_POST['signin'])) {
                            $your_email = $_POST['your_email'];
                            $your_pass = $_POST['your_pass'];

                            $your_pass_hash = sha1($your_pass);


                            $login_details_sql = "SELECT* FROM users WHERE u_email='$your_email'";

                            $login_details_result = mysqli_query($db, $login_details_sql);

                            while ($row = mysqli_fetch_assoc($login_details_result)) {
                                $_SESSION['u_id']         = $row['u_id'];
                                $_SESSION['u_name']       = $row['u_name'];
                                $_SESSION['u_image']      = $row['u_image'];
                                $_SESSION['u_email']      = $row['u_email'];
                                $u_password               = $row['u_password'];
                                $_SESSION['u_address']    = $row['u_address'];
                                $_SESSION['u_phone']      = $row['u_phone'];
                                $_SESSION['u_dob']        = $row['u_dob'];
                                $_SESSION['u_gender']     = $row['u_gender'];
                                $_SESSION['u_role']       = $row['u_role'];
                                $_SESSION['u_bio']        = $row['u_bio'];
                                $_SESSION['u_education']  = $row['u_education'];
                                $_SESSION['u_status']     = $row['u_status'];
                            }

                            if ($_SESSION['u_email'] == $your_email && $u_password == $your_pass_hash) {
                                header('Location: dashboard.php');
                            } else if ($_SESSION['u_email'] != $your_email || $u_password != $your_pass_hash) {
                                header('Location: index.php');
                            } else {
                                header('Location: index.php');
                            }
                        }

                        ?>
                        <div class="social-login">
                            <span class="social-label">Or login with</span>
                            <ul class="socials">
                                <li><a href="#"><i class="display-flex-center zmdi zmdi-facebook"></i></a></li>
                                <li><a href="#"><i class="display-flex-center zmdi zmdi-twitter"></i></a></li>
                                <li><a href="#"><i class="display-flex-center zmdi zmdi-google"></i></a></li>
                            </ul>
                        </div>
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