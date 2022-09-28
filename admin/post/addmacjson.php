<?php
include "../config.php";
if (isset($_POST["status"]) == 1) {
    if (!empty($_POST["mac"])) {
        $sql = "INSERT INTO `machine` (`mac_id`, `mac_name`) VALUES (NULL, '" . $_POST["mac"] . "');";
        $re = mysqli_query($conn, $sql);

        if ($re) {
            echo "true";
        } else {
            echo "false";
        }
    } else {
        echo "false";
    }
} else if (isset($_POST["status"]) == 2) {
    if (!empty($_POST["brand"])) {
        $sql = "INSERT INTO `brand` (`b_id`, `b_name`) VALUES (NULL, '" . $_POST["brand"] . "');";
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
