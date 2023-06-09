<!DOCTYPE html>
<?php
if($_COOKIE['user']=='') {
    header('Location: http://localhost/atc/resources/template/aut.php');
}
if($_COOKIE['user2']=='0') {
    header('Location: http://localhost/atc/resources/template/index.php');
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

        .breadcrumbs,
        .breadcrumbs span {
            color: #666;
            font-size: 12px;
        }

        #view {
            margin-top: 10px;
            padding: 0 10px;
        }

        main {
            display: block;
        }

        .el-main {
            display: block;
            -webkit-box-flex: 1;
            ms-flex: 1;
            flex: 1;
            ms-flex-preferred-size: auto;
            flex-basis: auto;
            overflow: auto;
            padding: 20px;
        }

        .content-panel {
            border: 1px solid #ddeaff;
            padding: 11px 17px;
            background-color: #fff;
        }

        button {
            -webkit-writing-mode: horizontal-td !important;
            text-rendering: auto;
            color: internal-light-dark(black, white);
            letter-spacing: normal;
            word-spacing: normal;
            text-transform: none;
            text-indent: 0px;
            text-shadow: none;
            text-align: center;
            cursor: center;
            font: 400 13.3333px Arial;
        }

        .el-button {
            display: inline-block;
            line-height: 1;
            white-space: nowrap;
            cursor: pointer;
            background: #fff;
            border: 1px solid #dcdfe6;
            color: #606266;
            -webkit-appearance: none;
            text-align: center;
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
            outline: 0;
            margin: 0;
            -webkit-transition: .1s;
            transition: .1s;
            font-weight: 500;
            padding: 12px 20px;
            font-size: 14px;
            border-radius: 4px;
        }

        .lc.el-button {
            border: 0;
            border-radius: 0;
            margin-top: 10px;
            background-color: #3253a9;
            color: #fff;
        }

        .lc-table-label {
            color: #364760;
            font-size: 18px;
            text-align: center;
            padding: 10px 4px 4px 4px;
            border-bottom: 2px solid #e3e4e8;
        }

        i {
            font-style: italic;
        }

        col[Attributes Style] {
            width: 100px;
        }

        col {
            displayL table-column;
        }

        .el-table__header {
            table-layout: fixed;
            border-collapse: separate;
        }

        .filter-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .filter-table th {
            background-color: #3253A9;
            color: white;
            font-weight: bold;
            text-align: center;
            padding: 10px;
        }

        .filter-table td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: center;
        }

        .filter-table input[type=text] {
            width: 100%;
            padding: 5px;
            box-sizing: border-box;
            border: 2px solid #ccc;
            border-radius: 4px;
        }

        .function_button {
            padding: 11px 17px;
            background-color: #fff;
        }

        .el-function_button {
            display: inline-block;
            white-space: nowrap;
            cursor: pointer;
            background: #fff;
            color: #606266;
            -webkit-appearance: none;
            text-align: center;
            outline: 0;
            margin: 0;
            -webkit-transition: .1s;
            transition: .1s;
            font-weight: 500;
            padding: 12px 20px;
            font-size: 14px;
            border: none;
        }

    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="/atc/src/filter_register.js"></script>
