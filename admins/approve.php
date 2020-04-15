<?php
require_once 'database.php';
require_once("includes/sessions.php");
require_once("includes/redirect.php");

if (isset($_GET["id"])) {
//    $true="true";
    $data = array(
        'id' => $_GET["id"],
        'approve' => "true",
    );
    $exec = $dbcon->approve("sign", $data);
    if ($exec) {
        redirect_to("manageaccess.php");
        $_SESSION["error message"] = "OPERATION UNSUCCESSFUL";

    } else {
        $_SESSION["error message"] = "OPERATION SUCCESSFUL";
        redirect_to("manageaccess.php");
    }
}