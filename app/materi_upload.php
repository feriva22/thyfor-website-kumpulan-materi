<?php

include 'helper/page.php';
require_once 'db/Mysql.php';

session_start();

if($_POST['mtr_nama'] !== "" && $_POST['mtr_deskripsi'] !== "" && $_POST['mtr_subtopic'] !== ""){
    $db_con = new Mysql();
    $db_con->dbConnect();

    $current_time = date('Y-m-d H:i:s');

    $mtr_id = $db_con->insert('materi',array(
        'mtr_nama' => "'".trim($_POST['mtr_nama'])."'",
        'mtr_deskripsi' => "'".trim($_POST['mtr_deskripsi'])."'",
        'mtr_subtopic' => intval($_POST['mtr_subtopic']),
        'mtr_created' => "'".date('Y-m-d H:i:s')."'",
        'mtr_updated' => "'".date('Y-m-d H:i:s')."'",
        'mtr_author' => $_SESSION['id'],
        'mtr_status' => 2 //need confirmation
    ));

    //upload file
    if($_FILES['mda_file']!== NULL){
        $total = count($_FILES['mda_file']['name']);
        // Loop through each file
        for( $i=0 ; $i < $total ; $i++ ) {
          //Get the temp file path
          $tmpFilePath = $_FILES['mda_file']['tmp_name'][$i];
          //Make sure we have a file path
          if ($tmpFilePath != ""){
            //Setup our new file path
            $ext = pathinfo($_FILES['mda_file']['name'][$i], PATHINFO_EXTENSION);
            $newFilePath = "./assets/upload/" . md5($_FILES['mda_file']['name'][$i]).".".$ext;

            //Upload the file into the temp dir
            if(move_uploaded_file($tmpFilePath, $newFilePath)) {
              //Handle other code here
              $mda_id = $db_con->insert('media',array(
                  'mda_nama' => "'".trim($_FILES['mda_file']['name'][$i])."'",
                  'mda_source' => "'".md5($_FILES['mda_file']['name'][$i]).".".$ext."'",
                  'mda_materi' => $mtr_id,
                  'mda_size' => $_FILES['mda_file']['size'][$i],
                  'mda_created' => "'".$current_time."'",
                  'mda_updated' => "'".$current_time."'"
              ));
            }
          }
        }
    }
    header("Location: page.php?target=materi_saya");
}
else{
    header("Location: page.php?target=materi_upload");
    exit;
}