</head>
<body class>
<div id="app">
    <section class="el-container is-vertical" id="mainContainer">
        <header class="el-header" id="header" style="height: auto;">
            <div class="el-row" id="top">
                <div class="row" id="logo" style="min-width: 1vh">
                    <a href="../index.php" class="router-link-active" id="homeLink">
                        <img id="logoImg" src="/atc/resources/template/img/logotip.png" alt="PAS" width="128px" height="56px">
                    </a>
                </div>
                <div id="userInfo">
                    <ul class="user-info">
                        <li class="list-style-type-none text-decoration-none text-blue label first">
                            Пользователь:&nbsp;
                        </li>
                        <li class="value">
                            <a href = "\atc\resources\template\authentication\exit.php" class="user-info-value text-decoration-none"><?echo $_COOKIE["user"];?></a>
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
                            <a href="../index.php" class="text-center text-decoration-none text-light">Главная страница</a>
                        </div>
                        <div data-v-60c9bf92 class="nav-item first">
                            <a href="../report.php" class="text-center text-decoration-none text-light">Отчеты по продажам</a>
                        </div>
                        <div data-v-60c9bf92 class="nav-item notfirst">
                            <a href="../analytics.php" class="text-center text-decoration-none text-light">Аналитика</a>
                        </div>
                        <div data-v-60c9bf92 class="nav-item notfirst">
                            <a href="regnewproduct.php" class="text-center text-decoration-none text-light">Регистрация нового товара</a>
                        </div>
                        <?php if ($_COOKIE['user2']=='1'): ?>
                            <div data-v-60c9bf92 class="nav-item notfirst">
                                <a href="/atc/resources/template/regobjects/regmember.php" class="text-center text-decoration-none text-light">Регистрация нового продавца</a>
                            </div>
                        <?php endif?>
                    </div>
                </div>
            </div>
        </header>
        <main class="el-main" id="view">
            <div data-v-44f6aa19>
                <div data-v-1ed7fb43 data-v-44f6aa19 class="breadcrumbs">
                    <span data-v-1ed7fb43>Список магазинов</span>
                </div>
                <div data-v-44f6aa19 class="content-panel">
                    <button data-v-44f6aa19 type="button" class="el-button lc el-button--default" onclick="window.location.href='regsetshop.php'">
                        <span>Регистрация нового магазина</span>
                    </button>
                    <button data-v-44f6aa19 type="button" class="el-button lc el-button--default" onclick="filter_reg()">
                        <span>Применить фильтр</span>
                    </button>
                <div>
                    <div data-v-44f6aa19 class="lc-table-label">Список магазинов</div>
                    <div data-v-44f6aa19 class="el-table lc-table el-table--fit el-table--striped el-table--border el-table--group el-table--fluid-height el-table--scrollable-x el-table--enable-row-hover el-table--enable-row-transition"
                         style="max-height: 500px">
                        <div class="el-table__header-wrapper">
                            <?php

                            $mysql = new mysqli('localhost','root','root','test_pgtomy');

                            if (!$mysql) {
                                die("Connection failed: " . mysqli_connect_error());
                            }

                            $sql = "SELECT s.storeid, s.storename, s.adress, u.login, u.password FROM stores s 
        INNER JOIN users u ON s.storeid = u.storeid
        ";
                            $result = mysqli_query($mysql, $sql);
                            $mysql->close();
                            ?>
                            <table class="filter-table">
                                <tr>
                                    <th>Магазин</th>
                                    <th>Адрес</th>
                                    <th>Логин</th>
                                    <th>Пароль</th>
                                    <th>Удаление</th>
                                    <th>Редактирование</th>
                                </tr>
                                <tr>
                                    <td><input type="text" name="storename"></td>
                                    <td><input type="text" name="adress"></td>
                                    <td><input type="text" name="login"></td>
                                    <td><input type="text" name="password"></td>
                                    <td><input type="hidden" value="Удалить"></td>
                                    <td><input type="hidden" value="Редактировать"></td>
                                </tr>
                                <?php while($row = mysqli_fetch_assoc($result)) {?>
                                        <tr class="component__table">
                                            <td><?php echo $row['storename']; ?></td>
                                            <td><?php echo $row['adress']; ?></td>
                                            <td><?php echo $row['login']; ?></td>
                                            <td><?php echo $row['password']; ?></td>
                                            <td>
                                                <form method="post" action="regprocess/shopdel.php">
                                                    <input type="hidden" name="storeid" value="<?php echo $row['storeid']; ?>" >
                                                    <input type="submit" value="Удалить" class="function_button el-function_button">
                                                </form>
                                            </td>
                                            <td>
                                                <form method="post" action="editshop.php">
                                                    <input type="hidden" name="storeid" value="<?php echo $row['storeid']; ?>" >
                                                    <input type="submit" value="Редактировать" class="function_button el-function_button">
                                                </form>
                                            </td>
                                        </tr>
                                <?php } ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </section>
</div>
<script src="/atc/src/time.js"></script>
</body>
</html>
