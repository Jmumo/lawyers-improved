<?php
//require_once 'database.php';
require_once("includes/sessions.php");
require_once("includes/redirect.php");
?>
<html>
<head>
    <title></title>

    <link rel="stylesheet" href="boot/bootstrap/css/bootstrap.min.css">
    <link type="text/css" rel="stylesheet" href="admins/css/stylesheet.css">
</head>
<body class="index">
<div style="margin-left: 94%;font-family: 'Agency FB';font-size: 27px;">
    <a href="laws/login.php"><span style="color: #FFFFFF">login</span></a>
</div>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">LawyersInc</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item  ">
                <a class="nav-link active" href="index.php">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="laws/workers.php">Our People <span class="sr-only">(current)</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="laws/expertise.php">Our Expertise</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="laws/client.php">become a client</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="laws/news.php">News</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="laws/maps.html">Contact</a>
            </li>
        </ul>

    </div>
</nav>
<div><?php echo success(); ?></div>
<div class="center">
    <section class="landing">
        <div class="inner-landing">
            <div class="greeting"></div>
            <div class="today_date"></div>
            <div class="countdown"></div>
            <p> welcome to inc law for best legal solutions</p>

        </div>

    </section>
    <script src="js/index.js"></script>

</div>
<div class="fixed-bottom text-success text-hide">
    <hr style="background-color: white; font-size: 8px;">

    <p class="lead  text-center">Inc Law| &copf;&nbsp;2019|----best law team</p>
    <hr style="background-color: white">


</div>


</body>
</html>