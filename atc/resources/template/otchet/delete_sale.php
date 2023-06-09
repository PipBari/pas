<?php

$conn = new mysqli('localhost','root','root','test_pgtomy');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// Получаем значение saleid из запроса POST
$sale_id = $_POST['saleid'];
// Выполняем SQL-запрос на удаление продажи из таблицы sales
$sql = "DELETE FROM sales WHERE saleid = '$sale_id'";
$conn->query($sql);
$conn->close();

header('Location: http://localhost/atc/resources/template/report.php');
