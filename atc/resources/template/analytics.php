<?php
// Подключаемся к базе данных
// Подключение к базе данных
$servername = 'localhost';
$username = 'root';
$password = 'root';
$dbname = 'test_pgtomy';

$conn = mysqli_connect($servername, $username, $password, $dbname);

// Проверка соединения
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Выборка данных из таблицы sales
$sql = "SELECT MONTH(saledate) as month, SUM(quantity) as quantity FROM sales GROUP BY MONTH(saledate) ORDER BY MONTH(saledate)";
$sql2 = "SELECT MIN(YEAR(saledate)) as year from sales";
$sql3 = "SELECT MAX(YEAR(saledate)) as year from sales";

// Получаем результаты запроса
$result = mysqli_query($conn, $sql);
$result_min_year=mysqli_query($conn, $sql2);
$result_max_year=mysqli_query($conn, $sql3);
// Создаем массив для хранения меток и данных графика
$labels = array();
$data = array();
// Обрабатываем результаты запроса
while ($row = mysqli_fetch_assoc($result)) {
    // Добавляем метку
    $labels[] = $row['month'];
    // Добавляем данные
    $data[] = $row['quantity'];
}

$row_min_year = mysqli_fetch_assoc($result_min_year) ;
// Добавляем значение минимального года
$min_year=$row_min_year['year'];
$row_max_year = mysqli_fetch_assoc($result_max_year) ;
// Добавляем значение максимального года
$max_year = $row_max_year['year'];

