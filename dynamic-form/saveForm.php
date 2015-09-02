<?php
/**
 * Created by IntelliJ IDEA.
 * User: touhid
 * Date: 1/09/2015
 * Time: 10:33 AM
 */

require_once "formService.php";
$formService = new FormService();
$formService->saveFormValue($_POST);
header("Location: index.php");

