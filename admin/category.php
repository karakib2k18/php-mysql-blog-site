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
    <div class="row justify-content-center">
        <div class="col-lg-4 col-md-4 col sm-12">
            <div class="white-box analytics-info">
                <h3 class="box-title">Add New Category</h3>
                <ul class="list-inline two-part">
                    <form method="POST">
                        <div class="mb-3">
                            <label for="exampleInputCategoryname" class="form-label">Category name</label>
                            <input name="cat_name" type="text" class="form-control" id="exampleInputCategoryname" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputCategorydescription" class="form-label">Category description</label>
                            <input name="cat_des" type="text" class="form-control" id="exampleInputCategorydescription">
                        </div>
                        <button name="cat_submit" type="submit" class="btn btn-primary">Submit</button>
                    </form>

                    <!-- category code inserted here -->
                    <?php

                    if (isset($_POST['cat_submit'])) {
                        $cat_name = $_POST['cat_name'];
                        $cat_des = $_POST['cat_des'];

                        //3 steps //sql //sql>database //feedback
                        $cat_submit_sql = "INSERT INTO category (c_name,c_desc,c_status) VALUES ('$cat_name','$cat_des', 0)";
                        $cat_submit_result = mysqli_query($db, $cat_submit_sql);

                        if ($cat_submit_result) {
                            header('Location: category.php');
                        } else {
                            echo "catagory insert Error";
                        }
                    }

                    ?>
                </ul>
            </div>

            <?php

            if (isset($_GET['edit_id'])) {
                $edit_id = $_GET['edit_id'];

                $edit_sql = "SELECT* FROM category WHERE c_id = '$edit_id' ";
                $edit_result = mysqli_query($db, $edit_sql);

                while ($row = mysqli_fetch_assoc($edit_result)) {

                    $c_name = $row['c_name'];
                    $c_desc = $row['c_desc'];
                    $c_status = $row['c_status'];
                }

            ?>
                <div class="white-box analytics-info">
                    <h3 class="box-title">Add New Category</h3>
                    <ul class="list-inline two-part">
                        <form method="POST">
                            <div class="mb-3">
                                <label for="exampleInputCategoryname" class="form-label">Category name</label>
                                <input name="cat_upname" type="text" class="form-control" id="exampleInputCategoryname" aria-describedby="emailHelp" value="<?php echo $c_name; ?>">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputCategorydescription" class="form-label">Category description</label>
                                <input name="cat_updes" type="text" class="form-control" id="exampleInputCategorydescription" value="<?php echo $c_desc; ?>">
                            </div>
                            <div class="mb-3">
                                <select class="form-select" aria-label="Default select example" name="cat_upstatus">
                                    <option value="1" <?php if ($c_status == 1) echo "selected"; ?>>Active</option>
                                    <option value="0" <?php if ($c_status == 0) echo "selected"; ?>>Inactive</option>
                                </select>
                            </div>
                            <button name="update_submit" type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </ul>
                </div>

            <?php
            }
            ?>

        </div>

        <?php
        if (isset($_POST['update_submit'])) {
            $cat_upname = $_POST['cat_upname'];
            $cat_updes = $_POST['cat_updes'];
            $cat_upstatus = $_POST['cat_upstatus'];

            $update_sql = "UPDATE category SET c_name= '$cat_upname', c_desc = '$cat_updes' ,c_status ='$cat_upstatus' WHERE  c_id= '$edit_id' ";
            $update_sql_result = mysqli_query($db, $update_sql);

            if ($update_sql_result) {
                header('Location: category.php');
            } else {
                echo "Edit error";
            }
        }

        ?>

        <div class="col-lg-8 col-md-8 col sm-12">
            <div class="white-box analytics-info">
                <h3 class="box-title">Total Page Views</h3>
                <ul class="mt-3">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="white-box">
                                <div class="table-responsive">
                                    <table class="table text-nowrap">
                                        <thead>
                                            <tr>
                                                <th class="border-top-0">#</th>
                                                <th class="border-top-0">Category Name</th>
                                                <th class="border-top-0">description</th>
                                                <th class="border-top-0">Status</th>
                                                <th class="border-top-0">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

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
                                                <tr>
                                                    <td><?php echo $count; ?></td>
                                                    <td><?php echo $c_name; ?></td>
                                                    <td><?php echo $c_desc; ?></td>
                                                    <td>
                                                        <?php
                                                        if ($c_status == 0) {
                                                            echo "<span class='badge bg-danger fw-bold'>Inactive</span>";
                                                        } else {
                                                            echo "<span class='badge bg-success fw-bold'>Active</span>";
                                                        }
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <a href="category.php?edit_id=<?php echo $c_id; ?>"><i class="fas fa-edit"></i></a>
                                                        <a href="" class="ms-2" data-bs-toggle="modal" data-bs-target="#delete<?php echo $c_id; ?>"><i class="fas fa-trash text-danger"></i></a>


                                                        <!-- Button trigger modal -->

                                                        <!-- Modal -->
                                                        <div class="modal fade " id="delete<?php echo $c_id; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog ">
                                                                <div class="modal-content bg-warning">
                                                                    <div class="modal-header">
                                                                        <h2 class="modal-title text-danger fw-bold" id="exampleModalLabel">Are You Sure?</h2>
                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <a type="button" class="btn btn-light fw-bold" data-bs-dismiss="modal">Close</a>
                                                                        <a href="category.php?delete_id=<?php echo $c_id; ?>" type="button" class="btn btn-danger text-light fw-bold">Confirm?</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </td>
                                                </tr>

                                            <?php

                                            }

                                            ?>



                                            <?php

                                            // <!-- Delete from database -->

                                            // if (isset($_GET['delete_id'])) {
                                            //     $del_id = $_GET['delete_id'];

                                            //     $delete_sql  = "DELETE FROM category WHERE c_id='$del_id'";
                                            //     $delete_sql_result = mysqli_query($db, $delete_sql);

                                            //     if ($delete_sql_result) {
                                            //         header('Location: category.php');
                                            //     } else {
                                            //         //echo "delete error";
                                            //         die('Delete error in cagegory.php' .mysqli_error($db));
                                            //     }
                                            // }


                                            // <!-- Delete from database -->

                                            if (isset($_GET['delete_id'])) {
                                                //delete id
                                                $del_id = $_GET['delete_id'];
                                                //table name
                                                $table = 'category';
                                                //promary id
                                                $p_key = 'c_id';
                                                //location
                                                $url = 'category.php';

                                                //delete function

                                                delete($del_id, $table, $p_key, $url);
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

</div>
<!-- ============================================================== -->
<!-- End Container fluid  -->
<!-- ============================================================== -->



<?php include "inc/footer.php"; ?>