<?php
require_once 'database.php';
?>
<html>
<head>
    <link rel="stylesheet" href="../boot/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../admins/css/stylesheet.css">
</head>
<body >
<style>
    .rounded {
        width: 250px;
        height: 300px;
        border: solid 1px black;
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
            <li class="nav-item active">
                <a class="nav-link" href="workers.php">Our People <span class="sr-only">(current)</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="expertise.php">Our Expertise</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="client.php">become a client</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="news.php">News</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="maps.html">Contact</a>
            </li>
        </ul>

    </div>
</nav>
<div>
    <div class="container mt-3" style="background: snow;">
        <div class="row mt-1">
            <?php
            $fetched = $dbcon->fetchdata("workers");
            foreach ($fetched as $row) {
                echo <<<END
                <div class="card col-lg-3 mt-2 ml-3 ">
              <img src="../admins/photos/$row[4]" class=" rounded card-img-top"><br>
              <div class="card-body bg-dark">
              <div class="card-title text-warning bg-dark">
                    <span style='font-size: 20px ;font-family: sans-serif;color: #c69500'>
                        &nbsp;&nbsp;&nbsp;&nbsp;$row[1]&nbsp;$row[2]
                        <br>
                        &nbsp;&nbsp;
                        </div>
                        <div class="card-subtitle text-warning">
                        &nbsp;&nbsp;   &nbsp;&nbsp;   &nbsp;&nbsp;$row[3]<br>
</div>
                        </div>
                    </span>
                </div>
END;

            }
            ?>

        </div>
    </div>


</div>
<script src="../boot/bootstrap/js/jquery-3.3.1.js"></script>
<script src="../boot/bootstrap/js/popper.js"></script>
<script src="../boot/bootstrap/js/bootstrap.js"></script>

</body>
</html>