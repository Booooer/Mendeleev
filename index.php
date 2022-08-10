<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="style.css">
  <title>Сократитель ссылок</title>
</head>
<body>
  <main>
    <div class="main-field">
      <div class="main-label">
        <h1>Сократитель ссылок</h1>
        <p>Введите в поле ввода любую рабочую ссылку и мы сократим её для вас!</p>
      </div>
      <!-- Поле ввода  -->
      <form class="link-form" role="form">
        <div class="link-field">
          <input type="text" class="url"  placeholder="Введите ссылку">
        </div>
        <button class="link-btn" type="submit" name="btn" onclick="SendJSON()">Рассчитать</button>
      </form>
      <!-- Готовая ссылка  -->
      <div id="response">
        <h3>Готовая ссылка:</h3>
          <div id="answer" onclick="Copy()"></div>
      </div>
    </div>
  </main>
  <!-- JS файлы  -->
  <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
  <script type="text/javascript" src="script.js"></script>
</body>
</html>
