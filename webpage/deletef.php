<?php
require_once("db_config.php");

if(isset($_GET['del'])){
    $masks_id = $_GET['del'];
    $sql = "DELETE FROM masks WHERE masks_id='".$masks_id."'";
    $result = mysqli_query($connection, $sql) or die(mysqli_error($connection));

    if($result){
        header("location:delete.php");
    }
    else{
        echo "valami nem ok";
    }
}
else{
    header("location:index3.php");
}