<?php
    setcookie('user',$user['login'], time() - 3600 * 24 * 30,"/");
    setcookie('user2',$user['role'], time() - 3600 * 24 * 30,"/");
    setcookie('store',$store['adress'], time() - 3600 * 24 * 30,"/");
    setcookie('store2',$store['storename'], time() - 3600 * 24 * 30,"/");
    header('Location: http://localhost/atc/resources/template/aut.php');
?>
