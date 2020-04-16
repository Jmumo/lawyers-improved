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
    <script src="boot/bootstrap/js/jquery-3.3.1.js"></script>
    <link rel="stylesheet" href="boot/bootstrap/css/bootstrap.min.css">
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

                <div class="col-md-9 ml-auto details fixed-top"  style="overflow-y scroll:; height: 100%">
                    <ul class="nav">
                        <li class="nav-tabs">
                            <a class="nav-link text-capitalize" href="admin.expertise.php">add</a>
                        </li>
                        <li class="nav-tabs">
                            <a class="nav-link text-capitalize" href="Manage_expertise.php">manage</a>
                        </li>


                    </ul>
                    <form action="admin.expertise.php" method="post" enctype="multipart/form-data">


                        <h3 class="page-header mt-lg-3">Add expertise</h3>

                        <div class="form-group mt-4">
                            <label for="department"><span class="mb-3 text-capitalize">department</span></label>
                            <input type="text" class="form-control mt-2" id="department" placeholder="enter department"
                                   name="department">
                        </div>
                        <div class="form-group mt-4">
                            <label for="department"><span class="mb-3 text-capitalize">Avatar</span></label>
                            <input type="file" class="form-control  mt-2" name="image">
                        </div>
                        <div class="form-group ">
                            <input type="submit" class="btn btn-success btn-block mt-4" name="submit" value="add expertise">
                        </div>
                    </form>

                        </div>

<footer class="ml-auto fixed-bottom bg-info">
    <p class="text-center">Theme by mumo| &copf;&nbsp;2019--2022|----all rights reserved</p>
</footer>


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


        'name' => $_POST["department"],
        'photo' => $image_name
    );
    $dbcon->insertdata("expertise", $data);

    if($dbcon) {
        $_SESSION["error message"] = "successfully added";

        $copied = copy($_FILES['image']['tmp_name'], $newname);

        header("location:Manage_expertise.php");
    }else{
        $_SESSION["error message"] = "oops something went wrong try again";
    }



    if (!$copied) {
//
        $_SESSION["error message"] = "poor image format";
    }
    ;
}

?>
</div>

</div>
<script src="boot/bootstrap/js/jquery-3.3.1.js"></script>
<script src="boot/bootstrap/js/popper.js"></script>
<script src="boot/bootstrap/js/bootstrap.js"></script>

</body>
</html>