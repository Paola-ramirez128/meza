<?php 
include("../conexion.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
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

    <section class="home">
        <div class="text"></div>
        <div class="login-box">
          <br><br><br><br>
        <h2>Productos en linea</h2>
        <table>
            <tr>
                <th>Product Image</th>
                <th>Product Name</th>
                <th>Price</th>
                <th>Stock</th>
            </tr>
            <?php
            $sql = "SELECT * FROM products";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td><img src='" . $row['image'] . "' alt='" . $row['name'] . "' width='50' height='50'></td>";
                    echo "<td>" . $row['name'] . "</td>";
                    echo "<td>" . $row['price'] . "</td>";
                    echo "<td>" . $row['stock'] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='4'>No products found</td></tr>";
            }
            ?>
        </table>
    </div>
        
    </section>
    <script src="script.js"></script>

</body>
</html>