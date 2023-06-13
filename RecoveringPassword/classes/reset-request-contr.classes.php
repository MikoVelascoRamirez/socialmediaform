<?php

class ResetRequestContr extends ResetRequest {

    private $resetEmail;
    private $resetExpireDate;

    public function __construct($resetEmail)
    {
        $this->resetEmail = $resetEmail;
        $this->resetExpireDate = date("U") + 900;
    }

    private function emptyEmail(){
        if(empty($this->resetEmail)) {
            return false;
        }
        return true;
    }

    public function addResetRequest($selector, $validator){
        return $this->insertRequest($this->resetEmail, $selector, $validator, $this->resetExpireDate);
    }
}
