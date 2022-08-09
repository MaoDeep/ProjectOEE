<?php
require('config.php');
session_start();
if(isset($_GET['edit'])){
    $sql = "DELETE FROM `employee` WHERE E_id = '".$_GET['edit']."'";
    $re = mysqli_query($conn,$sql);
    if($re){
        header("location: tables.php?del=1");
        exit(0);

    }else{
        header("location: tables.php?del=0");
        exit(0);
    }
    
}
?>