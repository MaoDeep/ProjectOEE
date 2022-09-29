<?php
include "../config.php";

$sql_mac = "SELECT * FROM `machine`";
$re_mac = mysqli_query($conn, $sql_mac);
foreach ($re_mac as $row) {
}
