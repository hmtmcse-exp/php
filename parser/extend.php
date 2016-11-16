<?php
/**
 * Created by PhpStorm.
 * User: hmtmcse
 * Date: 11/16/16
 * Time: 9:14 PM
 */

$homepage = file_get_contents('template.blade.php');
//preg_match_all ("/{{\s*(MISMaster::dynamic(\w+)\((.*\))\s*)}}/U", $homepage, $pat_array);

preg_match_all ("/@dynamic(\w+)\s*\((.*\))/U", $homepage, $pat_array);


//preg_match_all ("/(.*,)/U", '($data="",$uuid="",$name="",$options = array())', $array);

//echo "<pre>";
//print_r($pat_array);
//echo "<br>";
//
$data = "<?php echo data; ?>";
//
//echo htmlspecialchars(preg_replace("/@dynamicCustomContent\(.*\)/i", $data, $homepage));
//



$data = array(
    "name" => "Touhid",
    "email" => "email@gmail.com"
);

$jsonString = json_encode($data);
//echo $jsonString;

//echo "<pre>";
$jsonObject = json_decode($jsonString);

$phpCodes = "<?php \n";
$phpCodes .= "\$jsonObject = MISMaster::getCustomContentData('');\n";
$phpCodes .= "\n ?>";
echo $phpCodes;