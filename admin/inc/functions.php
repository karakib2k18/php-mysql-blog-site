<?php

include "connection.php"; 

function delete($del_id, $table, $p_key, $url)
{

    //db declare 

    global $db;

    $delete_sql  = "DELETE FROM $table WHERE $p_key='$del_id'";
    $delete_sql_result = mysqli_query($db, $delete_sql);

    if ($delete_sql_result) {
        header('Location:'. $url );
    } else {
        //echo "delete error";
        die('Delete error in cagegory.php' .mysqli_error($db));
    }
}
?>