var filterStorename = "";
var filterAdress = "";
var filterLogin = "";
var filterPassword = "";

function filter_reg() {
  // Получаем значения фильтров из полей ввода
  filterStorename = document.querySelector('input[name="storename"]').value;
  filterAdress = document.querySelector('input[name="adress"]').value;
  filterLogin = document.querySelector('input[name="login"]').value;
  filterPassword = document.querySelector('input[name="password"]').value;

  // Получаем все строки таблицы
  var rows = document.querySelectorAll('.filter-table tr.component__table');
  // Проходимся по каждой строке (начиная с индекса 0, так как не пропускаем заголовок таблицы)
  for (var i = 0; i < rows.length; i++) {
    var row = rows[i];

    // Получаем значения каждой ячейки в текущей строке
    var storename = row.cells[0].querySelector('input[name="storename"]').value;
    var adress = row.cells[1].querySelector('input[name="adress"]').value;
    var login = row.cells[2].querySelector('input[name="login"]').value;
    var password = row.cells[3].querySelector('input[name="password"]').value;


    // Применяем фильтр по каждому полю
    var storenameMatch = storename.includes(filterStorename);
    var adressMatch = adress.includes(filterAdress);
    var loginMatch = login.includes(filterLogin);
    var passwordMatch = password.includes(filterPassword);

    // Проверяем, соответствуют ли значения фильтрам
    if (storenameMatch && adressMatch && loginMatch && passwordMatch) {
      row.style.display = ""; // Отображаем строку
    } else {
      row.style.display = "none"; // Скрываем строку
    }
  }

  // Восстанавливаем значения фильтров
  document.querySelector('input[name="storename"]').value = filterStorename;
  document.querySelector('input[name="adress"]').value = filterAdress;
  document.querySelector('input[name="login"]').value = filterLogin;
  document.querySelector('input[name="password"]').value = filterPassword;

  // Принудительно обновляем отображение после фильтрации
}
