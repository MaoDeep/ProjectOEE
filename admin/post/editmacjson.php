<?php
include "../config.php";
if (isset($_POST["status"])) {
    if ($_POST["status"] == 1) {
        if (!empty($_POST["master_mac"]) && !empty($_POST["master_brand"]) ) {
            
            $sql = "UPDATE machinemaster SET mac_id='".$_POST["master_mac"]."',b_id='".$_POST["master_brand"]."' WHERE id = '14';";
        
            $re = mysqli_query($conn, $sql);

            if ($re) {
                echo "true";
            } else {
                echo "false";
            }
        } else {
            echo "false";
        }
    }
}
