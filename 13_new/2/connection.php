<?php
$mysqli = mysqli_connect('localhost', 'suppliers3_u', '111', 'suppliers3');
if (!$mysqli) {
    printf("I can't connection: %s\n", mysqli_connect_error());
    exit();
}
