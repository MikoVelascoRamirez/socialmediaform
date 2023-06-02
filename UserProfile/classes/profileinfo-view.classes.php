<?php

class ProfileInfoView extends ProfileInfo{

    private $id;
    private $about;
    private $introtitle;
    private $introtext;
 
    public function __construct($id){
        $this->id = $id;

        $info = $this->getProfile($this->id);

        $this->about = $info['profiles_about'];
        $this->introtitle = $info['profiles_introtitle'];
        $this->introtext = $info['profiles_introtext'];
    }

    public function __get($name)
    {
        return $this->$name; 
    }

    public function getProfile($id){
        return $this->getProfileInfo($id)[0];
    }
}