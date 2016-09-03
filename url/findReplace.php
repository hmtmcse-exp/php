<?php
/**
 * Created by PhpStorm.
 * User: hmtmcse
 * Date: 8/28/16
 * Time: 10:37 PM
 */
$string = 'শহীদ কাদরীর ‘ইচ্ছায়’ দেশে আসছে মরদেহ';

$string = preg_replace("/\s+|\.|#|\\$/i", "-", $string);
echo trim($string, "-");