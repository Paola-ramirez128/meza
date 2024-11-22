
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

    <style>
        
        .profile-container {
            background: #660000;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        .profile-picture {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 20px;
        }
        .user-name {
            font-size: 24px;
            margin-bottom: 20px;
        }
        .upload-button {
            background-color: #FF0000;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .upload-button:hover {
            background-color: #000000;
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
    <br><br><br><br><br><br>
    <section class="home">
        
        <div class="card-container">
        
            


        <title>Perfil de Usuario</title>
    
</head>
<body>
 
    <div class="profile-container">
        <!-- Foto de usuario -->
        <img src="../imagenes/logo.jpeg" alt="Foto de perfil" class="profile-picture">
        
        <!-- Nombre del usuario -->
        <div class="user-name">usuario: <br>Cliente</div>
        <div class="user-name">te uniste el: <br> 09/06/2024</div>

        <!-- Formulario para subir foto -->
        <form action="subir_foto.php" method="post" enctype="multipart/form-data">
            <input type="file" name="nueva_foto" accept=".jpg">
            <button type="submit" class="upload-button">Subir nueva foto</button>
        </form>
    </div>
            
        </div>
    </section>
    <script src="script.js"></script>
<br><br><br><br><br><br>
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
                                 n controlo: 22308051281284 <br>
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

</html>