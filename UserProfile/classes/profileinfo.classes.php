<?php

class ProfileInfo extends Dbh {

    protected function getProfileInfo($userId){
        $sql = "SELECT profiles_about, profiles_introtitle, profiles_introtext FROM profiles WHERE users_id = ?";
        $stmt = $this->connect()->prepare($sql);
        $result = $stmt->execute([$userId]);

        if(!$result){
            $stmt = null;
            return false;
        }

        return $stmt->fetchAll();
    }

    protected function setNewProfile($profileAbout, $profileTitle, $profileText, $profileId){
        $sql = "INSERT INTO profiles (profiles_about, profiles_introtitle, profiles_introtext, users_id) VALUES (?, ?, ?, ?)";
        $stmt = $this->connect()->prepare($sql);
        $result = $stmt->execute([$profileAbout, $profileTitle, $profileText, $profileId]);
    }
}