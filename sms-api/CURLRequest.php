<?php

/**
 * Created by PhpStorm.
 * User: Touhid Mia
 * Date: 26/12/2015
 * Time: 07:34 PM
 */
class CURLRequest {

    public static $POST_REQUEST = "POST";
    public static $GET_REQUEST = "GET";
    public static $PUT_REQUEST = "PUT";



    public function POST($url, $parameters = array()){

    }

    public function GET(){

    }

    public function PUT(){

    }


    public private function makeCurlCall($url, $method = "GET", $params = array(), $headers = null){

        $ch = curl_init();
        if (!empty($params) && $method == "GET") {
            $url .= "?";
            foreach($params as $param){
             $url .= "";
            }


        }

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 60);

        if ($headers == null || !is_array($headers)) {
            $headers = array();
        }


        if (!empty($params)) {
            curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
        }
        if (count($headers) > 0) {
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        }


        if ($method == "POST") {
            curl_setopt($ch, CURLOPT_POST, true);
        } else if ($method == "PUT") {
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
        } else if ($method == "HEAD") {
            curl_setopt($ch, CURLOPT_NOBODY, true);
        }

        if ($headers != null && is_array($headers)) {
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        }

        $response = curl_exec($ch);
        if ((curl_errno($ch) == 60)) {
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            $response = curl_exec($ch);
        }

        $httpStatus = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        if (curl_errno($ch)) {
            $response = curl_error($ch);
        }
        curl_close($ch);

        return array(
            "code" => $httpStatus,
            "response" => $response
        );
    }

}