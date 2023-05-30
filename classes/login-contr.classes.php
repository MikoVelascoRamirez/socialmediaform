<?php

class LoginContr extends Login{

    private $uid;
    private $pass;

    public function __construct($uid, $pass) {
        $this->uid = $uid;
        $this->pass = $pass;
    }
}