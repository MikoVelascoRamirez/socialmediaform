<?php

class ChangePasswordContr extends ChangePassword{

    private $tokenSelector;
    private $email;
    private $selectorToken;
    private $validatorToken;
    private $expirationTime;

    public function __construct($selector){
        $this->tokenSelector = $selector;
    }

    }

    public function deleteFinishedRequest($tkn_selector){
        $this->deleteRequest($tkn_selector);
    }

    public function emptyInput($password, $repeatPassword){
        $object_props = func_get_args();
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