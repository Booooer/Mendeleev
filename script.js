// Обработка формы
function SendJSON(){
  event.preventDefault()

  // Переменная для готовой ссылки
  let servResponse = document.querySelector('#answer')

  let url = document.querySelector('.url')

  let xhr = new XMLHttpRequest()

  xhr.open('POST', 'url.php', true)

  xhr.setRequestHeader('Content-Type',
  'application/json')

  // Проверка статуса запроса
  xhr.onreadystatechange = function(){
    if (xhr.readyState === 4 && xhr.status === 200) {
      servResponse.textContent = xhr.responseText
      document.getElementById('answer').value = servResponse.textContent
    }
  }
  // Конвертация данных в формат JSON
  var data = JSON.stringify({'url': url.value})
  // Отправка данных в обработчик
    xhr.send(data)
}
// Копирование в буфер обмена готовой ссылки
function Copy(){
  const elem = document.getElementById('answer').value
  if (elem != undefined) {
    navigator.clipboard.writeText(elem)
    alert('Вы скопирорвали ссылку: ' + elem)
  }
}
