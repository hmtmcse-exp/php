<?php

/**
 * Created by PhpStorm.
 * User: Touhid Mia
 * Date: 21/08/2016
 * Time: 11:48 PM
 */

$file = new MisZipper();
$file->create_zip("W:\\resources\\xampp\\htdocs\\php\\ashif-sir","W:\\resources\\xampp\\htdocs\\php\\parser.zip");

class MisZipper {

    public function create_zip($source, $destination) {
        $dir = $source;
        $zip_file = $destination;
        $rootPath = realpath($dir);
        $zip = new ZipArchive();
        $zip->open($zip_file, ZipArchive::CREATE | ZipArchive::OVERWRITE);


        $files = new RecursiveIteratorIterator(
            new RecursiveDirectoryIterator($rootPath),
            RecursiveIteratorIterator::LEAVES_ONLY
        );

        foreach ($files as $name => $file){
            if (!$file->isDir()){
                $filePath = $file->getRealPath();
                $relativePath = substr($filePath, strlen($rootPath) + 1);
                $zip->addFile($filePath, $relativePath);
            }
        }
        $zip->close();
    }
}