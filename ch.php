<?php
include "config.php";
session_start();
$arr = array(
      $_POST["txt1"],
      $_POST["txt2"]
);

$sql = "SELECT * FROM `users` WHERE users.u_usersname = '" . $arr[0] . "' AND users.u_pssaword = '" . $arr[1] . "'";
$re = mysqli_query($conn, $sql);

if ($re->num_rows !== 0) {
      foreach ($re as $rw) {
            $_SESSION["id"] = $rw["u_id"];
            $_SESSION["user"] = $rw["u_usersname"];
            $_SESSION["status"] = $rw["Status"];
      }
      header("location: home.php");
      exit(0);
} else {
      header("location: index.php");
      exit(0);
}
