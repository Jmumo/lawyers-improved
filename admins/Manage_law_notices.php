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


        <div class="container col-lg-12">
            <div><?php echo success(); ?></div>
                                    <div class="container">
                                        <table class="table table-hover table-bordered mt-4 ">
                                            <thead class="thead-dark  ">
                                            <tr>

                                                <th>ID</th>
                                                <th>Author</th>
                                                <th>Message</th>
                                                <th>Control</th>
                                                <th>Date</th>

                                            </tr>
                                            </thead>
                                            <?php

                                            $fetched = $dbcon->fetchdata("notice");
                                            foreach ($fetched as $row) {
                                                $id=$row[0];
                                                echo "<tr>
            
            
                                 <td>$row[0]</td>
                                 <td>$row[1]</td>
                                 <td>$row[2]</td>
                                  <td>$row[3]</td>
                                  <td><a href='delete_law_notices.php?id={$id};'> <button class='btn-sm btn-danger' name='id'>delete</button></a></td>
            
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


    </nav>


</div>

</div>
<script src="../boot/bootstrap/js/jquery-3.3.1.js"></script>
<script src="../boot/bootstrap/js/popper.js"></script>
<script src="../boot/bootstrap/js/bootstrap.js"></script>

</body>
</html>