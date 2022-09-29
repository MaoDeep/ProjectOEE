<?php
include "../config.php";
if (isset($_POST["status"])) {
    if ($_POST["status"] == 1) {
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
    } else if ($_POST["status"] == 2) {
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
    } else if ($_POST["status"] == 3) {
        if (!empty($_POST["master_mac"]) && !empty($_POST["master_brand"])) {
            $sql = "INSERT INTO `machinemaster` (`id`, `mac_id`, `b_id`) VALUES (NULL, '" . $_POST["master_mac"] . "', '" . $_POST["master_brand"] . "');";
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
