<?php
require_once 'database.php';
require_once("includes/sessions.php");
require_once("includes/redirect.php");

if(isset($_GET["value"])){
    $data = array(
        'id' => $_GET["value"],
        'status' => "inactive",
    );


    $exec = $dbcon->archives("cases", $data);


    if(!$exec){
        $_SESSION["error message"] = "successfully archived";
        redirect_to("archives.php");
    }else{
        echo " oops something went wrong";
    }

}elseif(isset($_GET['number'])){

    $data = array(
        'id' => $_GET["number"],
        'status' => "active",
    );


    $exec = $dbcon->archives("cases", $data);


    if(!$exec){
        $_SESSION["error message"] = "successfully unarchived";
        redirect_to("lawyers.home.php");
    }else{
        echo " oops something went wrong";
    }
}