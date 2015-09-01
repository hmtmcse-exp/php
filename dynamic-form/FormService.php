<?php
/**
 * Created by IntelliJ IDEA.
 * User: touhid
 * Date: 31/08/2015
 * Time: 3:28 PM
 */

require_once "../mysql/DatabaseHandler.php";
require_once "CONSTANT.php";

class FormService {


    public function getCreateFormByID($formID){
        $SQL = "SELECT field.name, field.displayName, field.type FROM form ";
        $SQL .= "LEFT JOIN form_fieldgroup ON form.id = form_fieldgroup.form_id ";
        $SQL .= "LEFT JOIN field_fieldgroup ON form_fieldgroup.fieldgroup_id = field_fieldgroup.fieldgroup_id ";
        $SQL .= "LEFT JOIN field ON field.id = field_fieldgroup.field_id ";
        $SQL .= "WHERE form.id = " . $formID;
        $databaseHandler = new DatabaseHandler();
        $result = $databaseHandler->executeSQLObject($SQL);
        return $result;
    }

    public function getEditFormByID($formID){

    }

}