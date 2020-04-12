<?php
require_once 'database.php';
require_once("includes/sessions.php");
require_once("includes/redirect.php");
?>
<html>
<head>
    <link rel="stylesheet" href="../boot/bootstrap-3.3.7/dist/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../admins/css/lawyers.css">
</head>
<body>
<div class="container">
    <div id="panel" class="panel panel-primary">
        <div class="panel-heading">
            <h3>login</h3>
        </div>
        <form action="sign_up.php" method="post">
            <div class="panel-body">
                <div class="form-group">
                    <label for="username">username:</label>
                    <input class="form-control" type="text" id="username" name="username" required>
                </div>
                <div class="form-group">
                    <label for="username">email:</label>
                    <input class="form-control" type="email" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="username">password:</label>
                    <input class="form-control" type="password" id="password" name="password" required>
                </div>
                <div class="form-group">
                    <label for="username">confirm password:</label>
                    <input class="form-control" type="password" id="username" name="confirm_password" required>
                </div>
            </div>
            <div class="panel-footer">
                <button class="btn btn-block btn-success" type="submit" name="submit">sign up</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            </div>
        </form>
        <?php
        if (isset($_POST["submit"])) {
            $data = array(
                'username' => $_POST["username"],
                'email' => $_POST["email"],
                'password' => md5($_POST["password"]),
                'confirm_paasword' => md5($_POST["confirm_password"]),
                'approve' => "false",
            );
            $dbcon->insertdata("sign", $data);
            if ($dbcon) {
                header("location:login.php");
                $_SESSION["error message"] = "successfully signed up you can now log in";
            }
        }
        ?>
    </div>
</div>
</body>
</html>