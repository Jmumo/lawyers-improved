<?php
require_once 'database.php';
require_once("includes/sessions.php");
require_once("includes/redirect.php");
?>

<html>
<head>

    <link rel="stylesheet" href="../boot/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/_login.css">
</head>
<body>
<div class="main">
<div class="card border">
    <div class="">
        <div class="card-header bg-transparent text-center text-capitalize">
            <h3>login</h3>
        </div>
        <form action="login.php" method="post">
            <div class="card-body">
                <!--                <div>--><?php //echo success();?><!--</div>-->
                <div class="form-inline form-group">
                    <label for="username" class="text-capitalize">username:</label>
                    <input class="form-control" type="text" id="username" name="username" required>
                </div>

                <div class="form-inline  form-group">
                    <label for="password" class="text-capitalize">password:</label>
                    <input class="form-control" type="password" id="password" name="password" required>
                </div>

            </div>
            <div class="panel-footer">
                <button class="btn btn-block btn-success" type="submit" name="login">login</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            </div>
        </form>

        <a href="sign_up.php">
            <button class="btn btn-sm btn-link" type="submit">sign up</button>
        </a>
        <a href="../admins/adminlogin.php" class="">
            <button class="btn btn-sm btn-link mr" type="submit">login as admin</button>
        </a>
    </div>
    <?php
    if (isset($_POST["login"])) {
        $data = array(
            ':username' => $_POST["username"],
            ':password' => md5($_POST["password"]),
        );
        $fetched = $dbcon->login("sign", $data);
        foreach ($fetched as $fetched) {
            $_SESSION["user"] = $fetched[1];

        }
        if ($fetched) {

            $_SESSION["error message"] = "successful login....." . $_SESSION["user"];

            header("location:lawyers.home.php");
//                redirect_to("lawyers.home.php");
        } else {
            header("sign_up.php");
//                $_SESSION["error message"]="username not found sign up to login";

        }
//
    }

    ?>
</div>
</div>
</body>
</html>