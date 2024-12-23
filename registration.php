<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link href = "Styles.css" rel = "stylesheet">
    <?php
    require "readinit.php"
    ?>
</head>
<body background="/images/background.jpg">
<div class = "block" >
    <p class="centre_text" style="font-size: 18pt; margin-bottom: 12pt; margin-top: 12pt">Регистрация</p>
    <form action = "" method="post" class = "centre_text" style="margin-bottom: 100pt">
        <br>
        <label>Имя пользователя</label><br>
        <input style="margin-top: 2%; margin-bottom: 2%" type="text" name = "name">
        <br>
        <label>Электронная почта</label>
        <br>
        <input style="margin-bottom: 2%" type="text" name = "email">
        <br>
        <label>Пароль</label><br>
        <input type="password" style="margin-bottom: 2%" name = "password">
        <br>
        <label>Повторите введеный пароль</label><br>
        <input style="margin-bottom: 2%" type="password" name = "reppassword">
        <br>
        <input style="margin-top: 2%; margin-bottom: 2%" type="submit" name="submit">
        <br>
        <a href = "index.php" style="margin-top: 10px; color: rgba(131,56,36,0.93)">Вернуться на окно входа</a>
        <br>
        <label> <?= $error ?> </label>
    </form>
</div>
</body>
</html