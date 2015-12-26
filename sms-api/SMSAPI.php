<?php

/**
 * Created by PhpStorm.
 * User: Touhid Mia
 * Date: 26/12/2015
 * Time: 07:36 PM
 */
class SMSAPI{

    private $URL = "https://powersms.banglaphone.net.bd/httpapi/sendsms";
    private $USERNAME = "";
    private $PASSWORD = "";




    public function sendMessage($message, $numbers){
        $parameters = array(
            "userId"=> $this->USERNAME,
            "password"=> $this->PASSWORD,
            "sText"=> $message,
            "commaSeperatedReceiverNumbers"=> $numbers,
        );

    }

}