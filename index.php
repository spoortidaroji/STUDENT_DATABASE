<?php

require_once("../A3/php/component.php");
require_once ("../A3/php/operation.php");
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Student</title>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="style.css">

</head>
<body>

<main>
    <div class="container text-center">
        <h1 class="py-4 bg-dark text-light rounded-bottom"><i class="fas fa-university"></i> Student Database</h1>

        <div class="d-flex justify-content-center">
            <form action="" method="post" class="w-50">
            <div class="pt-2">
                <?php inputElement("<i class='fas fa-id-badge'></i>","ID", "STUDENTID",setID()); ?>
            </div>
            <div class="pt-2">
                <?php inputElement("<i class='fas fa-id-badge'></i>","STUDENTNAME","STUDENTNAME",""); ?>
            </div>
            <div class="pt-2">
            <?php inputElement("<i class='fas fa-people-carry'></i>",'USN','USN',""); ?>
            </div>
            <div class="pt-2">
                <?php inputElement("<i class='fas fa-building'></i>",'DEPT','DEPT',""); ?>
            </div>
            <div class="pt-2">
                <?php inputElement("<i class='fas fa-city'></i>",'CITY','CITY',""); ?>
            </div>
        <div class="d-flex justify-content-center">
        <?php buttonElement("btn-create","btn btn-success","<i class='fas fa-plus'></i>","create","data-toggle='tooltip' data-placement='bottom' title='Create'"); ?>
        <?php buttonElement("btn-read","btn btn-primary","<i class='fas fa-sync'></i>","read","data-toggle='tooltip' data-placement='bottom' title='Read'"); ?>
        <?php buttonElement("btn-update","btn btn-light border","<i class='fas fa-pen-alt'></i>","update","data-toggle='tooltip' data-placement='bottom' title='Update'"); ?>
        <?php buttonElement("btn-delete","btn btn-danger","<i class='fas fa-trash-alt'></i>","delete","data-toggle='tooltip' data-placement='bottom' title='Delete'"); ?>
        <?php deleteBtn();?>
         </div>
         </form>
        </div>

        <!---TABLE-->
        <div class="d-flex table-data">
            <table class="table table-striped table-dark">
                <thead class="thead-dark">
                <tr>
                   <th>ID</th>
                    <th>STUDENT NAME</th>
                    <th>USN</th>
                    <th>DEPARTMENT</th>
                    <th>CITY</th>
                    <th>EDIT</th>
                </tr>
                </thead>
                <tbody id="tbody">
                <?php

                   $con = mysqli_connect("localhost", "root", "", "DB");
                    if (mysqli_connect_error()) {
                        echo "error";
                    } else {

                        $que = "select * from student";
                        
                        $result = $con->query($que);
                        $con1 = 0;
                        foreach ($result as $row) {
                          
                    ?>

                <tr>
                   <td data-id="<?php echo $row['id']; ?>"><?php echo $row['id']; ?> </td>
                    <td data-id="<?php echo $row['id']; ?>"><?php echo $row['STUDENTNAME']; ?></td>
                    <td data-id="<?php echo $row['id']; ?>"><?php echo $row['USN']; ?></td>
                    <td data-id="<?php echo $row['id']; ?>"><?php echo $row['DEPT']; ?></td>
                    <td data-id="<?php echo $row['id']; ?>"><?php echo $row['CITY']; ?></td>
                    <td><i class="fas fa-edit btnedit" data-id="<?php echo $row['id']; ?>"></i></td>
                </tr>

                <?php
                }
                }
                ?>

                </tbody>
            </table>
    </div></div>
    <?php buttonElement("btn-search","btn btn-blue","<i class='fas fa-search''></i>","search","href='search.php' data-placement='bottom-center' title='Search'"); ?>
    <form method="POST" action="search.php">
    <input type="text" name="query" value="" placeholder="Search"/>
  </form>
</main>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/aa887816ba.js" crossorigin="anonymous"></script>

<script src="../A3/php/main.js"></script>
</body>
</html>
