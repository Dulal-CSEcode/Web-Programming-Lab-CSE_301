<?php

if(isset($_POST['submit'])){

$name=$_POST['name'];

$q="insert into student(name)value('$name');

$run=mysqli_query($conn,$q);

if($run){

echo 'done';

}

else{

echo 'not working';

}

}

?>