<?php

$con=new mysqli('localhost','root','','lab7','8111');

if(!$con)
{
  die(mysqli_error($con));

//  echo "Success";
}
?>