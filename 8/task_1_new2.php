<?php 
/*чтобы инициировать работу сессии, нужно перед выводом на экран 
любого кода HTML вызвать PHP-функцию session_start*/

session_start ();
?>
<!DOCTYPE html>
<html>
<head>
<title>Внесение в текстовый файл</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body>
<?php

/*Проверяем, что форма пришла (переменная $_SERVER - это массив,содержащий информацию,такую 
как заголовки,пути,местоположения скриптов. Записи в этом массиве создаются веб-сервером.) 
($_SERVER['REQUEST_METHOD'] - какой метод был использован для запроса страницы: 'GET', 'HEAD', 'POST', 'PUT').*/

if($_SERVER['REQUEST_METHOD'] == "POST"){
    
    // Создаём массив $_SESSION['users'], внутри которого будут храниться все пользователи. При отправке формы сразу добавляем пришедшие данные в этот массив.
    $_SESSION['users'][] = array('name' => $_POST['name'], 'last_name' => $_POST['last_name'], 'fathers_name' => $_POST['fathers_name']);
    echo 'Вы внесены в список!'; 
}else{ 
    echo 'Заполните поля'; 
}
?>
<form action="" method="post">
Ваше имя:
<input name="name" type="text" ><br>
Ваша фамилия:
<input name="last_name" type="text" ><br>
Ваше отчество:
<input name="fathers_name" type="text" ><br>
<input type="submit" value="Записаться">
</p>
</form>
<? 
    // Если массив users существует - выводим всех пользователей. 
    if(isset($_SESSION['users'])){
    
    // Выводим пользователей через массив.
    foreach($_SESSION['users'] as $user){
        echo '<p>' . $user['last_name'] . ' ' . $user['name'] . ' ' . $user['fathers_name'] . '</p>'; 
    }
} 
?>
</body>
</html>