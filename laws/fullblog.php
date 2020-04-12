<?php
require_once 'database.php';
require_once("includes/sessions.php");
require_once("includes/redirect.php");
?>
<?php   $id=$_GET['id'];?>
<html>
<head>
    <link rel="stylesheet" href="../boot/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../admins/css/blog.css">
</head>
<body>
<style>
    .rounded {
        width: 550px;
        height: 550px;
        border: solid 1px black;
        background-color: #f5f5f5;
        overflow: hidden;
    }

    #desc {
        margin-top: 2px;
        font-weight: bold;
        color: #868686;
    }

    #post {
        font-family: "Lucida Sans Unicode", "lucida grande", "sans-serif";
        text-align: justify;
        font-size: 0.9em;
    }

    #butn {
        float: left;
        margin-left: -40px;
    }

    #title {
        font-family: Bitter, Georgia, "Times New Roman", sans-serif;
        font-weight: bold;
        color: #005e90;
    }

    #title:hover {
        color: #0090db;
    }

    #btnn {
        float: left;;
    }

    #textarea {
        border-radius: 7px;
        border-color: lightblue blue;
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
            <li class="nav-item">
                <a class="nav-link" href="lawyers.home.php">home</a>
            </li>
            <li class=" active nav-item">
                <a class="active nav-link" href="blog.home.php">Blog</a>
            </li>
            <li class="nav-item">
                <a class=" nav-link" href="lawyers.board.php">Notice board</a>
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0" action="fullblog.php" method="get">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" name="search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="submit">Search</button>
        </form>
    </div>
</nav>
<div>

    <button type="button" class="btn btn-primary btn-link btn-block text-right text-warning" data-toggle="modal"
            data-target="#exampleModal">
        <p class="mr-4 mb-0">Post a Blog</p>
    </button>
</div>
<div class="container">
    <div class="blog">
        <h2>bloggers home</h2>
        <p class="lead">share your experience</p>
    </div>

    <div class="row">
        <div class="container col-lg-12">
            <table class="table table-hover  ">
                <?php
//                $id = $_GET["id"];

                if (isset($_GET["submit"])) {
                    $data = array(
                        ':search' => '%' . $_GET["search"] . '%',
                    );
                    $fetched = $dbcon->search("blogs", $data);
                } elseif ((isset($_POST["comment"]))) {

                } else {
                    $data = array(
                        ':id' => $id,
                    );


                    $fetched = $dbcon->fullblog("blogs", $data);
                    foreach ($fetched

                             as $row) {
                        $post_id = $row[0];
                        $image = $row[3];
                        $author = $row[2];
                        $date = $row[4];
                        $post = $row[1];
                        $title = $row[5];
                        $author = $_SESSION["user"];

                        ?>
                        <tr>
                            <td><img src="blog/<?php echo $image ?>" class="rounded img-thumbnail"><br>
                                <span id='title'><h1><?php echo $title ?></h1></span><br>
                                <span id='desc'><span>By:</span>&nbsp;<?php echo $author . $date ?></span><br>
                                <span id='post'><?php echo $post ?></span><br>

                            </td>


                        </tr>

                        <?php
                    }
                } ?>

            </table>
        </div>

        <div class="well">
            <p class="text-danger">comment on the post:</p>
            <form action="fullblog.php? id=<?php echo $id ?>" method="post">
                <div><?php echo success(); ?></div>
                <div>
                        <textarea type="text" rows="4" cols="50" id="textarea" placeholder="enter comment"
                                  name="text"></textarea>
                </div>
                <button type="submit" class="btn btn-md btn-primary mb-3 mt-2" name="comment">post</button>

            </form>

        </div>
        <?php
        if (isset($_POST["comment"])) {
            $id = $_GET["id"];
            $date = date("D/M/Y");
            $author = $_SESSION["user"];
            $data = array(
                'comment' => $_POST["text"],
                'author' => $author,
                'date' => $date,
                'bindex' => $id,


            );
            $dbcon->insertdata("comments", $data);
            if ($dbcon) {
                $_SESSION["error message"] = "successfully posted";
                redirect_to("fullblog.php? id={$id}");
            }
        }
        //                ?>

    </div>
    <div class="container-fluid">
        <p class="lead"><h5>comments on this post</h5></p>
        <!--        <div>comments division-->
        <?php
        $data = array(
            ':id' => $id,
        );

        $fetched = $dbcon->fetch_comments("comments", $data);
        foreach ($fetched as $row) {
            $c_id = $row[0];
            $c_date = $row[2];
            $c_author = $row[3];
            $c_comment = $row[1];
            $c_index = $row[4];

            ?>
            <?php
            $data= array(
                 ':username'=>$c_author,
            );
            $pic = $dbcon->fetch_comment_user('sign',$data);
            foreach ($pic as $pics){
                $picture = $pics[6];
//
            ?>
            <div style="background-color:#f6f7f9">
                <img class="pull-left img-thumbnail" src="profiles/<?php echo $picture?>" width="70px" height="70px"><br>
                <p><?php echo $c_comment ?></p>
                <p class="text-capitalize">by <span><?php echo $c_author   ?></span></p>
                <p>on <?php echo $c_date ?></p>
            </div>
            <br>
            <hr>
            <?php
        }} ?>
    </div>
</div>


<div id="footer">
    <hr style="background-color: white">
    <p>Theme by mumo| &copf;&nbsp;2019--2022|----all rights reserved</p>
    <hr style="background-color: white">


</div>
</body>
</html>