<?php
require_once 'database.php';
require_once("includes/sessions.php");
require_once("includes/redirect.php");

if (isset($_GET["id"])) {
    $data = array('id' => $_GET["id"],
    );
    $exec = $dbcon->admin_delete("expertise", $data);
    if (!$exec) {
        $_SESSION["error message"] = "successfully deleted";
        redirect_to("Manage_expertise.php");
    } else {
        echo "something went wrong";
    }
}