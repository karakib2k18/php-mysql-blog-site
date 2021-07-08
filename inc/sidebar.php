                        <div class="sidebar">
                            <div class="widget">
                                <h2 class="widget-title">Recent Posts</h2>
                                <div class="blog-list-widget">
                                    <div class="list-group">

                                        <?php
                                        $sidebar_details_sql = "SELECT* FROM posts ORDER BY p_id DESC LIMIT 3";
                                        $sidebar_details_result = mysqli_query($db, $sidebar_details_sql);

                                        while ($row = mysqli_fetch_assoc($sidebar_details_result)) {
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
                                            <a href="marketing-single.html" class="list-group-item list-group-item-action flex-column align-items-start">
                                                <div class="w-100 justify-content-between">
                                                    <a href="single-post.php?post_id=<?php echo $p_id; ?>"><img src="admin/img/posts/<?php echo $p_image; ?>" alt="" class="img-fluid float-left"></a>
                                                    <a href="single-post.php?post_id=<?php echo $p_id; ?>">
                                                        <h5 class="mb-1"><?php echo $p_title; ?></h5>
                                                    </a>
                                                    <small><?php echo $p_date; ?></small>
                                                </div>
                                            </a>
                                        <?php
                                        }
                                        ?>

                                    </div>
                                </div><!-- end blog-list -->
                            </div><!-- end widget -->

                            <div class="widget">
                                <h2 class="widget-title">LATEST 12 POST PICTURE</h2>
                                <div class="instagram-wrapper clearfix">

                                    <?php

                                    $sidebar_details_sql = "SELECT* FROM posts ORDER BY p_id DESC LIMIT 12";
                                    $sidebar_details_result = mysqli_query($db, $sidebar_details_sql);

                                    while ($row = mysqli_fetch_assoc($sidebar_details_result)) {
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
                                        <a href="single-post.php?post_id=<?php echo $p_id; ?>"><img src="admin/img/posts/<?php echo $p_image; ?>" alt="" class="img-fluid"></a>
                                    <?php
                                    }
                                    ?>

                                </div><!-- end Instagram wrapper -->
                            </div><!-- end widget -->

                            <div class="widget">
                                <h2 class="widget-title">Popular Categories</h2>
                                <div class="link-widget">
                                    <ul>

                                        <?php
                                        $index_sql2 = "SELECT * FROM category";
                                        $index_result2 = mysqli_query($db, $index_sql2);

                                        $count = 0;

                                        while ($row = mysqli_fetch_assoc($index_result2)) {
                                            $c_id = $row['c_id'];
                                            $c_name = $row['c_name'];
                                            $c_desc = $row['c_desc'];
                                            $c_status = $row['c_status'];


                                            $post_count_sql = "SELECT* FROM posts WHERE p_cat='$c_id'";
                                            $post_count_sql_res = mysqli_query($db, $post_count_sql);

                                            $total_post = mysqli_num_rows($post_count_sql_res);

                                            if ($c_status == 1) {
                                        ?>
                                                <li><a href="archive.php?cat_id=<?php echo $c_id; ?>"><?php echo $c_name;  ?> <span>(<?php echo $total_post; ?>)</span></a></li>

                                        <?php
                                            }
                                        }

                                        ?>
                                    </ul>
                                </div><!-- end link-widget -->
                            </div><!-- end widget -->
                        </div><!-- end sidebar -->