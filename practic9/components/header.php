<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php 
    session_start();
            if(basename($_SERVER['PHP_SELF']) == 'index.php') { 
                echo '<link rel="stylesheet" href="styles/style.css">';
                echo '<link rel="stylesheet" href="styles/header.css">';
            } else {
                echo '<link rel="stylesheet" href="../styles/style.css">';
                echo  '<link rel="stylesheet" href="../styles/header.css">';
            }

    ?>
</head>
<body>
    <?php 
    
    ?>
    <header>
        <div class="logo">
            <?php
            if(basename($_SERVER['PHP_SELF']) == 'index.php') { 
                echo '<a href="index.php"><img src="images/logo.svg" alt=""></a>';
            } else {
                echo '<a href="../index.php"><img src="../images/logo.svg" alt=""></a>';
            }
            ?>
        </div>
        <div class="nav">
            <?php 

            if(!isset($_SESSION['isAuth'])) {
                if(basename($_SERVER['PHP_SELF']) == 'index.php') { 
                    echo '<a href="pages/auth.php">Вход</a>';
                    echo '<a href="pages/reg.php">Регистрация</a>';
                } else {
                    echo '<a href="auth.php">Вход</a>';
                    echo '<a href="reg.php">Регистрация</a>';
                }
            } else {
                if(isset($_SESSION['isAdmin'])) {
                    if(basename($_SERVER['PHP_SELF']) == 'index.php') {
                        echo '<a href="index.php">Главная страница</a>';
                        echo '<a href="pages/panel.php">Панель администратора</a>';
                        echo '<a href="scripts/logout.php">Выход</a>';
                        }
                         else {
                        echo '<a href="../index.php">Главная страница</a>';
                        echo '<a href="panel.php">Панель администратора</a>';
                        echo '<a href="../scripts/logout.php">Выход</a>';
                        }
                } else {
                    if(basename($_SERVER['PHP_SELF']) == 'index.php') {
                        echo '<a href="index.php">Главная страница</a>';
                        echo '<a href="pages/orders.php">Мои заказы</a>';
                        echo '<a href="pages/catalog.php">Каталог</a>';
                        echo '<a href="pages/cart.php">Корзина</a>';
                        echo '<a href="pages/profile.php">Профиль</a>';
                        echo '<a href="scripts/logout.php">Выход</a>';
                        }
                         else {
                        echo '<a href="../index.php">Главная страница</a>';
                        echo '<a href="orders.php">Мои заказы</a>';
                        echo '<a href="catalog.php">Каталог</a>';
                        echo '<a href="cart.php">Корзина</a>';
                        echo '<a href="profile.php">Профиль</a>';
                        echo '<a href="../scripts/logout.php">Выход</a>';
                        }
                }
               
            }
            ?>
        </div>
    </header>
</body>
</html>