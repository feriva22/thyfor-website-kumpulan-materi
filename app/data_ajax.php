<?php

include 'helper/page.php';
require_once 'db/Mysql.php';

session_start();

$model = $_POST['model'];
$selector = $_POST['selector'];

if(isset($model)){
    $db_con = new Mysql();
    $db_con->dbConnect();
    
    if($model === "subtopic"){
        $result = $db_con->get('subtopic',FALSE,$selector);
        echo json_encode($result);
        exit;
    }
}
