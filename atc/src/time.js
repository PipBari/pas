const timeValue = document.querySelector(".time-value");

// Функция, которая обновляет время каждые 1000 миллисекунд (1 секунду)
function updateTime() {
  const currentDate = new Date();

  // Форматирование времени
  const formattedTime = `${currentDate.getHours()}:${currentDate.getMinutes().toString().padStart(2, '0')}`;
  const formattedDate = `${currentDate.getDate().toString().padStart(2, '0')}.${(currentDate.getMonth() + 1).toString().padStart(2, '0')}.${currentDate.getFullYear()}`;

  // Обновление текста
  timeValue.textContent = `${formattedTime} ${formattedDate}`;
}

// обновления времени
updateTime();

// Обновление времени каждую секунду
setInterval(updateTime, 1000);
