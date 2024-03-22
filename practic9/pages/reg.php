<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../styles/forms.css">
</head>
<body>
    <div class="bg"></div>
    <?php 
        require('../components/header.php');
        require('../scripts/bd.php');
        session_start();
    ?>
    <div class="main-content">
        <form action="../scripts/register.php" class="reg" method="post">
        <h1>Форма регистрации</h1>
            <input type="text" placeholder="Введите имя" name="nameU">
            <input type="text" placeholder="Введите фамилию" name="famU">
            <input type="text" placeholder="Введите номер телефона" name="numberP">
            <input type="email" placeholder="Введите почту" name="email">
            <input type="text" placeholder="Введите логин" name="login">
            <input type="password" placeholder="Введите пароль" name="password">
            <input type="password" placeholder="Повторите пароль" name="passwordConf">
            <input type="submit" value="Зарегистрироваться"> 
        </form>
    </div>
</body>
</html>