<?php
    include 'conn.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!-- Bootstrap CSS -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
     <link rel="stylesheet" href="lab6.css">
    <title>CRUD </title>
</head>
<body>

    <h1 class="Heading"><u>CRUD APPLICATION </u></h1>

    <div class="container my-5">

    <table class="table table-striped table-bordered">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Gr No.</th>
      <th scope="col">Name</th>
      <th scope="col">DOB</th>
      <th scope="col">Address</th>
      <th scope="col">Mobile</th>
      <th scope="col">Operations</th>
    </tr>
  </thead>
  <tbody>

  <?php
    $sql="Select * from crud_operations";
    $result=mysqli_query($con,$sql);
    if($result)
    {
        while($row=mysqli_fetch_assoc($result))
        {
            $grno=$row['Grno'];
            $name=$row['Name'];
            $dob=$row['DOB'];
            $address=$row['Address'];
            $mobile=$row['Mobile'];
            echo '
            <tr>
            <th scope="row">'.$grno.'</th>
            <td>'.$name.'</td>
            <td>'.$dob.'</td>
            <td>'.$address.'</td>
            <td>'.$mobile.'</td>
            <td>
                <button class="btn btn-primary"><a href="update.php?updateid='.$grno.'"" class="text-light">Update</a></button>
                <button class="btn btn-danger"><a href="delete.php?deleteid='.$grno.'" class="text-light">Delete</a></button>
            </td>
            </tr>
          ';
        }
    }
  ?>
    
  </tbody>
</table>
        <button class="btn btn-primary btn-lg"><a href="user.php" class="text-light">Add User</a></button>
    </div>
    
</body>
</html>