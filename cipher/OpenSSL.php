<?php
/**
 * Created by PhpStorm.
 * User: touhid
 * Date: 09-May-18
 * Time: 6:59 PM
 */

class OpenSSL {



    public static function encrypt($data, $key) {
        return base64_encode(openssl_encrypt($data, "aes-128-ecb", $key, OPENSSL_RAW_DATA));
    }

    public static function decrypt($data, $key) {
        return openssl_decrypt(base64_decode($data), "aes-128-ecb", $key, OPENSSL_RAW_DATA);
    }


}

$data = OpenSSL::encrypt(time() . "___touhid@bitmascot.com___Touhid Mia___" . time(), "bad8deadcafef00d");
echo $data . " <br>";


echo  "<br>";
$data = OpenSSL::decrypt($data, "bad8deadcafef00d");
echo $data . " <br>";

