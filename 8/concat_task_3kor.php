<?php

echo"<pre><pre>";

$l = file('http://localhost/8/from_read.php');

print_r ($l);
if ($_REQUEST["sorting"] == "asc") {
    sort($l);
    foreach ($l as $value) {
       $exp = explode(",", $value);
      echo $exp[0] . ' ' . $exp[1] . ' ' . $exp[2] .'<br>';
    if (($_REQUEST["filter"] == $exp[0]) || ($_REQUEST["filter"] == $exp[1])) {
        echo 'found===>' . $exp[0] . ' ' . $exp[1] . ' ' . $exp[2] .'<br>';
    }
        }
    }elseif ($_REQUEST["sorting"] == "desc") {
    rsort($l);
    foreach ($l as $value) {
        $exp = explode(",", $value);
       echo $exp[0] . ' ' . $exp[1] . ' ' . $exp[2] .'<br>'; 
    if (($_REQUEST["filter"] == $exp[0]) || ($_REQUEST["filter"] == $exp[1])) {
        echo 'found===>' . $exp[0] . ' ' . $exp[1] . ' ' . $exp[2] .'<br>';
    }
    }
}

?>

<form method="REQUEST">

<div>
 <select  name="sorting">
  <option value="asc" name="asc">по возрастанию</option>
  <option value="desc" name="desc">по убыванию</option>
 </select>
</div>
<div>
 filter<input type="text" name="filter" placeholder="фильтр"><br><br>
</div>
<div><input type="submit"></div>
</form>