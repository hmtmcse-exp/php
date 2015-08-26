<html>
<head>
    <link rel="stylesheet" href="assets/css/table.css" type="text/css"/>
</head>
<body>

<?php
/**
 * Created by IntelliJ IDEA.
 * User: touhid
 * Date: 26/08/2015
 * Time: 8:49 AM
 */

$row = 1;
if (($handle = fopen("assets/files/csv2htmlTable.csv", "r")) !== FALSE) {
    echo '<table class="CSS_Table_Example" style="width:600px;height:150px;">';
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        $num = count($data);
        if ($row == 1) {
            echo '<thead><tr>';
        }else{
            echo '<tr>';
        }

        for ($c=0; $c < $num; $c++) {
            //echo $data[$c] . "<br />\n";
            if(empty($data[$c])) {
                $value = "&nbsp;";
            }else{
                $value = $data[$c];
            }
            if ($row == 1) {
                echo '<th>'.$value.'</th>';
            }else{
                echo '<td>'.$value.'</td>';
            }
        }

        if ($row == 1) {
            echo '</tr></thead><tbody>';
        }else{
            echo '</tr>';
        }
        $row++;
    }
    echo '</tbody></table>';
    fclose($handle);
}