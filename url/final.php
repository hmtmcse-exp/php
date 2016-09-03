<?php
/**
 * Created by PhpStorm.
 * User: hmtmcse
 * Date: 8/28/16
 * Time: 10:35 PM
 */

function toAscii($str, $replace=array(), $delimiter='-') {
    if( !empty($replace) ) {
        $str = str_replace((array)$replace, ' ', $str);
    }
    $clean = iconv('UTF-8', 'ASCII//TRANSLIT', $str);
    $clean = preg_replace("/[^a-zA-Z0-9\/_|+ -]/", '', $clean);
    $clean = strtolower(trim($clean, '-'));
    $clean = preg_replace("/[\/_|+ -]+/", $delimiter, $clean);

    if ($clean === $delimiter){
        $clean = preg_replace("/\s+|\.|#|\\$|\\?/i", "-", $str);
        $clean = trim($clean, "-");
    }
    return $clean;
}

echo toAscii("শহীদ কাদরীর ‘ইচ্ছায়’ দেশে আসছে মরদেহ?");

