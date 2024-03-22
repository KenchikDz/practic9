<?php 
session_start();
require('bd.php');
if(isset($_POST['idItem'])) {
    $idProduct = $_POST['idItem'];
    $idUser = $_SESSION['idUser'];

    $check = "SELECT * FROM cart WHERE idProduct = $idProduct";
    $result2 = mysqli_query($conn, $check);

    if(($numrows = mysqli_num_rows($result2)) > 0) {
        $update = "UPDATE `cart` SET `count` = count + 1 WHERE idProduct = $idProduct";
        $result3 = mysqli_query($conn, $update);

        if($result3) {
            header("Location: ../pages/catalog.php");
        } else {
            echo "Товар не добавлен";
        }
    } else {
        $sql = "INSERT INTO cart (`idUser`,`idProduct`, `count`) VALUES ($idUser, $idProduct, 1)";
        $result = mysqli_query($conn, $sql);

        if($result) {
            header("Location: ../pages/catalog.php");
        } else {
            echo "Товар не добавлен";
        }
    }

   
    
}
?>