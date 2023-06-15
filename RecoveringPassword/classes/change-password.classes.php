<?php

class ChangePassword extends DBh{

    protected function getRequest($validator){
        $sql = "SELECT pwdresetemail, pwdresetselectortoken, pwdresetvalidatortoken, pwdresetexpires FROM pwdresets WHERE pwdresetselectortoken = ?";
        $stmt = $this->connect()->prepare($sql);
        $result = $stmt->execute([$validator]);

        if(!$result){
            $stmt = null;
            return false;
        }

        return $stmt->fetchAll();
    }

    protected function deleteRequest($validator){
        $sql = "DELETE FROM pwdresets WHERE pwdresetselectortoken = ?";
        $stmt = $this->connect()->prepare($sql);
        $result = $stmt->execute([$validator]);


        if(!$result){
            $stmt = null;
            return false;
        }


        $stmt = null;
    }

    protected function changePassword($newPassword, $mail){
        $sql = "UPDATE users SET users_pwd = ? WHERE users_email = ?";
        $stmt = $this->connect()->prepare($sql);
        $result = $stmt->execute([$newPassword, $mail]);

        if(!$result){
            $stmt = null;
            return false;
        }

        return $result;
    }
}
