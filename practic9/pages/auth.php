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
        <form action="../scripts/authing.php" class="auth" method="post">
        <h1>Форма авторизации</h1>
            <input type="text" placeholder="Введите логин" name="login" required>
            <input type="password" placeholder="Введите пароль" name="password" required>
            <select name="role" id="" required>
                <option value="" disabled selected>Выберите роль для входа</option>
                <option value="1">Администратор</option>
                <option value="2">Клиент</option>
            </select>
            <input type="submit" value="Авторизоваться">
        </form>
    </div>
</body>
</html>