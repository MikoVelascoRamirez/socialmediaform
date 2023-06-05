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

    private function emptyInput($about, $introtitle, $introtext){
        $object_props = [$about, $introtitle, $introtext];
        foreach($object_props as $value){
            if (empty($value)){
                return true;
            }
        }
        return false;
    }
    
    public function updateProfileInfo($about, $introtitle, $introtext){
        if(!$this->emptyInput($about, $introtitle, $introtext)){
            return $this->updateProfile($about, $introtitle, $introtext, $this->userId);
        }
    }
}