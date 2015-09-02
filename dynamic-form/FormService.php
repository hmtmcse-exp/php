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
        $SQL = "SELECT form_fieldgroup.id as form_fieldgroup, field.id, field.name, field.displayName, field.type FROM form ";
        $SQL .= "LEFT JOIN form_fieldgroup ON form.id = form_fieldgroup.form_id ";
        $SQL .= "LEFT JOIN field_fieldgroup ON form_fieldgroup.fieldgroup_id = field_fieldgroup.fieldgroup_id ";
        $SQL .= "LEFT JOIN field ON field.id = field_fieldgroup.field_id ";
        $SQL .= "WHERE form.id = " . $formID;
        $databaseHandler = new DatabaseHandler();
        $result = $databaseHandler->executeSQLObject($SQL);
        return $result;
    }

    public function getEditFormByID($formID,$id){
        $SQL = "SELECT form_fieldgroup.id as form_fieldgroup, field.id, field.name, field.displayName, field.type, (SELECT field_value.value FROM field_value WHERE field_value.form_id = form.id and field_value.field_id = field.id and field_value.form_row_id = " . $id ." ) as value FROM form ";
        $SQL .= "LEFT JOIN form_fieldgroup ON form.id = form_fieldgroup.form_id ";
        $SQL .= "LEFT JOIN field_fieldgroup ON form_fieldgroup.fieldgroup_id = field_fieldgroup.fieldgroup_id ";
        $SQL .= "LEFT JOIN field ON field.id = field_fieldgroup.field_id ";
        $SQL .= "WHERE form.id = " . $formID;
        $databaseHandler = new DatabaseHandler();
        $result = $databaseHandler->executeSQLObject($SQL);
        return $result;
    }

    public function saveFormRow($name){
        $SQL = "INSERT INTO form_row (name) VALUES('" . $name ."');";
        $databaseHandler = new DatabaseHandler();
        $result = $databaseHandler->executeInsert($SQL);
        return $result;
    }

    public function saveFormValue($postData){
        $formId = $postData['formID'];
        $form_row_id = $this->saveFormRow("FORM ID = " . $formId);
        echo $form_row_id;
        $SQL = "INSERT INTO field_value (`key`,`value`,form_row_id,form_fieldgroup_id,field_id,form_id) VALUES ";
        $isFirst = false;
        foreach($this->getCreateFormByID($formId) as $formInfo){
            if(isset($postData[$formInfo->name])){
                if($isFirst){
                    $SQL .= ",";
                }
                $SQL .= "('" . $formInfo->name . "','" . $postData[$formInfo->name] . "',";
                $SQL .=  $form_row_id . "," . $formInfo->form_fieldgroup . "," . $formInfo->id . "," . $formId . ")";
                $isFirst = true;
            }
        }
        $databaseHandler = new DatabaseHandler();
        $result = $databaseHandler->executeInsert($SQL);
        return $result;
    }

    public function updateFormValue($postData){
        $formId = $postData['formID'];
        $form_row_id = $this->saveFormRow("FORM ID = " . $formId);
        echo $form_row_id;
        $SQL = "INSERT INTO field_value (`key`,`value`,form_row_id,form_fieldgroup_id,field_id,form_id) VALUES ";
        $isFirst = false;
        foreach($this->getCreateFormByID($formId) as $formInfo){
            if(isset($postData[$formInfo->name])){
                if($isFirst){
                    $SQL .= ",";
                }
                $SQL .= "('" . $formInfo->name . "','" . $postData[$formInfo->name] . "',";
                $SQL .=  $form_row_id . "," . $formInfo->form_fieldgroup . "," . $formInfo->id . "," . $formId . ")";
                $isFirst = true;
            }
        }
        $databaseHandler = new DatabaseHandler();
        $result = $databaseHandler->executeInsert($SQL);
        return $result;
    }

    public function getList(){
        $SQL = "SELECT * FROM form_row LEFT JOIN field_value ON form_row.id = field_value.form_row_id ORDER BY form_row.id DESC";
        $databaseHandler = new DatabaseHandler();
        $result = $databaseHandler->getList($SQL);
        return $result;
    }

    public function getTableHeaderById(){
        $SQL = "SELECT * FROM form_row LEFT JOIN field_value ON form_row.id = field_value.form_row_id ORDER BY form_row.id DESC";
        $databaseHandler = new DatabaseHandler();
        $result = $databaseHandler->getList($SQL);
        return $result;
    }

    public function tableGenerator($tableHead, $tableBody = array()){
        $tableHeadContent = "<tr>";
        foreach($tableHead as $head){
            $tableHeadContent .= "<th>" . $head->displayName . "</th>";
        }
        $tableHeadContent .= "<th>Action</th></tr>";
        $tableBodyContent = "";
        foreach($tableBody as $body){
            $tableBodyContent .= "<tr>";
            foreach($tableHead as $head){
                $tableBodyContent .= "<td>" . $body[$head->name] . "</td>";
            }
            $tableBodyContent .= "<td><a href='editForm.php?formID=" . $body['form_id'] ."&id=" . $body['form_row_id'] ."'>Edit</a></td></tr>";
        }
        return $tableHeadContent . $tableBodyContent;
    }

}