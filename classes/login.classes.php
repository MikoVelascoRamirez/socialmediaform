<?php

class Login extends Dbh{
    protected function checkUser($uid, $pwd){
        $sql = "SELECT * FROM users WHERE users_uid = ?;";

        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$uid]);

        $result = $stmt->rowCount();

        if(!$result){
            $stmt = null; //Closing connection
            header('Location: ../index.php?error=usernotfound');
            exit();
        }

        $data = $stmt->fetchAll();
        // print_r($data);
        $verifyPass = password_verify($pwd, $data[0]["users_pwd"]);
        // print_r($verifyPass);
        $stmt = null;

        return !$verifyPass ? false : [
            "users_id" => $data[0]["users_id"],
            "users_uid" => $data[0]["users_uid"]
        ];

    }
}