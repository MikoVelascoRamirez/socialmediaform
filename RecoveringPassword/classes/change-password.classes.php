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
}