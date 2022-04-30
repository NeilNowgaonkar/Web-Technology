<?php
    include 'conn7.php' 
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

     <!-- Bootstrap CSS -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Marks Calculator</title>
</head>
<body>

<form method="post">
    <button type="submit" class="btn btn-primary" name="submit">CO1 greater than 60%</button>
</form>

<table class="table table-striped table-bordered">

    <thead class="thead-dark">
        <tr>
        <th scope="col">Sr No.</th>
        <th scope="col">Roll No.</th>
        <th scope="col">Student Name</th>
        <th scope="col">CO1</th>
        </tr>
    </thead>
    <tbody>

    <?php

        if(isset($_POST['submit']))
        {
            
            $sql="Select * from mse_ese_co_marks";
            $result=mysqli_query($con,$sql);

            if($result)
            {
                //echo "Data inserted successfully";
                while($row=mysqli_fetch_assoc($result))
                {
                    $sn=$row['SN'];
                    $rn=$row['RN'];
                    $studname=$row['StudentName'];
                    $marks=$row['CO1'];
                    
                    if(($marks/10.5)*100 >= 60)
                    {
                        echo '
                        <tr>
                        <th scope="row">'.$sn.'</th>
                        <td>'.$rn.'</td>
                        <td>'.$studname.'</td>
                        <td>'.$marks.'</td>
                        </tr>
                    ';
                    }
                }
            }
            else
            {
                die(mysqli_error($con));
            }
        }

?>

</tbody>
</table>

</body>
</html>
