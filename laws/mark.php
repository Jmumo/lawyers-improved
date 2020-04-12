<?php
require_once 'database.php';
require_once("includes/sessions.php");
require_once("includes/redirect.php");

if(isset($_GET["id"])){
//    $true="true";
    $data = array(
        'id' => $_GET["id"],
        'sign' => "true",
    );

    $exec = $dbcon->insert_sign("cases", $data);


    if(!$exec){
        $_SESSION["error message"] = "successfully marked";
        redirect_to("lawyers.home.php");
    }else{
        echo " oops something went wrong";
    }

}