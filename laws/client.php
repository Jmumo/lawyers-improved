<?php
require_once 'database.php';
require_once("includes/sessions.php");
require_once("includes/redirect.php");
?>
<html>
<head>
    <link rel="stylesheet" href="../boot/bootstrap-3.3.7/dist/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../admins/css/stylesheet.css">
</head>
<body class="">
<div class="container">
    <div class="row">
        <div class="page-header text-center lead"><p>
            <H3>LETS WORK TOGETHER</H3>
            We provide various client services including consultation and other legal services<br>
            please fill the form to submit your service request
            </p></div>
    </div>
    <div class="row">
        <div class="col-lg-4">
            <img class="img-close" src="../compic/close.jpg">
        </div>
        <div class="col-lg-8">
            <form action="client.php" method="post">
                <div>
                    <div class="form-group">
                        <label for="name" class="text-capitalize">first name</label>
                        <input type="text" class="form-control" id="first_name" placeholder="enter first name"
                               name="first_name">
                    </div>
                    <div class="form-group">
                        <label for="name" class="text-capitalize">second name</label>
                        <input type="text" class="form-control" id="second_name" placeholder="enter second name"
                               name="second_name">
                    </div>
                    <div class="form-group">
                        <label for="name" class="text-capitalize">occupation</label><br>
                        <span>provide a description of economic activities</span>
                        <input type="text" class="form-control" id="occupation" placeholder="enter your answer"
                               name="occupation">
                    </div>
                    <div class="form-group">
                        <label for="email" class="text-capitalize">Email</label>
                        <input type="email" class="form-control" id="email" placeholder="enter email" name="email">
                    </div>
                    <div class="form-group">
                        <label for="email" class="text-capitalize">contact</label>
                        <input type="number" class="form-control" id="contact" placeholder="enter contact"
                               name="contact">
                    </div>
                    <div class="form-group">
                        <label for="email" class="text-capitalize">address</label>
                        <textarea class="form-control" id="address" name="address"
                                  placeholder="enter your address"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="description" class="text-capitalize">description</label><br>
                        <span>provide a description of the help you need</span>
                        <textarea class="form-control" id="address" name="description" rows="8"
                                  placeholder="problem description"></textarea><br>

                        <button type="submit" name="submit" class=" btn btn-primary btn-block">submit</button>
                    </div>


                </div>
            </form>
        </div>

    </div>
    <?php
    if (isset($_POST["submit"])) {
        $data = array(

            'first_name' => $_POST["first_name"],
            'second_name' => $_POST["second_name"],
            'occupation' => $_POST["occupation"],
            'email' => $_POST["email"],
            'contact' => $_POST["contact"],
            'address' => $_POST["address"],
            'description' => $_POST["description"],

        );
        $dbcon->insertdata("cases", $data);
        if ($dbcon) {
            $_SESSION["error message"] = "successfully submitted.....";
            header("location:../index.php");
        }
    }
    ?>
</div>
</body>
</html>