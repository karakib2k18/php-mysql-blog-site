<?php include "inc/header.php"; ?>

<section class="section lb">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                <div class="page-wrapper">
                    <div class="blog-custom-build">

                        <?php

                        if (isset($_GET['searchbtn'])) {
                            $text_found =  $_GET['textsearch'];


                            $posts_display_sql = "SELECT* FROM posts WHERE p_title LIKE '%$text_found%' OR p_description LIKE '%$text_found%' OR p_author LIKE '%$text_found%' OR p_cat LIKE '%$text_found%' ";
                            $posts_display_result = mysqli_query($db, $posts_display_sql);

                            $total_search = mysqli_num_rows($posts_display_result);

                            if ($total_search >= 1) {
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
                                    <div class="blog-box wow fadeIn">
                                        <div class="post-media">
                                            <a href="marketing-single.html" title="">
                                                <img src="admin/img/posts/<?php echo $p_image; ?>" alt="" class="img-fluid">
                                                <div class="hovereffect">
                                                    <span></span>
                                                </div>
                                                <!-- end hover -->
                                            </a>
                                        </div>
                                        <!-- end media -->
                                        <div class="blog-meta big-meta text-center">
                                            <div class="post-sharing">
                                                <ul class="list-inline">
                                                    <li><a href="#" class="fb-button btn btn-primary"><i class="fa fa-facebook"></i> <span class="down-mobile">Share on Facebook</span></a></li>
                                                    <li><a href="#" class="tw-button btn btn-primary"><i class="fa fa-twitter"></i> <span class="down-mobile">Tweet on Twitter</span></a></li>
                                                    <li><a href="#" class="gp-button btn btn-primary"><i class="fa fa-google-plus"></i></a></li>
                                                </ul>
                                            </div><!-- end post-sharing -->
                                            <h4><a href="single-post.php?post_id=<?php echo $p_id; ?>" title=""><?php echo $p_title; ?></a></h4>
                                            <p><?php echo substr($p_description, 0, 300) . '...   '; ?><a class="text-dark font-weight-bold" href="single-post.php?post_id=<?php echo $p_id; ?>">READ MORE...</a></p>
                                            <small><a href="#" title="">
                                                    <?php
                                                    $sel_cname = "SELECT c_name FROM category WHERE c_id ='$p_cat'";
                                                    $res_selectname = mysqli_query($db, $sel_cname);

                                                    while ($row = mysqli_fetch_assoc($res_selectname)) {
                                                        $cat_name = $row['c_name'];
                                                    }
                                                    echo $cat_name; ?>
                                                </a></small>
                                            <small><a href="#" title=""><?php echo $p_date; ?></a></small>
                                            <small><a href="#" title="">by
                                                    <?php
                                                    $sel_uname = "SELECT u_name FROM users WHERE u_id ='$p_author'";
                                                    $res_selectuname = mysqli_query($db, $sel_uname);

                                                    while ($row = mysqli_fetch_assoc($res_selectuname)) {
                                                        $use_name = $row['u_name'];
                                                    }
                                                    echo $use_name; ?>
                                                </a></small>
                                            <small><a href="#" title=""><i class="fa fa-eye"></i> 2291</a></small>
                                        </div><!-- end meta -->
                                    </div><!-- end blog-box -->

                        <?php
                                }
                            } else {
                                echo '<span class="alert alert-danger bg-alert font-weight-bold ">Search text Not Found</span>';
                            }
                        }
                        ?>

                        <hr class="invis">

                    </div>
                </div>

                <hr class="invis">

                <div class="row">
                    <div class="col-md-12">
                        <nav aria-label="Page navigation">
                            <ul class="pagination justify-content-center">
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#">Next</a>
                                </li>
                            </ul>
                        </nav>
                    </div><!-- end col -->
                </div><!-- end row -->
            </div><!-- end col -->

            <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                <?php include "inc/sidebar.php" ?>
            </div><!-- end col -->
        </div><!-- end row -->
    </div><!-- end container -->
</section>

<?php include "inc/footer.php"; ?>