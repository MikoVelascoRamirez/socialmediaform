<?php

class ProfileInfoView extends ProfileInfo{

    private $id;
    private $about;
    private $introtitle;
    private $introtext;
 
    public function __construct($id){
        $this->id = $id;
    }
}