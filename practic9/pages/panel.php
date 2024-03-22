<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../styles/panel.css">
</head>
<body>
    <?php 
        require('../components/header.php');
        require('../scripts/bd.php');
        session_start();
    ?>
    <div class="main-content">
    <form action="../scripts/forPanel.php" method="post">
            <label for="img">Выберите изображение для товара</label>
            <input type="file" id="img" name="img">
            <input type="text" name="name" placeholder="Введите название товара">
            <input type="number" name="price" placeholder="Введите цену товара">
            <input type="submit" value="Добавить товар" name="add" value="add">
        </form>
        <form action="" method="post">
            <input type="submit" name="del" value="Удалить товары">
        </form>
        <h2 class="info">
            <?php if(isset($_SESSION['info'])) {
                    echo $_SESSION['info'];
                    unset($_SESSION['info']);
                } 
                
                ?>
                </h2>
        <div class="panel">
            <?php 
            $sql = "SELECT * FROM products";
            $result = mysqli_query($conn, $sql);

            while($row = mysqli_fetch_array($result)):
            
            ?>
            <div class="panel-item">
                <div class="img-item">
                    <img src="../images/<?php echo $row['Image'] ?>" alt="test">
                </div>
                <div class="info-item">
                    <div class="price">
                        <h3><?php echo $row['Price'] ?> руб.</h3>
                    </div>
                    <div class="name">
                        <h3><?php echo $row['Name'] ?></h3>
                    </div>
                </div>
                <?php if(isset($_POST['del'])): ?>
                <form action="../scripts/forPanel.php" method="post">
                    <input type="text" name="idProduct" value="<?php echo $row['id'] ?>" hidden>
                    <input type="submit" value="Удалить товар" name="toDelete">
                </form>
                <?php endif; ?>
            </div>
            <?php endwhile; ?>
        </div>
    </div>
</body>
</html>