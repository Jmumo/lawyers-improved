<?php
require_once 'database.php';
require_once("includes/sessions.php");
if(!isset($_SESSION["user"])){
    redirect_to("login.php");
}
?>
<html>
<head>
    <link rel="stylesheet" href="../boot/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../admins/css/blog.css">
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
            <li class=" active nav-item">
                <a class="active nav-link" href="blog.home.php">Blog</a>
            </li>
            <li class="nav-item">
                <a class=" nav-link" href="lawyers.board.php">Notice board</a>
            </li>

        </ul>
        <form class="form-inline my-2 my-lg-0" action="blog.home.php" method="GET">
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
        <div class="container col-lg-8 ml-1">

            <table class="table table-hover  ">

                <?php
                if (isset($_GET["submit"])) {
                    $data = array(
                        'search' => '%' . $_GET["search"] . '%',
                    );
                    $fetched = $dbcon->search("blogs", $data);
                } else {

                    $fetched = $dbcon->fetchdata("blogs");

                }
                foreach ($fetched as $row) {
                $post_id = $row[0];
                $image = $row[3];
                $author = $row[2];
                $date = $row[4];
                $post = $row[1];
                $title = $row[5];
                if (strlen($post) > 90) {
                    $post = substr($post, 0, 90) . "....";
                }
                ?>

                <tr>
                    <td>
                        <img src="blog/<?php echo $image ?>" class="rounded img-thumbnail" id="rounded"><br>

                        <span id='title' class="text-capitalize"><h1>&nbsp;<?php echo $title ?></h1></span><br>
                        <span id='desc'><span>&nbsp;&nbsp;&nbsp;&nbsp;By:</span>&nbsp;<?php echo $author . $date ?></span><br>
                        <span id='post'>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $post ?></span><br>
                        <a href='fullblog.php?id=<?php echo $post_id; ?>'<span id="btnn"
                                                                               class='btn btn-info btn-sm'
                                                                               name="more">read
                                more &rsaquo;&rsaquo;&rsaquo;</span></a>
                    </td>


                </tr>

                <?php  }?>
                <tr>


            </table>
        </div>
        <div class="col-lg-3" style="postion:">
            <h4 class="lead text-capitalize">recent posts</h4><hr>
            <?php
            $fetched = $dbcon->recent_post("blogs");
            foreach ($fetched as $row) {
                $title = $row[5];
                $image = $row[3];
                $id = $row[0];

            ?>


                   <div class="media" >


                       <div class="media-body">
                           <a href="fullblog.php?id=<?php echo $id;?>">
                           <img src="blog/<?php echo $image ?>" class="img-fluid align-self-start img-thumbnail " width="100" height="50">
                           <P class="lead"><?php echo $title?></P>
                           </a>
                       </div>

                   </div>
                <hr>




            <?php } ?>
        </div>
    </div>

</div>

<div id="footer">
    <hr style="background-color: white">
    <p>Theme by mumo| &copf;&nbsp;2019--2022|----all rights reserved</p>
    <hr style="background-color: white">


</div>



<div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">post details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="blog.home.php" method="post" enctype="multipart/form-data">
                        <div><?php echo success(); ?></div>
                        <div>
                            <label for="description"><span class="">description</span></label>
                            <textarea type="text" class="form-control" id="description" placeholder="enter description"
                                      name="description" rows="5"></textarea>
                        </div>
                        <div>
                            <label for="title"><span class="">title</span></label>
                            <input type="text" class="form-control" name="title">
                        </div>

                        <div class="form-group">
                            <label for="image"><span class="">image</span></label>
                            <input type="file" class="form-control" name="image">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" name="submit">Save changes</button>
                        </div>
                    </form>

                    <?php
                    if (isset($_POST["submit"])) {
                        function getExtension($str)
                        {
                            $i = strrpos($str, ".");
                            if (!$i) {
                                return "";
                            }
                            $l = strlen($str) - $i;
                            $ext = substr($str, $i + 1, $l);
                            return $ext;
                        }

                        $filename = stripslashes($_FILES['image']['name']);    // get the original name
// get the extension of the file in a lower case format
                        $extension = getExtension($filename);
                        $extension = strtolower($extension);
                        $image_name = time() . '.' . $extension; //we will give an unique name
                        $newname = 'blog/' . $image_name;
//
                        $date = date("D/M/Y");
                        $author = $_SESSION["user"];
                        $data = array(
                            'post' => $_POST["description"],
                            'photo' => $image_name,
                            'author' => $author,
                            'date' => $date,
                            'title' => $_POST["title"],

                        );
                        echo $dbcon->insertdata("blogs", $data);
                        if ($dbcon) {
                            $_SESSION["error message"] = "successfully posted";
                        }
//                        move_uploaded_file($_FILES["image"]["tmp_name"],$path);


                        $copied = copy($_FILES['image']['tmp_name'], $newname);

                        if (!$copied) {
//                $msg=base64_encode("Unsuccessful.");
//                header("Location: index.php?error=$msg");
                            echo "Unsuccesful copying";
                            exit();
                        }// header("location:public.php");
                        ;
                    }
                    ?>

                </div>

            </div>
        </div>
    </div>

</body>
<script src="../boot/bootstrap/js/jquery-3.3.1.js"></script>
<script src="../boot/bootstrap/js/popper.js"></script>
<script src="../boot/bootstrap/js/bootstrap.js"></script>
</html>
