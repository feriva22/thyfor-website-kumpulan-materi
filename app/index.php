<?php

include 'helper/page.php';
require_once 'db/Mysql.php';

session_start();


$data = array();

$db_con = new Mysql();
$db_con->dbConnect();

$sql_query = 'SELECT * FROM materi INNER JOIN 
(SELECT * FROM subtopic INNER JOIN topic ON spc_topic = tpc_id) tp
ON tp.spc_id = mtr_subtopic
WHERE mtr_status = 1';

if(isset($_GET['query'])){
    $query = $_GET['query'];
    $sql_query .= " AND mtr_nama LIKE '%".$query."%'";
}

$materi_data = $db_con->customSelectQuery($sql_query);
openView('view/home.php',array('materi' => $materi_data),TRUE);