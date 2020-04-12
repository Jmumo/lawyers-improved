<?php
require_once 'database.php';
require_once("includes/sessions.php");
?>
<html>
<head>

    <!--    <link rel="stylesheet" href="boot/bootstrap-3.3.7/dist/css/bootstrap.css">-->
    <link rel="stylesheet" href="../admins/boot/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../admins/css/stylesheet.css">
</head>
<body id="body">
<style>
    .rounded {
        width: 300px;
        height: 350px;
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
                <a class="nav-link" href="index.php">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="workers.php">Our People <span class="sr-only">(current)</span></a>
            </li>

            <li class="nav-item active">
                <a class="nav-link" href="expertise.php">Our Expertise</a>
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
    <div class="container">
        <h3 style="margin-left: 40%;">our practise areas</h3>
        <div class="row mt-4">
            <?php
            $fetched = $dbcon->fetchdata("expertise");
            foreach ($fetched as $row) {
                echo <<<END
                <div class="img-thumbnail col-lg-4">
<img  src="photos/$row[2]" class="rounded ml-3"><br>
<span style='font-size: 20px ;font-family: Algerian'>&nbsp;&nbsp;&nbsp;&nbsp;$row[1]<br></span>

                </div>
END;

            }
            ?>

        </div>
    </div>


</div>
</body>
</html>