<?php
require_once 'database.php';
require_once("includes/sessions.php");
require_once("includes/redirect.php");

if (isset($_GET["id"])) {
    $data = array(
        'id' => $_GET["id"],
    );
    var_dump($data);
    $exec = $dbcon->admin_delete("schedule", $data);
    if (!$exec) {
        $_SESSION["error message"] = "successfully deleted";
        redirect_to("lawyers.home.php");
    } else {
        echo "something went wrong";
    }
}