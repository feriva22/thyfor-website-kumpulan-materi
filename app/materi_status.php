<?php

include 'helper/page.php';
require_once 'db/Mysql.php';
session_start();

$mtr_id = $_GET['id'];
$mtr_status = $_GET['status'];

$db_con = new Mysql();
$db_con->dbConnect();

if($mtr_id !== "" && $mtr_status !== ""){
    $db_con->update_single_column('mtr_status',$mtr_status,'materi','mtr_id',$mtr_id);
}
header("Location: page.php?target=materi_list");

