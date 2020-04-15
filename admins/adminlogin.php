<?php
require_once 'database.php';
require_once("includes/sessions.php");
require_once("includes/redirect.php");
?>

<html>
<head>
    <link rel="stylesheet" href="../boot/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/lawyers.css">
</head>
<body class="">
<div class="container main">
    <div class="card border">
        <div class="card-header bg-transparent text-capitalize text-center">
            <h3>admin access</h3>
        </div>

        <form action="adminlogin.php" method="post">
            <div class="card-body">
                <div><?php echo success(); ?></div>
                <div class="form-group form-inline">
                    <label for="username">username:</label>
                    <input class="form-control" type="text" id="username" name="username" required>
                </div>

                <div class="form-group form-inline">
                    <label for="password">password:</label>
                    <input class="form-control" type="password" id="password" name="password" required>
                </div>

            </div>
            <div class="panel-footer">
                <button class="btn btn-block btn-success" type="submit" name="login">login</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            </div>
        </form>

        <a href="../laws/login.php">
            <button class="btn btn-sm btn-link" type="submit">login as client</button>
        </a>
    </div>

    <?php
    if (isset($_POST["login"])) {

        $username = htmlentities($_POST["username"]);
        $password = htmlentities($_POST["password"]);

        $data = array(
            ':username' => $username,
            ':password' =>$password,
        );


        $fetched = $dbcon->admin_login("admins", $data);
        foreach ($fetched as $fetched) {
            $_SESSION["username"] = $fetched[1];

            if ($fetched) {
                redirect_to("home.admin.php");
//
                $_SESSION["error message"] = "successful login....." . $_SESSION["username"];


            } else {

                $_SESSION["error message"] = "your are not a registered admin";

            }

        }
    }

    ?>

</div>
</body>
</html>