<?php

class ProfileInfoContr extends ProfileInfo{

    private $userId;
    private $userUid;

    public function __construct($userId, $userUid){
        $this->userId = $userId;
        $this->userUid = $userUid;
    }

    public function setDefaultProfileInfo(){
        $profileAbout = "Tell people about yourself!";
        $profileTitle = "Hi, I'm {$this->userUid}";
        $profileText = "Welcome to my profile page!";


        $this->setProfileInfo($profileAbout, $profileTitle, $profileText, $this->userId);
    }

    private function setProfileInfo($profileAbout, $profileTitle, $profileText, $userId){
        $this->setNewProfile($profileAbout, $profileTitle, $profileText, $userId);
    }

}