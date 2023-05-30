<?php

class LoginContr extends Login{

    private $uid;
    private $pass;

    public function __construct($uid, $pass) {
        $this->uid = $uid;
        $this->pass = $pass;
    }

    public function loginUser(){
        if(!$this->emptyInput()) {
            echo "Empty Input!";
            header("Location: ../index.php?error=emptyinput");
            exit();
        }
    }

    private function emptyInput(){
        $object_props = get_object_vars($this);
        // var_dump($object_props = get_object_vars($this));
        foreach($object_props as $key => $value){
            // echo $object_props[$key] . $object_props[$value];
            if (empty($object_props[$key])){
                return false;
            }
        }
        return true;
    }
}