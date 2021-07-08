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

    <?php

    $do = isset($_GET['do']) ? $_GET['do'] : 'Manage';

    //Manage ALl users

    if ($do == 'Manage') {
    ?>
        <div class="row justify-content-center">
            <div class="col-lg-12 col-md-12 col sm-12">
                <div class="white-box analytics-info">
                    <h3 class="box-title">View All Users</h3>
                    <ul class="mt-3">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="white-box">
                                    <div class="table-responsive">
                                        <table class="table text-nowrap">
                                            <thead>
                                                <tr>
                                                    <th class="border-top-0">#</th>
                                                    <th class="border-top-0">Thumbline</th>
                                                    <th class="border-top-0">Name</th>
                                                    <th class="border-top-0">Email</th>
                                                    <th class="border-top-0">Address</th>
                                                    <th class="border-top-0">Phone</th>
                                                    <th class="border-top-0">Birth Date</th>
                                                    <th class="border-top-0">Gender</th>
                                                    <th class="border-top-0">Role</th>
                                                    <th class="border-top-0">Status</th>
                                                    <th class="border-top-0">Action</th>


                                                </tr>
                                            </thead>
                                            <tbody>

                                                <?php

                                                $users_details_sql = "SELECT* FROM users";
                                                $users_details_result = mysqli_query($db, $users_details_sql);

                                                $count = 0;

                                                while ($row = mysqli_fetch_assoc($users_details_result)) {
                                                    $u_id = $row['u_id'];
                                                    $u_name = $row['u_name'];
                                                    $u_image = $row['u_image'];
                                                    $u_email = $row['u_email'];
                                                    $u_address = $row['u_address'];
                                                    $u_phone = $row['u_phone'];
                                                    $u_dob = $row['u_dob'];
                                                    $u_gender = $row['u_gender'];
                                                    $u_role = $row['u_role'];
                                                    $u_status = $row['u_status'];
                                                    $count++;

                                                ?>
                                                    <tr>
                                                        <td><?php echo $count; ?></td>
                                                        <td><img class="img-thumbnail" src="img/users/<?php echo $u_image ?>" width="120px" alt=""></td>
                                                        <td><?php echo $u_name; ?></td>
                                                        <td><?php echo $u_email; ?></td>
                                                        <td><?php echo $u_address; ?></td>
                                                        <td><?php echo $u_phone; ?></td>
                                                        <td><?php echo $u_dob; ?></td>
                                                        <td><?php echo $u_gender; ?></td>
                                                        <td>
                                                            <?php

                                                            if ($u_role == 0) {
                                                                echo "<span class='badge bg-danger fw-bold '>Subscriber</span>";
                                                            }
                                                            if ($u_role == 1) {
                                                                echo "<span class='badge bg-success fw-bold '>Editor</span>";
                                                            }
                                                            if ($u_role == 2) {
                                                                echo "<span class='badge bg-primary fw-bold '>Admin</span>";
                                                            }
                                                            ?>
                                                        </td>
                                                        <td>
                                                            <?php
                                                            if ($u_status == 0) {
                                                                echo "<span class='badge bg-danger fw-bold'>Inactive</span>";
                                                            }
                                                            if ($u_status == 1) {
                                                                echo "<span class='badge bg-success fw-bold'>Active</span>";
                                                            }
                                                            ?>
                                                        </td>
                                                        <td>
                                                            <!-- /Profile -->
                                                            <a href="" class="me-2" data-bs-toggle="tooltip" data-bs-placement="top" title="Profile"><i class="fas fa-eye text-warning"></i></a>

                                                            <!-- edit -->
                                                            <a href="users.php?do=edit&edit_id=<?php echo $u_id; ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><i class="fas fa-edit"></i></a>

                                                            <!-- delete -->
                                                            <a href="" class="ms-2" data-bs-toggle="modal" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete" data-bs-target="#delete<?php echo $u_id; ?>"><i class="fas fa-trash text-danger"></i></a>



                                                            <!-- Modal -->
                                                            <div class="modal fade " id="delete<?php echo $u_id; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                <div class="modal-dialog ">
                                                                    <div class="modal-content bg-warning">
                                                                        <div class="modal-header">
                                                                            <h2 class="modal-title text-danger fw-bold" id="exampleModalLabel">Are You Sure?</h2>
                                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <a type="button" class="btn btn-light fw-bold" data-bs-dismiss="modal">Close</a>
                                                                            <a href="users.php?do=delete&delete_id=<?php echo $u_id; ?>" type="button" class="btn btn-danger text-light fw-bold">Confirm?</a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </td>


                                                    </tr>

                                                <?php
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </ul>
                </div>
            </div>
        </div>

    <?php
    }

    //Add new users
    if ($do == 'add') {
    ?>

        <div class="row justify-content-center">
            <div class="col-lg-12 col-md-12 col sm-12">
                <div class="white-box analytics-info">
                    <h3 class="box-title">Add New Users</h3>
                    <ul class="list-inline two-part">
                        <form method="POST" enctype="multipart/form-data">
                            <div class="row justify-content-center">
                                <div class="col-md-6 col-sm-12 col-lg-6">
                                    <div class="mb-3">
                                        <label for="exampleInputusername" class="form-label">User Name*</label>
                                        <input name="user_name" type="text" class="form-control" id="exampleInputusername">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">User Email*</label>
                                        <input name="user_email" type="email" class="form-control" id="exampleInputEmail1">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputPassword1" class="form-label">Password*</label>
                                        <input name="user_pass" type="password" class="form-control" id="exampleInputPassword1">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputaddress" class="form-label">Address</label>
                                        <input name="user_address" type="text" class="form-control" id="exampleInputaddress">
                                    </div>
                                    <div class="mb-3">
                                        <label for="example-tel-input" class="col-2 col-form-label">Phone</label>
                                        <div class="col-12">
                                            <input name="user_phone" class="form-control" type="tel" id="example-tel-input">
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="example-date-input" class="col-2 col-form-label">Date</label>
                                        <div class="col-12">
                                            <input name="user_date" class="form-control" type="date" id="example-date-input">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12 col-lg-6">
                                    <div class="mb-3">
                                        <label for="exampleSelect1">Select Gender</label>
                                        <select name="user_gender" class="form-select" aria-label="Default select example1">
                                            <option selected>Select Gender</option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                            <option value="Others">Others</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleSelect2">Select Role</label>
                                        <select name="user_role" class="form-select" aria-label="Default select example2">
                                            <option selected>Select Status</option>
                                            <option value="0">Subscriber</option>
                                            <option value="1">Editor</option>
                                            <option value="2">Admin</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleSelect3">Select Status</label>
                                        <select name="user_status" class="form-select" aria-label="Default select example3">
                                            <option selected>Select Status</option>
                                            <option value="0">Inactive</option>
                                            <option value="1">Active</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleBiodata">Biodata</label>
                                        <textarea name="user_bio" class="form-control" id="exampleBiodata" rows="3"></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleEducation">Education</label>
                                        <textarea name="user_edu" class="form-control" id="exampleEducation" rows="3"></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputFilepho">Photo Upload*</label>
                                        <input name="user_image" type="file" class="form-control-file" id="exampleInputFilepho" aria-describedby="fileHelp">
                                        <br>
                                        <small id="fileHelp" class="form-text text-muted">Select Photo Only, Don't upload photo more than 1mb. upload jpg png jpeg format only</small>
                                    </div>
                                    <button name="user_submit" type="submit" class="btn btn-primary fs-5">Add New User</button>
                                </div>
                            </div>
                        </form>


                        <?php

                        if (isset($_POST['user_submit'])) {
                            $user_name = $_POST['user_name'];
                            $user_email = $_POST['user_email'];
                            $user_pass = $_POST['user_pass'];
                            $user_address = $_POST['user_address'];
                            $user_phone = $_POST['user_phone'];
                            $user_date = $_POST['user_date'];
                            $user_gender = $_POST['user_gender'];
                            $user_role = $_POST['user_role'];
                            $user_status = $_POST['user_status'];
                            $user_bio = $_POST['user_bio'];
                            $user_edu = $_POST['user_edu'];
                            $user_image = $_FILES['user_image']['name'];
                            $tmp_image = $_FILES['user_image']['tmp_image'];


                            if (!empty($user_name) ) {

                                $explode = explode('.', $_FILES['user_image']['name']);

                                $end = strtolower(end($explode));

                                $array = array('jpg', 'png', 'jpeg');


                                if (in_array($end, $array) === true) {

                                    $random = rand();
                                    $update_img = $random . $user_image;

                                    move_uploaded_file($tmp_image, 'img/users/' . $update_img);

                                    $encrypt_password = sha1($user_pass);

                                    $addusers = "INSERT INTO users (u_name,u_image,u_email,u_password,u_address,u_phone,u_dob,u_gender,u_bio,u_education,u_role,u_status) VALUES ('$user_name','$update_img','$user_email','$encrypt_password','$user_address','$user_phone','$user_date','$user_gender','$user_bio','$user_edu','$user_role','$user_status')";

                                    $addusersdb = mysqli_query($db, $addusers);

                                    if ($addusersdb) {
                                        header('Location: users.php');
                                    } else {
                                        die("INPUT Users details failed" . mysqli_error($db)); //echo "INPUT Users details failed" ;
                                    }
                                } else {
                                    echo "file name format error! This is not an image";
                                }
                            } else {
                                echo "<span class='badge bg-danger fw-bold fs-7'>PLEASE Input all required information like name email phone and photo</span>";
                            }
                        }


                        ?>

                    </ul>
                </div>
            </div>
        </div>

        <?php
    }

    //              
    //edit  users
    if ($do == 'edit') {


        if (isset($_GET['edit_id'])) {
            $edit_id = $_GET['edit_id'];

            //slect from database

            $edit_sql = "SELECT* FROM users WHERE u_id = '$edit_id'";

            //write query to send information to database
            $edit_result = mysqli_query($db, $edit_sql);

            //red from database by mysqli fetch assoc

            while ($row = mysqli_fetch_assoc($edit_result)) {
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
            <div class="row justify-content-center">
                <div class="col-lg-12 col-md-12 col sm-12">
                    <div class="white-box analytics-info">
                        <h3 class="box-title">Add New Users</h3>
                        <ul class="list-inline two-part">
                            <form action="users.php?do=update" method="POST" enctype="multipart/form-data">
                                <div class="row justify-content-center">
                                    <div class="col-md-6 col-sm-12 col-lg-6">
                                        <div class="mb-3">
                                            <label for="exampleInputusername" class="form-label">User Name*</label>
                                            <input name="user_name" type="text" class="form-control" id="exampleInputusername" value="<?php echo $u_name; ?>">
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">User Email*</label>
                                            <input name="user_email" type="email" class="form-control" id="exampleInputEmail1" value="<?php echo $u_email; ?>">
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputPassword1" class="form-label">Password*</label>
                                            <input name="user_pass" type="password" class="form-control" id="exampleInputPassword1">
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputaddress" class="form-label">Address</label>
                                            <input name="user_address" type="text" class="form-control" id="exampleInputaddress" value="<?php echo $u_address; ?>">
                                        </div>
                                        <div class="mb-3">
                                            <label for="example-tel-input" class="col-2 col-form-label">Phone</label>
                                            <div class="col-12">
                                                <input name="user_phone" class="form-control" type="tel" id="example-tel-input" value="<?php echo $u_phone; ?>">
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="example-date-input" class="col-2 col-form-label">Date</label>
                                            <div class="col-12">
                                                <input name="user_date" class="form-control" type="date" id="example-date-input" value="<?php echo $u_dob; ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12 col-lg-6">
                                        <div class="mb-3">
                                            <label for="exampleSelect1">Select Gender</label>
                                            <select name="user_gender" class="form-select" aria-label="Default select example1">
                                                <option>Select Gender</option>
                                                <option value="Male" <?php if ($u_gender == "Male") echo "selected"; ?>>Male</option>
                                                <option value="Female" <?php if ($u_gender == "Female") echo "selected"; ?>>Female</option>
                                                <option value="Others" <?php if ($u_gender == "Others") echo "selected"; ?>>Others</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleSelect2">Select Role</label>
                                            <select name="user_role" class="form-select" aria-label="Default select example2">
                                                <option>Select Status</option>
                                                <option value="0" <?php if ($u_role == "0") echo "selected"; ?>>Subscriber</option>
                                                <option value="1" <?php if ($u_role == "1") echo "selected"; ?>>Editor</option>
                                                <option value="2" <?php if ($u_role == "2") echo "selected"; ?>>Admin</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleSelect3">Select Status</label>
                                            <select name="user_status" class="form-select" aria-label="Default select example3">
                                                <option>Select Status</option>
                                                <option value="0" <?php if ($u_status == "0") echo "selected"; ?>>Inactive</option>
                                                <option value="1" <?php if ($u_status == "1") echo "selected"; ?>>Active</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleBiodata">Biodata</label>
                                            <textarea name="user_bio" class="form-control" id="exampleBiodata" rows="3" value="<?php echo $u_bio; ?>"><?php echo $u_bio; ?></textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleEducation">Education</label>
                                            <textarea name="user_edu" class="form-control" id="exampleEducation" rows="3" value="<?php echo $u_education; ?>"><?php echo $u_education; ?></textarea>
                                        </div>
                                        <div class="mb-3">
                                            <img src="img/users/<?php echo $u_image; ?>" width="120px" alt="">
                                            <br><br>
                                            <label for="exampleInputFilepho">Photo Upload*</label>
                                            <input name="user_image" type="file" class="form-control-file" id="exampleInputFilepho" aria-describedby="fileHelp">
                                            <br>
                                            <small id="fileHelp" class="form-text text-muted">Select Photo Only, Don't upload photo more than 1mb. upload jpg png jpeg format only</small>
                                        </div>
                                        <input type="hidden" name="user_updateID" value="<?php echo $edit_id; ?>"></input>
                                        <input type="submit" class="btn btn-primary fs-5" value="Update User Info">
                                    </div>
                                </div>
                            </form>

                        </ul>
                    </div>
                </div>
            </div>
    <?php
        }
    }
    //Update USERS
    if ($do == 'update') {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $user_updateID = $_POST['user_updateID'];
            $user_name = $_POST['user_name'];
            $user_email = $_POST['user_email'];
            $user_pass = $_POST['user_pass'];
            $user_address = $_POST['user_address'];
            $user_phone = $_POST['user_phone'];
            $user_date = $_POST['user_date'];
            $user_gender = $_POST['user_gender'];
            $user_role = $_POST['user_role'];
            $user_status = $_POST['user_status'];
            $user_bio = $_POST['user_bio'];
            $user_edu = $_POST['user_edu'];
            $user_image = $_FILES['user_image']['name'];
            $tmp_image = $_FILES['user_image']['tmp_image'];


            //password and image not update
            if (empty($user_pass) && empty($user_image)) {

                $update_users = "UPDATE users SET u_name = '$user_name', u_email = '$user_email', u_address = '$user_address', u_phone = '$user_phone ', u_dob = '$user_date ', u_gender = '$user_gender', u_bio = '$user_bio', u_education = '$user_edu', u_role = '$user_role', u_status = '$user_status' WHERE u_id ='$user_updateID' ";

                $update_sql = mysqli_query($db, $update_users);

                if ($update_sql) {
                    header('Location: users.php');
                } else {
                    die("users update error") . mysqli_error($db);
                }
            }

            //only image update, password not update. delete image first then upload new img
            else if (empty($user_pass) && !empty($user_image)) {

                $explode = explode('.', $_FILES['user_image']['name']);
                $end = strtolower(end($explode));
                $array = array('jpg', 'png', 'jpeg');

                if (in_array($end, $array) === true) {

                    $random = rand();
                    $update_img = $random . $user_image;

                    move_uploaded_file($tmp_image, 'img/users/' . $update_img);

                    ////////////////////////Delete image from database to upload new image

                    $delete_users = "SELECT u_image FROM users WHERE u_id ='$user_updateID' ";
                    //link to database
                    $delete_users_result = mysqli_query($db, $delete_users);
                    //while loop
                    while ($row = mysqli_fetch_assoc($delete_users_result)) {
                        $user_img_name = $row['u_image'];
                    }
                    //unlink for deleting photo or file
                    unlink('img/users/' . $user_img_name);

                    $update_users_photo = "UPDATE users SET u_name = '$user_name', u_email = '$user_email', u_image  = '$update_img', u_address = '$user_address', u_phone = '$user_phone ', u_dob = '$user_date ', u_gender = '$user_gender', u_bio = '$user_bio', u_education = '$user_edu', u_role = '$user_role', u_status = '$user_status' WHERE u_id ='$user_updateID' ";

                    $update_sql_photo = mysqli_query($db, $update_users_photo);

                    if ($update_sql_photo) {
                        header('Location: users.php');
                    } else {
                        die("users photo update error") . mysqli_error($db);
                    }
                } else {
                    echo "file name format error! This is not an image";
                }
            }

            //only password update, image not update.
            else if (!empty($user_pass) && empty($user_image)) {

                $encrypt_password = sha1($user_pass);

                $update_users_pass = "UPDATE users SET u_name = '$user_name', u_email = '$user_email', u_password = '$encrypt_password', u_address = '$user_address', u_phone = '$user_phone ', u_dob = '$user_date ', u_gender = '$user_gender', u_bio = '$user_bio', u_education = '$user_edu', u_role = '$user_role', u_status = '$user_status' WHERE u_id ='$user_updateID' ";

                $update_sql_pass = mysqli_query($db, $update_users_pass);

                if ($update_sql_pass) {
                    header('Location: users.php');
                } else {
                    die("users update error") . mysqli_error($db);
                }
            }
            //all update
            else {
                $explode = explode('.', $_FILES['user_image']['name']);
                $end = strtolower(end($explode));
                $array = array('jpg', 'png', 'jpeg');

                if (in_array($end, $array) === true) {

                    $random = rand();
                    $update_img = $random . $user_image;

                    move_uploaded_file($tmp_image, 'img/users/' . $update_img);

                    $encrypt_password = sha1($user_pass);

                    ////////////////////////Delete image from database to upload new image

                    $delete_users = "SELECT u_image FROM users WHERE u_id ='$user_updateID' ";
                    //link to database
                    $delete_users_result = mysqli_query($db, $delete_users);
                    //while loop
                    while ($row = mysqli_fetch_assoc($delete_users_result)) {
                        $user_img_name = $row['u_image'];
                    }
                    //unlink for deleting photo or file
                    unlink('img/users/' . $user_img_name);

                    $update_users_photo = "UPDATE users SET u_name = '$user_name', u_image  = '$update_img', u_email = '$user_email',  u_password = '$encrypt_password', u_address = '$user_address', u_phone = '$user_phone ', u_dob = '$user_date ', u_gender = '$user_gender', u_bio = '$user_bio', u_education = '$user_edu', u_role = '$user_role', u_status = '$user_status' WHERE u_id ='$user_updateID' ";

                    $update_sql_photo = mysqli_query($db, $update_users_photo);

                    if ($update_sql_photo) {
                        header('Location: users.php');
                    } else {
                        die("users photo update error") . mysqli_error($db);
                    }
                } else {
                    echo "file name format error! This is not an image";
                }
            }
        }
    }

    //delete users
    if ($do == 'delete') {
        //echo "delete here";


        //write code for delete
        if (isset($_GET['delete_id'])) {
            $delete_id = $_GET['delete_id'];

            // sql for find the file name
            $delete_users = "SELECT u_image FROM users WHERE u_id ='$delete_id' ";
            //link to database
            $delete_users_result = mysqli_query($db, $delete_users);
            //while loop
            while ($row = mysqli_fetch_assoc($delete_users_result)) {
                $user_img_name = $row['u_image'];
            }

            //unlink for deleting photo or file
            unlink('img/users/' . $user_img_name);

            //table name
            $table = 'users';
            //promary id
            $p_key = 'u_id';
            //location
            $url = 'users.php';

            //delete function

            delete($delete_id, $table, $p_key, $url);
        }
    }


    ?>




</div>
<!-- ============================================================== -->
<!-- End Container fluid  -->
<!-- ============================================================== -->



<?php include "inc/footer.php"; ?>