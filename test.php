<?php

$data = [
    "username" => trim(htmlspecialchars($_POST['username'])),
    "tel" => trim(htmlspecialchars($_POST['tel'])),
];

$reg_phone_number = "/^((8|\+7)[\- ]?)?(\(?\d{3}\)?[\- ]?)?[\d\- ]{7,10}$/";

if ((!empty($data['username']) && !empty($data['tel']))){
    if(strlen($data['username']) >= 3  && preg_match($reg_phone_number, $_POST['tel'])){
        try {
            $connect = new PDO('mysql:host=localhost; dbname=test', 'mysql', 'mysql');
            $sql = 'INSERT INTO `users` (`name`, `telephone`) VALUES (:username, :tel)';
            $statment = $connect->prepare($sql);
            $result = $statment->execute($data);
            // var_dump($result);
            echo 1;
        }
        catch (PDOException $e) {
            $PDOFatalError( $e );
            die;
        
        }
    } else {
        echo 2;
        die;
    }
} else {
    echo 2;
    die;
}