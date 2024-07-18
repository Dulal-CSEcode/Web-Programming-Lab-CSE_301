<?php

$hostname='localhost';

$username='root';

$userpass='';

$dbname='Dulal_lab11';

$c=mysqli_connect($ hostname,$username,$userpass) or
die('Database connection error');

mysqli_select_db($c,$dbname);

?>