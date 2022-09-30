<?php
include "../config.php";
if (isset($_POST["status"])) {
    if ($_POST["status"] == 1) {
        if (!empty($_POST["mac"])) {
          /*  $sql = "INSERT INTO `machine` (`mac_id`, `mac_name`) VALUES (NULL, '" . $_POST["mac"] . "');"; */
            $sql = "UPDATE `machine` SET ` mac_name = '" . $_POST["in_mac"] . "' ,  .  WHERE mac_id = " . $_POST["id_mac"] . "  ";
            /* UPDATE `machine` SET `mac_name` = 'MC-HTP-2010-8' WHERE `machine`.`mac_id` = 44; */
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
            $sql = "UPDATE `machinemaster` SET ` mac_id = '" . $_POST["master_mac"] . "' , b_id = '" . $_POST["master_brand"] . "' ,  .  WHERE id = " . null . "  ";
            /* UPDATE `machinemaster` SET `b_id` = '3' WHERE `machinemaster`.`id` = 13; */
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
