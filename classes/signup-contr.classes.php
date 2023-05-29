<?php

class SignUpContr extends SignUp{

    private $uid;
    private $pass;
    private $pass_repeat;
    private $email;

    public function __construct($uid, $pass, $pass_repeat, $email){
        $this->uid = $uid;
        $this->pass = $pass;
        $this->pass_repeat = $pass_repeat;
        $this->email = $email;

        // $this->emptyInput();
    }
}