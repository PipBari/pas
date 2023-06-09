

<html lang="ru">
<div data-v-44f6aa19 >
    <button data-v-44f6aa19 type="button" class="el-button lc el-button--default" onclick="window.location.href='/atc/resources/template/index.php'">
        <span>Выйти в главное меню</span>
    </button>
</div>


<?php
// Получаем данные из формы
$productsku = $_POST['productsku'];
$sellerid = $_POST['sellerid'];
$quantity = $_POST['quantity'];
if ($_COOKIE['user2']== '1'){
    if ($_POST['shop'] == NULL){
        $_SESSION['error'] = 'Магазин не найден';
        header('Location: http://localhost/atc/resources/template/report.php');
        exit();
    }
    $storename = $_POST['shop'];
}
else{$storename = $_COOKIE["store2"];}

 if ($_POST['saledate'] == NULL){
     $date = date('Y-m-d'); // текущая дата
 }
 else
     $date = $_POST['saledate'];


$sale_id = $_POST['saleid'];

//Подключаемся к бд
$conn = new mysqli('localhost','root','root','test_pgtomy');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// ТОВАР

// Получаем ID продукта по его артикулу
$sql = "SELECT productid FROM products WHERE sku = '$productsku' OR productname = '$productsku'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $product_id = $row['productid'];
} else {
    $_SESSION['error'] = 'Товар не найден';
    header('Location: http://localhost/atc/resources/template/report.php');
    exit();
}

// Получаем название продукта по его ID
$sql = "SELECT productname FROM products WHERE productid = '$product_id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $product_name = $row['productname'];
} else {
    $_SESSION['error'] = 'Товар не найден';
    header('Location: http://localhost/atc/resources/template/report.php');
    exit();
}

// Получаем цену продукта по его ID
$sql = "SELECT price FROM products WHERE productid = '$product_id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $product_price = $row['price'];
} else {
    $_SESSION['error'] = 'Товар не найден';
    header('Location: http://localhost/atc/resources/template/report.php');
    exit();
}

// Получаем артикул продукта по его ID
$sql = "SELECT sku FROM products WHERE productid = '$product_id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $product_sku = $row['sku'];
} else {
    $_SESSION['error'] = 'Товар не найден';
    header('Location: http://localhost/atc/resources/template/report.php');
    exit();
}

//ПРОДАВЕЦ

// Получаем ID продавца по его имени
$sql = "SELECT sellerid FROM sellers WHERE fullname= '$sellerid' OR sellerid = '$sellerid'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $seller_id = $row['sellerid'];
} else {
    $_SESSION['error'] = 'Продавец не найден';
    header('Location: http://localhost/atc/resources/template/report.php');
    exit();
}

// Получаем имя по ID продавца
$sql = "SELECT fullname FROM sellers WHERE sellerid = '$seller_id'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $seller_name = $row['fullname'];
} else {
    $_SESSION['error'] = 'Продавец не найден';
    header('Location: http://localhost/atc/resources/template/report.php');
    exit();
}

// МАГАЗИН

// Получаем ID магазина по его названию
$sql = "SELECT storeid FROM stores WHERE storename = '$storename'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $store_id = $row['storeid'];
} else {
    $_SESSION['error'] = 'Магазин не найден';
    header('Location: http://localhost/atc/resources/template/report.php');
    exit();
}


// Получаем название магазина по его ID
$sql = "SELECT storename FROM stores WHERE storeid = '$store_id'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $store_name = $row['storename'];
} else {
    $_SESSION['error'] = 'Магазин не найден';
    header('Location: http://localhost/atc/resources/template/report.php');
    exit();
}

//Проверка на принадлежность продавца к магзину
$sql = "SELECT storeid FROM sellers WHERE sellerid = '$seller_id'";
$result2 = $conn->query($sql);
$row1 = $result2->fetch_assoc();
$store_idmem= $row1['storeid'];
if ($store_idmem!= $store_id){
    $_SESSION['error'] = 'Продавец не работает в этом магазине';
    header('Location: http://localhost/atc/resources/template/report.php');
    exit();
}


//Редактируем продажу в таблице sales по saleid
    $sql = "UPDATE sales SET product='$product_name', seller ='$seller_name',store = '$store_name', quantity='$quantity', saledate ='$date',s_price = '$product_price', p_sku = '$product_sku' WHERE saleid='$sale_id'";

if ($conn->query($sql) === TRUE) {
    echo "Продажа успешно добавлена";
}

header('Location: http://localhost/atc/resources/template/report.php');
$conn->close();

