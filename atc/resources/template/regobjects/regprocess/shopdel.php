<?php

$conn = new mysqli('localhost','root','root','test_pgtomy');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// Получаем значение storeid из запроса POST
$store_id = $_POST['storeid'];
// Выполняем SQL-запрос на удаление продажи из таблицы sales
$sql = "DELETE FROM users WHERE storeid = '$store_id'";
$conn->query($sql);

$sql = "DELETE FROM stores WHERE storeid = '$store_id'";
$conn->query($sql);
$conn->close();

header('Location: http://localhost/atc/resources/template/regobjects/registration.php');
