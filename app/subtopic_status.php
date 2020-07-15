<?php

include 'helper/page.php';
require_once 'db/Mysql.php';
session_start();

$spc_id = $_GET['id'];
$spc_status = $_GET['status'];

$db_con = new Mysql();
$db_con->dbConnect();

if($spc_id !== "" && $spc_status !== ""){

    $db_con->update_single_column('spc_status',$spc_status,'subtopic','spc_id',$spc_id);
}
header("Location: page.php?target=subtopic_list");

