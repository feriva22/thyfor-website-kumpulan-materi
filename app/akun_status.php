<?php

include 'helper/page.php';
require_once 'db/Mysql.php';
session_start();

$usr_id = $_GET['id'];
$usr_status = $_GET['status'];

$db_con = new Mysql();
$db_con->dbConnect();

if($usr_id !== "" && $usr_status !== ""){

    $db_con->update_single_column('usr_status',$usr_status,'user','usr_id',$usr_id);
}
header("Location: page.php?target=akun_list");

