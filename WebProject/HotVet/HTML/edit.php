<?php
try {
    $db = new mysqli('localhost', 'root', '', 'hotvet');
    session_start();

    $userID = 3;
    $cartID = $_SESSION['cartID'];

//    if (!isset($_SESSION['active']) or empty($_SESSION['active']))
//        $_SESSION['active'] = 0;
}catch (Exception $e){
    echo "No data base";
}
?>
<?php
//if(isset($_POST['chang']) and isset($_POST['First']) and isset($_POST['Last']) and isset($_POST['Address']) and isset($_POST['phone'])
//    and isset($_POST['Email']) ) {
//
//    $first = $_POST['First'];
//    $final = $_POST['Last'];
//    $addres = $_POST['Address'];
//    $phon = $_POST['phone'];
//    $email = $_POST['Email'];
//
//
//    $sql1 = "UPDATE `user` SET  `fname`='".$first."' ,`lname`='".$final."',`Address`='".$addres."',`email`='".$email."'
//    ,`phone` = '".$phon."'  WHERE  `userID` = ".$userID." ;";
//
//    if ($db->query($sql1) == TRUE) {
//        require "Notification.php";
//        $Box = new msgBox();
//        $Box->title="SUCCESS!";
//        $Box->massage="You've updated your field successfully";
//        $Box->color="green";
//        $Box -> display();
//    } else {
//        require "Notification.php";
//        $Box = new msgBox();
//        $Box->title="ERROR!";
//        $Box->massage="sql query error";
//        $Box->color="#f44336";
//        $Box -> display();
//
//    }
//}
//elseif((empty($_POST['First']) or empty($_POST['Last']) or empty($_POST['Address'])  or empty($_POST['phone'])
//        or empty($_POST['Email']) ) and isset($_POST['chang']) ){
//
//    require "Notification.php";
//    $Box = new msgBox();
//    $Box->title="ERROR!";
//    $Box->massage="You've to fill all the field";
//    $Box->color="#f44336";
//    $Box -> display();
//}
//
//?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <!-- css page -->
    <link rel="stylesheet" href="../CSS/LightTemplate.css" id="template">
    <link rel="stylesheet" href="../CSS/ProfileLight.css" id="cssPage">
    <!-- script pages-->
    <script src="../JavaScript/Appointment.js"></script>
    <!-- jquery ui -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <!-- tab header-->
    <title>Hot Vet</title>
    <link rel="icon" type="image/*" href="../Images/HotVetLogo.png">
    <script>
        let flag = true;
        let pos = 0;
        $(document).ready(
            function (){
                $('#draggable').draggable({axis: 'y', containment: "#containment", snap: true});}
        );

        function loadMode(){
            let theme = localStorage.getItem("theme");
            if (theme && theme === "dark-mode") {
                document.getElementById("template").setAttribute("href","../CSS/DarkTemplate.css");
                document.getElementById("cssPage").setAttribute("href", "../CSS/ProfileDark.css");
            } else {
                document.getElementById("template").setAttribute("href","../CSS/LightTemplate.css");
                document.getElementById("cssPage").setAttribute("href", "../CSS/ProfileLight.css");
            }
        }
        function swapStyleSheet() {
            let element = document.body;
            element.classList.toggle("dark-mode");

            let theme = localStorage.getItem("theme");
            if (theme && theme === "dark-mode") {
                localStorage.setItem("theme", "light-mode");
                document.getElementById("template").setAttribute("href","../CSS/LightTemplate.css");
                document.getElementById("cssPage").setAttribute("href", "../CSS/ProfileLight.css");
            } else {
                localStorage.setItem("theme", "dark-mode");
                document.getElementById("template").setAttribute("href", "../CSS/DarkTemplate.css");
                document.getElementById("cssPage").setAttribute("href", "../CSS/ProfileDark.css");
            }
        }


    </script>
    <style>
        .theme{position: absolute;margin-top:30px; margin-bottom:150px;}
        #brightness{position: absolute; z-index: 16;margin-top:20px;}
    </style>
</head>

<body onload="loadMode()">

