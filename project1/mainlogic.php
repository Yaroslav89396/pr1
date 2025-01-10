<?php
session_start();
$connect = mysqli_connect("localhost: 3307", "root", "1111", "new_schema");
$exit = [];
$name = $_SESSION['user'];
$email = $_SESSION['email'];
$max_pos = mysqli_fetch_assoc(mysqli_query($connect, "SELECT Id FROM message order by Id desc limit 1"))["Id"] - 25 * ($_SESSION["page"] - 1);
$min_pos = $max_pos - 25;
$_SESSION["page"];
$page = $_SESSION["page"];

if (isset($_POST['nextPage']))
{
    $_SESSION["page"] -= 1;
}
if (isset($_POST['prevPage']))
{
    $_SESSION["page"] += 1;
}

if (isset($_POST['messagesub']))
{
    $message = $_POST['message'];
    $ip = $_SERVER['REMOTE_ADDR'];
    $browser = $_SERVER['HTTP_USER_AGENT'];
    $query = mysqli_query($connect, "insert into message (Text, Name, Email, Browser) values ('$message', '$name', '$email', '$browser')");
    $query = mysqli_query($connect, "select Text, Name, Email, File from message  where Id between $min_pos and $max_pos");
    while($row = mysqli_fetch_array($query)) {
        array_push($exit, "<tr><td>".$row['Email']."<td>".$row['Name']."</td>"."<td>".$row['Text']."</td>"."<td>".$row['File']."</td></tr>");
    }
}

if (isset($_POST['confButton']))
{
    $message = $_POST['message'];
    $ip = $_SERVER['REMOTE_ADDR'];
    $browser = $_SERVER['HTTP_USER_AGENT'];
    $file = null;
    if (isset($_FILES['chooseButton'])) {
        $file = $_FILES['chooseButton']['name'];
        move_uploaded_file($_FILES['chooseButton']['tmp_name'], "upload/".$file);
        $file = "<a href=upload/".$file.">".$file."</a>";
    }
    $query = mysqli_query($connect, "insert into message (Text, Name, Email, Browser, File) values ('$message', '$name', '$email', '$browser', '$file')");
    $query = mysqli_query($connect, "select Text, Name, Email, File from message  where Id between $min_pos and $max_pos");
    while($row = mysqli_fetch_array($query)) {
        array_push($exit, "<tr><td>".$row['Email']."<td>".$row['Name']."</td>"."<td>".$row['Text']."</td>"."<td>".$row['File']."</td></tr>");
    }
}

if (isset($_POST['update']))
{
    $user = $_SESSION['user'];
    $query = mysqli_query($connect, "select Text, Name, Email, File from message  where Id between $min_pos and $max_pos");
    while($row = mysqli_fetch_array($query)) {
        array_push($exit, "<tr><td>".$row['Email']."<td>".$row['Name']."</td>"."<td>".$row['Text']."</td>"."<td>".$row['File']."</td></tr>");
    }
}

if (isset($_POST['sortByUserNameAsc']))
{
    $query = mysqli_query($connect, "select Text, Name, Email, File from message  where Id between $min_pos and $max_pos");
    while($row = mysqli_fetch_array($query)) {
        array_push($exit, "<tr><td>".$row['Email']."<td>".$row['Name']."</td>"."<td>".$row['Text']."</td>"."<td>".$row['File']."</td></tr>");
    }
}

if (isset($_POST['sortByUserNameDesk']))
{
    $query = mysqli_query($connect, "select Text, Name, Email, File from message  where Id between $min_pos and $max_pos");
    while($row = mysqli_fetch_array($query)) {
        array_push($exit, "<tr><td>".$row['Email']."<td>".$row['Name']."</td>"."<td>".$row['Text']."</td>"."<td>".$row['File']."</td></tr>");
    }
    while($row = mysqli_fetch_array($query)) {
        array_push($exit, "<tr><td>".$row['Email']."<td>".$row['Name']."</td>"."<td>".$row['Text']."</td>"."<td>".$row['File']."</td></tr>");
    }
}

if (isset($_POST['sortByEmailDesk']))
{
    $query = mysqli_query($connect, "select Text, Name, Email, File from message  where Id between $min_pos and $max_pos");
    while($row = mysqli_fetch_array($query)) {
        array_push($exit, "<tr><td>".$row['Email']."<td>".$row['Name']."</td>"."<td>".$row['Text']."</td>"."<td>".$row['File']."</td></tr>");
    }
}

if (isset($_POST['sortByEmailAsc']))
{
    $query = mysqli_query($connect, "select Text, Name, Email, File from message  where Id between $min_pos and $max_pos");
    while($row = mysqli_fetch_array($query)) {
        array_push($exit, "<tr><td>".$row['Email']."<td>".$row['Name']."</td>"."<td>".$row['Text']."</td>"."<td>".$row['File']."</td></tr>");
    }
}

if (isset($_POST['delete']))
{
    $query = mysqli_query($connect, "delete from message");
}
if (isset($_POST['updateuser']) && isset($_POST['user'])) {
    $user = $_POST['user'];
    $query = mysqli_query($connect, "select Text, Name, Email, File from message where Name='$user'");
    while($row = mysqli_fetch_array($query)) {
        array_push($exit, "<tr><td>".$row['Email']."</td><td>".$row['Name']."</td>"."<td>".$row['Text']."</td>"."<td>".$row['File']."</td></tr>");
    }
    unset($_POST['update']);
}

