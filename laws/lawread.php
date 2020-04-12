<?php
require_once 'database.php';
require_once("includes/sessions.php");
require_once("includes/redirect.php");
?>
<html>
<head>
    <script src="../boot/bootstrap/js/jquery-3.3.1.js"></script>
    <link rel="stylesheet" href="../boot/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../admins/css/adminstyles.css">
</head>
<body>
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
<div class="container">
    <?php
    if(isset($_GET["id"])) {
//    $true="true";
        $data = array(
            'id' => $_GET["id"],
        );
    }
        $exec = $dbcon->fullblog("cases", $data);
        foreach ($exec as $row) {
    ?>
<fieldset>
    <legend style="border: solid gray;width: 800px">
        <p><h3>Full Case Details</h3></p>
    <p><label>Full names:&nbsp;&nbsp;&nbsp;</label><?php echo $row[1];?>&nbsp;&nbsp;&nbsp;<?php echo $row[2]?></p>
    <p><label>occupation:&nbsp;&nbsp;&nbsp;</label><?php echo $row[3];?></p>
    <p><label>Email:&nbsp;&nbsp;&nbsp;</label><?php echo $row[4];?></p>
    <p><label>Contact:&nbsp;&nbsp;&nbsp;</label><?php echo $row[5];?></p>
    <p><label>Address:&nbsp;&nbsp;&nbsp;</label><?php echo $row[6];?></p>
    <p><label>Description:&nbsp;&nbsp;&nbsp;</label><?php echo $row[7];?></p>
    </legend>
</fieldset>
<?php }?>
    <a href="lawyers.home.php">&#128072</a>
</div>
</body>
</html>
