<?php

class ResetRequestContr extends ResetRequest {

    private $resetEmail;
    private $resetExpireDate;

    public function __construct($resetEmail)
    {
        $this->resetEmail = $resetEmail;
        $this->resetExpireDate = date("U") + 900;
    }
}
