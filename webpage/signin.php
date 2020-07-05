<?php include('sessions.php') ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="generator" content="Jekyll v4.0.1">
    <title>Mask Shop</title>

<!--    <script src="../js/script.js"></script>-->

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
                <a class="nav-link" href="index.php">Mask Shop</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="products.php">Termékeink</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="history.php">Maszkok története</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="login.php">Bejelentkezés</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="signin.php">Regisztráció</a>
            </li>
        </ul>
    </div>
</nav>

<form id="reg_form" action="signin.php" method="post">
    <?php include('errors.php'); ?>
    <div class="container">
        <h1 class="display-4">Regisztráció</h1><br>
        <div>
            <label for="username">Felhasználónév</label><br>
            <input type="text" name="username" id="username"><span id="username_error" class="error"></span><br>
        </div>
        <div>
            <label for="email">Email</label><br>
            <input type="text" name="email" id="email"><span id="email_error" class="error"></span><br>
        </div>
        <div>
            <label for="password">Jelszó</label><br>
            <input type="password" name="password" id="password"><span id="password_error" class="error"></span><br><br>
        </div>
        <div>
            <input type="submit" class="btn btn-primary" name="signin" value="Regisztrálok">   <input type="reset" value="Mégse" class="btn btn-primary"><br><br>
        </div>
        <p>
            Már tag? <a href="login.php">Bejelentkezés</a><br><br><br><br><br><br>
        </p>
    </div>
</form>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script>window.jQuery || document.write('<script src="../assets/js/vendor/jquery.slim.min.js"><\/script>')</script><script src="../assets/dist/js/bootstrap.bundle.js"></script>
<!--<script src="../js/script.js"></script>-->
<footer class="card-footer">
    <p>Copyright &copy Gajdos Roland 2020</p>
    <p>
        <a href="#">Back to top</a>
    </p>
</footer>
</body>
</html>
