<?php 
include('E-Shop/conexion.php');
session_start();


if($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['nombre'];
    $imagen = $_POST['img'];
    $price = $_POST['precio'];
    $stock = $_POST['stock'];
    $productID = $_POST['product_id'];

    $stock2 = $stock;
    $name = $conn->real_escape_string($name);
    $price = $conn->real_escape_string($price);
    $productID = $conn->real_escape_string($productID);
    $imagen = $conn->real_escape_string($imagen);
    $stock2 = $conn->real_escape_string($stock2);


    $stock = $stock - 1;

    $stock = $conn->real_escape_string($stock);

    if($stock < 0) {
        echo "<script type='text/javascript'>alert('NO HAY PRODUCTO');</script>";
    }
    else {
        $sql = "UPDATE products SET stock = $stock WHERE id = $productID";

    if ($conn->query($sql) === TRUE) {
        
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
    $sql = "INSERT INTO carrito (productid,name, price, stock, cantidad,image) VALUES ('$productID','$name', '$price', '1', $stock,'$imagen')";
    if ($conn->query($sql) === TRUE) {
        
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    }
    

    $_SESSION['nombre'] = $name;
    $_SESSION['img'] = $imagen;
    $_SESSION['precio'] = $price;
    $_SESSION['stock'] = $stock;
    $_SESSION['productID'] = $productID;

    

    
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="E-shop/PerfilCliente/estilos.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>ARTESANIAS</title>
    <link rel="stylesheet" href="E-shop/barra.css" />
    <script
      src="https://kit.fontawesome.com/7e5b2d153f.js"
      crossorigin="anonymous"
    ></script>
    <script defer src="E-Shop/barra.js"></script>
 
    <style>

.modal {
  display: none;
  position: fixed;
  z-index: 1;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  overflow: auto;
  background-color: rgba(0,0,0,0.5);
}

.modal-content {
  background-color: #fff;
  margin: 15% auto;
  padding: 20px;
  border: 1px solid #888;
  width: 80%;
  max-width: 600px;
  box-shadow: 0 5px 15px rgba(0,0,0,0.3);
}

.close {
  color: #aaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}
</style>
</head>
<body>

<header class="header">
      <nav class="nav">
        
        <a href="#" class="logo nav-link" ><img src="E-Shop/imagenes/logo.jpeg" alt="" style="object-fit: cover;
            position: absolute;
            top: 0;
            left: 0;width: 99%%;
            height: 99%;">ARTESANIAS</a>
        <button class="nav-toggle" aria-label="Abrir menú">
          <i class="fas fa-bars">+</i>
        </button>
        <ul class="nav-menu">
        <li class="nav-menu-item">
            <a  class="nav-menu-link nav-link" onclick="openModal();">perfil</a>
          </li>
          <li class="nav-menu-item">
            <a href="index.php" class="nav-menu-link nav-link">productos</a>
          </li>
          <li class="nav-menu-item">
            <a href="contacto.php" class="nav-menu-link nav-link nav-menu-link_active"
              >Tequilas</a
            >
          </li>
          <li class="nav-menu-item">
            <a href="contacto.php" class="nav-menu-link nav-link nav-menu-link_active"
              >Navidad</a
            >
          </li>
          <li class="nav-menu-item">
            <a href="carritofalso.php" class="nav-menu-link nav-link">carrito</a>
          </li>
        </ul>
      </nav>
    </header>

   
    <section class="home">
        <br><br><br><br><br><br>
        <div class="card-container">
        
            <?php
            $sql = "SELECT * FROM products";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<form action='index.php' method='POST' class='card'>";
                    echo "<img src='" . $row['image'] . "' alt='" . $row['name'] . "' >";
                    echo "<h2>" . $row['name'] . "</h2>";
                    echo "<p >$ " . $row['price'] . "</p>";
                    echo "<h3 >" . $row['stock'] . "</h3>";

                    echo "<input name='img' type='hidden' value='" . $row['image'] . "'>";
                    echo "<input name='nombre' type='hidden' value='" . $row['name'] . "'>";
                    echo "<input name='precio' type='hidden' value='" . $row['price'] . "'>";
                    echo "<input name='stock' type='hidden' value='" . $row['stock'] . "'>";

                    echo "<input name='product_id' type='hidden' value='" . $row['id'] . "'>";
                    echo "<input type='submit'  value='agregar' class='button'>";
                    echo "</form>";
                }
            } else {
                echo "<tr><td colspan='4'>No products found</td></tr>";
            }
            ?>


           
            
        </div>
    </section>
    <div class="back_to_top">
        <ion-icon name="chevron-up-outline">↑</ion-icon>
    </div>
    <script>
        // Mostrar botón de "volver arriba" al hacer scroll
        const backToTopButton = document.querySelector(".back_to_top");
        window.addEventListener("scroll", () => {
            if (window.pageYOffset > 100) {
                backToTopButton.classList.add("show");
            } else {
                backToTopButton.classList.remove("show");
            }
        });

        // Desplazarse suavemente hacia arriba al hacer clic en el botón
        backToTopButton.addEventListener("click", () => {
            window.scrollTo({
                top: 0,
                behavior: "smooth"
            });
        });
    </script>
    <script src="script.js"></script>
    <script
      type="module"
      src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"
    ></script>
    <script
      nomodule
      src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"
    ></script>

    
    



<script src="modal.js"></script>

</body>


<footer class="footer">
      <ul class="social-icon">
        <li class="icon-elem">
          <a  class="icon">
            <ion-icon name="logo-instagram"></ion-icon>
          </a>
        </li>
        <li class="icon-elem">
          <a  class="icon">
            <ion-icon name="logo-whatsapp"></ion-icon>
          </a>
        </li>
        <li class="icon-elem">
          <a  class="icon">
            <ion-icon name="logo-facebook"></ion-icon>
          </a>
        </li>
      </ul>
      <ul class="menu">
        <li class="menu-elem">
          <a  class="menu-icon"> Paola Ramirez Amaya <br>
                                  n control: 22308051281284 <br>
                                  grupo: 4to J</a>
        </li>
      </ul>
    </footer>
    <script
      type="module"
      src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"
    ></script>
    <script
      nomodule
      src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"
    ></script>

   


<!-- con link-->
<div id="customModal" class="modal">
  <div class="modal-content">
    <span class="close" onclick="closeModal()">&times;</span>
    <h2>sin cuenta</h2>
    <p>debes ir a iniciar sesion</p>
    <a href="E-Shop/index.php">iniciar sesion</a>
  </div>
</div>
<script>
    // Función para abrir el modal
function openModal() {
  const modal = document.getElementById('customModal');
  modal.style.display = 'block';
}

// Función para cerrar el modal
function closeModal() {
  const modal = document.getElementById('customModal');
  modal.style.display = 'none';
}

// Cierra el modal al hacer clic fuera del contenido del modal
window.addEventListener('click', (event) => {
  const modal = document.getElementById('customModal');
  if (event.target === modal) {
    modal.style.display = 'none';
  }
});
</script>
</html>