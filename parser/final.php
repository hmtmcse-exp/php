<?php
/**
 * Created by PhpStorm.
 * User: Touhid Mia
 * Date: 16/08/2016
 * Time: 11:33 PM
 */

$homepage = file_get_contents('template.blade.php');
echo $homepage;

preg_match_all ("/{{\s*(MISMaster::dynamic(\w+)\((.*\))\s*)}}/U", $homepage, $array);


echo "<br><br><br><br><br>";
for($i = 0; $i < count($array[0]); $i++ ){
    $params = explode(",",$array[3][$i]);
    echo $array[2][$i] . " uuid = " . $params[1] . " name = " . $params[2] . "<br>";
}



echo "<br><br><br><br><br>";
echo "<pre>";
print_r($array);


