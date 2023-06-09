// Сохранение значений фильтров
var filterProductname = "";
var filterSku = "";
var filterPrice = "";
var filterStorename = "";

function filter_product() {
  // Получаем значения фильтров из полей ввода
  filterProductname = document.querySelector('input[name="productname"]').value;
  filterSku = document.querySelector('input[name="sku"]').value;
  filterPrice = document.querySelector('input[name="price"]').value;
  filterStorename = document.querySelector('input[name="storename"]').value;

  // Получаем все строки таблицы
  var rows = document.querySelectorAll('.filter-table tr.component__table');
  // Проходимся по каждой строке (начиная с индекса 0, так как не пропускаем заголовок таблицы)
  for (var i = 0; i < rows.length; i++) {
    var row = rows[i];

    // Получаем значения каждой ячейки в текущей строке
    var productname = row.cells[0].textContent;
    var sku = row.cells[1].textContent;
    var price = row.cells[2].textContent;
    var storename = row.cells[3].textContent;

    // Применяем фильтр по каждому полю
    var productnameMatch = productname.includes(filterProductname);
    var skuMatch = sku.includes(filterSku);
    var priceMatch = price.includes(filterPrice);
    var storenameMatch = storename.includes(filterStorename);

    // Проверяем, соответствуют ли значения фильтрам
    if (
      productnameMatch &&
      skuMatch &&
      priceMatch &&
      storenameMatch
    ) {
      row.style.display = ""; // Отображаем строку
    } else {
      row.style.display = "none"; // Скрываем строку
    }
  }

  // Восстанавливаем значения фильтров
  document.querySelector('input[name="productname"]').value = filterProductname;
  document.querySelector('input[name="sku"]').value = filterSku;
  document.querySelector('input[name="price"]').value = filterPrice;
  document.querySelector('input[name="storename"]').value = filterStorename;
}
