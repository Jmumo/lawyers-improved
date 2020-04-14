<?php
require_once 'database.php';
require_once("includes/sessions.php");
require_once("includes/redirect.php");
?>

<html>
<head>
    <link rel="stylesheet" href="boot/bootstrap-3.3.7/dist/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/lawyers.css">
</head>
<body class="index" style="background-color: #1b1e21">
<div class="container">
    <div id="panel" class="panel bg-info">
        <div class="panel-heading">
            <h3>admin access</h3>
        </div>
        <form action="adminlogin.php" method="post">
            <div class="panel-body">
                <div><?php echo success(); ?></div>
                <div class="form-group">
                    <label for="username">username:</label>
                    <input class="form-control" type="text" id="username" name="username" required>
                </div>

                <div class="form-group">
                    <label for="password">password:</label>
                    <input class="form-control" type="password" id="password" name="password" required>
                </div>

            </div>
            <div class="panel-footer">
                <button class="btn btn-sm btn-success" type="submit" name="login">login</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            </div>
        </form>

        <a href="login.php">
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