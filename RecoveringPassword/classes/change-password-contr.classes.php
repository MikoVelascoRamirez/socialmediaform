<?php

class ChangePasswordContr extends ChangePassword{

    public function getRecoveryRequest($tkn_selector){
        return $this->getRequest($tkn_selector)[0];
        // print_r($this->getRequest($tkn_selector));
    }

    public function deleteFinishedRequest($tkn_selector){
        $this->deleteRequest($tkn_selector);
    }

    public function emptynput($password, $repeatPassword){
        $object_props = func_get_args();
        // var_dump($object_props);
        foreach($object_props as $key => $value){
            // echo $object_props[$key] . $object_props[$value];
            if (empty($object_props[$key])){
                return false;
            }
        }
        return true;
    }

    public function checkPasswords($password, $repeatPassword){
        if($password !== $repeatPassword){
            return false;
        }
        return true;
    }

    public function verifyTokenValidator($tokenValidatorURL, $tokenValidatorDB){
        return password_verify($tokenValidatorURL, $tokenValidatorDB);
    }

    public function updatePassword($newPaasword, $emailUser){
        return $this->changePassword($newPaasword, $emailUser);
    }

}