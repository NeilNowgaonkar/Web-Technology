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

    <link rel="stylesheet" href="lab7.css">

    <title>Marks Calculator</title>

    <h1 class="heading">Marks Calculator</h1>

</head>
<body>

<form method="post">


    <div class="formele">
    <div class="row g-5">

    <div class="col-sm-5">
        <div class="form-group">
            <label>Threshold Marks.</label>
            <input type="number" class="form-control" placeholder="Enter Threshold Marks = " name="threshold_marks">
        </div>
    </div>

    <div class="col-sm-5">

        <div class="form-group">
            <label>Column Name</label>
            <input type="text" class="form-control" placeholder="Ener Column No."name ="co_no">
        </div>
    </div>
</div>
    </div>
    
        <div class="showResults">
        <button type="submit" class="btn btn-primary" name="submit">Show Results</button>
        </div>
</div>  
    
</form>

<table class="table table-striped table-bordered">

    <thead class="thead-dark">
        <tr>
        <th scope="col">Sr No.</th>
        <th scope="col">Roll No.</th>
        <th scope="col">Student Name</th>
        <th scope="col">Column</th>
        </tr>
    </thead>
    <tbody>

    <?php

        if(isset($_POST['submit']))
        {
            $count=0;
            $total_count=0;
            $per=0;
            $threshold_marks=$_POST['threshold_marks'];
            $co_no=$_POST['co_no'];
            echo '<b>Threshold Marks = '.$threshold_marks;
            echo '<br>';
            echo 'Column Name = '.$co_no;

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
                    $marks=$row[$co_no];
                    
                    if(($marks/10.5)*100 >= $threshold_marks)
                    {
                        echo '
                        <tr>
                        <th scope="row">'.$sn.'</th>
                        <td>'.$rn.'</td>
                        <td>'.$studname.'</td>
                        <td>'.$marks.'</td>
                        </tr>
                    ';
                        $count++;
                    }
                    $total_count++;
                }
                echo '<br>';
                echo 'Number of Students With Matching Criteria = '.$count;
                $per=($count/$total_count)*100;
                echo '<br>';
                echo 'Percentage of Students with matching criteria = '.$per.'%' ;
                echo '<br>';
                echo '<br>';

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
