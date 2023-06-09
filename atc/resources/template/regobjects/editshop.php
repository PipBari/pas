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

        element.style {
            min-height: 48px;
            height: 48px;
            margin-top: 0px;
            margin-bottom: 0px;
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

        .lc-content-panel {
            border: 1px solid #ddeaff;
            padding: 11px 17px;
            background: #fff;
        }

        .lc-content-panel .title {
            color: #364760;
            font-weight: 400;
            padding: 5px 0 11px;
            font-size: 18px;
            border-bottom: 1px solid #f3f3f3;
        }

        .breadcrumbs, .breadcrumbs span {
            color: #666;
            font-size: 12px;
        }

        .breadcrumbs-group {
            background-position-y: center;
            background-position-x: right;
            padding-right: 16px;
            margin-right: 3px;
        }

        h1 {
            display: block;
            font-size: 2em;
            margin-inline-start: 0px;
            margin-inline-end: 0px;
        }

        .lc-form .el-form-item__content, .lc-form .el-form-tem__lc {
            line-height: 20px;
        }

        .lc-form .el-form-item {
            margin-bottom: 15px;
        }

        .lc-form {
            word-break: normal;
        }

        .el-form-item__label {
            text-align: right;
            vertical-align: middle;
            float: left;
            font-size: 16px;
            color: #606266;
            padding: 0 12px 0 0;
            box-sizing: border-box;
            line-height: 40px;
            -webkit-box-sizing: border-box;
        }

        .el-form-item__content {
            line-height: 40px;
            position: relative;
            font-size: 14px;
        }

        .el-textarea {
            position: relative;
            display: inline-block;
            width: 100%;
            vertical-align: bottom;
            font-size: 14px;
        }

        textarea {
            -webkit-writing-mode: horizontal-tb !important;
            text-rendering: auto;
            color: internal-light-dark(black, white);
            letter-spacing: normal;
            text-transform: none;
            text-indent: 0px;
            text-shadow: none;
            display: inline-block;
            text-align: start;
            appearance: auto;
            -webkit-rtl-ordering: logical;
            flex-direction: column;
            resize: auto;
            cursor: text;
            white-space: pre-wrap;
            overflow-wrap: break-word;
            column-count: initial !important;
            margin: 0em;
            font: 400 13.3333px Arial;
        }

        .el-input--mini {
            font-size: 12px;
        }

        .el-textarea__inner: focus {
            outline: 0;
            border-color: #409eff;
        }

        .el-textarea__inner {
            display: block;
            resize: vertical;
            padding: 5px 15px;
            padding-left: 10px;
            line-height: 1.5;
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
            wight: 100%;
            font-size: inherit;
            color: #606266;
            background-color: #fff;
            background-image: none;
            border: 1px solid #dcdfe6;
            border-radius: 4px;
            -webkit-transition: border color .2s cubic-bezier(.645,.045,.355,1);
            transition: border-colo .2s cubic-bezier(.645,.045,.355,1);
        }

        .el-textarea__inner-date {
            display: block;
            padding: 5px 15px;
            padding-left: 10px;
            line-height: 1.5;
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
            wight: 100%;
            font-size: inherit;
            color: #606266;
            background-color: #fff;
            background-image: none;
            border: 1px solid #dcdfe6;
            border-radius: 4px;
            -webkit-transition: border color .2s cubic-bezier(.645,.045,.355,1);
            transition: border-colo .2s cubic-bezier(.645,.045,.355,1);
        }

        .lc.el-button {
            border: 0;
            border-radius: 0;
            margin-top: 10px;
            background-color: #3253a9;
            color: #fff;
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

    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="/atc/src/validateLatinInput.js"></script>
</head>
<body class>
<div id="app">
    <section class="el-container is-vertical" id="mainContainer">
        <header class="el-header" id="header" style="height: auto;">
            <div class="el-row" id="top">
                <div class="row" id="logo" style="min-width: 1vh">
                    <a href="../index.php" class="router-link-active" id="homeLink">
                        <img id="logoImg" src="\atc\resources\template\img\logotip.png" alt="PAS" width="128px" height="56px">
                    </a>
                </div>
                <div id="userInfo">
                    <ul class="user-info">
                        <li class="list-style-type-none text-decoration-none text-blue label first">
                            Пользователь:&nbsp;
                        </li>
                        <li class="value">
                            <a href = "exit.php" class="user-info-value text-decoration-none"><?echo $_COOKIE["user"];?></a>
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
                                <a href="/atc/resources/template/regobjects/registration.php" class="text-center text-decoration-none text-light">Регистрация нового магазина</a>
                            </div>
                        <?php endif?>
                        <?php if ($_COOKIE['user2']=='1'): ?>
                            <div data-v-60c9bf92 class="nav-item notfirst">
                                <a href="/atc/resources/template/regobjects/regmember.php" class="text-center text-decoration-none text-light">Регистрация нового продавца</a>
                            </div>
                        <?php endif?>
                    </div>
                </div>
            </div>
        </header>
        <?php
        $storeid= $_POST['storeid'];
        $mysql = new mysqli('localhost','root','root','test_pgtomy');

        if (!$mysql) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $sql = "SELECT s.storeid, s.storename, s.adress, u.login, u.password FROM stores s 
        INNER JOIN users u ON s.storeid = u.storeid
        WHERE s.storeid = '$storeid'
        ";
        $result = mysqli_query($mysql, $sql);
        $row = mysqli_fetch_assoc($result);
        $mysql->close();
        ?>
        <main class="el-main" id="view">
            <div data-v-395af661>
                <div data-v-395af661 class="breadcrumbs">
                    <span data-v-395af661 class="breadcrumbs-group">Редактирование информации о новом магазине</span>
                </div>
                <div data-v-395af661 class="lc-content-panel">
                    <h1 data-v-395af661 class="title">Редактирование информации о новом магазине</h1>
                    <form data-v-395af661 class="el-form lc-form" method="post" action="regprocess/shopedit.php">
                        <input type="hidden" name="storeid" value="<?php echo $storeid; ?>">
                        <div data-v-395af661 class="el-form-item el-form-item--mini">
                            <label for="comment" class="el-form-item__label" style="wight: 200px">Название</label>
                            <div class="el-form-item__content" style="margin-left: 200px;">
                                <div data-v-395af661 class="el-textarea el-input--mini">
                                    <textarea autocomplete="off" class="el-textarea__inner" type="text" name="shopname" id="shopname" style="min-height: 48px; height: 48px"><?php echo $row['storename']?></textarea>
                                </div>
                            </div>
                        </div>
                        <div data-v-395af661 class="el-form-item el-form-item--mini">
                            <label for="outNumber" class="el-form-item__label" style="wight: 200px">Адрес</label>
                            <div class="el-form-item__content" style="margin-left: 200px;">
                                <div data-v-395af661 class="el-textarea el-input--mini">
                                    <textarea autocomplete="off" class="el-textarea__inner" type="text" name="shopadres" id="shopadres"><?php echo $row['adress']?></textarea>
                                </div>
                            </div>
                        </div>
                        <div data-v-395af661 class="el-form-item el-form-item--mini">
                            <label for="outNumber" class="el-form-item__label" style="wight: 200px">Логин</label>
                            <div class="el-form-item__content" style="margin-left: 200px;">
                                <div data-v-395af661 class="el-textarea el-input--mini">
                                    <textarea autocomplete="off" class="el-textarea__inner" type="text" name="login" id="login" oninput="validateLatinInput(event)"><?php echo $row['login']?></textarea>
                                </div>
                            </div>
                        </div>
                        <div data-v-395af661 class="el-form-item el-form-item--mini">
                            <label for="outNumber" class="el-form-item__label" style="wight: 200px">Пароль</label>
                            <div class="el-form-item__content" style="margin-left: 200px;">
                                <div data-v-395af661 class="el-textarea el-input--mini">
                                    <textarea autocomplete="off" class="el-textarea__inner" type="text" name="pass" id="pass"><?php echo $row['password']?></textarea>
                                </div>
                            </div>
                        </div>
                        <div data-v-395af661>
                            <button data-v-395af661 type="submit" class="el-button lc el-button--default" onclick="window.location.href='report.php'">
                                <span>Сохранить изменения</span>
                            </button>
                            <button data-v-395af661 type="button" class="el-button lc el-button--default" onclick="window.location.href='registration.php'">
                                <span>Отменить</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </main>
    </section>
</div>
<script src="/atc/src/time.js"></script>
</body>
</html>



