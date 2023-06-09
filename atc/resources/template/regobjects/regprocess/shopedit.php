<?php
session_start();
// Получаем данные из формы
$shopname = $_POST['shopname'];
$shopadr = $_POST['shopadres'];
$login = $_POST['login'];
$pass = $_POST['pass'];
$storeid = $_POST['storeid'];
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

//Редактируем магазин
$sql = "UPDATE stores SET storename='$shopname', adress ='$shopadr' WHERE storeid= '$storeid'";
if ($conn->query($sql) === TRUE) {
    echo "Успешное изменение";
}

//Редактируем пользовотеля
$sql = "UPDATE users SET password='$pass', login ='$login' WHERE storeid = '$storeid'";
if ($conn->query($sql) === TRUE) {
    echo "Успешное изменение";
}
$conn->close();
header('Location: http://localhost/atc/resources/template/regobjects/registration.php');

?>