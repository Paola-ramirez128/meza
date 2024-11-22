<?php
include('../conexion.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $stock = $_POST['stock'];
    $image = $_FILES['image']['name'];

    // Prevenir SQL Injection
    $name = $conn->real_escape_string($name);
    $price = $conn->real_escape_string($price);
    $stock = $conn->real_escape_string($stock);
    $image = $conn->real_escape_string($image);

    // Subir la imagen
    $target_dir = "../images/";
    $target_file = $target_dir . basename($image);
    move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);

    $sql = "INSERT INTO products (name, price, stock, image) VALUES ('$name', '$price', '$stock', '$target_file')";

    if ($conn->query($sql) === TRUE) {
        
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="style_agregar.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    
    <title>E-Shop</title>
    <link rel="stylesheet" href="../barra.css" />
    <script
      src="https://kit.fontawesome.com/7e5b2d153f.js"
      crossorigin="anonymous"
    ></script>
    <script defer src="../barra.js"></script>
</head>
<body>
<header class="header">
      <nav class="nav">
        <a href="#" class="logo nav-link">Admin</a>
        <button class="nav-toggle" aria-label="Abrir menú">
          <i class="fas fa-bars">mas</i>
        </button>
        <ul class="nav-menu">
          <li class="nav-menu-item">
            <a href="PerfilAdmin.php" class="nav-menu-link nav-link">perfil</a>
          </li>
          <li class="nav-menu-item">
            <a href="AgregarProductos.php" class="nav-menu-link nav-link">Registrar</a>
          </li>
          <li class="nav-menu-item">
            <a href="Catalogo.php" class="nav-menu-link nav-link">Editar</a>
          </li>
          <li class="nav-menu-item">
            <a href="Registros.php" class="nav-menu-link nav-link">Usuarios</a>
          </li>
          <li class="nav-menu-item">
            <a href="../index.php" class="nav-menu-link nav-link">salir</a>
          </li>
          
          <li class="nav-menu-item">
            <a href="#" class="nav-menu-link nav-link nav-menu-link_active"
              >Contacto</a
            >
          </li>
        </ul>
      </nav>
    </header>
    <br><br><br><br><br><br><br><br><br><br><br><br>
    <section class="home">
        <div class="text"></div>
        
        <div class="login-box">
        <h2>Register Product</h2>

        <form method="POST" action="" enctype="multipart/form-data">
            <div class="textbox">
                <input type="text" placeholder="Product Name" name="name" required>
            </div>
            <div class="textbox">
                <input type="text" placeholder="Price" name="price" required>
            </div>
            <div class="textbox">
                <input type="text" placeholder="Stock" name="stock" required>
            </div>
            <div class="textbox">
                <input type="file" name="image" required>
            </div>
            <input type="submit" class="btn" value="Register">
        </form>
    </div>
        
    </section>
    <script src="script.js"></script>

</body>
</html>