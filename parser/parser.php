<?php
/**
 * Created by PhpStorm.
 * User: touhid
 * Date: 16/08/2016
 * Time: 2:19 PM
 */

$homepage = file_get_contents('template.blade.php');
echo $homepage;

$userinfo = '{{ MISMaster::dynamicArticle($data="",$uuid="",$name="",$options = array()) }}

{{ MISMaster::dynamicArticle($data="",$uuid="",$name="",$options = array()) }}

{{ MISMaster::staticArticle($data="",$uuid="",$name="",$options = array()) }}

{{ MISMaster::staticProduct($data="",$uuid="",$name="",$options = array()) }}
{{ MISMaster::dynamicArticle($data="",$uuid="",$name="",$options = array()) }}
{{ MISMaster::dynamicPCategory($data="",$uuid="",$name="",$options = array()) }}
{{ MISMaster::dynamicGallery($data="",$uuid="",$name="",$options = array()) }}

';
//preg_match_all ("/{{\s*(MISMaster::dynamic\w+\(.*\)\s*)}}/U", $homepage, $pat_array);
preg_match_all ("/{{\s*(MISMaster::dynamic(\w+)\((.*\))\s*)}}/U", $homepage, $pat_array);


//preg_match_all ("/(.*,)/U", '($data="",$uuid="",$name="",$options = array())', $array);

echo "<pre>";
print_r($array);
echo "<br>";
print_r($pat_array);


