<?php
session_start();
// Получаем данные из формы
$fullname = $_POST['fullname'];
$phonenumber = $_POST['phonenumber'];
$shopname = $_POST['storename'];
$seller_id = $_POST['sellerid'];
if ($shopname == NULL OR $phonenumber == NULL OR $fullname == NULL ){
    $_SESSION['error'] = 'Заполните поля';
    header('Location: http://localhost/atc/resources/template/report.php');
    exit();
}

//Подключаемся к бд
$conn = new mysqli('localhost','root','root','test_pgtomy');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT storeid FROM stores WHERE storename = '$shopname'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$store_id = $row['storeid'];

// Редактируем продавца

$sql = "UPDATE sellers SET fullname='$fullname', phonenumber ='$phonenumber',storeid = '$store_id' WHERE sellerid= '$seller_id'";
if ($conn->query($sql) === TRUE) {
    echo "Успешное изменение";
}


$conn->close();
header('Location: http://localhost/atc/resources/template/regobjects/regmember.php');

?>