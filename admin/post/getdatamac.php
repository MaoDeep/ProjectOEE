<?php
include "../config.php";

if (isset($_POST["id"])) {

    $sql_mac = "SELECT * FROM `machinemaster` INNER JOIN brand ON brand.b_id = machinemaster.b_id INNER JOIN machine on machine.mac_id =machinemaster.mac_id WHERE id = '" . $_POST["id"] . "';";
    $re_mac = mysqli_query($conn, $sql_mac);
    foreach ($re_mac as $row) {
        $arr[] = $row;

        echo json_encode($arr);
    }
}
