<?php
session_start();

if (!isset($_SESSION['admin_name'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: adminlogin.php');
}
if (isset($_GET['adminlogout'])) {
    session_destroy();
    unset($_SESSION['admin_name']);
    header("location: login.php");
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="generator" content="Jekyll v4.0.1">
    <title>Mask Shop</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/starter-template/">

    <!-- Bootstrap core CSS -->
    <link href="../assets/dist/css/bootstrap.css" rel="stylesheet">

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>
    <link href="starter-template.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
    <a class="navbar-brand" href="#">Mask Shop</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="index3.php">Mask Shop</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="orders.php">Rendelések</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="users.php">Felhasználók</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="insert.php">Feltöltés</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="delete.php">Termék törlés</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="adminlogout.php">Kijelentkezés</a>
            </li>
        </ul>
    </div>
</nav>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script>window.jQuery || document.write('<script src="../assets/js/vendor/jquery.slim.min.js"><\/script>')</script><script src="../assets/dist/js/bootstrap.bundle.js"></script>

<div class="container">
    <h1 class="display-4">Üdvözöllek az admin felületen <?php echo $_SESSION['admin_name']?>!</h1>
</div>

<div class="container" style="max-width:1050px max-weight:200px align:center">
    <img class="mySlides" src="../pictures/egszerum.jpg" style="width:100% weight:50%">
    <img class="mySlides" src="../pictures/filterm.jpg" style="width:100% weight:50%">
    <img class="mySlides" src="../pictures/workmask.jpg" style="width:100% weight:50%">
    <img class="mySlides" src="../pictures/divingmask.jpg" style="width:100% weight:50%"><br><br>
</div>

<fieldset class="container">
    <legend>Elérhetőségeink:</legend>

    <p>E-mail: info@maskshop.hu</p>
    <p>Telefon: 021 69 19 387 / 069 1995 222</p>
    <p>Cím: Marka Oreškovića 16, Szabadka</p>
</fieldset>

<script>
    var myIndex = 0;
    carousel();

    function carousel() {
        var i;
        var x = document.getElementsByClassName("mySlides");
        for (i = 0; i < x.length; i++) {
            x[i].style.display = "none";
        }
        myIndex++;
        if (myIndex > x.length) {myIndex = 1}
        x[myIndex-1].style.display = "block";
        setTimeout(carousel, 2000); // Change image every 2 seconds
    }
</script>

<footer class="card-footer">
    <p>Copyright &copy Gajdos Roland 2020</p>
    <p>
        <a href="#">Back to top</a>
    </p>
</footer>
</body>
</html>
