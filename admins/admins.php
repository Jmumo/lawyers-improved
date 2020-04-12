<?php
require_once 'database.php';
require_once("includes/sessions.php");
require_once("includes/redirect.php");
if(!isset($_SESSION["username"])){
    redirect_to("login.php");
}
?>
<html>
<head>
    <script src="boot/bootstrap/js/jquery-3.3.1.js"></script>
    <link rel="stylesheet" href="boot/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/adminstyles.css">
</head>
<body>
<?php include "navigation/navbar.php"?>


                <!--                end of side bar-->
                <!--                top bar-->
                <div class="col-md-9 ml-auto details  fixed-top" style="overflow: scroll; height: 100%">
                    <form action="admins.php" method="post" enctype="multipart/form-data">
                        <div><?php echo success(); ?></div>
                        <h3 class="page-header">manage admins</h3>
                        <div class="form-group">
                            <label for="name"><span class="">username:</span></label>
                            <input type="text" class="form-control" id="username" placeholder="enter username"
                                   name="username">
                        </div>
                        <div class="form-group">
                            <label for="second_name"><span class="">password:</span></label>
                            <input type="text" class="form-control" id="password" placeholder="enter password"
                                   name="password">
                        </div>
                        <div class="form-group">
                            <label for="department"><span class="">confirm password:</span></label>
                            <input type="text" class="form-control" id="confirm password" placeholder="confirm password"
                                   name="confirm_password">
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-success btn-block" name="submit" value="add admins">
                        </div>
                    </form>
                    <footer class="ml-auto">
                        <div class="container col-lg-12">
                            <div class="container pre-scrollable mx-0 h-50">
                                <table class="table table-hover table-striped ">
                                    <thead class="thead-dark  ">
                                    <tr>

                                        <th>ID</th>
                                        <th>Username</th>
                                        <th>Password</th>
                                        <th>control</th>

                                    </tr>
                                    </thead>
                                    <?php

                                    $fetched = $dbcon->fetchdata("admins");
                                    foreach ($fetched as $row) {
                                        $id = $row[0];
                                        echo "<tr>
      
                    
                     <td>$row[0]</td>
                     <td>$row[1]</td>
                     <td>$row[2]</td>
                      <td><a href='deleteadmin.php?id={$id};'> <button class='btn-sm btn-danger' name='id'>delete</button></a></td>
                     
            </tr>";
                                    }
                                    ?>

                                    </tr>
                                </table>
                            </div>
                            <span>
    <hr><p>Theme by mumo| &copf;&nbsp;2019--2022|----all rights reserved</p>



</span>
                        </div>
                    </footer>
                </div>


</nav>
<?php
if (isset($_POST["submit"])) {
    $pass = $_POST["password"];
    $con_pass = $_POST["confirm_password"];

    if ($pass == $con_pass) {
        $data = array(

            'username' => $_POST["username"],
            'password' => $_POST["password"],
        );
        $dbcon->insertdata("admins", $data);

        if ($dbcon) {
            $_SESSION["error message"] = "successfully added";
        } else {
            $_SESSION["error message"] = "NOT added";
        }
        echo $pass . $con_pass;
    } else {
        $_SESSION["error message"] = "passwords do not match";
    }
}
?>
<script src="boot/bootstrap/js/jquery-3.3.1.js"></script>
<script src="boot/bootstrap/js/popper.js"></script>
<script src="boot/bootstrap/js/bootstrap.js"></script>
</body>
</html>