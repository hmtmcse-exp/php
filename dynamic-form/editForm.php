<?php
/**
 * Created by IntelliJ IDEA.
 * User: touhid
 * Date: 31/08/2015
 * Time: 3:28 PM
 */

require_once "FormService.php";

$formService = new FormService();
$formId =  $_GET['formID'];
$id =  $_GET['id'];

?> <form action="saveForm.php" method="post">
    <input type="hidden" name="formID" value="<?php echo $formId; ?>">
    <?php


foreach($formService->getEditFormByID($formId,$id) as $formInfo){ ?>


    <?php echo $formInfo->displayName; ?>:<br>
    <input type="<?php echo $formInfo->type; ?>" value="<?php echo $formInfo->value; ?>" name="<?php echo $formInfo->name; ?>"><br>


    <?php

}
?>
    <input type="submit" value="save">
    </form>



