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
                <div class="col-md-9 ml-auto details fixed-top " style=" height: 100%">


                    <div class="container pre-scrollable col-lg-12">
                        <div class=" mx-0 h-50">

                            <table class="table table-hover table-striped ">
                                <thead class="thead-dark  ">
                                <tr>

                                    <th>ID</th>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>Password</th>
                                    <th>control</th>

                                </tr>
                                </thead>
                                <?php

                                $fetched = $dbcon->fetchdata("sign");
                                foreach ($fetched as $row) {
                                    $id = $row[0];
                                    echo "<tr>
      
                    
                     <td>$row[0]</td>
                     <td>$row[1]</td>
                     <td>$row[2]</td>
                     <td>$row[3]</td>
                      <td><a href='deleteaccess.php?id={$id};'> <button class='btn-sm btn-danger mr-3' name='id'>delete</button></a>
                       <a href='approve.php?id={$id};'> <button class='btn-sm btn-danger mr-4' name='id'>approve</button></a>
                      
                     
                     
            </tr>";
                                }
                                ?>

                                </tr>
                            </table>
                        </div>
                    </div>
                    <hr class="bg-dark">
                    <button class="btn-danger btn-block"></button>
                    <hr>
                    <div class="container pre-scrollable col-lg-12">
                        <div class=" mx-0 h-50">
                            <table class="table table-hover table-striped ">
                                <h2 class="text-center text-capitalize text-info font-italic text-u ">approved accounts</h2>
                                <thead class="thead-dark  ">
                                <div><?php echo success(); ?></div>
                                <tr>

                                    <th>ID</th>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>Password</th>
                                    <th>control</th>

                                </tr>
                                </thead>
                                <?php

                                $fetched = $dbcon->fetch_approve("sign");
                                foreach ($fetched as $row) {
                                    $id = $row[0];
                                    echo "<tr>
      
                    
                     <td>$row[0]</td>
                     <td>$row[1]</td>
                     <td>$row[2]</td>
                     <td>$row[3]</td>
                      <td><a href='deleteaccess.php?id={$id};'> <button class='btn-sm btn-danger mr-3' name='id'>delete</button></a>
                       <a href='disapprove.php?id={$id};'> <button class='btn-sm btn-danger mr-4' name='id'>disapprove</button></a></td>
                     
                     
            </tr>";
                                }
                                ?>

                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div>
                    <footer
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