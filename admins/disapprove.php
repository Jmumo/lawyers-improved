<?php
require_once 'database.php';
require_once("includes/sessions.php");
require_once("includes/redirect.php");

if (isset($_GET["id"])) {
//    $true="true";
    var_dump($_GET["id"]);
    $data = array(
        'id' => $_GET["id"],
        'approve' => "false",
    );
    $exec = $dbcon->approve("sign", $data);
    if ($exec) {
        $_SESSION["error message"] = "OPERATION UNSUCCESSFUL";
        redirect_to("manageaccess.php");
    } else {
        $_SESSION["error message"] = "OPERATION SUCCESSFUL";
        redirect_to("manageaccess.php");
    }
}