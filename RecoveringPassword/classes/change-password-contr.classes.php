<?php

class ChangePasswordContr extends ChangePassword{

    public function getRecoveryRequest($tkn_selector){
        return $this->getRequest($tkn_selector)[0];
        // print_r($this->getRequest($tkn_selector));
    }

    public function deleteFinishedRequest($tkn_selector){
        $this->deleteRequest($tkn_selector);
    }

}