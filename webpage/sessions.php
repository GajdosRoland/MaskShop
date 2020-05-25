<?php
define("HOST", "localhost");
define("USER", "root");
define("PASSWORD", ""); // ""
define("DATABASE", "masks"); //

$connection = mysqli_connect(HOST, USER, PASSWORD, DATABASE);
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

mysqli_query($connection, "SET NAMES utf8") or die (mysqli_error($connection));
mysqli_query($connection, "SET CHARACTER SET utf8") or die (mysqli_error($connection));
mysqli_query($connection, "SET COLLATION_CONNECTION='utf8_general_ci'") or die (mysqli_error($connection));

session_start();

$username = "";
$email    = "";
$errors = array();

if (isset($_POST['signin'])) {
    // receive all input values from the form
    $username = mysqli_real_escape_string($connection, $_POST['username']);
    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $password_1 = mysqli_real_escape_string($connection, $_POST['password']);

    // form validation: ensure that the form is correctly filled ...
    // by adding (array_push()) corresponding error unto $errors array
    if (empty($username)) { array_push($errors, "Username is required"); }
    if (empty($email)) { array_push($errors, "Email is required"); }
    if (empty($password_1)) { array_push($errors, "Password is required"); }

    // first check the database to make sure
    // a user does not already exist with the same username and/or email
    $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
    $result = mysqli_query($connection, $user_check_query);
    $user = mysqli_fetch_assoc($result);

    if ($user) { // if user exists
        if ($user['username'] === $username) {
            array_push($errors, "Username already exists");
        }

        if ($user['email'] === $email) {
            array_push($errors, "email already exists");
        }
    }

    // Finally, register user if there are no errors in the form
    if (count($errors) == 0) {
        $password = md5($password_1);//encrypt the password before saving in the database

        $query = "INSERT INTO users (username, email, password)
  			  VALUES('$username', '$email', '$password')";
        mysqli_query($connection, $query);
        $_SESSION['username'] = $username;
        $_SESSION['success'] = "You are now logged in";
        header('location: index2.php');
    }
}

if (isset($_POST['login_user'])) {
    $username = mysqli_real_escape_string($connection, $_POST['username']);
    $password = mysqli_real_escape_string($connection, $_POST['password']);

    if (empty($username)) {
        array_push($errors, "Username is required");
    }
    if (empty($password)) {
        array_push($errors, "Password is required");
    }

    if (count($errors) == 0) {
        $password = md5($password);
        $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
        $results = mysqli_query($connection, $query);
        if (mysqli_num_rows($results) == 1) {
            $_SESSION['username'] = $username;
            $_SESSION['success'] = "You are now logged in";
            header('location: index2.php');
        }else {
            array_push($errors, "Wrong username/password combination");
        }
    }
}

if (isset($_POST['login_admin'])) {
    $username = mysqli_real_escape_string($connection, $_POST['admin_name']);
    $password = mysqli_real_escape_string($connection, $_POST['pw']);

    if (empty($username)) {
        array_push($errors, "Username is required");
    }
    if (empty($password)) {
        array_push($errors, "Password is required");
    }

    if (count($errors) == 0) {
        $password = md5($password);
        $query = "SELECT * FROM admin WHERE admin_name='$username' AND pw='$password'";
        $results = mysqli_query($connection, $query);
        if (mysqli_num_rows($results) == 1) {
            $_SESSION['admin_name'] = $username;
            $_SESSION['success'] = "You are now logged in";
            header('location: index3.php');
        }else {
            array_push($errors, "Wrong username/password combination");
        }
    }
}