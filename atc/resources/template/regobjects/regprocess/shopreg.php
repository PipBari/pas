<?php
session_start();
// Получаем данные из формы
$shopname = $_POST['shopname'];
$shopadr = $_POST['shopadres'];
$login = $_POST['login'];
$pass = $_POST['pass'];
if ($shopname == NULL OR $shopadr == NULL OR $login == NULL OR $pass == NULL){
    $_SESSION['error'] = 'Заполните поля';
    header('Location: http://localhost/atc/resources/template/report.php');
    exit();
}



//Подключаемся к бд
$conn = new mysqli('localhost','root','root','test_pgtomy');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


// Добавляем новый магазин в таблицу stores
$sql = "INSERT INTO stores (storename, adress) 
    VALUES ('$shopname', '$shopadr')";
if ($conn->query($sql) === TRUE) {
    echo "Продажа успешно добавлена";
}
else{
    echo "Чот сломалось";
}


$sql = "SELECT storeid FROM stores WHERE storename = '$shopname'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$store_id = $row['storeid'];

//Прикрепляем нового пользователя к магазину

$sql = "INSERT INTO users (password, login,storeid) 
    VALUES ('$pass', '$login','$store_id')";
if ($conn->query($sql) === TRUE) {
    echo "Продажа успешно добавлена";
}
else{
    echo "Чот сломалось";
}
$conn->close();
header('Location: http://localhost/atc/resources/template/regobjects/registration.php');

?>