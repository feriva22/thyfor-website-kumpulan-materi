<?php

include 'helper/page.php';
require_once 'db/Mysql.php';
session_start();

$mtr_id = $_GET['id'];

$db_con = new Mysql();
$db_con->dbConnect();


if($mtr_id !== ""){
    $db_con->update_single_column('mtr_status',0,'materi','mtr_id',$mtr_id);
}

header("Location: page.php?target=status_materi");


