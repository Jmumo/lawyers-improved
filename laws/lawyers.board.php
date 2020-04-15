<?php
require_once 'database.php';
require_once("includes/sessions.php");
require_once("includes/redirect.php");
if(!isset($_SESSION["user"])){
    redirect_to("login.php");
}
?>
<html>
<head>
    <link rel="stylesheet" href="../boot/bootstrap/css/bootstrap.min.css">
    <link type="text/css" rel="stylesheet" href="../admins/css/blog.css">
</head>
<body>
<div style="margin-left: 94%;font-family: 'Agency FB';font-size: large">
    <a href="../admins/logout.php">logout</a>
</div>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">LawyersInc</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="lawyers.home.php">home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="blog.home.php">Blog</a>
            </li>
            <li class="active nav-item">
                <a class=" nav-link" href="lawyers.board.php">Notice board</a>
            </li>
        </ul>


    </div>
</nav>
<div>
    <div class="container" style="height: 100%">
        <div class="row mt-4 ">
            <table class="table   table-hover text-center">


                <?php
                $name =
                $fetched = $dbcon->fetchdata("notice");
                foreach ($fetched as $row) {
                    echo " <div><tr>
                   
                     <td ><span style='font-size: 20px ;font-family:sans-serif'>&nbsp;&nbsp;&nbsp;&nbsp;$row[2] <br>from: $row[1]&nbsp;&nbsp;&nbsp;&nbsp;$row[3]</span></td>
                    
                     
            </tr>";
                }
                ?>
                </tr>
            </table>


        </div>
    </div>
</div>

<div id="footer">
    <hr style="background-color: white">
    <p>Theme by mumo| &copf;&nbsp;2019--2022|----all rights reserved</p>
    <hr style="background-color: white">


</div>
</script>
<
script
src = "boot/bootstrap/js/jquery-3.3.1.js" ></script>
<script src="../boot/bootstrap/js/popper.js"></script>
<script src="../boot/bootstrap/js/bootstrap.js"></script>
</body>
</html>