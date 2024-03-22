<?php 
session_start();
require('bd.php');
$code = substr(sha1(mt_rand()),17,8);
$idUser = $_SESSION['idUser'];
if(isset($_POST['ordering'])) {
    $checkCart = "SELECT * FROM cart WHERE idUser = $idUser";
    $resultCart = mysqli_query($conn, $checkCart);
    if(($numrows3 = mysqli_num_rows($resultCart)) > 0) {
    $_SESSION['code'] = $code;
    $sql = "INSERT INTO `orders`(`idUser`, `code`) VALUES ($idUser, '$code')";
    $result = mysqli_query($conn, $sql);

    if($result) {
        $orderCode = $_SESSION['code'];
        $check = "SELECT * FROM orders WHERE `code` = '$orderCode'";
        $resultCheck = mysqli_query($conn, $check);
        if(($numrows = mysqli_num_rows($resultCheck)) > 0) {
            while($row = mysqli_fetch_assoc($resultCheck)) {
                $idOrder = $row['id'];
            }
            $sql2 = "SELECT * FROM cart WHERE `idUser` = $idUser";
            $result2 = mysqli_query($conn, $sql2);

            if(($numrows2 = mysqli_num_rows($result2)) > 0) { 
            while($row2 = mysqli_fetch_assoc($result2)) {
                $idProduct = $row2['idProduct'];
                $count = $row2['count'];
                
                $sql3 = "INSERT INTO `itemsOrder` (`idOrder`,`idProduct`,`count`) VALUES ($idOrder, $idProduct, $count)";
                $result3 = mysqli_query($conn, $sql3);

                $delete = "DELETE FROM cart where idUser = $idUser";
                $result4 = mysqli_query($conn, $delete);

                header("Location: ../pages/cart.php");
            }
            
            }
        }
       
    }
} else {
    $_SESSION['no'] = "Корзина пустая, попробуйте еще раз";
    header("Location: ../pages/cart.php");
    session_reset($_SESSION['no']);
}
}


?>