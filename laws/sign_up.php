<?php
require_once 'database.php';
require_once("includes/sessions.php");
require_once("includes/redirect.php");

?>
<?php
if (isset($_POST["submit"])) {

    $min = 6;
    $errors = null;


    $username = htmlentities( $_POST["username"]);
    $email = htmlentities( $_POST["email"]);
    $password = htmlentities($_POST["password"]);
    $confirm = htmlentities($_POST["confirm_password"]);

    if(strlen($username) < $min){

        $errors[]="username cannot be less than six characters ";

    }elseif(strlen($password) < $min){

        $errors[]="password cannot be less than six characters ";

    }elseif(empty($username) && empty($email) && empty($password)){

        $errors[]="fields cannot be less than six characters ";

    }elseif($password != $confirm){

        $errors[]="passwords do not match ";

    }
    elseif($password==$confirm){

        $data = array(
            'username' =>$username,
            'email' =>$email,
            'password' =>md5($password),
            'confirm_paasword' =>md5($_POST["password"]),
            'approve' => "false",
        );
        $dbcon->insertdata("sign", $data);
        if ($dbcon) {
                header("location:login.php");
            $_SESSION["error message"] = "successfully signed up you can now log in";
        }
    }else{
        $errors[]=null;
    }

    if(!empty($errors)){
        foreach ($errors as $error){
            echo'<span class=" alert alert-warning text-center text-danger" style="margin-left: 500px; margin-top: 200px;">'.$error.'</span>';
        }
    }


}
?>
<html>
<head>
    <link rel="stylesheet" href="../boot/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/_register.css">
    <link rel="stylesheet" type="text/css" href="admins/css/Register.css">

    <style>


    </style>
</head>
<body>
<div class="main">

    <div class="card border" style="">
        <div class="card-header bg-transparent text-center">
            <h3 class="text-capitalize">register</h3>
        </div>
        <div class="card-body">
        <form action="sign_up.php" method="post">

                <div class="form-group">
                    <label for="username" class="text-capitalize">username:</label>
                    <input class="form-control" type="text" id="username" name="username" required>
                </div>
                <div class="form-group">
                    <label for="username" class="text-capitalize">email:</label>
                    <input class="form-control" type="email" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="username" class="text-capitalize">password:</label>
                    <input class="form-control" type="password" id="password" name="password" required>
                </div>
                <div class="form-group">
                    <label for="username" class="text-capitalize">confirm password:</label>
                    <input class="form-control" type="password" id="username" name="confirm_password" required>
                </div>

            <div class="panel-footer">
                <button class="btn btn-block btn-success" type="submit" name="submit">sign up</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            </div>
        </form>
    </div>

</div>

    </div>
</body>
</html>