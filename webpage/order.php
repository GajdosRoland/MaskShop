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
require('db_config.php');
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
<!--    <script src="../js/validator.js"></script>-->

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
            <li class="nav-item">
                <a class="nav-link" href="index2.php">Mask Shop</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="products2.php">Termékeink</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="order.php">Rendelés</a>
            </li>
            <li class="nav-item">
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
<script src="../js/validator.js"></script>

<div class="container">
    <h1 class="display-4" align="center">Rendeljen tőlünk!</h1><br><br>
</div>

<?php
require('orderf.php');

$array = array();
$sql = "SELECT * FROM masks ";
$result = mysqli_query($connection, $sql) or die(mysqli_error($connection));
if(mysqli_num_rows($result)>0){
    while($record = mysqli_fetch_array($result)){
        array_push($array, $record['name']);
    }
}
?>

<form id="form" method="post" action="order.php">
    <div class="container">
        <label>Válassza ki a maszkot: </label><br>
        <label><?php writeDropDown($array)?></label><br>

        <div>
            <label for="piece">Mennyiség</label><br>
            <select name="piece" id="piece">
                <?php
                for ($i=1; $i<=50; $i++)
                {
                    ?>
                    <option name="piece" id="piece" value="<?php echo $i;?>"><?php echo $i;?></option>
                    <?php
                }
                ?>
            </select>
        </div>

        <div>
            <label for="city">Város</label><br>
            <input type="text" name="city" id="city"><span id="city_error" class="error"></span><br>
        </div>

        <div>
            <label for="street">Utca</label><br>
            <input type="text" name="street" id="street"><span id="street_error" class="error"></span><br>
        </div>

        <div>
            <label for="house_number">Házszám</label><br>
            <input type="text" name="house_number" id="house_number"><span id="hsn_error" class="error"></span><br>
        </div>

        <div>
            <label for="phone">Telefonszám</label><br>
            <input type="text" name="phone" id="phone"><span id="phone_error" class="error"></span><br>
        </div>

        <div>
            <label for="email">Email</label><br>
            <input type="text" name="email" id="email"><span id="email_error" class="error"></span><br><br>
        </div>

        <div>
            <input type="submit" class="btn btn-primary" id="form" name="order" value="Rendel">   <input type="reset" value="Mégse" class="btn btn-primary"><br><br>
        </div>

    </div>
</form>

<?php

if(isset($_POST['choose']))
{
    $choose=$_POST['choose'];
}
if(isset($_POST['piece']))
{
    $piece=$_POST['piece'];
}
if(isset($_POST['city']))
{
    $city=$_POST['city'];
}
if(isset($_POST['street']))
{
    $street=$_POST['street'];
}
if(isset($_POST['house_number']))
{
    $house_number=$_POST['house_number'];
}
if(isset($_POST['phone']))
{
    $phone=$_POST['phone'];
}
if(isset($_POST['email']))
{
    $email=$_POST['email'];
}

if(!empty($choose)&&!empty($piece)&&!empty($city)&&!empty($street)&&!empty($house_number)&&!empty($phone)&&!empty($email)){
    $sql = "INSERT INTO orders(name,piece,city,street,house_number,phone,email) VALUES('$choose','$piece','$city','$street','$house_number','$phone','$email')";

    $result = mysqli_query($connection, $sql) or die(mysqli_error($connection));

//    if(mysqli_affected_rows($connection)>0){
//
//        header("Location:order.php");
//        exit();
//    }


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
