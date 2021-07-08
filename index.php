<?php include "inc/header.php";

$post_per_page = 4;

?>

<section id="cta" class="section">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12 align-self-center">
                <h2>A digital marketing blog</h2>
                <p class="lead"> Aenean ut hendrerit nibh. Duis non nibh id tortor consequat cursus at mattis felis. Praesent sed lectus et neque auctor dapibus in non velit. Donec faucibus odio semper risus rhoncus rutrum. Integer et ornare mauris.</p>
                <a href="#" class="btn btn-primary">Try for free</a>
            </div>
            <div class="col-lg-4 col-md-12">
                <div class="newsletter-widget text-center align-self-center">
                    <h3>Subscribe Today!</h3>
                    <p>Subscribe to our weekly Newsletter and receive updates via email.</p>
                    <form class="form-inline" method="post">
                        <input type="text" name="email" placeholder="Add your email here.." required class="form-control" />
                        <input type="submit" value="Subscribe" class="btn btn-default btn-block" />
                    </form>
                </div><!-- end newsletter -->
            </div>
        </div>
    </div>
</section>

<section class="section lb">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                <div class="page-wrapper">
                    <div class="blog-custom-build">

                        <?php

                        $posts_display_sqlpg = "SELECT* FROM posts";
                        $posts_display_resultpg = mysqli_query($db, $posts_display_sqlpg);

                        $total_post = mysqli_num_rows($posts_display_resultpg);

                        $_post_page_no = isset($_GET['page_no']) ? $_GET['page_no'] : 1;

                        if ($_post_page_no == 1) {
                            $past_post = 0;
                        } else {
                            $past_post = $post_per_page * ($_post_page_no - 1);
                        }

                        $posts_display_sql = "SELECT* FROM posts ORDER BY p_id DESC LIMIT $past_post,$post_per_page";
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

                        ?>

                        <hr class="invis">

                    </div>
                </div>

                <hr class="invis">

                <div class="row">
                    <div class="col-md-12">
                        <nav aria-label="Page navigation">
                            <ul class="pagination justify-content-center">

                                <?php

                                $total_post_page = ceil($total_post / $post_per_page);

                                if (isset($_GET['page_no'])) {
                                    $page_no = $_GET['page_no'];

                                    if ($page_no > 1) {
                                ?>
                                        <li class="page-item">
                                            <a class="page-link" href="index.php?page_no=<?php echo $page_no - 1; ?>">Prev</a>
                                        </li>
                                    <?php
                                    }
                                }

                                for ($i = 1; $i <= $total_post_page; $i++) {
                                    ?>
                                    <li class="page-item"><a class="page-link" href="index.php?page_no=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                                <?php

                                }

                                $page_no = isset($_GET['page_no']) ? $_GET['page_no'] : 1;
                                if ($page_no == $total_post_page) {
                                } else {
                                ?>
                                    <li class="page-item"><a class="page-link" href="index.php?page_no=<?php echo $page_no + 1; ?>">Next</a></li>
                                <?php
                                }


                                ?>
                                <!--                                 
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#">Next</a>
                                </li> -->
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