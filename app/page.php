<?php

include 'helper/page.php';
require_once 'db/Mysql.php';


session_start();


$target = $arr = get_defined_functions()['user']; // defined page

if(!empty($_GET['target']) && in_array($_GET['target'], $target)) {
    $func = $_GET['target'];
    $func();
}else{
    //show not found if file not found
    openView('view/not_found.php',array(),TRUE);
}


function materi(){
    $db_con = new Mysql();
    $db_con->dbConnect();
    $data = array();

    $materi_id = $_GET['id'];
    $pk_val = intval($materi_id);

    $sql_query = 'SELECT * FROM materi INNER JOIN 
                        (SELECT * FROM subtopic INNER JOIN topic ON spc_topic = tpc_id) tp
                        ON tp.spc_id = mtr_subtopic
                        WHERE mtr_status = 1 AND mtr_id = '.$pk_val;
    $materi_data = $db_con->customSelectQuery($sql_query,TRUE);
    
    $media_query = 'SELECT * FROM media where mda_materi = '.$pk_val;
    $media_data = $db_con->customSelectQuery($media_query);

    if(isset($materi_data)){
        $user_query = 'SELECT * FROM user where usr_id = '.$materi_data->mtr_author;    
        $author_data = $db_con->customSelectQuery($user_query,TRUE);
    }
    
    openView('view/materi.php',array('materi' => $materi_data,
                                    'author' => $author_data,
                                    'media' => $media_data),TRUE);
}

function login(){
    openView('view/login.php',array(),TRUE);
}

function materi_upload(){
    if(!$_SESSION['isLogin']){
        header("Location: index.php");
        exit;
    }  
    $data = array(); 
    $db_con = new Mysql();
    $db_con->dbConnect();  
    $topic_query = 'SELECT * FROM topic WHERE tpc_status != 0';
    $topic_data = $db_con->customSelectQuery($topic_query);
   
    openView('view/upload.php',array('topic' => $topic_data),TRUE);
}

function materi_saya(){
    if(!$_SESSION['isLogin']){
        header("Location: index.php");
        exit;
    }  
    $data = array(); 
    $db_con = new Mysql();
    $db_con->dbConnect(); 
    $sql_query = 'SELECT * FROM materi INNER JOIN 
                    (SELECT * FROM subtopic INNER JOIN topic ON spc_topic = tpc_id) tp
                    ON tp.spc_id = mtr_subtopic
                    WHERE mtr_status != 0 AND mtr_author = '.$_SESSION['id'];

    $materi_data = $db_con->customSelectQuery($sql_query);


    openView('view/materi_saya.php',array('materi' => $materi_data),TRUE);
}

function materi_list(){
    if(!$_SESSION['isLogin'] && $_SESSION['tipe'] != 0){
        header("Location: index.php");
        exit;
    }  

    $data = array();
    $db_con = new Mysql();
    $db_con->dbConnect(); 
    $sql_query = 'SELECT * FROM materi,user,(SELECT * FROM subtopic INNER JOIN topic ON spc_topic = tpc_id) tp
                    WHERE  mtr_author = usr_id AND tp.spc_id = mtr_subtopic AND mtr_status != 0' ;

    $materi_data = $db_con->customSelectQuery($sql_query);

    openView('view/materi_list.php',array('materi' => $materi_data),TRUE);
}

function materi_detail(){
    if(!$_SESSION['isLogin'] && $_SESSION['tipe'] != 0){
        header("Location: index.php");
        exit;
    }

    $db_con = new Mysql();
    $db_con->dbConnect();
    $data = array();

    $materi_id = $_GET['id'];
    $pk_val = intval($materi_id);

    $sql_query = 'SELECT * FROM materi,user,(SELECT * FROM subtopic INNER JOIN topic ON spc_topic = tpc_id) tp
                    WHERE  mtr_author = usr_id AND tp.spc_id = mtr_subtopic 
                    AND mtr_status != 0 AND mtr_id = '.$pk_val;

    $materi_data = $db_con->customSelectQuery($sql_query,TRUE);
    
    $media_query = 'SELECT * FROM media where mda_materi = '.$pk_val;
    $media_data = $db_con->customSelectQuery($media_query);

    if(isset($materi_data)){
        $user_query = 'SELECT * FROM user where usr_id = '.$materi_data->mtr_author;    
        $author_data = $db_con->customSelectQuery($user_query,TRUE);
    }
    
    openView('view/materi_detail.php',array('materi' => $materi_data,
                                    'author' => $author_data,
                                    'media' => $media_data),TRUE);
}

function akun_list(){
    if(!$_SESSION['isLogin'] && $_SESSION['tipe'] != 0){
        header("Location: index.php");
        exit;
    }  

    $data = array();
    $db_con = new Mysql();
    $db_con->dbConnect(); 
    $sql_query = 'SELECT * FROM user WHERE usr_status != 0';

    $user_data = $db_con->customSelectQuery($sql_query);
    openView('view/akun_list.php',array('akun' => $user_data),TRUE);
}


function subtopic_list(){
    if(!$_SESSION['isLogin'] && $_SESSION['tipe'] != 0){
        header("Location: index.php");
        exit;
    }  

    $data = array();
    $db_con = new Mysql();
    $db_con->dbConnect(); 
    $sql_query = 'SELECT * FROM subtopic, topic WHERE spc_status != 0 AND spc_topic = tpc_id';

    $subtopic_data = $db_con->customSelectQuery($sql_query,FALSE);

    $topic_query = 'SELECT * FROM topic WHERE tpc_status != 0';
    $topic_data = $db_con->customSelectQuery($topic_query,FALSE);

    openView('view/subtopic_list.php',array(
                                'subtopic' => $subtopic_data,
                                'topic' => $topic_data
                            ),TRUE);   
}

function topic_list(){
    if(!$_SESSION['isLogin'] && $_SESSION['tipe'] != 0){
        header("Location: index.php");
        exit;
    }  

    $data = array();
    $db_con = new Mysql();
    $db_con->dbConnect(); 
    $sql_query = 'SELECT * FROM topic WHERE tpc_status != 0';

    $topic_data = $db_con->customSelectQuery($sql_query,FALSE);
    openView('view/topic_list.php',array('topic' => $topic_data),TRUE);   
}