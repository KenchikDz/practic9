<?php 
session_start();
require('bd.php');
if(isset($_POST['deleteFromCart'])) {
    $idDelete = $_POST['idItem'];

    $select = "SELECT * FROM cart WHERE idProduct = $idDelete";
    $result2 = mysqli_query($conn, $select);
    
    if($result2) {
        $numrows = mysqli_num_rows($result2);
    
        if($numrows > 0) {
            $row = mysqli_fetch_assoc($result2);
            if($row['count'] == 1) {
                $delete = "DELETE FROM cart WHERE idProduct = $idDelete";
                $result3 = mysqli_query($conn, $delete);
            } else {
                $update = "UPDATE cart SET count = count - 1 WHERE idProduct = $idDelete";
                $result3 = mysqli_query($conn, $update);
            }
    
            if($result3) {
                header("Location: ../pages/cart.php");
            } else {
                echo "Товар не удален";
            }
        } else {
            echo "Товар не найден в корзине";
        }
    } else {
        echo "Ошибка выполнения запроса: " . mysqli_error($conn);
    }
}

?>