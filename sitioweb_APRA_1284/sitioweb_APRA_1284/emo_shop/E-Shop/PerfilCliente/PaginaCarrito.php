<?php 
include('../conexion.php');
session_start();
if($_SERVER["REQUEST_METHOD"] == "POST") {

    if(isset($_POST['id']) ) {
        $productID = $_POST['id'];
        $num = $_POST['num'];
        $sql = "SELECT stock FROM products WHERE id='$productID'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc(); 
            $original = $row['stock'];
        }
        else {

        }
                        
        $actualizar = $original + 1;
        $sql = "UPDATE products SET stock = $actualizar WHERE id = $productID";
        if ($conn->query($sql) === TRUE) {
            
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $sql = "DELETE FROM carrito WHERE id = $num";
        if ($conn->query($sql) === TRUE) {
           
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
    else {
        $accion = $_POST['accion'];
        
        if($accion == "Vaciar Carrito") {
            
                
            $sql = "SELECT * FROM carrito";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        $RUTA = $row['productid'];
                        $RUTA = $conn->real_escape_string($RUTA);

                        $sql2 = "SELECT stock FROM products WHERE id='$RUTA'";
                        $result2 = $conn->query($sql2);

                        if ($result2->num_rows > 0) {
                            $row2 = $result2->fetch_assoc(); 
                            $original = $row2['stock'];
                        }
                        else {

                        }
                        
                        $actualizar = $original + 1;
                        $sql = "UPDATE products SET stock = $actualizar WHERE id = $RUTA";
                    if ($conn->query($sql) === TRUE) {
                        
                    } else {
                        echo "Error: " . $sql . "<br>" . $conn->error;
                    }
                    }
                    
                } else {
                    echo "<tr><td colspan='4'>No products found</td></tr>";
                }
                
            $sql = "DELETE FROM carrito";
            if ($conn->query($sql) === TRUE) {
                
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }

            
        }
        else if ($accion == "Comprar") {
            $sql = "DELETE FROM carrito";
            if ($conn->query($sql) === TRUE) {
          
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
    }
    

    

    
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos.css">
    <link rel="stylesheet" href="styleCarrito.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <title>EMO SHOP✟</title>
    <link rel="stylesheet" href="../barra.css" />
    <script
      src="https://kit.fontawesome.com/7e5b2d153f.js"
      crossorigin="anonymous"
    ></script>
    <script defer src="../barra.js"></script>
    <style>button, input[type=submit] {
  padding: 10px 20px;
  font-size: 16px;
  cursor: pointer;
}

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
      <a href="PaginaPrincipal.php" class="logo nav-link" ><img src="../imagenes/logo.jpeg" alt="" style="object-fit: cover;
            position: absolute;
            top: 0;
            left: 0;width: 99%%;
            height: 99%;">✟EMO SHOP✟</a>
        <button class="nav-toggle" aria-label="Abrir menú">
          <i >+</i>
        </button>
        <ul class="nav-menu">
          <li class="nav-menu-item">
            <a href="Perfil.php" class="nav-menu-link nav-link">perfil</a>
          </li>
          <li class="nav-menu-item">
            <a href="PaginaPrincipal.php" class="nav-menu-link nav-link">productos</a>
          </li>
          <li class="nav-menu-item">
            <a href="PaginaCarrito.php" class="nav-menu-link nav-link">carrito</a>
          </li>
          <li class="nav-menu-item">
            <a href="../../index.php" class="nav-menu-link nav-link">salir</a>
          </li>
          
          <li class="nav-menu-item">
            <a href="contacto.php" class="nav-menu-link nav-link nav-menu-link_active"
              >Contacto</a
            >
          </li>
        </ul>
      </nav>
    </header>
    <section class="home">
    <br><br><br>
    
        <div class="card-container">
      
        <div class="login-box">
        <h2>Productos</h2>
        <table>
            <tr>
                <th>Product Image</th>
                <th>Product Name</th>
                <th>Price</th>
                <th>Cantidad</th>
                <th>Eliminación</th>
            </tr>
            <?php
            $sql = "SELECT * FROM carrito";
            $result = $conn->query($sql);
            $precio = 0.00;

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $precio += $row['price'];

                    echo "<tr>";
                    echo "<td><img src='" . $row['image'] . "' alt='" . $row['name'] . "' width='50' height='50'></td>";
                    echo "<td>" . $row['name'] . "</td>";
                    echo "<td>" . $row['price'] . "</td>";
                    echo "<td>" . $row['stock'] . "</td>";
                    echo "<td><form action='PaginaCarrito.php' method='POST'>";
                    echo "<input type='hidden' name='id' value='". $row['productid'] ."'>";
                    echo "<input type='hidden' name='num' value='". $row['id'] ."'>";
                    echo "<input type='submit' name='eliminar' value='eliminar'>";
                    echo "</form></td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='4'>No products found</td></tr>";
            }
            ?>
        </table>
        <?php 
        $iva = ($precio*16)/100;
        $total = $precio + $iva;
        ?>
        <h2>SubTotal: $<?php echo "$precio" ?></h2>
        <h2>IVA: $<?php echo "$iva" ?></h2>
        <h2>TOTAL: $<?php echo "$total" ?></h2>
        <form action="PaginaCarrito.php" method="post" id="myForm">
           
            <input type="submit" name="accion" value="Comprar" class='button'>
        </form>
        <form action="PaginaCarrito.php" method="post">
        <input type="submit" name="accion" value="Vaciar Carrito" class='button'>
        </form>
    </div>


            
            
        </div>
    </section>
    <script src="script.js"></script>

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
          <a  class="menu-icon"> Paola Ramirezm Amaya <br>
                                 n control: 22308051281284 <br>
                                 grupo: 4to J</a>
        </li>
      </ul>
    </footer>

  <div id="myModal" class="modal">
    <div class="modal-content">
      <span class="close">&times;</span>
      
      <p>COMPRADO</p>
    </div>
  </div>
  <script>
const modal = document.getElementById('myModal');
const form = document.getElementById('myForm');
const closeBtn = document.getElementsByClassName('close')[0];


form.addEventListener('submit', (event) => {
  event.preventDefault(); 
  modal.style.display = 'block';
});


closeBtn.addEventListener('click', () => {
  modal.style.display = 'none';
});


window.addEventListener('click', (event) => {
  if (event.target == modal) {
    modal.style.display = 'none';
  }
});
</script>
</html>