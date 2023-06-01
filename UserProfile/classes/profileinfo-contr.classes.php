<?php

class ProfileInfoContr extends ProfileInfo{

    private $userId;
    private $userUid;

    public function __construct($userId, $userUid){
        $this->userId = $userId;
        $this->userUid = $userUid;
    }

}