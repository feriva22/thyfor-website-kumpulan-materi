<?php

include 'helper/page.php';
require_once 'db/Mysql.php';
session_start();

$spc_nama =  $_POST['spc_nama'];
$spc_deskripsi = $_POST['spc_deskripsi'];
$spc_topic = $_POST['spc_topic'];

if($spc_nama != "" && $spc_deskripsi != "" && $spc_topic != ""){
    $data_ins = array(
        'spc_nama' => "'".trim($spc_nama)."'",
        'spc_deskripsi' => "'".trim($spc_deskripsi)."'",
        'spc_topic' => $spc_topic,
        'spc_status' => 1
    );

    $db_con = new Mysql();
    $db_con->dbConnect();

    $spc_id = $db_con->insert('subtopic',$data_ins);
}
header("Location: page.php?target=subtopic_list");