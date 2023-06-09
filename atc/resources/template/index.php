<!DOCTYPE html>
<?php
if($_COOKIE['user']=='') {
    header('Location: http://localhost/atc/resources/template/aut.php');
}
?>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <title>PAS</title>
    <style>
        html {
            overflow-x: hidden;
        }

        #app, body {
            font family: Open Sans, sans, serif;
            font size: 14px;
            color: #445165;
            box-sizing: border-box;
            webkit box sizingL border box;
            height: 100%;
            min-width: 900px;
        }

        div {
            display: block;
        }

        #homeLink {
            height: 100%;
            display: block;
        }

        a {
            color: #3253a9
        }

        a: -webkit-any-link {
            cursor: pointer;
        }

        #logo {
            float: left;
            height: 58px;
            width: 145px;
            text-align: left;
            padding-left: 10px;
        }

        .el-container.is-vertical {
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
            flex-direction: column;
        }

        .el-container {
            display: flex;
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
            flex-direction: row;
            -web-kit-box-flex: 1;
            flex: 1;
            flex-basis: auto;
            box-sizing: border-box;
            min-width: 0;
        }

        .user-info li {
            float: left;
            padding-top: 5px;
            padding-bottom: 5px
        }

        * {
            box-sizing: border-box;
        }

        .user-info {
            line-height: 53px;
            float: right;
            padding-right: 20px;
            list-style: none;
            margin-top: 4px;
            margin-bottom: 0;
            color: #002577;
            font-size: 13px;
        }

        ul {
            display: list-item;
            text-align: -webkit-match-parent;
        }

        .nav[data-v-60c9bf92] {
            width: 100%;
            display: table;
            background-color: #002577;
            font-family: Open Sans, sans-serif;
            font-size: 16px;
            color: #fff;
            line-height: 60px;
        }

        .nav-item[data-v-60c9bf92] {
            display: table-cell;
            position: relative;
            cursor: default;
            z-index: 2002;
            text-align: center;
        }

        .menu-content[data-v-60с9bf92] {
            display: none;
            position: absolute;
            left: 0;
            right: 0;
            background-color: #eef5ff;
            min-width: 180px;
            line-height: 14px;
            text-transform: uppercase;
            padding-top: 10px;
            padding-bottom: 10px;
            z-index: 2100;
        }

        #timeContainer {
            display: inline-block;
            height: 58px;
            text-align: center;
            position: relative;
            padding-left: 20px;
            white-space: nowrap;
        }

        .time {
            font-size: 10px;
            color: #002577;
            position: absolute;
            bottom: 0;
        }

        .time-value {
            font-size: 18px;
            font-weight: 700;
        }

    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body class>
<div id="app">
    <section class="el-container is-vertical" id="mainContainer">
        <header class="el-header" id="header" style="height: auto;">
    <div class="el-row" id="top">
        <div class="row" id="logo" style="min-width: 1vh">
            <a href="index.php" class="router-link-active" id="homeLink">
        <img id="logoImg" src="/atc/resources/template/img/logotip.png" alt="PAS" width="128px" height="56px">
            </a>
        </div>
        <div id="userInfo">
            <ul class="user-info">
                <li class="list-style-type-none text-decoration-none text-blue label first">
                    Пользователь:&nbsp;
                </li>
                <li class="value">
                    <a href = "authentication/exit.php" class="user-info-value text-decoration-none"><?echo $_COOKIE["user"];?></a>
                </li>
                <?php if ($_COOKIE['user2']!='1'): ?>
                <li class="label">
                    &nbsp;|&nbsp;Магазин:&nbsp;
                </li>
                <li class="value last">
                    <a class="user-info-value text-decoration-none"><?echo $_COOKIE["store2"];?></a>
                </li>
                <?php endif ?>
            </ul>
        </div>
        <div id="timeContainer">
        <div class="time">
        <div class="time-value">hh:mm dd.mm.yyyy</div>
            <span>МОСКОВСКОЕ ВРЕМЯ</span>
        </div>
        </div>
        <div>
            <div data-v-60c9bf92 class="nav">
                <div data-v-60c9bf92 class="nav-item first">
                    <a href="report.php" class="text-center text-decoration-none text-light">Отчеты по продажам</a>
                </div>
                <?php
                if($_COOKIE['user2']=='1'):
                    ?>
                    <div data-v-60c9bf92 class="nav-item notfirst">
                        <a href="analytics.php" class="text-center text-decoration-none text-light">Аналитика</a>
                    </div>
                <?php endif?>
                <div data-v-60c9bf92 class="nav-item notfirst">
                    <a href="../../../atc/resources/template/regobjects/regnewproduct.php" class="text-center text-decoration-none text-light">Регистрация нового товара</a>
                </div>
                <?php if ($_COOKIE['user2']=='1'): ?>
                    <div data-v-60c9bf92 class="nav-item notfirst">
                        <a href="../../../atc/resources/template/regobjects/registration.php" class="text-center text-decoration-none text-light">Регистрация нового магазина</a>
                    </div>
                <?php endif?>
                <?php if ($_COOKIE['user2']=='1'): ?>
                    <div data-v-60c9bf92 class="nav-item notfirst">
                        <a href="../../../atc/resources/template/regobjects/regmember.php" class="text-center text-decoration-none text-light">Регистрация нового продавца</a>
                    </div>
                <?php endif?>
                </div>
            </div>
        </div>
        </header>
    </section>
</div>
<script src="/atc/src/time.js"></script>
</body>
</html>
