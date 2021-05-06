<?php
require 'Medoo.php';
use Medoo\Medoo;

$database = new Medoo([
	'database_type' => 'mysql',
	'database_name' => 'task_panel',
	'server' => 'localhost:3306',
	'username' => 'root',
	'password' => 'rootpass',
]);

?>