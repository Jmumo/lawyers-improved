<?php
require_once 'database.php';

require_once("includes/sessions.php");
if(!isset($_SESSION["username"])){
    redirect_to("login.php");
}
?>
<html>
<head>
    <script src="boot/bootstrap/js/jquery-3.3.1.js"></script>
    <link rel="stylesheet" href="boot/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/adminstyles.css">
</head>
<body>

<style>
    .rounded {
        width: 150px;
        height: 80px;
        border: solid 1px black;
    }
</style>

<?php include "navigation/navbar.php"?>


                <!--                end of side bar-->
                <!--                top bar-->
                <div class="col-md-9 ml-auto details fixed-top"  style="overflow: scroll; height: 100%">
                    <form action="admin.expertise.php" method="post" enctype="multipart/form-data">
                        <div><?php echo success(); ?></div>
                        <div><?php echo message(); ?></div>
                        <div>
                            <h3 class="page-header">Manage expertise</h3>

                            <label for="department"><span class="">department</span></label>
                            <input type="text" class="form-control" id="department" placeholder="enter department"
                                   name="department">
                        </div>
                        <div class="form-group">
                            <label for="image"><span class="">image</span></label>
                            <input type="file" class="form-control" name="image">
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-success" name="submit" value="add expertise">
                        </div>
                    </form>
                    <div class="container col-lg-12">
                        <div class="container pre-scrollable mx-0 h-50">
                            <table class="table table-hover table-striped ">
                                <thead class="thead-dark  ">
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Image</th>
                                    <th>control</th>

                                </tr>
                                </thead>
                                <?php

                                $fetched = $dbcon->fetchdata("expertise");
                                foreach ($fetched as $row) {
                                    $id = $row[0];
                                    echo "<tr>
      
                    
                     <td>$row[0]</td>
                     <td>$row[1]</td>
                     <td><img src=\"photos /$row[2]\"class=\"rounded\"><br></td>
                      <td><a href='delete_expertise.php?id={$id};'> <button class='btn-sm btn-danger' name='id'>delete</button></a></td>
                    
                     
            </tr>";
                                }
                                ?>

                                </tr>
                            </table>
                        </div>

                        <footer class="ml-auto">
                            <div class="container-fluid text-center mt-4">
<span>
    <hr><p>Theme by mumo| &copf;&nbsp;2019--2022|----all rights reserved</p>


</span>
                            </div>
                        </footer>
                    </div>


</nav>


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
    $newname = 'photos/' . $image_name;
    $data = array(


        'name' => $_POST["department"],
        'photo' => $image_name
    );
    echo $dbcon->insertdata("expertise", $data);
    if ($dbcon) {
        $_SESSION["error message"] = "successfully added";
    }

//            Process Image

    $copied = copy($_FILES['image']['tmp_name'], $newname);

    if (!$copied) {
//                $msg=base64_encode("Unsuccessful.");
//                header("Location: index.php?error=$msg");
        $_SESSION["error message"] = "poor image format";
    }// header("location:public.php");
    ;
}
?>
</div>

</div>
<script src="boot/bootstrap/js/jquery-3.3.1.js"></script>
<script src="boot/bootstrap/js/popper.js"></script>
<script src="boot/bootstrap/js/bootstrap.js"></script>

</body>
</html>