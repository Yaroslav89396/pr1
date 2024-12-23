<?php
session_start();
$connect = mysqli_connect("localhost: 3307", "root", "1111", "new_schema");
$exit = [];
$name = $_SESSION['user'];
$email = $_SESSION['email'];

if (isset($_POST['messagesub']))
{
    if ($_POST['message'] != "" ){
        $message = $_POST['message'];
        $ip = $_SERVER['REMOTE_ADDR'];
        $browser = $_SERVER['HTTP_USER_AGENT'];
        $query = mysqli_query($connect, "insert into message (Text, Name, Email, Browser) values ('$message', '$name', '$email', '$browser')");
        unset($_POST['message']);
    }
    $query = mysqli_query($connect, "select Text, Name, Email from message order by Id desc limit 25");
    while($row = mysqli_fetch_array($query)) {
        array_push($exit, "<tr><td>".$row['Email']."<td>".$row['Name']."</td>"."<td>".$row['Text']."</td></tr>");
    }
}
if (isset($_POST['update']))
{
    $query = mysqli_query($connect, "select Text, Name, Email from message order by Id desc limit 25");
    while($row = mysqli_fetch_array($query)) {
        array_push($exit, "<tr><td>".$row['Email']."</td><td>".$row['Name']."</td>"."<td>".$row['Text']."</td></tr>");
    }
    unset($_POST['update']);
}
if (isset($_POST['delete']))
{
    $query = mysqli_query($connect, "delete from message");
}
if (isset($_POST['updateuser']) && isset($_POST['user'])) {
    $user = $_POST['user'];
    echo $user;
    $query = mysqli_query($connect, "select Text, Name, Email from message where Name='$user'");
    while($row = mysqli_fetch_array($query)) {
        array_push($exit, "<tr><td>".$row['Email']."</td><td>".$row['Name']."</td>"."<td>".$row['Text']."</td></tr>");
    }
    unset($_POST['update']);
}
