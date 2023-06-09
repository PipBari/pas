function filter_reports() {
  var filterFio = document.querySelector('input[name="fullname"]').value;
  var filterArticle = document.querySelector('input[name="sku"]').value;
  var filterName = document.querySelector('input[name="productname"]').value;
  var filterQuantity = document.querySelector('input[name="quantity"]').value;
  var filterPrice = document.querySelector('input[name="price"]').value;
  var filterStartDate = document.querySelector('#start-date').value;
  var filterEndDate = document.querySelector('#end-date').value;
  var filterStorename = document.querySelector('input[name="storename"]').value;

  var rows = document.querySelectorAll('.filter-table tr.component__table');

  for (var i = 0; i < rows.length; i++) {
    var row = rows[i];

    var fio = row.cells[0].textContent;
    var article = row.cells[1].textContent;
    var name = row.cells[2].textContent;
    var quantity = row.cells[3].textContent;
    var price = row.cells[4].textContent;
    var date = row.cells[5].textContent;
    var storename = '';

    var storenameCell = row.querySelector('.storename');
    if (storenameCell) {
      storename = storenameCell.textContent;
    }

    var fioMatch = fio.includes(filterFio);
    var articleMatch = article.includes(filterArticle);
    var nameMatch = name.includes(filterName);
    var quantityMatch = quantity.includes(filterQuantity);
    var priceMatch = price.includes(filterPrice);

    var dateMatch = true;
    var isSingleDateFilter = filterStartDate && !filterEndDate;

    if (isSingleDateFilter) {
      var rowDate = new Date(date);
      var startFilterDate = new Date(filterStartDate);

      dateMatch = rowDate.toDateString() === startFilterDate.toDateString();
    } else if (!filterStartDate && filterEndDate) {
      var rowDate = new Date(date);
      var endFilterDate = new Date(filterEndDate);

      dateMatch = rowDate <= endFilterDate;
    } else if (filterStartDate && filterEndDate) {
      var rowDate = new Date(date);
      var startFilterDate = new Date(filterStartDate);
      var endFilterDate = new Date(filterEndDate);

      dateMatch = rowDate >= startFilterDate && rowDate <= endFilterDate;
    }

    var storenameMatch = storename.includes(filterStorename);

    if (
      fioMatch &&
      articleMatch &&
      nameMatch &&
      quantityMatch &&
      priceMatch &&
      dateMatch &&
      storenameMatch
    ) {
      row.style.display = ""; // Отображаем строку
    } else {
      row.style.display = "none"; // Скрываем строку
    }
  }

  document.querySelector('input[name="fullname"]').value = filterFio;
  document.querySelector('input[name="sku"]').value = filterArticle;
  document.querySelector('input[name="productname"]').value = filterName;
  document.querySelector('input[name="quantity"]').value = filterQuantity;
  document.querySelector('input[name="price"]').value = filterPrice;
  document.querySelector('#start-date').value = filterStartDate;
  document.querySelector('#end-date').value = filterEndDate;
  document.querySelector('input[name="storename"]').value = filterStorename;
}
