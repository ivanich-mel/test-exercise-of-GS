<?php

function returnJsonHttpResponse($flag, $data) {

    header("Content-type: application/json; charset=utf-8");
    if ($flag) {
        http_response_code(200);
    } else {
        http_response_code(500);
    }
    return json_encode($data);
    exit();
}
function eventLog($name, $surname, $email, $statusCode, array $resultMessage){
    if ($statusCode) {
        $message = ' Status Code: 200 OK. ' . $resultMessage['message'];
    } else {
        $message = ' Status Code: 500 Internal Server Error. ' . $resultMessage['message'];
    }
    $log = date('Y-m-d H:i:s') . $message .
        '  Name:' . $name . ' Surname:' . $surname . ' Email:' . $email . "\n";
    file_put_contents(__DIR__ . '/log.txt', $log, FILE_APPEND);
}