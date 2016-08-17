<?php
/**
 * Created by PhpStorm.
 * User: touhid
 * Date: 17/08/2016
 * Time: 9:44 AM
 */

// file() loads the contents of file.txt into an array, $lines
// each line in the file becomes a seperate element of the array.
$lines = file('template.blade.php');

// now loop through the array to print the contents of the file
echo 'Contents of file.txt using file():';
foreach ($lines as $line)
{
    echo htmlspecialchars($line) . '<br>';
}

// we can also access each line of the file seperately
echo '3rd line of the file: "' . htmlspecialchars($lines[2]) . '"<br>';
echo '<br><br><br><br><br><br><br><br>';

// file_get_contents() reads the file and places the contents in a string
$fileString = file_get_contents('template.blade.php');
echo 'Contents of file.txt using file_get_contents():<br><br>';
//echo nl2br( htmlspecialchars($fileString) );
echo "<pre>";
echo nl2br( $fileString);
echo '<br><br><br><br><br>';

// readfile() writes the contents of the file straight to the browser
echo 'Contents of file.txt using readfile():<br>';
readfile('template.blade.php');