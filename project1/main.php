<?php
    include_once 'mainlogic.php';
?>
<!doctype html>
<html lang="en">
<head>
    <link href = "Styles.css" rel = "stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body background="/images/background.jpg">
<form action = "" method="post">
    <input type="submit" value="Очистить переписку" name="delete">
</form>

<br>
<table class="big_block">
    <td > Почта </td>
    <td> Имя </td>
    <td > Сообщение </td>
    <td> Файл </td>
    <?php
    foreach (array_reverse($exit) as $item) {
        echo $item;
    }
    ?>
</table>

<form style=" margin-left: 20%" action = "" method="post" enctype="multipart/form-data">
    <br>
    <br>
    <input type="text" size="120%"  name="message">
    <input type="submit" name="messagesub" value="отправить">
    <input type="submit" name="update" value="обновить">
    <input type="submit" name="updateuser" value="вывести все сообщения пользователя">
    <input type="text" name="user">
    <br>
    <input type = "submit" name="sortByUserNameAsc" value="вывести сообщения отсортированные по имени пользователя">
    <input type = "submit" name = "sortByUserNameDesk" value="вывести сообщения отсортированные по имени пользователя в обратном порядке">
    <br>
    <input type = "submit" name="sortByEmailAsc" value="вывести сообщения отсортированные по почте пользователя">
    <input type = "submit" name="sortByEmailDesk" value="вывести сообщения отсортированные по почте пользователя в обратном порядке">
    <br>
    <br>
    <input type="file" value="Выбрать файл" name="chooseButton">
    <input type="submit" value="Отправить файл" name="confButton">
    <br>
    <br>
    <input type="submit" name="nextPage" value="<">
    <label> <?php echo $_SESSION['page']?></label>
    <input type = "submit" name ="prevPage" value=">">
</form>
<br>
</body>
</html>