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
    <script src="../boot/bootstrap/js/jquery-3.3.1.js"></script>
    <link rel="stylesheet" href="../boot/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/adminstyles.css">
</head>
<body>

<?php include "navigation/navbar.php"?>
                <!--                end of side bar-->
                <!--                top bar-->
                <div class="col-md-9 ml-auto details fixed-top " style="overflow: scroll; height: 100%">
                    <form action="lawyers.news.php" method="post" enctype="multipart/form-data">
                        <div><?php echo success(); ?></div>
                        <div>
                            <h3 class="page-header">Post to lawyers notice board</h3>

                            <label for="description"><span class="">description</span></label>
                            <textarea type="text" class="form-control" id="description" placeholder="enter description"
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

//                       header("location:index.php");
                    }
                    ?>
                    <div class="container col-lg-12">
                        <div class="container pre-scrollable mx-0 h-50">
                            <table class="table table-hover table-striped ">
                                <thead class="thead-dark  ">
                                <tr>

                                    <th>ID</th>
                                    <th>Author</th>
                                    <th>Message</th>
                                    <th>Date</th>

                                </tr>
                                </thead>
                                <?php

                                $fetched = $dbcon->fetchdata("notice");
                                foreach ($fetched as $row) {
                                    echo "<tr>
      
                    
                     <td>$row[0]</td>
                     <td>$row[1]</td>
                     <td>$row[2]</td>
                      <td>$row[3]</td>
                     
            </tr>";
                                }
                                ?>

                                </tr>
                            </table>
                        </div>

                        <footer class="ml-auto">
                            <div class="container-fluid text-center mt-4">
<span>
    <hr><p>Theme by mumo| &copf;&nbsp;2019--2022|----all rights reserved</p>


</span>
                            </div>
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