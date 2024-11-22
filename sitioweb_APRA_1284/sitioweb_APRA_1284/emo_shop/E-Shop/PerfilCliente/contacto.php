
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    
    <title>EMO SHOP</title>
    <link rel="stylesheet" href="../barra.css" />
    <script
      src="https://kit.fontawesome.com/7e5b2d153f.js"
      crossorigin="anonymous"
    ></script>
    <script defer src="../barra.js"></script>
    <link rel="stylesheet" href="styleCarrito.css">
    

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
        
        <a href="PaginaPrincipal.php" class="logo nav-link" ><img src="../imagenes/logo.jpeg" alt="" style="object-fit: cover;
            position: absolute;
            top: 0;
            left: 0;width: 99%%;
            height: 99%;">✟EMO SHOP✟</a>
        <button class="nav-toggle" aria-label="Abrir menú">
          <i class="fas fa-bars">+</i>
        </button>
        <ul class="nav-menu">
          <li class="nav-menu-item">
            <a href="Perfil.php" class="nav-menu-link nav-link">perfil</a>
          </li>
          <li class="nav-menu-item">
            <a href="PaginaPrincipal.php" class="nav-menu-link nav-link">productos</a>
          </li>
          <li class="nav-menu-item">
            <a href="PaginaCarrito.php" class="nav-menu-link nav-link"><i class="fa fa-shopping-cart" aria-hidden="true">carrito</i></a>
          </li>
          <li class="nav-menu-item">
            <a href="../../index.php" class="nav-menu-link nav-link">salir</a>
          </li>
          
          <li class="nav-menu-item">
            <a href="../contacto.php" class="nav-menu-link nav-link nav-menu-link_active"
              >Contacto</a
            >
          </li>
        </ul>
      </nav>
    </header>

    <section class="home">
        
        <div class="card-container">
        <div class="login-box">
            
        <br><br><br><br><br>
        
            <h2>DATOS</h2>
            <p>NOMBRE: Paola Ramirez Amaya <br>
               N CONTROL: 223080151281284 <br>
               ESPECIALIDAD: Programacion</p>
            <h2>CONTACTO</h2>
            <div class="store-locations">
                <div class="store">
                    <h3>Contactanos:</h3>
                    <p class="store-address">Dirección: Avenida Principal 123, Local 45, Ciudad</p>
                    <p>Teléfono: (123) 456-7890 <br>
                       Correo: emo_shopofficial@gmail.com</p>
                </div>
            </div>
    

</div>
    
</head>
<body>
 
    
            
        
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
          <a  class="menu-icon"> Paola Ramirez Amaya <br>
                                 n control: 22308051281284 <br>
                                 grupo: ato J</a>
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

<div id="customModal" class="modal">
  <div class="modal-content">
    <span class="close" onclick="closeModal()">&times;</span>
    <h2>sin cuenta</h2>
    <p>debes ir a iniciar sesion</p>
    <a href="E-Shop/index.php">iniciar sesion</a>
  </div>
</div>
<script>
    
function openModal() {
  const modal = document.getElementById('customModal');
  modal.style.display = 'block';
}


function closeModal() {
  const modal = document.getElementById('customModal');
  modal.style.display = 'none';
}


window.addEventListener('click', (event) => {
  const modal = document.getElementById('customModal');
  if (event.target === modal) {
    modal.style.display = 'none';
  }
});
</script>
</html>