<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../styles/orders.css">
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
        <div class="orders">
            <?php
            $sql = "SELECT * FROM orders where idUser = $idUser";
            $result = mysqli_query($conn, $sql);
            while($row = mysqli_fetch_assoc($result)):
                $orderId = $row['id'];
            ?>
            <div class="order-item">
                <div class="code">
                    <?php echo $row['code'] ?>
                </div>
                <div class="order-items">
                    <?php
                    $sql2 = "SELECT * FROM itemsOrder inner join products on itemsOrder.idProduct = products.id where idOrder = $orderId";
                    $result2 = mysqli_query($conn, $sql2);
                    while($row2 = mysqli_fetch_assoc($result2)):
                    ?>
                    <p><?php echo $row2['Name'] . ' X ' . $row2['count'] ?></p>
                    <?php endwhile; ?>
                </div>

                <div class="price">
                <?php 
                        $sum = "SELECT sum(Price * count) as allSum FROM `itemsOrder` inner JOIN products on itemsOrder.idProduct = products.id where idOrder = $orderId";
                        $result2 = mysqli_query($conn, $sum); 
                        while($row2 = mysqli_fetch_assoc($result2)) {
                            echo 'Сумма заказа: ' . $row2['allSum'] . ' ' . 'руб.';
                        }
                        
                        ?>
                </div>
            </div>
            <?php 
        endwhile; ?>            
        </div>
    </div>
</body>
</html>