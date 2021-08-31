<?php
require_once("../A3/php/component.php");
require_once ("../A3/php/operation.php");
require_once("../A3/php/db.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="style.css">

</head>
<body>
<main>
    <div class="container text-center">
        <h1 class="py-4 bg-dark text-light rounded-bottom"><i class='fab fa-searchengin'></i> QUERY RESULT</h1>

    <?php
      //$sql="SELECT * FROM student where STUDENTNAME like '".$query."%'";       
        /*if(isset($_POST['search']))
        {*/
      $name = $_POST['query'];
    ?>
     <body>
        <div class="d-flex table-data">
            <table class="table table-striped table-dark">
                    <thead class="thead-dark">
                        <tr>
                        <th scope="col">STUDENTNAME</th>
                        <th scope="col">USN</th>
                        <th scope="col">DEPT</th>
                        <th scope="col">CITY</th>
                        </tr>
                    </thead>

                    <tbody id="tbody">
                    <?php
                       
                    $sql="SELECT * FROM student where STUDENTNAME like '" .$name . "%'";
                    $result=mysqli_query($con,$sql);
                        // print_r($result);
                    while($res=mysqli_fetch_array($result))
                    {
                    ?>
                        <tr>
                        <td><?php echo $res['STUDENTNAME'] ?></td>
                        <td><?php echo $res['USN'] ?></td>
                        <td><?php echo $res['DEPT'] ?></td>
                        <td><?php echo $res['CITY'] ?></td>
                        </tr>
                    </tbody>
                    <?php }  ?>   
             </table>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/aa887816ba.js" crossorigin="anonymous"></script>
</body>
</html>