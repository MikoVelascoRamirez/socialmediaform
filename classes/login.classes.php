<?php

class Login extends Dbh{
    protected function checkUser($uid, $pwd){
        $sql = "SELECT * FROM users WHERE users_uid = ?;";

        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$uid]);

        $result = $stmt->rowCount();

        if(!$result){
            $stmt = null; //Closing connection
            return false;
        }

        $data = $stmt->fetchAll();
        // print_r($data);
        $verifyPass = password_verify($pwd, $data[0]["users_pwd"]);
        $stmt = null;

        return !$verifyPass ? false : [
            "users_id" => $data[0]["users_id"],
            "users_uid" => $data[0]["users_uid"]
        ];

    }
}