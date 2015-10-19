
<a href="createForm.php">Create</a>
<br>

<?php
/**
 * Created by IntelliJ IDEA.
 * User: touhid
 * Date: 1/09/2015
 * Time: 12:16 PM
 */

require_once "formService.php";
$formService = new FormService();

echo "<pre>";
print_r($formService->getList());

echo "<table border='1'>";
echo $formService->tableGenerator($formService->getCreateFormByID(1),$formService->getList());
echo "</table>";
//print_r($formService->getList());