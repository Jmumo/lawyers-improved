<?php
require_once 'database.php';
require_once("includes/sessions.php");
require_once("includes/redirect.php");
session_start();
session_destroy();
redirect_to("../index.php");
