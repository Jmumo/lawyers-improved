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


    <div class="container col-lg-12">

        <div class="container mt-lg-5">
            <table class="table table-hover table-bordered">
                <thead class="thead-dark  ">
                <tr>
                    <th>ID</th>
                    <th>First name</th>
                    <th>Second name</th>
                    <th>Department</th>
                    <th>image</th>
                    <th>control</th>

                </tr>
                </thead>
                <?php

                $fetched = $dbcon->fetchdata("workers");
                foreach ($fetched as $row) {
                    $id = $row[0];
                    echo "<tr>
      
                    <td>$row[0]</td>
                     <td>$row[1]</td>
                     <td>$row[2]</td>
                      <td>$row[3]</td>
                      <td><img src=\"photos /$row[4]\" class=\"rounded\"><br></td>
                      <td><a href='admindelete.php?id={$id};'> <button class='btn-sm btn-danger' name='id'>delete</button></a></td>
                     
            </tr>";
                }
                ?>

                </tr>
            </table>
        </div>
        <footer class="ml-auto fixed-bottom bg-info">
            <p class="text-center">Theme by mumo| &copf;&nbsp;2019--2022|----all rights reserved</p>
        </footer>
    </div>
    </div>


</div>
<?php
//if (isset($_POST["submit"])) {
//    function getExtension($str)
//    {
//        $i = strrpos($str, ".");
//        if (!$i) {
//            return "";
//        }
//        $l = strlen($str) - $i;
//        $ext = substr($str, $i + 1, $l);
//        return $ext;
//    }
//
//    $filename = stripslashes($_FILES['image']['name']);    // get the original name
//// get the extension of the file in a lower case format
//    $extension = getExtension($filename);
//    $extension = strtolower($extension);
//    $image_name = time() . '.' . $extension; //we will give an unique name
//    $newname = 'photos/' . $image_name;
//    $data = array(
//
//        'first_name' => $_POST["first_name"],
//        'second_name' => $_POST["second_name"],
//        'department' => $_POST["department"],
//        'photo' => $image_name
//    );
//    echo $dbcon->insertdata("workers", $data);
//
//    if ($dbcon) {
//        $_SESSION["error message"] = "successfully added";
//    }
//
////            Process Image
//
//    $copied = copy($_FILES['image']['tmp_name'], $newname);
//
//    if ($copied) {
//
//
//    }
//
//
//}
//?>
<script src="../boot/bootstrap/js/jquery-3.3.1.js"></script>
<script src="../boot/bootstrap/js/popper.js"></script>
<script src="../boot/bootstrap/js/bootstrap.js"></script>
</body>
</html>