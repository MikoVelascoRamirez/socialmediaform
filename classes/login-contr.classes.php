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
            // echo "Empty Input!";
            header("Location: ../index.php?error=emptyinput");
            exit();
        } else if(!$this->invalidUid()){
            // echo "Invalid username!";
            header("Location: ../index.php?error=username");
            exit();
        }

        return $this->loginCheck();
        
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

    private function invalidUid(){
        if(!preg_match("/^[a-zA-Z0-9]*$/", $this->uid)){
            return false;
        }
        return true;
    }

    private function loginCheck(){
        return $this->checkUser($this->uid, $this->pass);
    }

}