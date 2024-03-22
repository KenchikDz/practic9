<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../styles/profile.css">
</head>
<body>
    <?php 
        require('../components/header.php');
        require('../scripts/bd.php');
        session_start();
        $idUser = $_SESSION['idUser'];
    ?>
    <div class="main-content">
        <div class="profile">
            <div class="info">
                <?php
                $sql = "SELECT * FROM users where id = $idUser";
                $result = mysqli_query($conn, $sql);
                $row = mysqli_fetch_array($result);
                ?>
                <div class="name">
                   <h1><?php echo $row['Name'] ?></h1> 
                </div>
                <div class="LName">
                    <h1><?php echo $row['SecondName'] ?></h1> 
                </div>
                <div class="login">
                    <h1><?php echo $row['login'] ?></h1>
                </div>
                <div class="password">
                    <h1><?php echo $row['password'] ?></h1>
                </div>
                <form action="../scripts/logout.php">
                    <button type="submit">
                        Выйти
                    </button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>