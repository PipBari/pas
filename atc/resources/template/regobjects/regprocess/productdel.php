<?php

$conn = new mysqli('localhost','root','root','test_pgtomy');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// Получаем значение saleid из запроса POST
$product_id = $_POST['productid'];
// Выполняем SQL-запрос на удаление продажи из таблицы sales
$sql = "DELETE FROM products WHERE productid = '$product_id'";
if ($conn->query($sql) === TRUE) {
    echo "Успешно удалено";
}
$conn->close();
header('Location: http://localhost/atc/resources/template/regobjects/regnewproduct.php');
