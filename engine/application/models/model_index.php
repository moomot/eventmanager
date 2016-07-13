<?php

/**
 * Created by PhpStorm.
 * User: kiko
 * Date: 29.05.16
 * Time: 9:37
 */
class Model_Index extends Model
{
    function getPass($login) {
        $_dbh = Application::getInstance()->getDBH();
        $stmt = $_dbh->prepare("SELECT password FROM users WHERE login=:login");
        $stmt->bindParam(":login", $login);
        if( $stmt->execute() ) {
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
        } else {
            throw new Exception("Query error");
        }
        return $result;
    }

    function registerUser($data) {
        $_dbh = Application::getInstance()->getDBH();
        $stmt = $_dbh->prepare("INSERT INTO users(`login`,`password`,`email`) VALUES (:login, :password, :email)");
        $stmt->bindParam(":login", $data['login']);
        $stmt->bindParam(":password", $data['password']);
        $stmt->bindParam(":email", $data['email']);
        $result = $stmt->execute();
        return $result;
    }

    function isUserAvailable($data) {
        $_dbh = Application::getInstance()->getDBH();
        $stmt = $_dbh->prepare("SELECT count(*) FROM users WHERE login=:login OR email=:email");
        $stmt->bindParam(":login", $data['login']);
        $stmt->bindParam(":email", $data['email']);
        $stmt->execute();
        $rows = $stmt->fetchColumn();
        if($rows != 0) {
            return false;
        } else {
            return true;
        }
    }
}