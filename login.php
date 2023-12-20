<?php
session_start();

$con = mysqli_connect("localhost", "root", "", "web_ikmal");

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = mysqli_query($con, "SELECT * FROM login WHERE email = '$email' AND password = '$password'");
    
    if (mysqli_num_rows($query) > 0) {
        $data = mysqli_fetch_assoc($query);

        $_SESSION['user'] = [
            'email' => $data['email']
        ];

        header("Location: home.php");
    } else {
        header("Location: login.html");
    }
}