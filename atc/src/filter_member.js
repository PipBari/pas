// Сохранение значений фильтров
var filterFullname = "";
var filterPhonenumber= "";
var filterStorename = "";

function filter_member() {

  // Получаем значения фильтров из полей ввода
  filterFullname = document.querySelector('input[name="fullname"]').value;
  filterPhonenumber = document.querySelector('input[name="phonenumber"]').value;
  filterStorename = document.querySelector('input[name="storename"]').value;

  // Получаем все строки таблицы
  var rows = document.querySelectorAll('.filter-table tr.component__table');
  // Проходимся по каждой строке (начиная с индекса 0, так как не пропускаем заголовок таблицы)
  for (var i = 0; i < rows.length; i++) {
    var row = rows[i];

    // Получаем значения каждой ячейки в текущей строке
    var fullname = row.cells[0].textContent;
    var phonenumber = row.cells[1].textContent;
    var storename = row.cells[2].textContent;

    // Применяем фильтр по каждому полю
    var fullnameMatch = fullname.includes(filterFullname);
    var phonenumberMatch = phonenumber.includes(filterPhonenumber);
    var storenameMatch = storename.includes(filterStorename);

    // Проверяем, соответствуют ли значения фильтрам
    if (fullnameMatch && phonenumberMatch && storenameMatch) {
      row.style.display = ""; // Отображаем строку
    } else {
      row.style.display = "none"; // Скрываем строку
    }
  }

  // Восстанавливаем значения фильтров
  document.querySelector('input[name="fullname"]').value = filterFullname;
  document.querySelector('input[name="phonenumber"]').value = filterPhonenumber;
  document.querySelector('input[name="storename"]').value = filterStorename;
}
