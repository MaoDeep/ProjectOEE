<?php
include "../config.php";

if (isset($_POST["id"])) {

    $sql_mac = "SELECT * FROM `machine` WHERE machine.mac_name = '" . $_POST["id"] . "';";

    $re_mac = mysqli_query($conn, $sql_mac);
    foreach ($re_mac as $row) {

        $sql_b = "SELECT * FROM `brand` WHERE brand.b_id = '" . $row["mac_id"] . "';";
        $re_b = mysqli_query($conn, $sql_b);
        foreach ($re_b as $x) {
            $arr[] = $x;
            echo json_encode($arr);
        }
    }
}
