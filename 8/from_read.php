<?php
$f = fopen('list_staff.csv', 'r');
while (!feof($f)){
echo fgets($f);
}
fclose($f);