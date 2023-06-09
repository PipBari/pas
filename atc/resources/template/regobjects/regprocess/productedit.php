<?php
session_start();
// Получаем данные из формы
$p_sku = $_POST['sku'];
$p_name = $_POST['pname'];
$p_price = $_POST['price'];
$product_id = $_POST['productid'];
if ($_COOKIE['user2']== '1'){
    if ($_POST['shop'] == NULL){
        $_SESSION['error'] = 'Магазин не найден';
        header('Location: http://localhost/atc/resources/template/report.php');
        exit();
    }
    $shop_name = $_POST['shop'];
}
else{$shop_name = $_COOKIE["store2"];}



//Подключаемся к бд
$conn = new mysqli('localhost','root','root','test_pgtomy');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Получаем ID магазина по его названию
$sql = "SELECT storeid FROM stores WHERE storename = '$shop_name'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $shop_id = $row['storeid'];
} else {
    $_SESSION['error'] = 'Магазин не найден';
    header('Location: http://localhost/atc/resources/template/report.php');
    exit();
}

// Добавляем новый товар
$sql = "INSERT INTO products (sku, productname, price, storeid) 
    VALUES ('$p_sku', '$p_name', '$p_price', '$shop_id')";


$sql = "UPDATE products SET sku='$p_sku', productname ='$p_name',price = '$p_price', storeid = '$shop_id'  WHERE productid= '$product_id'";
if ($conn->query($sql) === TRUE) {
    echo "Успешное изменение";
}
$conn->close();
header('Location: http://localhost/atc/resources/template/regobjects/regnewproduct.php');
?>