<?php

include 'helper/page.php';
require_once 'db/Mysql.php';
session_start();

$usr_nama =  $_POST['usr_nama'];
$usr_email = $_POST['usr_email'];
$usr_tipe = $_POST['usr_tipe'];

if($usr_nama != "" && $usr_email != "" && $usr_tipe != ""){
    $data_ins = array(
        'usr_nama' => "'".trim($usr_nama)."'",
        'usr_email' => "'".trim($usr_email)."'",
        'usr_tipe' => $usr_tipe,
        'usr_status' => 1
    );

    $db_con = new Mysql();
    $db_con->dbConnect();

    $usr_id = $db_con->insert('user',$data_ins);
}
header("Location: page.php?target=akun_list");