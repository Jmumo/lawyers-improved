<?php
require_once 'database.php';
require_once ("includes/redirect.php");
require_once("includes/sessions.php");
if(!isset($_SESSION["username"])){
    redirect_to("adminlogin.php");
}
?>
<html>
<head>
    <script src="boot/bootstrap/js/jquery-3.3.1.js"></script>
    <link rel="stylesheet" href="boot/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/adminstyles.css">
</head>
<body>
<?php include "navigation/navbar.php"?>



                <!--                end of side bar-->
                <!--                top bar-->
                <div class="col-md-9 ml-auto details fixed-top " style=" height: 100%">


                    <div class="container col-lg-12">
                        <div class="mt-5">
                            <div><?php echo success(); ?></div>

                            <table class="table table-hover table-bordered ">
                                <thead class="thead-dark  ">
                                <tr>

                                    <th>ID</th>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>status</th>
                                    <th>control</th>


                                </tr>
                                </thead>
                                <?php

                                $fetched = $dbcon->fetchdata("sign");
                                foreach ($fetched as $row){
                                    $id = $row[0];

                                ?>

                                <tr>

                     <td><?php echo $row[0]?></td>
                     <td><?php echo $row[1]?></td>
                     <td><?php echo $row[2]?></td>


                     <td>
                         <?php
                         if($row[5]=="false"){
                             echo"Not approved";
                         }else{
                             echo"Approved";
                         }
                         ?>

                     </td>
                      <td><a href="deleteaccess.php?id=<?php echo $id;?>>"> <button class='btn-sm btn-danger mr-3' name='id'>delete</button></a>


                           <?php if($row[5]=="false"){
                               echo" <a href='approve.php?id={$id};'><button class='btn-sm btn-danger mr-4' name='id'>approve</button> </a>";
                           }else{
                               echo" <a href='disapprove.php?id={$id};'><button class='btn-sm btn-danger mr-4' name='id'>disapprove</button> </a>";
                           }


                            ?>



                      
                     
                     


                                </tr>
                                <?php } ?>
                            </table>
                        </div>
                    </div>

                </div>
                <div>
                    <footer class="ml-auto fixed-bottom bg-info">
                        <p class="text-center">Theme by mumo| &copf;&nbsp;2019--2022|----all rights reserved</p>
                    </footer>
            </div>


<script src="boot/bootstrap/js/jquery-3.3.1.js"></script>
<script src="boot/bootstrap/js/popper.js"></script>
<script src="boot/bootstrap/js/bootstrap.js"></script>
</body>
</html>