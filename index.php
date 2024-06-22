<?php
include("connection.php");
$con = conection();

$sql = "SELECT * FROM users";
$query = mysqli_query($con, $sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Users CRUD</title>
</head>

<body>
    <div class="users-form">
        <h1>Sale Sports</h1>
        <form action="insert_user.php" method="POST" id="myForm">
            <input type="text" name="product" placeholder="Producto" id="product">
            <div class="error-message" id="product-error"></div>
            <input type="text" name="code" placeholder="Codigo" id="code">
            <div class="error-message" id="code-error"></div>
            <input type="text" name="price" placeholder="Precio" id="price">
            <div class="error-message" id="price-error"></div>
            <input type="text" name="sport" placeholder="Deporte" id="sport">
            <div class="error-message" id="sport-error"></div>
            <input type="text" name="namec" placeholder="Nombre de cliente" id="namec">
            <div class="error-message" id="namec-error"></div>

            <input type="submit" value="Agregar">
        </form>
    </div>

    <div class="users-table">
        <h2>Ventas registradas</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Producto</th>
                    <th>Codigo</th>
                    <th>Precio</th>
                    <th>Deporte</th>
                    <th>Nombre de cliente</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_array($query)): ?>
                    <tr>
                        <th><?= $row['ID'] ?></th>
                        <th><?= $row['product'] ?></th>
                        <th><?= $row['code'] ?></th>
                        <th><?= $row['price'] ?></th>
                        <th><?= $row['sport'] ?></th>
                        <th><?= $row['namec'] ?></th>
                        <th><a href="update.php?id=<?= $row['ID'] ?>" class="users-table--edit">Editar</a></th>
                        <th><a href="delete_user.php?id=<?= $row['ID'] ?>" class="users-table--delete" >Eliminar</a></th>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>

    <script>
      const form = document.getElementById('myForm');
      const product = document.getElementById('product');
      const code = document.getElementById('code');
      const price = document.getElementById('price');
      const sport = document.getElementById('sport');
      const namec = document.getElementById('namec');

      const productError = document.getElementById('product-error');
      const codeError = document.getElementById('code-error');
      const priceError = document.getElementById('price-error');
      const sportError = document.getElementById('sport-error');
      const namecError = document.getElementById('namec-error');

      form.addEventListener('submit', (e) => {
        e.preventDefault();
        let errors = [];

        if (product.value === '') {
          errors.push('El campo producto es requerido');
          productError.textContent = 'El campo producto es requerido';
          productError.classList.add('error-message');
        } else {
          productError.textContent = '';
          productError.classList.remove('error-message');
        }

        if (code.value === '') {
          errors.push('El campo código es requerido');
          codeError.textContent = 'El campo código es requerido';
          codeError.classList.add('error-message');
        } else {
          codeError.textContent = '';
          codeError.classList.remove('error-message');
        }

        if (price.value <= 0 || price.value === '') {
          errors.push('El campo precio debe ser mayor que 0');
          priceError.textContent = 'El campo no debe estar vacio y el precio debe ser mayor que 0';
          priceError.classList.add('error-message');
        } else {
          priceError.textContent = '';
          priceError.classList.remove('error-message');
        }

        if (sport.value === '') {
          errors.push('El campo deporte es requerido');
          sportError.textContent = 'El campo deporte es requerido';
          sportError.classList.add('error-message');
        } else {
          sportError.textContent = '';
          sportError.classList.remove('error-message');
        }

        if (namec.value === '') {
          errors.push('El campo nombre de cliente es requerido');
          namecError.textContent = 'El campo nombre de cliente es requerido';
          namecError.classList.add('error-message');
        } else {
          namecError.textContent = '';
          namecError.classList.remove('error-message');
        }

        if (errors.length > 0) {
          // No hace falta mostrar un alert, los errores se muestran debajo de cada input
        } else {
          form.submit();
        }
      });
    </script>
</body>

</html>