<?php

include "inc/header.php";
include "inc/menubar.php";

$current_user = $_SESSION['u_id'];

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

    //Manage ALl posts

    if ($do == 'Manage') {
    ?>
        <div class="row justify-content-center">
            <div class="col-lg-12 col-md-12 col sm-12">
                <div class="white-box analytics-info">
                    <h3 class="box-title">View All Posts</h3>
                    <ul class="mt-3">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="white-box">
                                    <div class="table-responsive">
                                        <table class="table text-nowrap">
                                            <thead>
                                                <tr>
                                                    <th class="border-top-0">#</th>
                                                    <th class="border-top-0">Date </th>
                                                    <th class="border-top-0">Thumbline</th>
                                                    <th class="border-top-0">Title</th>
                                                    <th class="border-top-0">Description</th>
                                                    <th class="border-top-0">Author</th>
                                                    <th class="border-top-0">Category</th>
                                                    <th class="border-top-0">Status</th>
                                                    <th class="border-top-0">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <?php

                                                $posts_details_sql = "SELECT* FROM posts";
                                                $posts_details_result = mysqli_query($db, $posts_details_sql);

                                                $count = 0;

                                                while ($row = mysqli_fetch_assoc($posts_details_result)) {
                                                    $p_id = $row['p_id'];
                                                    $p_title = $row['p_title'];
                                                    $p_date = $row['p_date'];
                                                    $p_image = $row['p_image'];
                                                    $p_author = $row['p_author'];
                                                    $p_description = $row['p_description'];
                                                    $p_cat = $row['p_cat'];
                                                    $p_comment = $row['p_comment'];
                                                    $p_status = $row['p_status'];

                                                    $count++;

                                                ?>
                                                    <tr>
                                                        <td><?php echo $count; ?></td>
                                                        <td><?php echo $p_date; ?></td>
                                                        <td><img class="img-thumbnail" src="img/posts/<?php echo $p_image ?>" width="100px" alt=""></td>
                                                        <td style="width: 300px;"><?php echo $p_title; ?></td>
                                                        <td style="width: 380px;"><?php echo substr($p_description, 0, 200) . '.......' . ' <a href="" type="button" class="btn btn-warning text-dark fw-bold ms-3">See More</a>'; ?></td>
                                                        <td><?php
                                                            $sel_uname = "SELECT u_name FROM users WHERE u_id ='$p_author'";
                                                            $res_selectuname = mysqli_query($db, $sel_uname);

                                                            while ($row = mysqli_fetch_assoc($res_selectuname)) {
                                                                $use_name = $row['u_name'];
                                                            }
                                                            echo $use_name; ?>
                                                        </td>
                                                        <td><?php
                                                            $sel_cname = "SELECT c_name FROM category WHERE c_id ='$p_cat'";
                                                            $res_selectname = mysqli_query($db, $sel_cname);

                                                            while ($row = mysqli_fetch_assoc($res_selectname)) {
                                                                $cat_name = $row['c_name'];
                                                            }
                                                            echo $cat_name; ?>
                                                        </td>
                                                        <td>
                                                            <?php
                                                            if ($p_status == 0) {
                                                                echo "<span class='badge bg-danger fw-bold'>Inactive</span>";
                                                            }
                                                            if ($p_status == 1) {
                                                                echo "<span class='badge bg-success fw-bold'>Active</span>";
                                                            }
                                                            ?>
                                                        </td>

                                                        <td>
                                                            <!-- /Profile -->
                                                            <a href="" class="me-2" data-bs-toggle="tooltip" data-bs-placement="top" title="Profile"><i class="fas fa-eye text-warning"></i></a>

                                                            <!-- edit -->
                                                            <a href="posts.php?do=edit&edit_id=<?php echo $p_id; ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><i class="fas fa-edit"></i></a>

                                                            <!-- delete -->
                                                            <a href="" class="ms-2" data-bs-toggle="modal" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete" data-bs-target="#delete<?php echo $p_id; ?>"><i class="fas fa-trash text-danger"></i></a>

                                                            <!-- delete Modal -->
                                                            <div class="modal fade " id="delete<?php echo $p_id; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                <div class="modal-dialog ">
                                                                    <div class="modal-content bg-warning">
                                                                        <div class="modal-header">
                                                                            <h2 class="modal-title text-danger fw-bold" id="exampleModalLabel">Are You Sure?</h2>
                                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <a type="button" class="btn btn-light fw-bold" data-bs-dismiss="modal">Close</a>
                                                                            <a href="posts.php?do=delete&delete_id=<?php echo $p_id; ?>" type="button" class="btn btn-danger text-light fw-bold">Confirm?</a>
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

    //Add new posts
    if ($do == 'add') {
    ?>

        <div class="row justify-content-center">
            <div class="col-lg-12 col-md-12 col sm-12">
                <div class="white-box analytics-info">
                    <h3 class="box-title">Add New Posts</h3>
                    <ul class="list-inline two-part">
                        <form method="POST" enctype="multipart/form-data">
                            <div class="row justify-content-center">
                                <div class="col-md-6 col-sm-12 col-lg-6">
                                    <div class="mb-3">
                                        <label for="exampleInputtitle" class="form-label">Title*</label>
                                        <input name="post_title" type="text" class="form-control" id="exampleInputtitle">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampledesc">Description</label>
                                        <textarea name="post_description" class="form-control" id="exampledesc" rows="6"></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleSelectp">Select Category</label>
                                        <select name="post_category" class="form-select" aria-label="Default select examplep">

                                            <option selected value="999999">Uncetagorized</option>
                                            <?php
                                            $show_sql2 = "SELECT * FROM category";
                                            $show_result2 = mysqli_query($db, $show_sql2);

                                            $count = 0;

                                            while ($row = mysqli_fetch_assoc($show_result2)) {
                                                $c_id = $row['c_id'];
                                                $c_name = $row['c_name'];
                                                $c_desc = $row['c_desc'];
                                                $c_status = $row['c_status'];
                                                $count++;

                                            ?>
                                                <option value="<?php echo $c_id; ?>"><?php echo $c_name; ?></option>
                                            <?php
                                            }
                                            ?>

                                        </select>
                                    </div>

                                </div>
                                <div class="col-md-6 col-sm-12 col-lg-6">
                                    <div class="mb-3">
                                        <label for="exampleSelectpp">Select Status</label>
                                        <select name="post_status" class="form-select" aria-label="Default select examplepp">
                                            <option selected>Select Status</option>
                                            <option value="0">Inactive</option>
                                            <option value="1">Active</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputFilephopost">Photo Upload*</label>
                                        <input name="post_image" type="file" class="form-control-file" id="exampleInputFilephopost" aria-describedby="fileHelp">
                                        <br>
                                        <small id="fileHelp" class="form-text text-muted">Select Photo Only, Don't upload photo more than 1mb. upload jpg png jpeg format only</small>
                                    </div>
                                    <button name="post_submit" type="submit" class="btn btn-primary fs-5">Add New Posts</button>
                                </div>
                            </div>
                        </form>


                        <?php

                        if (isset($_POST['post_submit'])) {
                            $post_title = $_POST['post_title'];
                            $post_description = $_POST['post_description'];
                            $post_category = $_POST['post_category'];
                            $post_status = $_POST['post_status'];
                            $post_image = $_FILES['post_image']['name'];
                            $tmp_image = $_FILES['post_image']['tmp_image'];


                            if (!empty($post_title) || !empty($post_description) || !empty($post_category) || !empty($post_status) || !empty($post_image)) {

                                $explode = explode('.', $_FILES['post_image']['name']);

                                $endp = strtolower(end($explode));

                                $arrayp = array('jpg', 'png', 'jpeg');


                                if (in_array($endp, $arrayp) === true) {

                                    $random = rand();
                                    $update_imgp = $random . $post_image;

                                    move_uploaded_file($tmp_image, 'img/posts/' . $update_imgp);

                                    $addposts = "INSERT INTO posts (p_title ,p_image ,p_author ,p_description, 	p_date ,p_cat , p_comment , p_status) VALUES ('$post_title','$update_imgp','$current_user ','$post_description',now(),'$post_category','','$post_status')";

                                    $addpostsdb = mysqli_query($db, $addposts);

                                    if ($addpostsdb) {
                                        header('Location: posts.php');
                                    } else {
                                        die("INPUT posts details failed" . mysqli_error($db)); //echo "INPUT posts details failed" ;
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

            $edit_sql_post = "SELECT* FROM posts WHERE p_id = '$edit_id'";

            //write query to send information to database
            $edit_resultpost = mysqli_query($db, $edit_sql_post);

            //red from database by mysqli fetch assoc

            while ($row = mysqli_fetch_assoc($edit_resultpost)) {
                $p_id = $row['p_id'];
                $p_title = $row['p_title'];
                $p_date = $row['p_date'];
                $p_image = $row['p_image'];
                $p_author = $row['p_author'];
                $p_description = $row['p_description'];
                $p_cat = $row['p_cat'];
                $p_comment = $row['p_comment'];
                $p_status = $row['p_status'];
            }

        ?>
            <div class="row justify-content-center">
                <div class="col-lg-12 col-md-12 col sm-12">
                    <div class="white-box analytics-info">
                        <h3 class="box-title">Edit Posts</h3>
                        <ul class="list-inline two-part">
                            <form action="posts.php?do=update" method="POST" enctype="multipart/form-data">
                                <div class="row justify-content-center">
                                    <div class="col-md-6 col-sm-12 col-lg-6">
                                        <div class="mb-3">
                                            <label for="exampleInputtitle" class="form-label">Title*</label>
                                            <input name="post_title" type="text" class="form-control" id="exampleInputtitle" value="<?php echo $p_title ?>">
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampledesc">Description</label>
                                            <textarea name="post_description" class="form-control" id="exampledesc" rows="6" value="<?php echo $p_description ?>"><?php echo $p_description ?></textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleSelectp">Select Category</label>
                                            <select name="post_category" class="form-select" aria-label="Default select examplep" value="<?php echo $p_cat ?>">
                                                <?php
                                                $show_sql2 = "SELECT * FROM category";
                                                $show_result2 = mysqli_query($db, $show_sql2);

                                                $count = 0;

                                                while ($row = mysqli_fetch_assoc($show_result2)) {
                                                    $c_id = $row['c_id'];
                                                    $c_name = $row['c_name'];
                                                    $c_desc = $row['c_desc'];
                                                    $c_status = $row['c_status'];
                                                    $count++;

                                                ?>
                                                    <option value="<?php echo $c_id; ?>" <?php if ($c_id == $p_cat) echo "selected"; ?>><?php echo $c_name; ?>
                                                    </option>
                                                <?php
                                                }
                                                ?>

                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12 col-lg-6">
                                        <div class="mb-3">
                                            <label for="exampleSelectpp">Select Status</label>
                                            <select name="post_status" class="form-select" aria-label="Default select examplepp" value="<?php echo $p_status ?>">
                                                <option value="0" <?php if ($p_status = 0) echo "selected"; ?>>Inactive</option>
                                                <option value="1" <?php if ($p_status = 1) echo "selected"; ?>>Active</option>
                                            </select>
                                        </div>


                                        <div class="mb-3">
                                            <img src="img/posts/<?php echo $p_image; ?>" width="120px" alt="">
                                            <br><br>
                                            <label for="exampleInputFilephopost">Photo Upload*</label>
                                            <input name="post_image" type="file" class="form-control-file" id="exampleInputFilephopost" aria-describedby="fileHelp">
                                            <br>
                                            <small id="fileHelp" class="form-text text-muted">Select Photo Only, Don't upload photo more than 1mb. upload jpg png jpeg format only</small>
                                        </div>
                                        <input type="hidden" name="posts_updateID" value="<?php echo $edit_id; ?>"></input>
                                        <input type="submit" class="btn btn-primary fs-5" value="Update Posts Info">
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

            $post_updateID = $_POST['posts_updateID'];


            $post_title = $_POST['post_title'];
            $post_description = $_POST['post_description'];
            $post_category = $_POST['post_category'];
            $post_status = $_POST['post_status'];
            $post_image = $_FILES['post_image']['name'];
            $tmp_image = $_FILES['post_image']['tmp_image'];

            //only image update, password not update. delete image first then upload new img
            if (!empty($post_image)) {

                $explode = explode('.', $_FILES['post_image']['name']);
                $end = strtolower(end($explode));
                $array = array('jpg', 'png', 'jpeg');

                if (in_array($end, $array) === true) {

                    $random = rand();
                    $update_img = $random . $post_image;

                    move_uploaded_file($tmp_image, 'img/posts/' . $update_img);

                    ////////////////////////Delete image from database to upload new image

                    $delete_postsimg = "SELECT p_image FROM posts WHERE p_id ='$posts_updateID' ";
                    //link to database
                    $delete_posts_result = mysqli_query($db, $delete_postsimg);
                    //while loop
                    while ($row = mysqli_fetch_assoc($delete_posts_result)) {
                        $posts_img_name = $row['p_image'];
                    }
                    //unlink for deleting photo or file
                    unlink('img/posts/' . $posts_img_name);

                    $update_posts_photo = "UPDATE posts SET p_title = '$post_title', p_image = '$update_img',  p_description = '$post_description',  p_cat  = '$post_category ',p_status  = '$post_status' WHERE p_id ='$post_updateID' ";

                    $update_sqll_photo = mysqli_query($db, $update_posts_photo);

                    if ($update_sqll_photo) {
                        header('Location: posts.php');
                    } else {
                        die("posts photo update error") . mysqli_error($db);
                    }
                } else {
                    echo "file name format error! This is not an image";
                }
            }
            //all update withour picture
            else {
                $update_posts_wphoto = "UPDATE posts SET p_title = '$post_title',   p_description = '$post_description', p_cat = '$post_category ', p_status  = '$post_status' WHERE p_id ='$post_updateID' ";

                $update_sqll_wphoto = mysqli_query($db, $update_posts_wphoto);

                if ($update_sqll_wphoto) {
                    header('Location: posts.php');
                } else {
                    die("posts photo update error") . mysqli_error($db);
                }
            }
        }
    }

    //delete posts
    if ($do == 'delete') {
        //echo "delete here";


        //write code for delete
        if (isset($_GET['delete_id'])) {
            $delete_id = $_GET['delete_id'];

            // sql for find the file name
            $delete_posts = "SELECT p_image FROM posts WHERE p_id ='$delete_id' ";
            //link to database
            $delete_posts_result = mysqli_query($db, $delete_posts);
            //while loop
            while ($row = mysqli_fetch_assoc($delete_posts_result)) {
                $posts_img_name = $row['p_image'];
            }

            //unlink for deleting photo or file
            unlink('img/posts/' . $posts_img_name);

            //table name
            $table = 'posts';
            //promary id
            $p_key = 'p_id';
            //location
            $url = 'posts.php';

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