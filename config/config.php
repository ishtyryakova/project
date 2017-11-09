<?php
session_start();
$title = 'Blog Home - Start Bootstrap Template';
$description = 'Описание сайта';
$keywords = 'Товары для дома, ...';
$email = 'katya.i099@gmail.com';




/* Переменные подключения */

$db_location = 'localhost';
$db_user = 'root';
$db_pass = '';
$db_name = 'site';
$db_con = mysqli_connect($db_location, $db_user, $db_pass, $db_name);

if (!$db_con)	{
	exit('error');
}


mysqli_query($db_con, "SET NAMES 'utf-8'");


