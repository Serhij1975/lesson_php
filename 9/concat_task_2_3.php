
<form method="POST">
<div>Введите вопрос
 <input type="text" name="asc" required placeholder="Введите вопрос" autofocus>
</div>
<div>Введите ответ
 <input type="text" name="answer" required placeholder="Введите ответ">
</div>
<!-- <div>Введите категорию -->
 <!-- <input type="text" name="cat" required placeholder="Введите категорию"> -->
<!-- </div> -->

<div>Введите категорию
 <select  name="sorting">
  <!-- <option value="asc" name="asc">по категории</option> -->


   <option value="1first"  name="1first" >по 1 категории</option>
   <option value="2second" name="2second">по 2 категории</option>
   <option value="3third"  name="3third" >по 3 категории</option>
   
<!--    <option value="1"  name="1" >по 1 категории</option>
   <option value="2"  name="2">по 2 категории</option>
   <option value="3"  name="3" >по 3 категории</option> -->

  <!-- <option value="desc" name="desc">по убыванию</option> -->
 </select>
</div>
<div>
 <!-- filter<input type="text" name="filter" placeholder="фильтр"><br><br> -->
</div>
<div><input type="submit"></div>
</form>

<?php
if(!empty($_POST['asc']) && !empty($_POST['answer']) && !empty($_POST['sorting'])){
$asc=$_POST['asc'];
$answer=$_POST['answer'];
$sorting=$_POST['sorting'];
  $list = array ($asc, $answer, $sorting);
  // var_dump($list);
  $fp = fopen("asc_answer.csv", "a+");
     fputcsv($fp, $list);
   fclose($fp);
}
/*
$fp = fopen("asc_answer.csv", "r");         
while ( ( $info = fgetcsv( $fp, 1000, "@" ) ) !== false ) {
 // выводим масив результат
 print_r( $info );
 }
// закрываем файл
fclose( $fp );
*/

$f = fopen("asc_answer.csv", "r");
for ($i=1; $text=fgetcsv($f,1000,","); $i++) {
  $m = $text;
  $num = count($text);
  echo "Вопрос № $i: ";
  // for ($c=0; $c<$num; $c++)
  for ($c=0; $c<1; $c++)
    // print "Ответ $text[$c]<br>";
    print("$text[0]<br>" . "Ответ: $text[1]<br>" . "Категория: $text[2]<br><br>");
}
// var_dump($list);
// fclose($f);

// $f = fopen("asc_answer.csv", "r");

if ($_POST["sorting_category"] == "cat") {
// var_dump($f);
    sort($m);
    foreach ($m as $value) {
       $exp = explode(",", $value);
      echo ($exp[0] . ' ' . $exp[1] . ' ' . $exp[2] .'<br>');
}
 
}

fclose($f);
?>

 <!-- <select  name="sorting_category"> -->
 <!-- <option value="asc" name="asc">по категории</option> -->
<form method="POST">
<div>Отсортировать по 
<select  name="sorting_category">
  <option value="cat" name="cat">по категориям</option>
<!--  <option value="first"    name="first">по 1 категории</option>
   <option value="second" name="second">по 2 категории</option>
   <option value="third"  name="third">по 3 категории</option> -->
</select>
</div>
<div><input type="submit"></div>
</form>

