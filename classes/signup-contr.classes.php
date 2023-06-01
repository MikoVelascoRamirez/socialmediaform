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
        } else if(!$this->invalidUid()){
            // echo "Invalid username!";
            header("Location: ../index.php?error=username");
            exit();
        } else if(!$this->invalidEmail()){
            // echo "Invalid email!";
            header("Location: ../index.php?error=email");
            exit();
        } else if(!$this->pwdMatch()){
            // echo "Passwords doesn't match";
            header("Location: ../index.php?error=passwordmatch");
            exit();
        } else if(!$this->uidTakenCheck()){
            // echo "Username or email taken";
            header("Location: ../index.php?error=useroremailtaken");
            exit();
        }

        $this->setUser($this->uid, $this->pass, $this->email);
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

    private function invalidEmail(){
        if(!filter_var($this->email, FILTER_VALIDATE_EMAIL)){
            return false;
        }
        return true;
    }

    private function pwdMatch(){
        if($this->pass !== $this->pass_repeat){
            return false;
        }
        return true;
    }

    private function uidTakenCheck(){
        $rows = $this->checkUser($this->uid, $this->email);
        if(!$rows){
            return true;
        }
        return false;
    }

    public function fetchIdUser($uid){
        return $this->getIdUser($uid)[0]['users_id'];
    }
    
}