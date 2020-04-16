<?php
require_once 'database.php';
require_once ("includes/redirect.php");
require_once("includes/sessions.php");
if(!isset($_SESSION["username"])){
    redirect_to("adminlogin.php");
}
?>
<html>
<head>
    <script src="../boot/bootstrap/js/jquery-3.3.1.js"></script>
    <link rel="stylesheet" href="../boot/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/adminstyles.css">
</head>
<body>

<?php include "navigation/navbar.php"?>
                <!--                end of side bar-->
                <!--                top bar-->
                <div class="col-md-9 ml-auto details fixed-top " style="overflow: scroll; height: 100%">
                    <div class="col-md-9 ml-auto details fixed-top"  style="overflow: scroll; height: 100%">
                        <ul class="nav">
                            <li class="nav-tabs">
                                <a class="nav-link text-capitalize" href="lawyers.notices.php">add news</a>
                            </li>
                            <li class="nav-tabs">
                                <a class="nav-link text-capitalize" href="Manage_law_notices.php">manage news</a>
                            </li>


                        </ul>

                        <form action="lawyers.notices.php" method="post" enctype="multipart/form-data">
                        <div><?php echo success(); ?></div>
                        <div>
                            <h3 class="page-header text-capitalize mt-4">Post to lawyers notice board</h3>

                            <label for="description"><span class="text-capitalize">description</span></label>
                            <textarea type="text" class="form-control mt-3" id="description" placeholder="enter description"
                                      name="description" rows="5"></textarea>
                        </div>
                        <div class="form-group mt-4">
                            <input type="submit" class="btn btn-warning btn-block" name="submit" value="post notice">
                        </div>
                    </form>


                    <?php

                    if (isset($_POST["submit"])) {
                        $time = date("D/M/Y");

                        $data = array(

                            'author' => "admin",
                            'message' => $_POST["description"],
                            'date' => $time,


                        );
                        echo $dbcon->insertdata("notice", $data);
                        if ($dbcon) {
                            $_SESSION["error message"] = "successfully added";
                        }

//                       header("location:Manage_law_notices.php");
//                        redirect_to("Manage_law_notices.php");
                    }
                    ?>
                    <div class="container col-lg-12">

                        </div>

                        <footer class="ml-auto fixed-bottom bg-info">
                            <p class="text-center">Theme by mumo| &copf;&nbsp;2019--2022|----all rights reserved</p>
                        </footer>
                    </div>


</nav>


</div>

</div>
<script src="../boot/bootstrap/js/jquery-3.3.1.js"></script>
<script src="../boot/bootstrap/js/popper.js"></script>
<script src="../boot/bootstrap/js/bootstrap.js"></script>

</body>
</html>