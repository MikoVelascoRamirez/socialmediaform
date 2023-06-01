<?php

class SignUp extends Dbh{

    protected function checkUser($uid, $email){
        $sql = "SELECT users_uid FROM users WHERE users_uid = ? OR users_email = ?;";

        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$uid, $email]);

        return $stmt->rowCount();
    }

    protected function setUser($uid, $pwd, $email){
        $sql = "INSERT INTO users (users_uid, users_pwd, users_email) VALUES (?, ?, ?)";

        $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

        $stmt = $this->connect()->prepare($sql);
        $result = $stmt->execute([$uid, $hashedPwd, $email]);

        if(!$result){
            $stmt = null;
            header("Location: ../index.php?error=stmtfailed");
            exit();
        }

        $stmt = null;
    }

    protected function getIdUser($uid){
        $sql = "SELECT users_id FROM users WHERE users_uid = ?";
        $stmt = $this->connect()->prepare($sql);
        $result = $stmt->execute([$uid]);

        if(!$result){
            $stmt = null;
            header("Location: ../index.php?error=stmtfailed");
            exit();
        }

        return $stmt->fetchAll();
    }
}
