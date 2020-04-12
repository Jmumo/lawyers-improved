<?php
require_once 'database.php';
require_once("includes/sessions.php");
require_once("includes/redirect.php");

if(!isset($_SESSION["user"])){
    redirect_to("login.php");
    $lawyer = $_SESSION["user"];

}
?>
<html xmlns="http://www.w3.org/1999/html">
<head>
    <link rel="stylesheet" href="../boot/bootstrap-3.3.7/dist/css/bootstrap.css">
    <link rel="stylesheet" href="../boot/bootstrap/css/bootstrap.min.css">
    <link type="text/css" rel="stylesheet" href="../admins/css/stylesheet.css">

</head>
<body>
<div>
    <div><?php echo success(); ?></div>
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
                    <a class="nav-link" href="lawyers.board.php">Notice board</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="blog.home.php">Blog</a>
                </li>
                <li class="active nav-item">
                    <a class="nav-link" href="lawyers.home.php">home</a>
                </li>

                <li class="nav-item">
                    <?php
                    $lawyer = $_SESSION["user"];
                    $data = array(
                        ':username' =>  $lawyer ,
                    );
                    $fetched=$dbcon->fetch_profile("sign",$data);

                    foreach ($fetched as $row){
                        $username=$row['1'];
                        $image =$row['6'];


                    ?>

                </li>

            </ul>

        </div>
    </nav>
</div>

<div class="container-fluid" id="profile">
<div class="card" style="width: 600px;">
    <div class="card-header">
        <p class="text-capitalize text-center">my profile</p>
        <p class="text-capitalize text-center text-success">you can update profile from this location</p>
    <img src="profiles/<?php echo $image;?>" class="img-circle" alt="no_image " style="height: 400px; width: 500px">
    </div>
    <div class="card-body">
        <form method="post" action="profile.php" enctype="multipart/form-data">

            <div class="form-group">
                <input type="file" class="form-control" name="image"><br
                <label for="name">Username</label><br>
                <input type="text" class="form-control" id="username" placeholder="Enter Username"
                       name="username" value=<?php echo $username;?>>
                <?php } ?>
            </div>
            <button type="submit" name="submit" class="btn btn-info">save changes</button>
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
            $new_name = 'profiles/' . $image_name;

            $copied = copy($_FILES['image']['tmp_name'],$new_name);
//


            $data = array(
                'username' => $_POST["username"],
                'image' => $image_name,




            );
             $dbcon->update_profile("sign", $data);
            if ($dbcon) {
                $_SESSION["error message"] = "successfully posted";
            }
//                        move_uploaded_file($_FILES["image"]["tmp_name"],$path);




            if (!$copied) {
//
                echo "Unsuccesful copying";
                exit();
            }
             header("location:profile.php");
            ;
        }
        ?>

    </div>
</div>
</div>

