<?php

/**
 * Created by PhpStorm.
 * User: hmtmc
 * Date: 15/03/2017
 * Time: 09:02 PM
 */


class PersonalComputer {

    public $processor;
    public $hdd;
    public $ram;
    public $motherboard;
    public $processorBrandName;
    private $assemble;

    public function __construct(){
        $this->processorBrandName = "Intel";
    }


    public function processor($name){
        $this->processor = $name;
    }

    public function ram($name){
        $this->ram = $name;
    }

    public function hdd($name){
        $this->hdd = $name;
    }

    public function motherboard($name){
        $this->motherboard = $name;
    }

    private function assemble(){
        $this->assemble = "Motherboard: " . $this->motherboard . " ";
        $this->assemble .= $this->processorBrandName . " Micro Processor: " . $this->processor . " ";
        $this->assemble .= "RAM: " . $this->ram . " ";
        $this->assemble .= "Hard Disk Drive: " . $this->hdd . " ";
    }

    public function getConfiguration(){
        $this->assemble();
        return $this->assemble;
    }

}