// Закрываем соединение с базой данных
mysqli_close($conn);
?>
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
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        .container {
            display: flex;
        }

        .formColumn {
            display: flex;
            flex-direction: column;
            margin-right: 20px;
        }
        .chart-container {
            width: 1000px;
            height: 400px;
            margin-bottom: 20px;
        }
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

        .content-panel {
            display: block;
            line-height: 1.5;
            border: 1px solid #ddeaff;
            padding: 11px 17px;
            background-color: #fff;
            font-size: 16px;
            padding: 12px 20px;
        }

        .date-input {
          padding: 8px;
          border-radius: 4px;
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
                    <a href="#/" class="router-link-active" id="homeLink">
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
                                &nbsp;|&nbsp;Организация:&nbsp;
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
                            <a href="index.php" class="text-center text-decoration-none text-light">Главная страница</a>
                        </div>
                        <div data-v-60c9bf92 class="nav-item notfirst">
                            <a href="report.php" class="text-center text-decoration-none text-light">Отчет по продажам</a>
                        </div>
                        <?php if ($_COOKIE['user2']=='1'): ?>
                        <div data-v-60c9bf92 class="nav-item notfirst">
                            <a href="regobjects/regnewproduct.php" class="text-center text-decoration-none text-light">Регистрация нового товара</a>
                        </div>
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
<div class="content-panel">
<h1>Введите параметры</h1>
<form method="POST" autocomplete="off">
    <div class="formRow">
        <div class="formColumn">
            <label for="datepart">Выберите период:</label>
            <select name="datepart[]" style="width: 300px;" id="datepart" multiple>
                <option value="DAY">Продажи по дням</option>
                <option value="WEEK">Продажи по неделям</option>
                <option value="MONTH">Продажи по месяцам</option>
                <option value="YEAR">Продажи по годам</option>
            </select>

        </div>
        <label for="date1" class="date-input">Дата 1:</label>
        <input type="date" id="date1" name="date1">
        <label for="date2" class="date-input">Дата 2:</label>
        <input type="date" id="date2" name="date2">
    </div>

    <div id="formContainer">
    <div class="formRow">
      <div class="formColumn">
        <label for="storename">Название магазина:</label>
        <input type="text" id="storename" name="storename[]" style="width: 300px;">
      </div>
      <div class="formColumn">
        <label for="fullname">Ф.И.О продавца:</label>
        <input type="text" id="fullname" name="fullname[]" style="width: 300px;">
      </div>
      <div class="formColumn">
        <label for="productname">Название продукта:</label>
        <input type="text" id="productname" name="productname[]" style="width: 300px;">
      </div>
    </div>

    </div>
    <button type="button" onclick="copyForm()" class="function_button el-function_button">Копировать форму</button>
    <input type="submit" value="Отправить" class="function_button el-function_button">
</form>
<div>
    <h1>График продаж</h1>
</div>
<div class="container">
    <div class="chart-container">
        <canvas id="chart_quantity"></canvas>
    </div>
    <div>
        <canvas id="doughnut_quantity"></canvas>
    </div>
</div>

<div>
    <h1>График выручки</h1>
</div>
<div class="container">
    <div class="chart-container">
        <canvas id="chart_revenue"></canvas>
    </div>
    <div>
        <canvas id="doughnut_revenue"></canvas>
    </div>
</div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    var formCounter = 0; // Счетчик для уникальных идентификаторов форм

    function copyForm() {
        var formRow = $('.formRow').last().clone();
        formCounter++;
        formRow.attr('id', 'formRow' + formCounter); // Установка уникального идентификатора формы

        // Удаление существующей кнопки "Удалить форму", если она есть
        formRow.find('button').remove();

        formRow.append('<button type="button" onclick="removeForm(\'formRow' + formCounter + '\')" class="function_button el-function_button">Удалить форму</button>'); // Добавление кнопки удаления
        formRow.find('label[for="storename"]').attr('for', 'storename' + formCounter);
        formRow.find('#storename').attr('id', 'storename' + formCounter).attr('name', 'storename[]');
        formRow.find('label[for="fullname"]').attr('for', 'fullname' + formCounter);
        formRow.find('#fullname').attr('id', 'fullname' + formCounter).attr('name', 'fullname[]');
        formRow.find('label[for="productname"]').attr('for', 'productname' + formCounter);
        formRow.find('#productname').attr('id', 'productname' + formCounter).attr('name', 'productname[]');

        $('#formContainer').append(formRow);
    }

    function removeForm(formId) {
        $('#' + formId).remove();
    }

</script>
<script src="/atc/src/time.js"></script>
</body>
</html>


<?php
// Подключение к базе данных
$servername = 'localhost';
$username = 'root';
$password = 'root';
$dbname = 'test_pgtomy';
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Ошибка подключения: " . $conn->connect_error);
}
$quantity_mas=[];
$revenue_mas=[];
$dq_mas=[];
$dr_mas=[];
$saledate_mas=[];
$storename=$_POST['storename'];
$fullname=$_POST['fullname'];
$productname=$_POST['productname'];
$datepartmas=$_POST['datepart'];
$start_date=$_POST['date1'];
$end_date=$_POST['date2'];
if($end_date==NULL or $start_date==NULL){
    $start_date='2003-03-03';
    $end_date='2024-03-03';
}
$datepart=$datepartmas[0];
for ($i = 0; $i < count($storename); $i++) {
    $sql_store = "SELECT distinct store from sales where (store =('$storename[$i]') or '$storename[$i]' = '')";
    $sql_seller = "SELECT distinct seller from sales where (seller =('$fullname[$i]') or '$fullname[$i]' = '')";
    $sql_product = "SELECT distinct product from sales where (product =('$productname[$i]') or '$productname[$i]' = '')";
    $sql_store_result = $conn->query($sql_store);
    $sql_seller_result = $conn->query($sql_seller);
    $sql_product_result = $conn->query($sql_product);
    while ($row = mysqli_fetch_assoc($sql_store_result)) {
        $storeid[] = $row['store'];
    }

    while ($row = mysqli_fetch_assoc($sql_seller_result)) {
        $sellerid[] = $row['seller'];
    }
    while ($row = mysqli_fetch_assoc($sql_product_result)) {
        $productid[] = $row['product'];
    }

    $sql_revenue="SELECT SUM(quantity*s_price) as revenue, $datepart(saledate) as sd from sales
where $datepart(saledate) BETWEEN '$start_date' AND '$end_date' AND
(store IN('" . implode("','", $storeid) . "')) and (seller IN ('" . implode("','", $sellerid) . "')) and (product IN ('" . implode("','", $productid) . "')) GROUP BY $datepart(saledate) ORDER BY $datepart(saledate)";
    $sql_quantity="SELECT SUM(quantity) as quantity, $datepart(saledate) as sd from sales
where $datepart(saledate) BETWEEN '$start_date' AND '$end_date' AND
(store IN('" . implode("','", $storeid) . "')) and (seller IN ('" . implode("','", $sellerid) . "')) and (product IN ('" . implode("','", $productid) . "')) GROUP BY $datepart(saledate) ORDER BY $datepart(saledate)";
    $sql_doughnut_qr="SELECT SUM(quantity) sumq, SUM(quantity*s_price) sumr from sales
where saledate BETWEEN '$start_date' AND '$end_date' AND
(store IN('" . implode("','", $storeid) . "')) and (seller IN ('" . implode("','", $sellerid) . "')) and (product IN ('" . implode("','", $productid) . "')) GROUP BY saledate ORDER BY saledate";
    $sql_doughnut_qr_result=$conn->query($sql_doughnut_qr);
    while($row = mysqli_fetch_assoc($sql_doughnut_qr_result))
    {
        $sumq=$row['sumq'];
        $sumr=$row['sumr'];
    }

    $sql_final_result = $conn->query($sql_quantity);
    while ($row = mysqli_fetch_assoc($sql_final_result)) {
        $quantity[] = $row['quantity'];
        $saledate[] = $row['sd'];
    }
    $sql_final_revenue = $conn->query($sql_revenue);
    while ($row = mysqli_fetch_assoc($sql_final_revenue)) {
        $revenue[] = $row['revenue'];
    }
    $storeid=[];
    $sellerid=[];
    $productid=[];
    $quantity_mas[$i]=$quantity;
    $revenue_mas[$i]=$revenue;
    $saledate_mas[$i]=$saledate;
    $sumquantity[$i]=$sumq;
    $sumrevenue[$i]=$sumr;
    $quantity=[];
    $revenue=[];
    $saledate=[];


}

