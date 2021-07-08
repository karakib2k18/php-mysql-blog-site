<?php
include "inc/header.php";


?>

<section class="section lb m3rem">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">

                <?php

                if (isset($_GET['post_id'])) {
                    $POSTID = $_GET['post_id'];


                    $posts_display_sql = "SELECT* FROM posts WHERE p_id ='$POSTID' ORDER BY p_id DESC";
                    $posts_display_result = mysqli_query($db, $posts_display_sql);


                    while ($row = mysqli_fetch_assoc($posts_display_result)) {
                        $p_id = $row['p_id'];
                        $p_title = $row['p_title'];
                        $p_date = $row['p_date'];
                        $p_image = $row['p_image'];
                        $p_author = $row['p_author'];
                        $p_description = $row['p_description'];
                        $p_cat = $row['p_cat'];
                        $p_comment = $row['p_comment'];
                        $p_status = $row['p_status'];


                ?>

                        <div class="page-wrapper">
                            <div class="blog-title-area">
                                <ol class="breadcrumb hidden-xs-down">
                                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                    <li class="breadcrumb-item"><a href="#">Blog</a></li>
                                    <li class="breadcrumb-item active"><?php echo $p_title; ?></li>
                                </ol>

                                <span class="color-yellow">
                                    <a href="#" title="">
                                        <?php
                                        $sel_cname = "SELECT c_name FROM category WHERE c_id ='$p_cat'";
                                        $res_selectname = mysqli_query($db, $sel_cname);

                                        while ($row = mysqli_fetch_assoc($res_selectname)) {
                                            $cat_name = $row['c_name'];
                                        }
                                        echo $cat_name;
                                        ?>
                                    </a>
                                </span>

                                <h3><?php echo $p_title; ?></h3>

                                <div class="blog-meta big-meta">
                                    <small><a href="marketing-single.html" title=""><?php echo $p_date; ?></a></small>
                                    <small><a href="blog-author.html" title="">by
                                            <?php
                                            $sel_uname = "SELECT u_name FROM users WHERE u_id ='$p_author'";
                                            $res_selectuname = mysqli_query($db, $sel_uname);

                                            while ($row = mysqli_fetch_assoc($res_selectuname)) {
                                                $use_name = $row['u_name'];
                                            }
                                            echo $use_name; ?>
                                        </a></small>
                                    <small><a href="#" title=""><i class="fa fa-eye"></i> 2344</a></small>
                                </div><!-- end meta -->

                                <div class="post-sharing">
                                    <ul class="list-inline">
                                        <li><a href="#" class="fb-button btn btn-primary"><i class="fa fa-facebook"></i> <span class="down-mobile">Share on Facebook</span></a></li>
                                        <li><a href="#" class="tw-button btn btn-primary"><i class="fa fa-twitter"></i> <span class="down-mobile">Tweet on Twitter</span></a></li>
                                        <li><a href="#" class="gp-button btn btn-primary"><i class="fa fa-google-plus"></i></a></li>
                                    </ul>
                                </div><!-- end post-sharing -->
                            </div><!-- end title -->

                            <div class="single-post-media">
                                <img src="admin/img/posts/<?php echo $p_image; ?>" alt="" class="img-fluid">
                            </div><!-- end media -->

                            <div class="blog-content">
                                <div class="pp">

                                    <h3><strong><?php echo $p_title; ?></strong></h3>

                                    <p><?php echo $p_description; ?></p>



                                </div><!-- end pp -->

                            </div><!-- end content -->

                            <div class="blog-title-area">
                                <div class="tag-cloud-single">
                                    <span>Tags</span>


                                    <?php
                                    $indexa_sql2 = "SELECT * FROM category";
                                    $indexa_result2 = mysqli_query($db, $indexa_sql2);

                                    $count = 0;

                                    while ($row = mysqli_fetch_assoc($indexa_result2)) {
                                        $c_id = $row['c_id'];
                                        $c_name = $row['c_name'];
                                        $c_desc = $row['c_desc'];
                                        $c_status = $row['c_status'];


                                        if ($c_status == 1) {
                                    ?>
                                            <small>
                                                <a href=""><?php echo $c_name; ?></a>
                                            </small>

                                    <?php
                                        }
                                    }
                                    ?>
                                </div><!-- end meta -->

                                <div class="post-sharing">
                                    <ul class="list-inline">
                                        <li><a href="#" class="fb-button btn btn-primary"><i class="fa fa-facebook"></i> <span class="down-mobile">Share on Facebook</span></a></li>
                                        <li><a href="#" class="tw-button btn btn-primary"><i class="fa fa-twitter"></i> <span class="down-mobile">Tweet on Twitter</span></a></li>
                                        <li><a href="#" class="gp-button btn btn-primary"><i class="fa fa-google-plus"></i></a></li>
                                    </ul>
                                </div><!-- end post-sharing -->
                            </div><!-- end title -->


                            <hr class="invis1">

                            <div class="custombox authorbox clearfix">
                                <?php

                                $users_details2_sql = "SELECT* FROM users WHERE u_id ='$p_author'";
                                $users_details2_result = mysqli_query($db, $users_details2_sql);

                                while ($row = mysqli_fetch_assoc($users_details2_result)) {
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

                                <h4 class="small-title">About author</h4>
                                <div class="row">
                                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                                        <img src="admin/img/users/<?php echo $u_image; ?> " alt="" class="img-fluid rounded-circle">
                                    </div><!-- end col -->

                                    <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
                                        <h4><a href="#"><?php echo $u_name; ?></a></h4>
                                        <p><?php echo $u_bio; ?></p>

                                        <div class="topsocial">
                                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="Facebook"><i class="fa fa-facebook"></i></a>
                                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="Youtube"><i class="fa fa-youtube"></i></a>
                                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="Pinterest"><i class="fa fa-pinterest"></i></a>
                                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="Twitter"><i class="fa fa-twitter"></i></a>
                                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="Instagram"><i class="fa fa-instagram"></i></a>
                                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="Website"><i class="fa fa-link"></i></a>
                                        </div><!-- end social -->

                                    </div><!-- end col -->
                                </div><!-- end row -->
                            </div><!-- end author-box -->

                            <hr class="invis1">

                            <div class="custombox clearfix">
                                <h4 class="small-title">You may also like</h4>
                                <div class="row">
                                    <div class="col-lg-6">

                                        <?php

                                        // if (isset($_GET['post_id'])) {
                                        //     $POSTID = $_GET['post_id'];


                                        //     $posts_display_sql = "SELECT* FROM posts WHERE c_id ='$POSTID' ORDER BY c_id DESC";
                                        //     $posts_display_result = mysqli_query($db, $posts_display_sql);


                                        //     while ($row = mysqli_fetch_assoc($posts_display_result)) {
                                        //         $p_id = $row['p_id'];
                                        //         $p_title = $row['p_title'];
                                        //         $p_date = $row['p_date'];
                                        //         $p_image = $row['p_image'];
                                        //         $p_author = $row['p_author'];
                                        //         $p_description = $row['p_description'];
                                        //         $p_cat = $row['p_cat'];
                                        //         $p_comment = $row['p_comment'];
                                        //         $p_status = $row['p_status'];
                                        //     }
                                        // }
                                        ?>

                                        <div class="blog-box">
                                            <div class="post-media">
                                                <a href="marketing-single.html" title="">
                                                    <img src="upload/market_blog_02.jpg" alt="" class="img-fluid">
                                                    <div class="hovereffect">
                                                        <span class=""></span>
                                                    </div><!-- end hover -->
                                                </a>
                                            </div><!-- end media -->
                                            <div class="blog-meta">
                                                <h4><a href="marketing-single.html" title=""><?php echo $p_title; ?></a></h4>
                                                <small><a href="blog-category-01.html" title="">Trends</a></small>
                                                <small><a href="blog-category-01.html" title="">21 July, 2017</a></small>
                                            </div><!-- end meta -->
                                        </div><!-- end blog-box -->
                                    </div><!-- end col -->
                                    <div class="col-lg-6">
                                        <div class="blog-box">
                                            <div class="post-media">
                                                <a href="marketing-single.html" title="">
                                                    <img src="upload/market_blog_02.jpg" alt="" class="img-fluid">
                                                    <div class="hovereffect">
                                                        <span class=""></span>
                                                    </div><!-- end hover -->
                                                </a>
                                            </div><!-- end media -->
                                            <div class="blog-meta">
                                                <h4><a href="marketing-single.html" title=""><?php echo $p_title; ?></a></h4>
                                                <small><a href="blog-category-01.html" title="">Trends</a></small>
                                                <small><a href="blog-category-01.html" title="">21 July, 2017</a></small>
                                            </div><!-- end meta -->
                                        </div><!-- end blog-box -->
                                    </div><!-- end col -->

                                </div><!-- end row -->
                            </div><!-- end custom-box -->

                            <hr class="invis1">

                            <div class="custombox clearfix">
                                <?php

                                $cmnt_sql = "SELECT* FROM comment WHERE  cmnt_post='$POSTID'";
                                $cmnt_result = mysqli_query($db, $cmnt_sql);

                                $total_cmnt = mysqli_num_rows($cmnt_result);
                                ?>
                                <h4 class="small-title"><?php echo $total_cmnt; ?> Comments</h4>
                                <?php

                                while ($row = mysqli_fetch_assoc($cmnt_result)) {
                                    $cmnt_id = $row['cmnt_id'];
                                    $cmnt_author = $row['cmnt_author'];
                                    $cmnt_desc = $row['cmnt_desc'];
                                    $cmnt_date = $row['cmnt_date'];
                                    $cmnt_post = $row['cmnt_post'];

                                ?>

                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="comments-list">

                                                <div class="media">
                                                    <?php

                                                    $users_details_sql = "SELECT* FROM users WHERE u_id = '$cmnt_author'";
                                                    $users_details_result = mysqli_query($db, $users_details_sql);


                                                    while ($row = mysqli_fetch_assoc($users_details_result)) {
                                                        $u_id = $row['u_id'];
                                                        $u_name = $row['u_name'];
                                                        $u_image = $row['u_image'];
                                                    }

                                                    ?>
                                                    <a class="media-left" href="#">
                                                        <img src="admin/img/users/<?php echo $u_image; ?>" alt="" class="rounded-circle">
                                                    </a>
                                                    <div class="media-body">
                                                        <h4 class="media-heading user_name"><?php echo $u_name; ?><small><?php echo $cmnt_date; ?></small></h4>
                                                        <p><?php echo $cmnt_desc; ?></p>
                                                        <a href="#" class="btn btn-primary btn-sm">Reply</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!-- end col -->
                                    </div><!-- end row -->

                                <?php

                                }

                                ?>
                            </div><!-- end custom-box -->

                            <hr class="invis1">

                            <div class="custombox clearfix">
                                <h4 class="small-title">Leave a Reply</h4>
                                <?php
                                if (empty($_SESSION['u_email'])) {
                                    echo "<a href='http://localhost/newstoday/admin/index.php'><span class='alert alert-danger bg-alert font-weight-bold '> Login to comment here, CLICK HERE</span></a>";
                                } else {
                                ?>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <form class="form-wrapper" method="POST">
                                                <!-- <input type="text" class="form-control" placeholder="Your name">
                                                <input type="text" class="form-control" placeholder="Email address">
                                                <input type="text" class="form-control" placeholder="Website"> -->
                                                <textarea class="form-control" name="cmnt_desc" placeholder="Your comment"></textarea>
                                                <button type="submit" name="cmnt_submit" class="btn btn-primary">Submit Comment</button>

                                                <?php

                                                if (isset($_POST['cmnt_submit'])) {
                                                    $cmnt_desc = $_POST['cmnt_desc'];

                                                    $comm_u_id = $_SESSION['u_id'];

                                                    $addcomment = "INSERT INTO comment (cmnt_author ,cmnt_desc ,cmnt_date ,cmnt_post) VALUES ('$comm_u_id','$cmnt_desc',now(),'$POSTID')";

                                                    $addcommentdb = mysqli_query($db, $addcomment);

                                                    if ($addcommentdb) {
                                                        header('Location: single-post.php?post_id ?>');
                                                    } else {
                                                        die("INPUT posts details failed" . mysqli_error($db));
                                                    }
                                                }
                                                ?>
                                            </form>
                                        </div>
                                    </div>
                                <?php
                                }
                                ?>
                            </div>
                        </div><!-- end page-wrapper -->

                <?php
                    }
                }

                ?>

            </div><!-- end col -->

            <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                <?php include "inc/sidebar.php" ?>
            </div><!-- end col -->
        </div><!-- end row -->
    </div><!-- end container -->
</section>
<?php include "inc/footer.php"; ?>