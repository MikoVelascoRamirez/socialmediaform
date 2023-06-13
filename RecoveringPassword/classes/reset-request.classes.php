<?php

class ResetRequest extends Dbh {

    public function checkEmailAddress($email){
        $sql = "SELECT users_email FROM users WHERE users_email = ?";
        $stmt = $this->connect()->prepare($sql);
        $result = $stmt->execute([$email]);

        if(!$result){
            $stmt = null;
            return false;
        }

        return $stmt->rowCount();
    }

    public function insertRequest($resetEmail, $selector, $validator, $expires){
        $sql = "INSERT INTO pwdresets(pwdresetemail, pwdresetselectortoken, pwdresetvalidatortoken, pwdresetexpires) VALUES (?, ?, ?, ?)";
        $stmt = $this->connect()->prepare($sql);
        $result = $stmt->execute([$resetEmail, $selector, $validator, $expires]);

        if(!$result){
            $stmt = null;
            return false;
        }

        $stmt = null;
        return true;
    }

}