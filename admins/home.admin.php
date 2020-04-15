<?php
require_once 'database.php';
require_once("includes/sessions.php");
require_once("includes/redirect.php");
?>

<html>
<head>
    <script src="../boot/bootstrap/js/jquery-3.3.1.js"></script>
    <link rel="stylesheet" href="../boot/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/adminstyles.css">
</head>
<body>
<style>
    .rounded {
        width: 150px;
        height: 80px;
        border: solid 1px black;
    }
</style>
<?php include "navigation/navbar.php"?>
                <!--                end of side bar-->
                <!--                top bar-->
                <div class="col-md-9 ml-auto details fixed-top" style="overflow: scroll; height: 100%">

                    <div class="col-md-9 ml-auto details fixed-top"  style="overflow: scroll; height: 100%">
                        <ul class="nav">
                            <li class="nav-tabs">
                                <a class="nav-link text-capitalize" href="home.admin.php">add workers</a>
                            </li>
                            <li class="nav-tabs">
                                <a class="nav-link text-capitalize" href="Manage_workers.php">manage workers</a>
                            </li>


                        </ul>
                    <form action="home.admin.php" method="post" enctype="multipart/form-data">
                        <div><?php echo success(); ?></div>
                        <h3 class="page-header text-capitalize mt-4">manage workers</h3>
                        <div class="form-group">
                            <label for="name"><span class="text-capitalize">first name</span></label>
                            <input type="text" class="form-control" id="first_name" placeholder="enter first name"
                                   name="first_name">
                        </div>
                        <div class="form-group">
                            <label for="second_name"><span class="text-capitalize">second name</span></label>
                            <input type="text" class="form-control" id="second_name" placeholder="enter second name"
                                   name="second_name">
                        </div>
                        <div class="form-group">
                            <label for="department"><span class="text-capitalize">department</span></label>
                            <input type="text" class="form-control" id="department" placeholder="enter department"
                                   name="department">
                        </div>
                        <div class="form-group">
                            <label for="image"><span class="text-capitalize">image</span></label>
                            <input type="file" class="form-control" name="image">
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-block btn-success" name="submit" value="add workers">
                        </div>
                    </form>




                        </div>
                        <footer class="ml-auto fixed-bottom bg-info">
                            <p class="text-center">Theme by mumo| &copf;&nbsp;2019--2022|----all rights reserved</p>
                        </footer>
                    </div>



</div>
<?php
if (isset($_POST["submit"])) {
    function getExtension($str)
    {
        $i = strrpos($str, ".");
        if (!$i) {
            return "";
        }
        $l = strlen($str) - $i;
        $ext = substr($str, $i + 1, $l);
        return $ext;
    }

    $filename = stripslashes($_FILES['image']['name']);    // get the original name
// get the extension of the file in a lower case format
    $extension = getExtension($filename);
    $extension = strtolower($extension);
    $image_name = time() . '.' . $extension; //we will give an unique name
    $newname = 'photos/' . $image_name;
    $data = array(

        'first_name' => $_POST["first_name"],
        'second_name' => $_POST["second_name"],
        'department' => $_POST["department"],
        'photo' => $image_name
    );
     $dbcon->insertdata("workers", $data);

    $copied = copy($_FILES['image']['tmp_name'], $newname);

    if ($dbcon) {
        redirect_to("Manage_workers.php");
        $_SESSION["error message"] = "successfully added";
    }




//    redirect_to("Manage_workers.php");




}
?>
<script src="../boot/bootstrap/js/jquery-3.3.1.js"></script>
<script src="../boot/bootstrap/js/popper.js"></script>
<script src="../boot/bootstrap/js/bootstrap.js"></script>
</body>
</html>