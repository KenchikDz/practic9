<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles/index.css">
</head>
<body>
    <?php 
        require('components/header.php');
        require('scripts/bd.php');
    ?>
    <div class="main-content">
        <div class="top-items">
        <?php 
        $sql = "SELECT * FROM products order by rand() limit 3";
        $result = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_assoc($result)):
        ?>
            <div class="top-item">
                <div class="image">
                    <img src="images/<?php echo $row['Image'] ?>" alt="картинка">
                    <div class="info">
                        <div class="price">
                            <h3><?php echo $row['Price'] ?></h3>
                        </div>
                        <div class="name">
                            <h3><?php echo $row['Name'] ?></h3>
                        </div>
                    </div>
                </div>
            </div>
        <?php 
        endwhile;
        ?>
        </div>
    </div>
</body>
</html>