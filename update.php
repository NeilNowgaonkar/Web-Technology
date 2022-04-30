<?php
    include 'conn.php';
    $id=$_GET['updateid'];

    $sql="Select * from crud_operations where Grno=$id";
    $result=mysqli_query($con,$sql);
    $row=mysqli_fetch_assoc($result);
    $grno=$row['Grno'];
    $name=$row['Name'];
    $dob=$row['DOB'];
    $address=$row['Address'];
    $mobile=$row['Mobile'];

    if(isset($_POST['submit']))
    {
        $grno=$_POST['grno'];
        $name=$_POST['name'];
        $dob=$_POST['dob'];
        $address=$_POST['address'];
        $mobile=$_POST['mobile'];

        $sql="UPDATE crud_operations SET Grno=$grno, Name='$name', DOB='$dob', Address='$address', Mobile='$mobile' where Grno=$id";

        $result=mysqli_query($con,$sql);
        
        if($result)
        {
            //echo "Data updated successfully";
               header('location:display.php');
        }
        else
        {
            die(mysqli_error($con));
        }
    }

?>



<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Crud Operations</title>
  </head>
  <body>
    <div class="container my-5">
    <form method="post">

        <div class="form-group">
            <label>Gr No.</label>
            <input type="number" class="form-control" placeholder="Ener your Gr No."name ="grno" value=<?php echo $grno ?>>
        </div>

        <div class="form-group">
            <label>Name</label>
            <input type="text" class="form-control" placeholder="Ener your name"name ="name" value=<?php echo $name ?>>
        </div>

        <div class="form-group">
            <label>DOB</label>
            <input type="text" class="form-control" placeholder="Ener your Date Of Birth"name ="dob" value=<?php echo $dob ?>>
        </div>

        <div class="form-group">
            <label>Address</label>
            <input type="text" class="form-control" placeholder="Ener your Address"name ="address" value=<?php echo $address ?>>
        </div>
 
        <div class="form-group">
            <label>Mobile</label>
            <input type="text" class="form-control" placeholder="Ener your Mobile Number"name ="mobile" value=<?php echo $mobile ?>>
        </div>
       
        <button type="submit" class="btn btn-primary" name="submit">Update</button>
    </form>

    </div>
</body>
</html>