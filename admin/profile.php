<?php

include "inc/header.php";
include "inc/menubar.php";

?>

<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="page-breadcrumb bg-white">
    <div class="row align-items-center">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">Dashboard</h4>
        </div>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- ============================================================== -->
<!-- End Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- Container fluid  -->
<!-- ============================================================== -->
<div class="container-fluid">
    <!-- ============================================================== -->

    <?php

    $user_id = $_SESSION['u_id'];

    $users_profile_sql = "SELECT* FROM users WHERE u_id = '$user_id'";
    $users_profile_result = mysqli_query($db, $users_profile_sql);

    while ($row = mysqli_fetch_assoc($users_profile_result)) {
        $u_id = $row['u_id'];
        $u_name = $row['u_name'];
        $u_image = $row['u_image'];
        $u_email = $row['u_email'];
        $u_password  = $row['u_password '];
        $u_address = $row['u_address'];
        $u_phone = $row['u_phone'];
        $u_dob = $row['u_dob'];
        $u_gender = $row['u_gender'];
        $u_role = $row['u_role'];
        $u_bio = $row['u_bio'];
        $u_education = $row['u_education'];
        $u_status = $row['u_status'];
    }



    ?>

    <div class="row">
        <!-- Column -->
        <div class="col-lg-4 col-xlg-3 col-md-12">
            <div class="white-box">
                <div class="user-bg"> <img width="100%" alt="user" src="img/users/<?php echo $u_image; ?>">
                    <div class="overlay-box">
                        <div class="user-content">
                            <a href="javascript:void(0)"><img src="img/users/<?php echo $u_image; ?>" class="thumb-lg img-circle" alt="img"></a>
                            <h4 class="text-white mt-2"><?php echo $u_name; ?></h4>
                            <h5 class="text-white mt-2"><?php echo $u_email; ?></h5>
                        </div>
                    </div>
                </div>
                <div class="user-btm-box mt-5 d-md-flex">
                    <div class="col-md-4 col-sm-4 text-center">
                        <h1>+880<?php echo $u_phone; ?></h1>
                    </div>

                </div>
            </div>
        </div>
        <!-- Column -->
        <!-- Column -->
        <div class="col-lg-8 col-xlg-9 col-md-12">
            <div class="card">
                <div class="card-body">
                    <form class="form-horizontal form-material">
                        <div class="form-group mb-4">
                            <label class="col-md-12 p-0">Full Name</label>
                            <div class="col-md-12 border-bottom p-0">
                                <input type="text" value="<?php echo $u_name; ?>" class="form-control p-0 border-0">
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <label for="example-email" class="col-md-12 p-0">Email</label>
                            <div class="col-md-12 border-bottom p-0">
                                <input type="email" value="<?php echo $u_email; ?>" class="form-control p-0 border-0" name="example-email" id="example-email">
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <label class="col-md-12 p-0">Password</label>
                            <div class="col-md-12 border-bottom p-0">
                                <input type="password" value="<?php echo $u_password; ?>" class="form-control p-0 border-0">
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <label class="col-md-12 p-0">Phone No</label>
                            <div class="col-md-12 border-bottom p-0">
                                <input type="text" value="<?php echo $u_phone; ?>" class="form-control p-0 border-0">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="exampleBiodata">Biodata</label>
                            <textarea name="user_bio" class="form-control" id="exampleBiodata" rows="3" value="<?php echo $u_bio; ?>"><?php echo $u_bio; ?></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="exampleEducation">Education</label>
                            <textarea name="user_edu" class="form-control" id="exampleEducation" rows="3" value="<?php echo $u_education; ?>"><?php echo $u_education; ?></textarea>
                        </div>
                        <div class="form-group mb-4">
                            <div class="col-sm-12">
                                <button class="btn btn-success">Update Profile</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Column -->
    </div>

</div>
<!-- ============================================================== -->
<!-- End Container fluid  -->
<!-- ============================================================== -->



<?php include "inc/footer.php"; ?>