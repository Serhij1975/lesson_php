<!-- Задача 2. База данных вопрос-ответ на файлах. 
Создать интерфейс для записи вопроса, ответа, и категории (категорию выбирать из селектбокса). 
Проверить входящие данные и сохранить в файл.
Создать интерфейс для просмотра номера вопроса, вопрос, ответ, категория.
Сделать фильтр по категории. -->

<form method="POST">
<div>Введите вопрос
 <input type="text" name="asc" required placeholder="Введите вопрос" autofocus>
</div>
<div>Введите ответ
 <input type="text" name="answer" required placeholder="Введите ответ">
</div>

 <select name="sorting">
        <option name="kat1">k1</option>
        <option name="kat2">k2</option>
        <option name="kat3">k3</option>
    </select>
    <input type="submit" name="sub" value="Отправить">
    <input type="reset" value="Очистить">
</form>

<?php
if(!empty($_POST["asc"]) && !empty($_POST["answer"]) && !empty($_POST["sorting"])){
$asc=$_POST["asc"];
$answer=$_POST["answer"];
$sorting=$_POST["sorting"];
  $list = array ($asc, $answer, $sorting);
  // var_dump($list);
  $fp = fopen("asc_answer.csv", "a+");
     fputcsv($fp, $list);
   fclose($fp);
}
?>

<form name="sort">
    <select name="sorting">
        <option name="kat1" value="kat1">k1</option>
        <option name="kat2" value="kat2">k2</option>
        <option name="kat3" value="kat3">k3</option>
    </select>
    <input type="submit" value="Отфильтровать">
</form>
<?php

$file = file('asc_answer.csv');
// var_dump($file);

if ($_REQUEST['sorting'] == "kat2") {
  // var_dump("sorting");
    foreach ($file as $value) {
        $exp = explode(",", $value);
        // var_dump($exp[2]); 
        // var_dump("kat2");
        if ($exp[2] == '"k2"')
        // if ($_REQUEST['sorting'] == '"k2"')
         {
            echo $exp[0] . ' ' . $exp[1] . ' ' . $exp[2] . '<br>';
        }
    }
}
if ($_REQUEST["sorting"] == "kat1") {
    foreach ($file as $value) {
        $exp = explode(",", $value);
        // var_dump($exp[2]);
        if ($exp[2] == '"k1"
'

        ) {
            echo $exp[0] . ' ' . $exp[1] . ' ' . $exp[2] . '<br>';
        }
    }
}
if ($_REQUEST["sorting"] == "kat3") {
    foreach ($file as $value) {
        $exp = explode(",", $value);
        // var_dump($exp[2]);
        if ($exp[2] == '"k3"
'
        ) {
            echo $exp[0] . ' ' . $exp[1] . ' ' . $exp[2] . '<br>';
        }
    }
}

?>