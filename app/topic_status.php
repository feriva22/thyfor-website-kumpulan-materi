<?php

include 'helper/page.php';
require_once 'db/Mysql.php';
session_start();

$tpc_id = $_GET['id'];
$tpc_status = $_GET['status'];

$db_con = new Mysql();
$db_con->dbConnect();

if($tpc_id !== "" && $tpc_status !== ""){

    $db_con->update_single_column('tpc_status',$tpc_status,'topic','tpc_id',$tpc_id);
}
header("Location: page.php?target=topic_list");

