
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SEARCH</title>
</head>
<body>
<div class="container">
    <h1>Emp System</h>
    <hr>
    <form action="" method="POST">
    <input type="text" name="search" required value="<?php if(isset($_GET['search'])){echo $_GET['search']; } ?>" >
    <button type="submit">Search</button>
    </form>
    <div>
    <table border='1'>

    <?php 
    $con = mysqli_connect("localhost","root","","gajax");
    if(isset($_POST['search']))
    {
    $filtervalues = $_POST['search'];
    $query = "SELECT * FROM atam WHERE CONCAT(title,image) LIKE '%$filtervalues%' ";
    $query_run = mysqli_query($con, $query);
    if(mysqli_num_rows($query_run) > 0)
    {
    foreach($query_run as $items)
    {
    ?>
    <thead>
    <tr>
    <td><?= $items['title']; ?></td>
    </tr>
    </thead>
    <tbody>
    <tr>
    <td><?= $items['image']; ?></td>
    </tr>
    </tbody>
    <?php
    }
    }
    else
    {
    ?>
    <tr>
    <td colspan="4">No Record Found</td>
    </tr>
    <?php
    }
    }
    ?>
    </tbody>
    </table>
    </div>
</div>
</body>
</html>