<!--navbar-->
<nav class="navbar navbar-expand-lg fixed-top navbar-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <table>
                <tr>
                    <td>
                        <img src="../Images/HotVetLogo.png" class="d-inline-block align-top" id="topLogo" alt="Logo">
                    </td>
                    <td>
                        <h1><span id="hotId">Hot</span> <span id="vetId">Vet</span></h1>
                    </td>
                </tr>
            </table>
        </a>
        <!--        button that appear when collapse-->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#nvbCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse " id="nvbCollapse">
            <ul class="navbar-nav  ms-auto">
                <li class="nav-item ms-auto">
                    <a class="nav-link" href="../html/home.php">Home</a>
                </li>
                <li class="nav-item ms-auto" >
                    <a class="nav-link" href="../html/Pets.php">Pets</a>
                </li>
                <li class="nav-item ms-auto" >
                    <a class="nav-link" href="../html/shop.php">Shop</a>
                </li>
                <?php

                if ( $_SESSION['active']==1 ){
                    ?>
                    <li class="nav-item ms-auto" id="cartt">

                        <a class="nav-link cart position-relative d-inline-flex"
                           href="../html/cart.php">
                            <span class="cart-basket d-flex align-items-center justify-content-center"><?php echo $_SESSION['ncartitems']; ?></span>
                            <i class="fas fa fa-shopping-cart fa-lg" style="font-size:24px;"></i>
                        </a>
                    </li>
                    <li class="nav-item ms-auto" id="orderr">
                        <a class="nav-link" href="../html/order.php">Order</a>
                    </li>
                    <li class="nav-item ms-auto" id="appointmentt">
                        <a class="nav-link" href="../html/appointment.php">Appointments</a>
                    </li>

                    <li class="nav-item ms-auto">
                        <a class="nav-link" onclick="logout();" href="../html/home.php">Log out</a>
                    </li>
                    <li class="nav-item ms-auto" id="profilee">
                        <a class="nav-link" href="../html/Profile.php">Profile</a>
                    </li>
                    <?php
                }
                else {
                    ?>
                    <li class="nav-item ms-auto" >
                        <a class="nav-link" href="../html/Login.php">Log in</a>
                    </li>
                    <?php
                }
                ?>
            </ul>
        </div>
    </div>
</nav>
<!--navbar-->


<!---->
<?php
//$sql="select * from user where userID = ".$userID." ;";
//$re=mysqli_query($db,$sql);
//$row=mysqli_fetch_array($re);
//
//?>

<div id="draggable" class="ui-widget-content theme" onclick="swapStyleSheet();">
    <i id="brightness" class="bi bi-brightness-high-fill theme" style="font-size: 4rem;"></i>
</div>

<div  id="containment" class="container-fluid" style="margin-top: 100px; margin-bottom: 50px ">


<div class="row">

    <div class="col-4">
        <img class="img-fluid" src="../Images/setting.png" alt="" >
    </div>
    <div class="col">
        <div class="row">
            <span id="appId">My employees </span>
        </div>
        <div class="row d-flex justify-content-center table-wrapper">
            <table class="content-table ">
                <thead>
                <tr><th>Id</th><th> Name</th><th>Phone</th><th>specialty</th><th>salary</th><th>Add</th><th>Delete</th></tr>
                </thead>
                <tbody>
                <tr>
                    <td>1</td>
                    <td>Mayar</td>
                    <td>597788026</td>
                    <td>Veterinary Professionals</td>
                    <td>22500</td>
                    <td><button class="btn-success"><i class="bi bi-check-circle"></i></button></td>
                    <td><button class="btn-danger small"><i class="bi bi-dash-circle"></i></button></td>
                </tr>
                </tbody>
            </table>
        </div>

    </div>
</div>
</div>
</div>
    </div>


<!--footer-->
<footer class="footerClass">
    <!-- Grid container -->
    <div class="container p-4 pb-0">

        <div class="row">

            <div class="col">
                <!-- Copyright -->
                <div class="text-center p-3" >
                    <span class="text" href="#">Hot Vet website using: <br> bootstrap, HTM, CSS, JS, PHP </span>
                </div>
                <!-- Copyright -->
            </div>

            <div class="col">
                <!-- Copyright -->
                <div class="text-center p-3" >
                    © 2022 Copyright:
                    <span class="text" href="#">Mayar and Jenan</span>
                </div>
                <!-- Copyright -->
            </div>

            <div class="col">
                Contact us
                <!-- Section: Social media -->
                <div class="mb-4">
                    <!-- Facebook -->
                    <a class="btn " href="https://www.facebook.com/HOT-VET-100625291447867" target="_blank" role="button">
                        <i class="bi bi-facebook"></i>
                    </a>
                    <!-- Gmail -->
                    <a class="btn" href="mailto:mayarabdilkareem1@gmail.com" target="_blank" role="button">
                        <i class="bi bi-envelope-fill"></i>
                    </a>
                    <!-- Google -->
                    <a class="btn btn-floating m-1" href="https://en.wikipedia.org/wiki/Animal" ratget="_blank" role="button">
                        <i class="bi bi-google"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>

</footer>
<!--footer-->





</body>
</html>