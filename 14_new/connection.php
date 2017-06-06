<?php

$mysqli = mysqli_connect('localhost', 'suppliers3_u', '111', 'suppliers3');

if (!$mysqli) {
    print_r("I can't connect %s\n", mysqli_connect_error());
    exit();
}
?>