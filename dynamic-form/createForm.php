<?php
/**
 * Created by IntelliJ IDEA.
 * User: touhid
 * Date: 31/08/2015
 * Time: 3:28 PM
 */

require_once "FormService.php";

$formService = new FormService();
$formId = 1;

?> <form action="saveForm.php" method="post">
    <input type="hidden" name="formID" value="<?php echo $formId; ?>">
    <?php
foreach($formService->getCreateFormByID($formId) as $formInfo){ ?>


    <?php echo $formInfo->displayName; ?>:<br>
    <input type="<?php echo $formInfo->type; ?>" name="<?php echo $formInfo->name; ?>" value=""><br>


    <?php

}
?>
    <input type="submit" value="save">
    </form>



