<?php
/**
 * Created by PhpStorm.
 * User: hmtmcse
 * Date: 8/28/16
 * Time: 9:44 PM
 */

//setlocale(LC_ALL, 'en_US.UTF8');
function toAscii($str, $replace=array(), $delimiter='-') {
    if( !empty($replace) ) {
        $str = str_replace((array)$replace, ' ', $str);
    }
    $clean = iconv('UTF-8', 'ASCII//TRANSLIT', $str);
    $clean = preg_replace("/[^a-zA-Z0-9\/_|+ -]/", '', $clean);
    $clean = strtolower(trim($clean, '-'));
    $clean = preg_replace("/[\/_|+ -]+/", $delimiter, $clean);
    return $clean;
}
// usage:
echo toAscii("শহীদ কাদরীর ‘ইচ্ছায়’ দেশে আসছে মরদেহ", "'");

function url($url) {
    $url = preg_replace('~[^\\pL0-9_]+~u', '-', $url);
    $url = trim($url, "-");
    $url = iconv("utf-8", "us-ascii//TRANSLIT", $url);
    $url = strtolower($url);
    $url = preg_replace('~[^-a-z0-9_]+~', '', $url);
    return $url;
}

echo "<br>";
$url = url("Peux-tu m'aider s'il te plaît?");
echo $url;
echo "<br>Decode <br>";
echo urldecode($url);
echo "<br>";
$string = "শহীদ কাদরীর ‘ইচ্ছায়’ দেশে আসছে মরদেহ";
echo url($string);
echo "<br>URL ENCODE <br>";
echo urlencode($string);
echo "<br>";
echo utf8_encode($string);


function create_slug($string){
    $slug=preg_replace('/[^A-Za-z0-9-]+/', '-', $string);
    return $slug;
}
echo "<br>";
echo create_slug("Peux-tu m'aider s'il te plaît?");

$string = "Peux-tu m'aider s'il te plaît?";
$string = iconv("UTF-8","UTF-8//IGNORE",$string);
echo "<br>";
echo $string;

echo "<br>URL ENCODE <br>";
echo urlencode($string);