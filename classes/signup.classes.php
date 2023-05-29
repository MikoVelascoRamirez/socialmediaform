<?php

class SignUp extends Dbh{

    protected function checkUser($uid, $email){
        $sql = "SELECT users_uid FROM users WHERE users_uid = ? OR users_email = ?;";

        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$uid, $email]);

        return $stmt->rowCount();
    }
}
