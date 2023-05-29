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

    public function signUpUser(){
        if(!$this->emptyInput()) {
            // echo "Empty Input!";
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