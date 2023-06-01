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

    protected function setNewProfile($profileAbout, $profileTitle, $profileText, $profileId){
        $sql = "INSERT INTO profiles (profiles_about, profiles_introtitle, profiles_introtext, users_id) VALUES (?, ?, ?, ?)";
        $stmt = $this->connect()->prepare($sql);
        $result = $stmt->execute([$profileAbout, $profileTitle, $profileText, $profileId]);


        print_r($result);
    }
}