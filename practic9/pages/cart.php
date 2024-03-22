<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../styles/cart.css">
</head>
<body>
<div class="bg"></div>
    <?php 
        require('../components/header.php');
        require('../scripts/bd.php');
        session_start();
        $idUser = $_SESSION['idUser'];
    ?>
    <div class="main-content">
        <form action="../scripts/accept.php" class="order" method="post">
            <input type="submit" value="Оформить заказ" name="ordering">
        </form>
    <div class="cart 
    <?php 
    $check = "SELECT * FROM cart inner join products on cart.idProduct = products.id where idUser = $idUser";
    $result2 = $conn->query($check);
    $numrows = mysqli_num_rows($result2);
    if($numrows > 0) {
        echo "notNull";
    } else {
        echo "null";
    }
    ?>"
    >
            <?php 
            $sql = "SELECT * FROM cart inner join products on cart.idProduct = products.id where idUser = $idUser";
            $result = $conn->query($sql);
            while($row = mysqli_fetch_assoc($result)):
            ?>
            <div class="cart-item">
                <div class="image">
                    <img src="../images/<?php echo $row['Image'] ?>" alt="картинка">
                    <div class="info">
                        <div class="price">
                            <h3><?php echo $row['Price'] ?></h3>
                        </div>
                        <div class="name">
                            <h3><?php echo $row['Name'] ?></h3>
                        </div>
                        <div class="count">
                            <h3>x <?php echo $row['count'] ?></h3>
                        </div>
                    </div>
                </div>
                <form action="../scripts/deleteCart.php" method="post">
                    <input type="text" name="idItem" value="<?php echo $row['id'] ?>" hidden>
                    <button class="add" name="deleteFromCart">
                        Удалить из корзины
                    </button>
                </form>
                   
            </div>
            <?php endwhile;?>
        </div>
    </div>
</body>
</html>