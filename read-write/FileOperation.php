<?php

/**
 * Created by PhpStorm.
 * User: Touhid Mia
 * Date: 22/08/2016
 * Time: 06:38 PM
 */

print_r(FileOperation::delete("C:\\Users\\Touhid Mia\\Desktop\\copy\\to--"));



class FileOperation {


    public static function textToString($location){
        if(self::isFileExist($location)){
            return file_get_contents($location);
        }
        return "Content Not Found";
    }

    public static function isFileExist($location){
        return file_exists($location);
    }

    public static function isItDirectory($location){
        return is_dir($location);
    }

    public static function isItFile($location){
        return is_file($location);
    }

    public static function isLinkFile($location){
        return is_link($location);
    }

    public static function makeSoftLink($source,$destination){
        return symlink($source,$destination);
    }

    public static function makeDirectory($location, $isRecursive = false){
        return mkdir($location,$isRecursive);
    }

    public static function copy($source, $destination){
        if(self::isFileExist($destination)){
            return self::response(false,"File already exists.");
        }
        if(self::copyR($source,$destination)){
            return self::response(true,"Successfully Copied");
        }else{
            return self::response(false,"Unable to Copy");
        }
    }

    private static function copyR($source, $destination){
        if (self::isLinkFile($source)) {
            return self::makeSoftLink(readlink($source), $destination);
        }

        if (self::isItFile($source)) {
            return copy($source, $destination);
        }


        if (!self::isItDirectory($destination)) {
            self::makeDirectory($destination);
        }

        $scanDirectory = dir($source);
        while (false !== $entry = $scanDirectory->read()) {
            if ($entry == '.' || $entry == '..') {
                continue;
            }
            self::copyR("$source/$entry", "$destination/$entry");
        }
        $scanDirectory->close();
        return true;
    }

    public function cut($source, $destination){
        if(self::isFileExist($destination)){
            return self::response(false,"File already exists.");
        }
        if(rename($source,$destination)){
            return self::response(true,"Successfully Moved");
        }else{
            return self::response(false,"Unable to Move");
        }
    }

    public function delete($source){
        if(!self::isFileExist($source)){
            return self::response(false,"File not exists.");
        }

        $it = new RecursiveDirectoryIterator($source, RecursiveDirectoryIterator::SKIP_DOTS);
        $files = new RecursiveIteratorIterator($it, RecursiveIteratorIterator::CHILD_FIRST);
        foreach($files as $file) {
            if ($file->isDir()){
                rmdir($file->getRealPath());
            } else {
                unlink($file->getRealPath());
            }
        }
        if(rmdir($source)){
            return self::response(true,"Successfully Deleted");
        }else{
            return self::response(false,"Unable to Deleted");
        }
    }

    public function rename($source, $destination){
        if(self::isFileExist($destination)){
            return self::response(false,"File already exists.");
        }
        if(rename($source,$destination)){
            return self::response(true,"Successfully Moved");
        }else{
            return self::response(false,"Unable to Move");
        }
    }

    private static function response($isSuccess = true, $message = "", $data = ""){
        return array(
            "success" => $isSuccess,
            "message" =>$message,
            "data" => $data
        );
    }

}