<?php 
session_start();
require('bd.php');

if(isset($_POST['add'])) {
    if(isset($_POST['name'], $_POST['price'], $_POST['img']) & !empty($_POST['name']) & !empty($_POST['price']) & !empty($_POST['img'])) {
        $name = $_POST['name'];
        $price = $_POST['price'];
        $img = $_POST['img'];
        // Добавление нового товара в базу данных
        $insert = "INSERT INTO products (Name, Image, Price) VALUES ('$name', '$img', $price)";
        $result = mysqli_query($conn, $insert);
    
        if($result) {
            header("Location: ../pages/panel.php");
            $_SESSION['info'] = "Товар был успешно добавлен.";
        } else {
            echo "Ошибка при добавлении товара: " . mysqli_error($conn);
        }
    } else {
        $_SESSION['info'] = "Не удалось добавить товар, попробуйте еще раз.";
        header("Location: ../pages/panel.php ");
    }
}

if(isset($_POST['toDelete'])) {
    $idProduct = $_POST['idProduct'];

    $delete = "DELETE FROM products WHERE id = $idProduct";
    $result = mysqli_query($conn, $delete);

    if($result) {
        $_SESSION['info'] = "Товар был удален";
        header("Location: ../pages/panel.php ");
    }
}

?>