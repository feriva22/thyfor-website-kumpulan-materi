<?php

include 'helper/page.php';
require_once 'db/Mysql.php';
session_start();

$tpc_nama =  $_POST['tpc_nama'];
$tpc_deskripsi = $_POST['tpc_deskripsi'];

if($tpc_nama != "" && $tpc_deskripsi != "" ){
    $data_ins = array(
        'tpc_nama' => "'".trim($tpc_nama)."'",
        'tpc_deskripsi' => "'".trim($tpc_deskripsi)."'",
        'tpc_status' => 1
    );

    $db_con = new Mysql();
    $db_con->dbConnect();

    $tpc_id = $db_con->insert('topic',$data_ins);
}
header("Location: page.php?target=topic_list");