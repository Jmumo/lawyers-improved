<?php
require_once 'database.php';
require_once ("includes/redirect.php");
require_once("includes/sessions.php");
if(!isset($_SESSION["username"])){
    redirect_to("adminlogin.php");
}
?>
<div>
<head>
    <script src="boot/bootstrap/js/jquery-3.3.1.js"></script>
    <link rel="stylesheet" href="boot/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/adminstyles.css">
</head>
<style>
    p{
        margin-left: 20%;
    }
    h3{
        margin-left: 20%;
        font-family: "Lucida Sans";

    }
    fieldset{
        margin-left: 10%;
        margin-top: 40px;
    }
    a{
        margin-left: 38%;
    }
</style>
    <body>
<div class="container">



    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4 text-lg-center">Full case details </h1>

                    <form method="post" action="adminread.php">
                        <div class="form-group">

                            <div>
                            <?php
                            $data = array(
                                ':id' => $_GET["id"],
                            );
                            $fetched = $dbcon->fullblog("cases",$data);
                            foreach ($fetched as $row1) {
                                $id = $row1[0];
                            ?>




                                <fieldset>
                                    <legend style="border: solid gray;width: 800px">
                                        <p><h3>Full Case Details</h3></p>
                                        <p><label>Full names:&nbsp;&nbsp;&nbsp;</label><?php echo $row1[1];?>&nbsp;&nbsp;&nbsp;<?php echo $row1[2]?></p>
                                        <p><label>occupation:&nbsp;&nbsp;&nbsp;</label><?php echo $row1[3];?></p>
                                        <p><label>Email:&nbsp;&nbsp;&nbsp;</label><?php echo $row1[4];?></p>
                                        <p><label>Contact:&nbsp;&nbsp;&nbsp;</label><?php echo $row1[5];?></p>
                                        <p><label>Address:&nbsp;&nbsp;&nbsp;</label><?php echo $row1[6];?></p>
                                        <p><label>Description:&nbsp;&nbsp;&nbsp;</label><?php echo $row1[7];?></p>








                                    </legend>
                                </fieldset>


                            </div>
                        </div>
                        <label for="recipient-name" class="col-form-label text-center text-capitalize">select a lawyer for the case:</label>
                        <select class="form-control" name="lawyer" id="lawyer">
                            <?php
                            $fetched = $dbcon->fetch_approve("sign");
                            foreach ($fetched as $row) {
                                ?>
                                <option><?php echo $row[1] ?></option>

                            <?php } ?>

                            <input type="hidden" name="id" value="<?php echo $row1[0];?>">
                        </select><br>



                        <?php   } ?>


                        <button type="submit" class="btn btn-block btn-info" name="submit">save changes</button>

                    </form>

                        </div>


            <?php
            if (isset($_POST["submit"])) {

            $data = array(

                'lawyer' => $_POST["lawyer"],
                ':id' => $_POST["id"]
            );
            var_dump($data);
             $dbcon->update_law("cases", $data);
                header("location:cases.php");
            }
            ?>

            </p>
</div>

        </div>
</div>

    <a href="cases.php">&#128072</a>




<!-- Split dropright button -->

</body>
<script src="boot/bootstrap/js/jquery-3.3.1.js"></script>
<script src="boot/bootstrap/js/popper.js"></script>
<script src="boot/bootstrap/js/bootstrap.js"></script>