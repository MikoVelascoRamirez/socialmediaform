<?php

class ProfileInfo extends Dbh {

    protected function getProfileInfo($userId){
        $sql = "SELECT * FROM profiles WHERE users_id = ?;";
        $stmt = $this->connect()->prepare($sql);
        $result = $stmt->execute([$userId]);

        if(!$result){
            $stmt = null;
            header('Location: profile.php?error=stmtfailed');
            exit();
        }
    }
}