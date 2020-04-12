<?php
session_start();
function message()
{

    if (isset($_SESSION["error message"])) {
        $output = "<div class='alert alert-danger'>";
        $output .= htmlentities($_SESSION["error message"]);
        $output . "</div>";
        $_SESSION["error message"] = null;
        return $output;
    }
}

function success()
{

    if (isset($_SESSION["error message"])) {
        $output = "<div class='alert alert-success'>";
        $output .= htmlentities($_SESSION["error message"]);
        $output . "</div>";
        $_SESSION["error message"] = null;
        return $output;
    }
}