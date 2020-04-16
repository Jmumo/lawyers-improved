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
    <!--    <link rel="stylesheet" href="boot/bootstrap-3.3.7/dist/css/bootstrap.css">-->
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
                        ':username' => '%' . $lawyer . '%',
                    );
                    $fetched=$dbcon->fetch_new("cases",$data);
                    ?>
                    <a class="nav-link" href="lawyers.home.php"><span class="badge badge-primary"><?php echo $fetched;?></span>&nbsp;new cases</a>
                </li>
                <li>
                    <a class="nav-link" href="profile.php">my profile</a>
                </li>
            </ul>
            <!--            <form class="form-inline my-2 my-lg-0">-->
            <!--                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">-->
            <!--                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>-->
            <!--            </form>-->
        </div>
    </nav>
 <?php include 'navigation/Tabs_navigation.php';?>
</div>



<div class="container">
    <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalLongTitle">create schedule</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="lawyers.home.php" method="post">
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">open date:</label>
                            <input type="date" class="form-control" id="date" name="date">
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">subject:</label>
                            <input type="text" class="form-control" id="subject" name="subject">
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Matter:</label>
                            <textarea type="text" class="form-control" id="matter" name="matter"> </textarea>
                        </div>
                        <div class="form-group">

                            <input type="hidden" class="form-control" id="lawyer" name="lawyer" value="<?php echo $lawyer?>">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" name="create">Save changes</button>
                        </div>

                    </form>
                    <?php
                    if (isset($_POST["create"])) {
                        $lawyer=$_SESSION["user"];
                        $data = array(
                            'date' => $_POST["date"],
                            'practise' => $_POST["subject"],
                            'matter' => $_POST["matter"],
                            'lawyer' => $lawyer


                        );
                        echo $dbcon->insertdata("schedule", $data);}

                    ?>

                </div>
            </div>
        </div>
    </div class="ml-0">
            <table class="table table-striped table-bordered  table-hover mt-5">
                <thead class="thead-dark">
                <tr>

                    <th>ID</th>
                    <th>open date</th>
                    <th>subject</th>
                    <th>matter</th>
                    <th>lawyer</th>
                    <th>Days remaining</th>
                    <th>manage</th>
                </tr>
                </thead>

                <?php
                $lawyer = $_SESSION["user"];
                $data = array(
                    ':username' => '%' . $lawyer . '%',
                );
                $fetched = $dbcon->fetch_schedule("schedule", $data);
//                var_dump($fetched);
//                var_dump($lawyer);
                foreach ($fetched as $row) {
                    $time1 = strtotime($row[1]);
                    @$time2 = strtotime(date(m . d . y));
                    $diffrence = $time1 - $time2;

                    $final = floor($diffrence / (60 * 60 * 24));

                ?>

                    <tr>
    </td>
                         <td><?php echo $row[0]?></td>
                        <td><?php echo $row[1]?></td>
                         <td><?php echo $row[2] ?></td>
                         <td><?php echo $row[3]?></td>
                         <td><?php echo $row[4]?></td>
                          <td style="color: #0056b3"><?php if($final==0){
                              echo"today";
                              }elseif ($final < 0)
                              {echo"closed";
                          }else{ echo $final."days";}
                          ?></td>
                        <td><a href="deleteschedule.php?id=<?php echo $row[0]; ?>"><button class="btn-info">delete</button></a></td>

                </tr>
               <?php }?>


                </tr>
            </table>
        </div>
    </div>
</div>
</div>
<script>

</script>
<script src="../boot/bootstrap/js/jquery-3.3.1.js"></script>
<script src="../boot/bootstrap/js/popper.js"></script>
<script src="../boot/bootstrap/js/bootstrap.js"></script>
</body>
</html>