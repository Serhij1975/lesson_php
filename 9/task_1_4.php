<?php

// Задача 1. Провалидировать строку на формат даты: dd.mm.yyyy, например 18.06.2007

function checking_date_format($data){
$reg_expression = "/^([0-9]{2}).([0-9]{2}).([0-9]{4})$/"; 
 
  if ( preg_match($reg_expression, $data, $razdeli) ) :

// preg_match — Выполняет проверку на соответствие регулярному выражению

  /* Формат проверки - MM, DD, YYYY: */
  if ( checkdate($razdeli[2],$razdeli[1],$razdeli[3]) )
                       // месяц, день, год
// bool checkdate ( int $month , int $day , int $year )
// Проверяет корректность даты по переданным аргументам. Дата считается корректной, если все параметры принимают допустимые значения. 

    return true;
  else
    return false;
  else :
    return false;
  endif;
}

$data = null;
if (!empty($_POST['data'])) {
    $data = $_POST['data'];

// вызов функции
if ( checking_date_format($data) )
  echo 'формат даты указан верно.<br />';
else
  echo 'формат даты указан неверно.<br />';
    
} 
else echo 'data не передана';
?>

<form method="post">
    <div>Введите строку в формате даты: dd.mm.yyyy <input type="text" name="data" value="<?php echo $data ?>"></div>
    
    <div><input type="submit" value="Send"></div>
</form>