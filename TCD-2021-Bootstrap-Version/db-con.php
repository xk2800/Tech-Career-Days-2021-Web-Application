<?php
$ip=getenv('DBIP');
$use=getenv('DBUSER');
$pwd=getenv('DBPWD');
$table=getenv('DBTABLE');

//used for procedule php call
$connect = mysqli_connect("remotemysql.com", $use, $pwd, $table);

//using PDO call
$mysqli = NEW MySQLi ("remotemysql.com", $use, $pwd, $table);

//actual db connection
@mysqli_connect("remotemysql.com", $use, $pwd, $table) || die('<p>Error: 500. <br> DB not connected</p>');

?> 