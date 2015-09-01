<?php
/**
 * Created by IntelliJ IDEA.
 * User: touhid
 * Date: 1/09/2015
 * Time: 10:33 AM
 */

print_r($_POST);

require_once "FormService.php";
$formService = new FormService();
$formId = $_POST['formID'];