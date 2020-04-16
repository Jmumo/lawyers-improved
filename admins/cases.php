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
<style>

</style>


                <!--                end of side bar-->
                <!--                top bar-->
                <div class="col-md-9 ml-auto details fixed-top mt-4" id="main_page" style="overflow: scroll">


                    <div class="container  col-lg-12">
                        <div class="container mx-0 h-50">
                            <table class="table table-bordered  table-hover">
                                <thead class="thead-dark ">
                                <tr>

                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Description</th>
                                    <th>lawyer</th>
                                </tr>
                                </thead>
                                <?php

                                $fetched = $dbcon->fetchdata("cases");
                                foreach ($fetched as $row) {
                                    $id = $row[0];

                                    if (strlen($row[7]) > 20) {
                                        $row[7] = substr($row[7], 0, 20) . "....";
                                    }
                                    ?>
                                    <tr>
                                        <td><?php echo $id?></td>
                                        <td><?php echo $row[1]?> &nbsp;&nbsp;&nbsp;&nbsp;<?php echo $row[2]?></td>

                                        <td><?php echo $row[6]?></td>
                                        <td><?php echo $row[7]?>
                                            <a href=adminread.php?id=<?php echo $id; ?>>read more</a></td>
                                        <td><?php echo $row[8]?></td>
                                    </tr>
                                <?php }?>


                                </tr>
                            </table>


                        </div>
                        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                             aria-labelledby="exampleModalCenterTitle"
                             aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalCenterTitle">lawyers name</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="cases.php" method="post">
                                            <div class="form-group">
                                                <label for="recipient-name" class="col-form-label">lawyers name:</label>
                                                <select class="form-control" id="lawyer" name="lawyer">
                                                    <?php
                                                    $fetched = $dbcon->fetch_approve("sign");
                                                    foreach ($fetched as $row) {
                                                        ?>
                                                        <option><?php echo $row[1] ?></option>
                                                        <option></option>
                                                    <?php } ?>
                                                </select>
                                                <input type="hidden" name="id" value='$_GET['id']'>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                                    Close
                                                </button>
                                                <button type="submit" class="btn btn-primary" name="submit">Save
                                                    changes
                                                </button>
                                            </div>
                                        </form>
                                        <?php

            if (isset($_POST["submit"])) {
             $id=$_GET["id"];
            $data = array(

                'lawyer' => $_POST["lawyer"],
                'id' => $_GET["id"],

            );
             $dbcon->update_law("cases", $data);
            }
            ?>



                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

<footer class="ml-auto fixed-bottom bg-info">
    <p class="text-center">Theme by mumo| &copf;&nbsp;2019--2022|----all rights reserved</p>
</footer>
        </div>


</nav>

<script src="../boot/bootstrap/js/jquery-3.3.1.js"></script>
<script src="../boot/bootstrap/js/popper.js"></script>
<script src="../boot/bootstrap/js/bootstrap.js"></script>
</body>
</html>