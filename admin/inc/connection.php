<!-- DATABASE CONNECTION -->
<?php
    $db = mysqli_connect('localhost', 'root', '', 'newstodayn');
    if($db){
        // echo "database connected";
    }else{
        echo "database connected error!";
    }
?>

