<?php

require_once 'secondaryFunctions.php';
$users = [
    ['id'=> 1, 'email' => 'test@mail.ru', 'name' => 'Test'],
    ['id'=> 2, 'email' => 'melnik@greensight.ru', 'name' => 'Ivan'],
    ['id'=> 3, 'email' => 'kolyan1@mail.ru', 'name' => 'Kolya'],
    ['id'=> 4, 'email' => 'fed12@mail.ru', 'name' => 'Fedya'],
    ['id'=> 5, 'email' => 'rnt123@mail.ru', 'name' => 'Renat'],
    ['id'=> 6, 'email' => 'max4@mail.ru', 'name' => 'Maxim'],
    ['id'=> 7, 'email' => 'liddi5@mail.ru', 'name' => 'Lidiya'],
    ['id'=> 8, 'email' => 'eliza67@mail.ru', 'name' => 'Elizaveta'],
    ['id'=> 9, 'email' => 'vasya8@mail.ru', 'name' => 'Vasya'],
    ['id'=> 10, 'email' => 'dima9@mail.ru', 'name' => 'Dima'],
];
if (isset($_POST['name']) && isset($_POST['surname']) && isset($_POST['email'])
    && isset($_POST['pass1']) && isset($_POST['pass2'])){

    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $email = $_POST['email'];
    $password = $_POST['pass1'];
    $repeadPassword = $_POST['pass2'];


    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailError = ['message' => 'E-mail указан неверно'];
        $statusCode = false;
        echo returnJsonHttpResponse($statusCode,$emailError);
        exit();
    }
    if ($password !== $repeadPassword){
        $passwordMatch = ['message' => 'Пароли не совпадают'];
        $statusCode = false;
        echo returnJsonHttpResponse($statusCode,$passwordMatch);
        exit();
    }else{
    foreach ($users as $arrOneUser) {
        if($arrOneUser['email'] === $email){

            $failure = ['message'=>'Пользователь с таким e-mail уже существует'];
            $statusCode = false;
            eventLog($name,$surname,$email,$statusCode, $failure);
            echo returnJsonHttpResponse($statusCode,$failure);
            exit();
        }
    }
    $success = ['message' => 'Вы успешно зарегистрировались !'];
    $statusCode = true;
    eventLog($name,$surname,$email,$statusCode, $success);
    echo returnJsonHttpResponse($statusCode, $success);
    exit();
    }
}