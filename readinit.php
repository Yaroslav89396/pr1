<?php
$connect = mysqli_connect("localhost: 3307", "root", "1111", "new_schema");

$error = "";
$email = "";
$password = "";
$name = "";
$browser = "";

if (isset($_POST["submit"]) ) {
    if (isset($_POST["email"]) && $_POST["email"] != "" && $_POST["password"] != "" && isset($_POST["password"]) && isset($_POST["name"])) {
        session_start();
        $name = $_POST["name"];
        $_SESSION["user"] = $name;
        $email = $_POST["email"];
        $_SESSION["email"] = $email;
        if (preg_match('/\w+@\w+\.\w+/', $email)) {
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
            } else {
                $password = hash('sha256', $_POST["password"]);
                if (mysqli_num_rows(mysqli_query($connect, "select * from user where Email = '$email' and Name = '$name' and Pass = '$password'")) == 1) {
                    $error = "";
                    header("location: main.php");
                } else {
                    $error = "error: something went wrong";
                }
            }
        }

        else {
            $error = "error: wrong email";
        }
    }
    else {
        $error = "error: fields are empty";
    }
}

