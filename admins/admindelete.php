<?php
require_once 'database.php';
require_once("includes/sessions.php");
require_once("includes/redirect.php");

if (isset($_GET["id"])) {
    $data = array(
        'id' => $_GET["id"],
    );
    $exec = $dbcon->admin_delete("workers", $data);
    if (!$exec) {
        $_SESSION["error message"] = "successfully deleted";
        redirect_to("Manage_workers.php");
    } else {
        echo "something went wrong";
    }
}

