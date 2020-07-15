<?php

include 'helper/page.php';
require_once 'db/Mysql.php';

session_start();


if($_GET['act'] == 'login'){
    login_google();
}
else if($_GET['act'] == 'logout'){
    logout();
}
else{
    echo 'Invalid ACTION';
    exit;
}

function login_google(){
    if($_SESSION['isLogin']){
        echo json_encode(array('status'=> 'ok','message' => 'anda sudah login, redirecting..','redir'=>'page.php?target=materi_upload'));
        exit;
    }
    
    $id_token = $_POST['idtoken'];
    if($id_token != NULL || $id_token != ""){
            // Include two files from google-php-client library in controller
            require_once "library/Google/autoload.php";
            include_once "library/Google/Client.php";
            include_once "library/Google/Service/Oauth2.php";
            // Create Client Request to access Google API
            $client = new Google_Client();
            $client->setApplicationName("Thyfor Sistem Informasi");
            $client->setClientId('224955301360-cvjernudc0tuvkm63uta0kk96hmn7du1.apps.googleusercontent.com');
            $client->setClientSecret('jhS8sfo2a6vdL12qZ12RYxir');
            //$client->setRedirectUri(GOOGLE_REDIR_URI);
            $client->setDeveloperKey('AIzaSyAHP_dFVGaMjsz-qDtLZRyWQ6CKnhxDpTc');
            $client->addScope("https://www.googleapis.com/auth/userinfo.email");
            // Send Client Request
            $objOAuthService = new Google_Service_Oauth2($client);
            //verify the id token
            $decoded_token = $client->verifyIdToken($id_token);
            if($decoded_token){ //if valid id token
                //$payload is parsed jwt token to incformation account
                $payload = $decoded_token->getAttributes()['payload'];
                $userid = $payload['sub'];
    
                $email = $payload['email'];
    
                $db_con = new Mysql();
                $db_con->dbConnect();
    
                $sql_query = "SELECT * FROM user WHERE usr_email = '".$email."'";
                $usr_data = $db_con->customSelectQuery($sql_query,TRUE);
                if(!empty($usr_data)){
                    $_SESSION['isLogin'] = true;
                    $_SESSION['email'] = $usr_data->usr_email;
                    $_SESSION['id'] = $usr_data->usr_id;
                    $_SESSION['tipe'] = $usr_data->usr_tipe;
    
                    echo json_encode(array('status' => 'ok','message' => 'Sukses login','redir' => 'page.php?target=materi_upload'));
                    exit();
                }else{

                    echo json_encode(array('status' => 'error','message' => 'User Tidak terdaftar'));
                    exit();
                }
            }
            else{
                echo json_encode(array('status' => 'error','message' => 'Invalid token'));
            }
    }
    else{
        echo json_encode(array('status' => 'error','message' => 'missing token'));
        exit();
    }
    
}


function logout(){
    session_destroy();
    echo header('Location: index.php');
    exit();
}