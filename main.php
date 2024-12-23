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
    <?php
    foreach (array_reverse($exit) as $item) {
        echo $item;
    }
    ?>
</table>

<form action = "" method="post" enctype="multipart/form-data">
    <input type="text" size="120%" style=" margin-left: 20%" name="message">
    <input type="submit" name="messagesub" value="отправить">
    <input type="submit" name="update" value="обновить">
    <input style="margin-left: 20%" type="submit" name="updateuser" value="вывести все сообщения пользователя">
    <input type="text" name="user">
</form>
</body>
</html>