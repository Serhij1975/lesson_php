<?php
/*
Задача 1. Написать mysql patch. Пропатчить таблицу логов. Добавить поле log_type, один из (“CRIT”, “ERROR” “DEBUG”, “INFO”), по умолчанию “INFO”.
Использовать ALTER TABLE.
Исходная таблица:
create table `logs` (id int auto_increment primary key, msg varchar(255));
insert into `logs` values (null, 'log message');
*/


mysqli_report(MYSQLI_REPORT_ALL);
$mysqli = mysqli_connect('localhost', 'suppliers3_u', '111', 'suppliers3');
if (!$mysqli) {
    printf("Unable to connect: %s\n", mysqli_connect_error());
    exit();
}
$mt = mysqli_prepare($mysqli, "ALTER TABLE `logs` ADD `log_type` ENUM('INFO','DEBUG','ERROR','CRIT') NOT NULL DEFAULT 'INFO' AFTER `created`;");
$ready = mysqli_stmt_execute($mt);
if ($ready) {
    echo 'Your table has been successfully populated!';
} else{
    echo 'Connection not established!';
}
