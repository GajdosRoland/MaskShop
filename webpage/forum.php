<?php
session_start();

if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
}
if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
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
    <link href="../assets/style.css" rel="stylesheet">

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
            <li class="nav-item">
                <a class="nav-link" href="index2.php">Mask Shop</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="products2.php">Termékeink</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="order.php">Rendelés</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="forum.php">Kibeszélő</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="logut.php">Kijelentkezés</a>
            </li>
        </ul>
    </div>
</nav>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script>window.jQuery || document.write('<script src="../assets/js/vendor/jquery.slim.min.js"><\/script>')</script><script src="../assets/dist/js/bootstrap.bundle.js"></script>

<div class="container">
    <h2 class="display-4" align="center">Írja meg véleményét az oldalunkról.</h2><br>
</div>



<?php
include("db_config.php");
$sql = "SELECT * FROM forum ORDER BY id DESC";

$result = mysqli_query($connection, $sql) or die(mysqli_error($connection));
if (mysqli_num_rows($result)>0)
{

    while ($record = mysqli_fetch_array($result)) {
        echo"
              <table width=\"500px\" cellspacing=\"0\" align=\"center\" border=\"3\">

    <tr>
        <th>$record[comment]</th><br>
    </tr>

</table><br>";

    }
}
?>

<form action="forum.php" method="post">
    <div class="container">
        <br><div><h3>Hozzászólás írása</h3></div><div><h4><textarea name="comment"></textarea></h4></div>
        <div><input type="submit" value="Hozzászólás" class="btn btn-primary" name="send">   <input type="reset" value="Mégse" class="btn btn-primary"></div>
    </div>
</form>

<?php

if(isset($_POST['comment']))
{
    $comment=$_POST['comment'];
}


if(!empty($comment)){

    $sql = "INSERT INTO forum(comment) VALUES('$comment')";

    $result = mysqli_query($connection, $sql) or die(mysqli_error($connection));

    if(mysqli_affected_rows($connection)>0){

        header("Location:index2.php");
        exit();
    }

    else
        echo "Sikertelen feltöltés!";

    mysqli_close($connection);

}
?>

<footer class="card-footer">
    <p>Copyright &copy Gajdos Roland 2020</p>
    <p>
        <a href="#">Back to top</a>
    </p>
</footer>
</body>
</html>
