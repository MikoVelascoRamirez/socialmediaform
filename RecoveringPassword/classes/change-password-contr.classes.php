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

    public function checkAvailability(){
        if(!$this->getRecoveryRequest()){
            return "invalidtoken";
        } else if($this->checkExpiration()){
            return "expiredtime";
        }

        return true;
    }

    private function getRecoveryRequest(){
        $result = $this->getRequest($this->tokenSelector);
        if(!$result) {
            return false;
        }
        $this->email = $result[0]['pwdresetemail'];
        $this->selectorToken = $result[0]['pwdresetselectortoken'];
        $this->validatorToken = $result[0]['pwdresetvalidatortoken'];
        $this->expirationTime = $result[0]['pwdresetexpires'];
        return true;
    }

    private function deleteFinishedRequest($tkn_selector){
        $this->deleteRequest($tkn_selector);
    }

    private function checkExpiration(){
        if ($this->expirationTime < time()) {
            $this->deleteFinishedRequest($this->selectorToken);
            return true;
        }

        return false;
    }

    public function checkFields($password, $repeatPassword){
        $emptyFields = $this->emptyInput($password, $repeatPassword);
        $passwordsAreTheSame = $this->checkPasswords($password, $repeatPassword);

        return !$emptyFields || !$passwordsAreTheSame;
    }

    private function emptyInput($password, $repeatPassword){
        $object_props = func_get_args();
        foreach($object_props as $key => $value){
            // echo $object_props[$key] . $object_props[$value];
            if (empty($object_props[$key])){
                return false;
            }
        }
        return true;
    }

    private function checkPasswords($password, $repeatPassword){
        if($password !== $repeatPassword){
            return false;
        }
        return true;
    }

    public function verifyTokenValidator($tokenValidatorURL){
        return password_verify($tokenValidatorURL, $this->validatorToken);
    }

    public function updatePassword($newPaasword){
        $updated = $this->changePassword($newPaasword, $this->email);
        if(!$updated){
            return false;
        }
        $this->deleteFinishedRequest($this->selectorToken);
        return true;
    }

}