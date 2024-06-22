<?php 
    include("connection.php");
    $con=conection();

    $id=$_GET['id'];

    $sql="SELECT * FROM users WHERE id='$id'";
    $query=mysqli_query($con, $sql);

    $row=mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="style.css" rel="stylesheet">
        <title>Editar usuarios</title>
        
    </head>
    <body>
        <div class="users-form">
            <form action="edit_user.php" method="POST">
                <input type="hidden" name="id" value="<?= $row['ID']?>">
                <input type="text" name="product" placeholder="Producto" value="<?= $row['product']?>">
                <input type="text" name="code" placeholder="Codigo" value="<?= $row['code']?>">
                <input type="text" name="price" placeholder="Precio" value="<?= $row['price']?>">
                <input type="text" name="sport" placeholder="Deporte" value="<?= $row['sport']?>">
                <input type="text" name="namec" placeholder="namec" value="<?= $row['namec']?>">

                <input type="submit" value="Actualizar">
            </form>
        </div>
    </body>
</html>