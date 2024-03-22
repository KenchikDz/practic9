<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../styles/catalog.css">
</head>
<body>
<div class="bg"></div>
    <?php 
        require('../components/header.php');
        require('../scripts/bd.php');
        session_start();
    ?>
    <div class="main-content">
        
        <div class="catalog">
            <?php 
            $sql = "SELECT * FROM products";
            $result = $conn->query($sql);
            while($row = mysqli_fetch_assoc($result)):
            ?>
            <div class="catalog-item">
                <div class="image">
                    <img src="../images/<?php echo $row['Image'] ?>" alt="картинка">
                    <div class="info">
                        <div class="price">
                            <h3><?php echo $row['Price'] ?></h3>
                        </div>
                        <div class="name">
                            <h3><?php echo $row['Name'] ?></h3>
                        </div>
                    </div>
                </div>
                <form action="../scripts/addTo.php" method="post">
                    <input type="text" name="idItem" value="<?php echo $row['id'] ?>" hidden>
                    <button class="add" name="addToCart">
                        Добавить в корзину
                    </button>
                </form>
                   
            </div>
            <?php endwhile;?>
        </div>
    </div>
</body>
</html>