?>
<script>

    var ctx = document.getElementById('chart_quantity').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: [],
            datasets: []
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
    var ctx2 = document.getElementById('chart_revenue').getContext('2d');
    var myChart2 = new Chart(ctx2, {
        type: 'line',
        data: {
            labels: [],
            datasets: []
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
    var doughnutCtx1 = document.getElementById('doughnut_quantity').getContext('2d');
    // Инициализация графика типа doughnut с начальными данными
    var doughnutChart1 = new Chart(doughnutCtx1, {
        type: 'doughnut',
        data: [],
        options:  {
            responsive: true,
            maintainAspectRatio: false
        }
    });

    var doughnutCtx2 = document.getElementById('doughnut_revenue').getContext('2d');
    // Инициализация графика типа doughnut с начальными данными
    var doughnutChart2 = new Chart(doughnutCtx2, {
        type: 'doughnut',
        data: [],
        options:  {
            responsive: true,
            maintainAspectRatio: false
        }
    });



    // Получаем контекст canvas элемента
    var count_lines=<?php echo json_encode(count($storename))?>;
    var chart1=Chart.instances[0];
    var chart2=Chart.instances[1];
    var chart3=Chart.instances[2];
    var chart4=Chart.instances[3];



    // Создание графика


    var datasets1 = [];
    var datasets2 = [];
    var labels;
    labels=<?php echo json_encode($saledate_mas[0]);?>;
    if(count_lines===1){
        datasets1.push( {
            label: 'Магазин <?php echo json_encode($storename[0]);?>, Продавец <?php echo json_encode($fullname[0])?>, Товар <?php echo json_encode($productname[0])?>',
            data: <?php echo json_encode($quantity_mas[0]); ?>,
            borderColor: 'rgb(255, 1, 1)',
            backgroundColor: 'rgba(255, 99, 132, 0.2)',
            fill: false
        }, )
        datasets2.push( {
            label: 'Магазин <?php echo json_encode($storename[1]);?>, Продавец <?php echo json_encode($fullname[1])?>, Товар <?php echo json_encode($productname[1])?>',
            data: <?php echo json_encode($revenue_mas[0]); ?>,
            borderColor: 'rgb(255, 1, 1)',
            backgroundColor: 'rgba(255, 99, 132, 0.2)',
            fill: false
        }, )
        var dataQ={
            labels: ['Магазин <?php echo json_encode($storename[0]);?>, Продавец <?php echo json_encode($fullname[0])?>, Товар <?php echo json_encode($productname[0])?>'],
            datasets: [{
                data: <?php echo json_encode($sumquantity)?>,
                backgroundColor: ['rgb(255, 1, 1)', 'rgb(99,133,255)', 'rgb(6,134,6)', 'rgb(220,194,6)','rgb(220,1,255)']
            }]
        };
        var dataR={
            labels: ['Магазин <?php echo json_encode($storename[0]);?>, Продавец <?php echo json_encode($fullname[0])?>, Товар <?php echo json_encode($productname[0])?>'],
            datasets: [{
                data: <?php echo json_encode($sumrevenue)?>,
                backgroundColor: ['rgb(255, 1, 1)', 'rgb(99,133,255)', 'rgb(6,134,6)','rgb(220,194,6)','rgb(220,1,255)']
            }]
        };
    }
    if(count_lines===2){
        datasets1.push( {
            label: 'Магазин <?php echo json_encode($storename[0]);?>, Продавец <?php echo json_encode($fullname[0])?>, Товар <?php echo json_encode($productname[0])?>',
            data: <?php echo json_encode($quantity_mas[0]); ?>,
            borderColor: 'rgb(99,133,255)',
            backgroundColor: 'rgba(99,107,255,0.2)',
            fill: false
        }, )
        datasets1.push( {
            label: 'Магазин <?php echo json_encode($storename[1]);?>, Продавец <?php echo json_encode($fullname[1])?>, Товар <?php echo json_encode($productname[1])?>',
            data: <?php echo json_encode($quantity_mas[1]); ?>,
            borderColor: 'rgb(255, 1, 1)',
            backgroundColor: 'rgba(255, 99, 132, 0.2)',
            fill: false
        }, )
        datasets2.push( {
            label: 'Магазин <?php echo json_encode($storename[0]);?>, Продавец <?php echo json_encode($fullname[0])?>, Товар <?php echo json_encode($productname[0])?>',
            data: <?php echo json_encode($revenue_mas[0]); ?>,
            borderColor: 'rgb(99,133,255)',
            backgroundColor: 'rgba(99,107,255,0.2)',
            fill: false
        }, )
        datasets2.push( {
            label: 'Магазин <?php echo json_encode($storename[1]);?>, Продавец <?php echo json_encode($fullname[1])?>, Товар <?php echo json_encode($productname[1])?>',
            data: <?php echo json_encode($revenue_mas[1]); ?>,
            borderColor: 'rgb(255, 1, 1)',
            backgroundColor: 'rgba(255, 99, 132, 0.2)',
            fill: false
        }, )
        var dataQ={
            labels: [
                'Магазин <?php echo json_encode($storename[0]);?>, Продавец <?php echo json_encode($fullname[0])?>, Товар <?php echo json_encode($productname[0])?>',
                'Магазин <?php echo json_encode($storename[1]);?>, Продавец <?php echo json_encode($fullname[1])?>, Товар <?php echo json_encode($productname[1])?>'
            ],
            datasets: [{
                data: <?php echo json_encode($sumquantity)?>,
                backgroundColor: ['rgb(255, 1, 1)', 'rgb(99,133,255)', 'rgb(6,134,6)', 'rgb(220,194,6)','rgb(220,1,255)']
            }]
        };
        var dataR={
            labels: [
                'Магазин <?php echo json_encode($storename[0]);?>, Продавец <?php echo json_encode($fullname[0])?>, Товар <?php echo json_encode($productname[0])?>',
                'Магазин <?php echo json_encode($storename[1]);?>, Продавец <?php echo json_encode($fullname[1])?>, Товар <?php echo json_encode($productname[1])?>'
            ],            datasets: [{
                data: <?php echo json_encode($sumrevenue)?>,
                backgroundColor: ['rgb(255, 1, 1)', 'rgb(99,133,255)', 'rgb(6,134,6)','rgb(220,194,6)','rgb(220,1,255)']
            }]
        };
    }
    if(count_lines===3){
        datasets1.push( {
            label: 'Магазин <?php echo json_encode($storename[0]);?>, Продавец <?php echo json_encode($fullname[0])?>, Товар <?php echo json_encode($productname[0])?>',
            data: <?php echo json_encode($quantity_mas[0]); ?>,
            borderColor: 'rgb(99,133,255)',
            backgroundColor: 'rgba(99,107,255,0.2)',
            fill: false
        }, )
        datasets1.push( {
            label: 'Магазин <?php echo json_encode($storename[1]);?>, Продавец <?php echo json_encode($fullname[1])?>, Товар <?php echo json_encode($productname[1])?>',
            data: <?php echo json_encode($quantity_mas[1]); ?>,
            borderColor: 'rgb(255, 1, 1)',
            backgroundColor: 'rgba(255, 99, 132, 0.2)',
            fill: false
        }, )
        datasets1.push( {
            label: 'Магазин <?php echo json_encode($storename[2]);?>, Продавец <?php echo json_encode($fullname[2])?>, Товар <?php echo json_encode($productname[2])?>',
            data: <?php echo json_encode($quantity_mas[2]); ?>,
            borderColor: 'rgb(6,134,6)',
            backgroundColor: 'rgba(0, 255, 0, 0.2)',
            fill: false
        }, )
        datasets2.push( {
            label: 'Магазин <?php echo json_encode($storename[0]);?>, Продавец <?php echo json_encode($fullname[0])?>, Товар <?php echo json_encode($productname[0])?>',
            data: <?php echo json_encode($revenue_mas[0]); ?>,
            borderColor: 'rgb(99,133,255)',
            backgroundColor: 'rgba(99,107,255,0.2)',
            fill: false
        }, )
        datasets2.push( {
            label: 'Магазин <?php echo json_encode($storename[1]);?>, Продавец <?php echo json_encode($fullname[1])?>, Товар <?php echo json_encode($productname[1])?>',
            data: <?php echo json_encode($revenue_mas[1]); ?>,
            borderColor: 'rgb(255, 1, 1)',
            backgroundColor: 'rgba(255, 99, 132, 0.2)',
            fill: false
        }, )
        datasets2.push( {
            label: 'Магазин <?php echo json_encode($storename[2]);?>, Продавец <?php echo json_encode($fullname[2])?>, Товар <?php echo json_encode($productname[2])?>',
            data: <?php echo json_encode($revenue_mas[2]); ?>,
            borderColor: 'rgb(6,134,6)',
            backgroundColor: 'rgba(0, 255, 0, 0.2)',
            fill: false
        }, )
        var dataQ={
            labels: [
                'Магазин <?php echo json_encode($storename[0]);?>, Продавец <?php echo json_encode($fullname[0])?>, Товар <?php echo json_encode($productname[0])?>',
                'Магазин <?php echo json_encode($storename[1]);?>, Продавец <?php echo json_encode($fullname[1])?>, Товар <?php echo json_encode($productname[1])?>',
                'Магазин <?php echo json_encode($storename[2]);?>, Продавец <?php echo json_encode($fullname[2])?>, Товар <?php echo json_encode($productname[2])?>'
            ],
            datasets: [{
                data: <?php echo json_encode($sumquantity)?>,
                backgroundColor: ['rgb(255, 1, 1)', 'rgb(99,133,255)', 'rgb(6,134,6)', 'rgb(220,194,6)','rgb(220,1,255)']
            }]
        };
        var dataR={
            labels: [
                'Магазин <?php echo json_encode($storename[0]);?>, Продавец <?php echo json_encode($fullname[0])?>, Товар <?php echo json_encode($productname[0])?>',
                'Магазин <?php echo json_encode($storename[1]);?>, Продавец <?php echo json_encode($fullname[1])?>, Товар <?php echo json_encode($productname[1])?>',
                'Магазин <?php echo json_encode($storename[2]);?>, Продавец <?php echo json_encode($fullname[2])?>, Товар <?php echo json_encode($productname[2])?>'
            ],
            datasets: [{
                data: <?php echo json_encode($sumrevenue)?>,
                backgroundColor: ['rgb(255, 1, 1)', 'rgb(99,133,255)', 'rgb(6,134,6)','rgb(220,194,6)','rgb(220,1,255)']
            }]
        };
    }
    if(count_lines===4){
        datasets1.push( {
            label: 'Магазин <?php echo json_encode($storename[0]);?>, Продавец <?php echo json_encode($fullname[0])?>, Товар <?php echo json_encode($productname[0])?>',
            data: <?php echo json_encode($quantity_mas[0]); ?>,
            borderColor: 'rgb(99,133,255)',
            backgroundColor: 'rgba(99,107,255,0.2)',
            fill: false
        }, )
        datasets1.push( {
            label: 'Магазин <?php echo json_encode($storename[1]);?>, Продавец <?php echo json_encode($fullname[1])?>, Товар <?php echo json_encode($productname[1])?>',
            data: <?php echo json_encode($quantity_mas[1]); ?>,
            borderColor: 'rgb(255, 1, 1)',
            backgroundColor: 'rgba(255, 99, 132, 0.2)',
            fill: false
        }, )
        datasets1.push( {
            label: 'Магазин <?php echo json_encode($storename[2]);?>, Продавец <?php echo json_encode($fullname[2])?>, Товар <?php echo json_encode($productname[2])?>',
            data: <?php echo json_encode($quantity_mas[2]); ?>,
            borderColor: 'rgb(6,134,6)',
            backgroundColor: 'rgba(0, 255, 0, 0.2)',
            fill: false
        }, )
        datasets1.push( {
            label: 'Магазин <?php echo json_encode($storename[3]);?>, Продавец <?php echo json_encode($fullname[3])?>, Товар <?php echo json_encode($productname[3])?>',
            data: <?php echo json_encode($quantity_mas[3]); ?>,
            borderColor: 'rgb(220,194,6)',
            backgroundColor: 'rgba(220, 194, 0, 0.2)',
            fill: false
        }, )
        datasets2.push( {
            label: 'Магазин <?php echo json_encode($storename[0]);?>, Продавец <?php echo json_encode($fullname[0])?>, Товар <?php echo json_encode($productname[0])?>',
            data: <?php echo json_encode($revenue_mas[0]); ?>,
            borderColor: 'rgb(99,133,255)',
            backgroundColor: 'rgba(99,107,255,0.2)',
            fill: false
        }, )
        datasets2.push( {
            label: 'Магазин <?php echo json_encode($storename[1]);?>, Продавец <?php echo json_encode($fullname[1])?>, Товар <?php echo json_encode($productname[1])?>',
            data: <?php echo json_encode($revenue_mas[1]); ?>,
            borderColor: 'rgb(255, 1, 1)',
            backgroundColor: 'rgba(255, 99, 132, 0.2)',
            fill: false
        }, )
        datasets2.push( {
            label: 'Магазин <?php echo json_encode($storename[2]);?>, Продавец <?php echo json_encode($fullname[2])?>, Товар <?php echo json_encode($productname[2])?>',
            data: <?php echo json_encode($revenue_mas[2]); ?>,
            borderColor: 'rgb(6,134,6)',
            backgroundColor: 'rgba(0, 255, 0, 0.2)',
            fill: false
        }, )
        datasets2.push( {
            label: 'Магазин <?php echo json_encode($storename[3]);?>, Продавец <?php echo json_encode($fullname[3])?>, Товар <?php echo json_encode($productname[3])?>',
            data: <?php echo json_encode($revenue_mas[3]); ?>,
            borderColor: 'rgb(220,194,6)',
            backgroundColor: 'rgba(220, 194, 0, 0.2)',
            fill: false
        }, )
        var dataQ={
            labels: [
                'Магазин <?php echo json_encode($storename[0]);?>, Продавец <?php echo json_encode($fullname[0])?>, Товар <?php echo json_encode($productname[0])?>',
                'Магазин <?php echo json_encode($storename[1]);?>, Продавец <?php echo json_encode($fullname[1])?>, Товар <?php echo json_encode($productname[1])?>',
                'Магазин <?php echo json_encode($storename[2]);?>, Продавец <?php echo json_encode($fullname[2])?>, Товар <?php echo json_encode($productname[2])?>',
                'Магазин <?php echo json_encode($storename[3]);?>, Продавец <?php echo json_encode($fullname[3])?>, Товар <?php echo json_encode($productname[3])?>'
            ],
            datasets: [{
                data: <?php echo json_encode($sumquantity)?>,
                backgroundColor: ['rgb(255, 1, 1)', 'rgb(99,133,255)', 'rgb(6,134,6)', 'rgb(220,194,6)','rgb(220,1,255)']
            }]
        };
        var dataR={
            labels: [
                'Магазин <?php echo json_encode($storename[0]);?>, Продавец <?php echo json_encode($fullname[0])?>, Товар <?php echo json_encode($productname[0])?>',
                'Магазин <?php echo json_encode($storename[1]);?>, Продавец <?php echo json_encode($fullname[1])?>, Товар <?php echo json_encode($productname[1])?>',
                'Магазин <?php echo json_encode($storename[2]);?>, Продавец <?php echo json_encode($fullname[2])?>, Товар <?php echo json_encode($productname[2])?>',
                'Магазин <?php echo json_encode($storename[3]);?>, Продавец <?php echo json_encode($fullname[3])?>, Товар <?php echo json_encode($productname[3])?>'
            ],
            datasets: [{
                data: <?php echo json_encode($sumrevenue)?>,
                backgroundColor: ['rgb(255, 1, 1)', 'rgb(99,133,255)', 'rgb(6,134,6)','rgb(220,194,6)','rgb(220,1,255)']
            }]
        };
    }
    if(count_lines===5) {
        datasets1.push({
            label: 'Магазин <?php echo json_encode($storename[0]);?>, Продавец <?php echo json_encode($fullname[0])?>, Товар <?php echo json_encode($productname[0])?>',
            data: <?php echo json_encode($quantity_mas[0]); ?>,
            borderColor: 'rgb(99,133,255)',
            backgroundColor: 'rgba(99,107,255,0.2)',
            fill: false
        },)
        datasets1.push({
            label: 'Магазин <?php echo json_encode($storename[1]);?>, Продавец <?php echo json_encode($fullname[1])?>, Товар <?php echo json_encode($productname[1])?>',
            data: <?php echo json_encode($quantity_mas[1]); ?>,
            borderColor: 'rgb(255, 1, 1)',
            backgroundColor: 'rgba(255, 99, 132, 0.2)',
            fill: false
        },)
        datasets1.push({
            label: 'Магазин <?php echo json_encode($storename[2]);?>, Продавец <?php echo json_encode($fullname[2])?>, Товар <?php echo json_encode($productname[2])?>',
            data: <?php echo json_encode($quantity_mas[2]); ?>,
            borderColor: 'rgb(6,134,6)',
            backgroundColor: 'rgba(0, 255, 0, 0.2)',
            fill: false
        },)
        datasets1.push({
            label: 'Магазин <?php echo json_encode($storename[3]);?>, Продавец <?php echo json_encode($fullname[3])?>, Товар <?php echo json_encode($productname[3])?>',
            data: <?php echo json_encode($quantity_mas[3]); ?>,
            borderColor: 'rgb(220,194,6)',
            backgroundColor: 'rgba(220, 194, 0, 0.2)',
            fill: false
        },)
        datasets1.push({
            label: 'Магазин <?php echo json_encode($storename[4]);?>, Продавец <?php echo json_encode($fullname[4])?>, Товар <?php echo json_encode($productname[4])?>',
            data: <?php echo json_encode($quantity_mas[4]); ?>,
            borderColor: 'rgb(220,1,255)',
            backgroundColor: 'rgba(220, 1, 255, 0.2)',
            fill: false
        },)
        datasets2.push({
            label: 'Магазин <?php echo json_encode($storename[0]);?>, Продавец <?php echo json_encode($fullname[0])?>, Товар <?php echo json_encode($productname[0])?>',
            data: <?php echo json_encode($revenue_mas[0]); ?>,
            borderColor: 'rgb(99,133,255)',
            backgroundColor: 'rgba(99,107,255,0.2)',
            fill: false
        },)
        datasets2.push({
            label: 'Магазин <?php echo json_encode($storename[1]);?>, Продавец <?php echo json_encode($fullname[1])?>, Товар <?php echo json_encode($productname[1])?>',
            data: <?php echo json_encode($revenue_mas[1]); ?>,
            borderColor: 'rgb(255, 1, 1)',
            backgroundColor: 'rgba(255, 99, 132, 0.2)',
            fill: false
        },)
        datasets2.push({
            label: 'Магазин <?php echo json_encode($storename[2]);?>, Продавец <?php echo json_encode($fullname[2])?>, Товар <?php echo json_encode($productname[2])?>',
            data: <?php echo json_encode($revenue_mas[2]); ?>,
            borderColor: 'rgb(6,134,6)',
            backgroundColor: 'rgba(0, 255, 0, 0.2)',
            fill: false
        },)
        datasets2.push({
            label: 'Магазин <?php echo json_encode($storename[3]);?>, Продавец <?php echo json_encode($fullname[3])?>, Товар <?php echo json_encode($productname[3])?>',
            data: <?php echo json_encode($revenue_mas[3]); ?>,
            borderColor: 'rgb(220,194,6)',
            backgroundColor: 'rgba(220, 194, 0, 0.2)',
            fill: false
        },)
        datasets2.push({
            label: 'Магазин <?php echo json_encode($storename[4]);?>, Продавец <?php echo json_encode($fullname[4])?>, Товар <?php echo json_encode($productname[4])?>',
            data: <?php echo json_encode($revenue_mas[4]); ?>,
            borderColor: 'rgb(220,1,255)',
            backgroundColor: 'rgba(220, 1, 255, 0.2)',
            fill: false
        },)
        var dataQ={
            labels: [
                'Магазин <?php echo json_encode($storename[0]);?>, Продавец <?php echo json_encode($fullname[0])?>, Товар <?php echo json_encode($productname[0])?>',
                'Магазин <?php echo json_encode($storename[1]);?>, Продавец <?php echo json_encode($fullname[1])?>, Товар <?php echo json_encode($productname[1])?>',
                'Магазин <?php echo json_encode($storename[2]);?>, Продавец <?php echo json_encode($fullname[2])?>, Товар <?php echo json_encode($productname[2])?>',
                'Магазин <?php echo json_encode($storename[3]);?>, Продавец <?php echo json_encode($fullname[3])?>, Товар <?php echo json_encode($productname[3])?>',
                'Магазин <?php echo json_encode($storename[4]);?>, Продавец <?php echo json_encode($fullname[4])?>, Товар <?php echo json_encode($productname[4])?>'
            ],
            datasets: [{
                data: <?php echo json_encode($sumquantity)?>,
                backgroundColor: ['rgb(255, 1, 1)', 'rgb(99,133,255)', 'rgb(6,134,6)', 'rgb(220,194,6)','rgb(220,1,255)']
            }]
        };
        var dataR={
            labels: [
                'Магазин <?php echo json_encode($storename[0]);?>, Продавец <?php echo json_encode($fullname[0])?>, Товар <?php echo json_encode($productname[0])?>',
                'Магазин <?php echo json_encode($storename[1]);?>, Продавец <?php echo json_encode($fullname[1])?>, Товар <?php echo json_encode($productname[1])?>',
                'Магазин <?php echo json_encode($storename[2]);?>, Продавец <?php echo json_encode($fullname[2])?>, Товар <?php echo json_encode($productname[2])?>',
                'Магазин <?php echo json_encode($storename[3]);?>, Продавец <?php echo json_encode($fullname[3])?>, Товар <?php echo json_encode($productname[3])?>',
                'Магазин <?php echo json_encode($storename[4]);?>, Продавец <?php echo json_encode($fullname[4])?>, Товар <?php echo json_encode($productname[4])?>',
            ],
            datasets: [{
                data: <?php echo json_encode($sumrevenue)?>,
                backgroundColor: ['rgb(255, 1, 1)', 'rgb(99,133,255)', 'rgb(6,134,6)','rgb(220,194,6)','rgb(220,1,255)','rgb(220,1,255)']
            }]
        };
    }
    chart1.data.datasets = datasets1;
    chart1.data.labels = labels;
    chart2.data.datasets = datasets2;
    chart2.data.labels = labels;
    chart3.data=dataQ;
    chart4.data=dataR;
    // Перерисовываем график
    chart1.update();
    chart2.update();
    chart3.update();
    chart4.update();

</script>
