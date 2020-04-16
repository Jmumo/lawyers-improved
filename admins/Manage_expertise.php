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

<div class="col-md-9 ml-auto details fixed-top"  style="overflow: scroll; height: 100%">
    <ul class="nav">
        <li class="nav-tabs">
            <a class="nav-link text-capitalize" href="admin.expertise.php">add</a>
        </li>
        <li class="nav-tabs">
            <a class="nav-link text-capitalize" href="Manage_expertise.php">manage</a>
        </li>


    </ul>
<!--  -->
    <div class="container col-lg-12">
        <div><?php echo success(); ?></div>
        <div><?php echo message(); ?></div>
        <div class="container mx-0 h-100">
            <table id="table" class="table table-hover  table-bordered mt-5">
                <thead class="thead-dark  ">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Image</th>
                    <th>control</th>

                </tr>
                </thead>
                <?php

                $fetched = $dbcon->fetchdata("expertise");
                foreach ($fetched as $row) {
                    $id = $row[0];
                    echo "<tr>
      
                    
                     <td>$row[0]</td>
                     <td>$row[1]</td>
                     <td><img src=\"photos /$row[2]\"class=\"rounded\"><br></td>
                      <td><a href='delete_expertise.php?id={$id};'> <button class='btn-sm btn-danger' name='id'>delete</button></a></td>
                    
                     
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







<!--
</div>

</div>
<script src="boot/bootstrap/js/jquery-3.3.1.js"></script>
<script src="boot/bootstrap/js/popper.js"></script>
<script src="boot/bootstrap/js/bootstrap.js"></script>

</body>
</html>