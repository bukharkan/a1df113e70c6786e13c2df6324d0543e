<?php

require_once('includes/initialize.php');
require_once('includes/oauth/server.php');
header('Content-Type: application/json; charset=UTF-8');

// Handle a request to a resource and authenticate the access token
if (!$server->verifyResourceRequest(OAuth2\Request::createFromGlobals())) {
    $message = array();
    $message['status'] = "401";
    $message['message'] = "Unauthorized";
    echo json_encode($message);
    die;
}

$response = array();

if(isset($_POST['mail_to']) && isset($_POST['mail_from']) && isset($_POST['subject']) && isset($_POST['body'])){
    $to = $_POST['mail_to'];
    $from = $_POST['mail_from'];
    $subject = $_POST['subject'];
    $body = $_POST['body'];

    $result = $api->addQueue($to, $from, $subject, $body);

    if($result){
        $response['status'] = "00";
        $response['message'] = "Send email successfully";
    }else{
        $response['status'] = "06";
        $response['message'] = "Error send email";
    }
    echo json_encode($response);
}else{
    $response['status'] = "99";
    $response['message'] = "Required parameter missing";
    echo json_encode($response);
}


?>