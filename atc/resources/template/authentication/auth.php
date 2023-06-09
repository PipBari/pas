<?php
$login = filter_var(trim($_POST['username']),
    FILTER_SANITIZE_STRING);
$pass = filter_var(trim($_POST['password']),
    FILTER_SANITIZE_STRING);

$mysql = new mysqli('localhost','root','root','test_pgtomy');

$result = $mysql->query("SELECT * FROM `users` WHERE `login` =
                            '$login' AND `password` = '$pass'");     //log and pass

$storeinfo = $mysql->query("SELECT s.storename, s.adress FROM users u JOIN stores s ON u.storeid = s.storeid WHERE u.login ='$login'");

$user=$result->fetch_assoc();//балабунькаем в массив

$store=$storeinfo->fetch_assoc();

if($user==NULL){
    header('Location: http://localhost/atc/resources/template/aut.php');
    exit();
}

setcookie('user',$user['login'], time() + 3600 * 24 * 30,"/");
setcookie('user2',$user['role'], time() + 3600 * 24 * 30,"/");
setcookie('store',$store['adress'], time() + 3600 * 24 * 30,"/");
setcookie('store2',$store['storename'], time() + 3600 * 24 * 30,"/");

$mysql->close();

header('Location: http://localhost/atc/resources/template/index.php'); //переадресация на страничку
?>