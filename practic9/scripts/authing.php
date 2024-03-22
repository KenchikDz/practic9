<?php 
session_start();
require('bd.php');
if(isset($_POST['role'])) {
    $role = $_POST['role'];
    if(isset($_POST['login'], $_POST['password'])) {
        $login = $_POST['login'];
        $pass = $_POST['password'];
    if($role == 1) {
        $sql = "SELECT * FROM admins where login = '$login'";
        $result = mysqli_query($conn, $sql);
    } else if ($role == 2) { 
        $sql = "SELECT * FROM users where login = '$login'";
        $result = mysqli_query($conn, $sql);  
    }
     

    if(isset($sql, $result)) {
        $field_info = mysqli_fetch_field_direct($result, 0);

        // Получение имени таблицы
        $table_name = $field_info->table;

        if ($table_name === 'admins') {
            $_SESSION['isAdmin'] = true;
        }
            if(($numrows = mysqli_num_rows($result)) > 0) {
                while($row = mysqli_fetch_array($result)) {
                    $_SESSION['isAuth'] = true;
                    $_SESSION['idUser'] = $row['id'];
                    $_SESSION['User'] = $row['login'];
                }
                header("Location: ../index.php");
            } else {
                echo "Пользователь не найден, попробуйте повторить попытку ввода.<br>";
                echo "<a href='logout.php'>Вернуться к странице входа</a>";
            }
            
        }
    }
 
} 

?>