<?php
/**
 * Created by IntelliJ IDEA.
 * User: touhid
 * Date: 31/08/2015
 * Time: 11:01 AM
 */

class DatabaseHandler{

    public $DB_NAME = "sir";
    public $DB_HOST = "localhost";
    public $DB_PASSWORD = "";
    public $DB_USER = "root";
    public $mysqlConnection;


    function __constructor(){
        $this->openConnection();
    }

    private function openConnection(){
        $this->mysqlConnection = mysql_connect($this->DB_HOST, $this->DB_USER, $this->DB_PASSWORD) or die(mysql_error());
        mysql_select_db($this->DB_NAME) or die(mysql_error());
    }

    private function closeConnection(){
        mysql_close($this->mysqlConnection);
    }

    public function executeSQL($sql){
        $this->openConnection();
        $queryResult =  mysql_query($sql,$this->mysqlConnection);
        $this->closeConnection();
        return $queryResult;
    }

    public function executeInsert($sql){
        $this->openConnection();
        mysql_query($sql,$this->mysqlConnection);
        $id = mysql_insert_id();
        $this->closeConnection();
        return $id;
    }

    public function executeSQLObject($sql){
        $this->openConnection();
        $queryResult =  mysql_query($sql,$this->mysqlConnection);
        $result = array();
        while($row = mysql_fetch_object($queryResult)){
            $result[] = $row;
        }
        $this->closeConnection();
        return $result;
    }


    public function selectAll($table, $select){
        $SQL = "SELECT ";
        if(count($select)){
            $SQL .= implode (",", $select) . " ";
        }else{
            $SQL .= "* ";
        }
        $SQL .= " FROM " . $table;
        $queryResult = $this->executeSQL($SQL);
        return mysql_fetch_object($queryResult);
    }

    public function selectWhere($table, $afterWhere){

    }

    public function insert($table, $field){

    }

    public function update($table, $set, $afterWhere){

    }

    public function delete($table,$afterWhere){

    }


    public function getList($sql){
        $this->openConnection();
        $queryResult =  mysql_query($sql,$this->mysqlConnection);
        $result = array();
        while($row = mysql_fetch_object($queryResult)){
            $result[$row->form_row_id][$row->key] = $row->value;
            $result[$row->form_row_id]['form_row_id'] = $row->form_row_id;
            $result[$row->form_row_id]['form_id'] = $row->form_id;
        }
        $this->closeConnection();
        return $result;
    }


}