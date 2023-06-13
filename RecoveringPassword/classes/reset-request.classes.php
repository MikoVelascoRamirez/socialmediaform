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

}