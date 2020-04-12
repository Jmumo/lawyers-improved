<?php
require_once 'database.php';
?>
<html>
<head>

    <script src="../boot/bootstrap/js/jquery-3.3.1.js"></script>
    <link rel="stylesheet" href="../boot/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../admins/css/stylesheet.css">
</head>
<body>
<style>
    .rounded {
        width: 350px;
        height: 300px;
        border: solid 1px;
    }
</style>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">LawyersInc</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item  ">
                <a class="nav-link" href="../index.php">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="workers.php">Our People <span class="sr-only">(current)</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="expertise.php">Our Expertise</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="news.php">News</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="maps.html">Contact</a>
            </li>
        </ul>

    </div>
</nav>
<div>
    <div class="container">
        <div class="row mt-4">
            <table class="table table-responsive  table-hover">

                <?php
                $name =
                $fetched = $dbcon->fetchdata("news");
                foreach ($fetched as $row) {
                    echo " <div><tr>
                   
                     <td><span style='font-size: 20px ;font-family:sans-serif'>&nbsp;&nbsp;&nbsp;&nbsp;$row[1]<br></span></td>
                     <td><img src=\"photos/$row[2]\" class=\"rounded\"><br></td>
                     
            </tr>";
                }
                ?>
                </tr>
            </table>


        </div>
    </div>


</div>
<script src="../boot/bootstrap/js/jquery-3.3.1.js"></script>
<script src="../boot/bootstrap/js/popper.js"></script>
<script src="../boot/bootstrap/js/bootstrap.js"></script>

</body>
</html>