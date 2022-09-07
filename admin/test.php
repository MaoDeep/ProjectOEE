<?php
include "config.php";
if (isset($_GET["id"])) {  // ตรวจสอบเมื่อมีการส่งค่า id มา  
    if ($_GET["id"] == 1) { // ตรวจสอบเมื่อ id=1

        $sql1 = "SELECT * FROM `report`";
        $re1 = mysqli_query($conn, $sql1); 

        foreach ($re1 as $rw1) { // ดึงข้อมูลจาก ดาต้าเบสมา
            $arr1[] = $rw1["EU"];
        }
        $arr2 = array(
            "Max" => max($arr1), // ดึง EU มาหาค่า max min 
            "Min" => min($arr1)  
        );

        echo (json_encode($arr2)); // แปลงให้มันเป็น json
    } elseif ($_GET["id"] == 2) { 
        $sql = "SELECT * FROM `report` INNER JOIN users on report.u_id = users.u_id ORDER BY id DESC LIMIT 4;";
        $re = mysqli_query($conn, $sql);
        $name = [];
        $TR = [];
        $TS = [];
        $NT = [];
        $EU = [];


        foreach ($re as $k => $row) {  // k ลำดับ
            $name[$k] = $row["u_usersname"];
            $TR[$k] = $row["TR"];
            $TS[$k] = $row["TS"];
            $NT[$k] = $row["NT"];
            $EU[$k] = $row["EU"];
        }
        $arr = array(
            "name" => [$name[0], $name[1], $name[2], $name[3]], // เรียงชื่อจากคนที่ 1 ถึง 4
            "n1" => [$TR[0], $TS[0], $NT[0], $EU[0]], 
            "n2" => [$TR[1], $TS[1], $NT[1], $EU[1]],
            "n3" => [$TR[2], $TS[2], $NT[2], $EU[2]],
            "n4" => [$TR[3], $TS[3], $NT[3], $EU[3]],
        );
        echo (json_encode($arr));
    }
}
