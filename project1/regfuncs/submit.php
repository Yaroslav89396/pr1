<?php
include_once "readinit.php";
if (isset($_POST["reppassword"])) {
    if ($_POST["reppassword"] == $_POST["password"]) {
        if (mysqli_num_rows(mysqli_query($connect, "select * from user where Email = '$email'")) != 1) {
            $error = "";
            $password = hash('sha256', $_POST["password"]);
            $browser = $_SERVER['HTTP_USER_AGENT'];
            $ip = $_SERVER["REMOTE_ADDR"];
            $qwery = mysqli_query($connect, "insert into user (Ip, Pass, Name, Email, Browser) values ('$ip', '$password', '$name', '$email', '$browser')");

            header("location: main.php");
        } else {
            $error = "error: user with this email already exists";
        }
    } else {
        $error = "error: passwords did not match";
    }
}