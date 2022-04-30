<?php
include 'conn.php';
if(isset($_GET['deleteid']))
{
    $grno=$_GET['deleteid'];

    $sql="delete from crud_operations where Grno=$grno";
    $result=mysqli_query($con,$sql);

    if($result)
    {
//        echo "Deleted Sucessfully";
        header('location:display.php');
    }
    else
    {
        die(mysqli_error($con));
    }
}
?>