<?php
$mysqli = mysqli_connect('localhost', 'suppliers_u', '111', 'suppliers');
	if (!$mysqli) {
    	printf("not connection: %s\n", mysqli_connect_error());
    exit();
}
