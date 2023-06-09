<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>aut</title>
  <style>
        .logo {
			height: 8%; /* Устанавливаем высоту логотипа на 100% */
			margin-right: 0px; /* Добавляем отступ между логотипом и кнопками */
		}

        form {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }
        label {
            margin-bottom: 10px;
            font-weight: bold;
            font-size: 18px;
        }
        input[type="text"], input[type="password"] {
            margin-bottom: 20px;
            padding: 10px;
            font-size: 18px;
            border-radius: 5px;
            border: 1px solid #605DEC;
        }
        button[type="submit"] {
            background-color: #605DEC;
            color: #fff;
            padding: 10px 20px;
            font-size: 18px;
            border-radius: 5px;
            border: none;
            cursor: pointer;
        }
        button[type="submit"]:hover {
            background-color: #605DEC;
        }
    </style>
</head>
<body>
<?php
if($_COOKIE['user']==''):
    ?>

    <form action="authentication/auth.php" method="post">
        <img class="logo" src="img/logotip.png">
        <label for="username">логин</label>
        <input type="text" id="username" name="username" required>
        <label for="password">пароль</label>
        <input type="password" id="password" name="password" required>
        <button type="submit">Войти</button>
    </form>
<? endif ?>
</body>
</html>
