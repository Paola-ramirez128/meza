<?php 
session_start();
include('conexion.php');

if (isset($_POST['accion'])) {
    $accion = $_POST['accion'];
    if ($accion == "login") {
        if($_SERVER["REQUEST_METHOD"] == "POST") {

            $username = $_POST['username'];
            $password = $_POST['clave'];

            
            //Prevenir SQL Injection
            $username = $conn->real_escape_string($username);
            $password = $conn->real_escape_string($password);

            $sql = "SELECT id, password FROM users WHERE username='$username'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                if (password_verify($password,$row['password'])) {
                    $_SESSION['login_user']=$username;
                    if ($_SESSION['login_user'] == "admin") {
                        header("Location: PerfilAdmin/PerfilAdmin.php");
                    }
                    else {
                        header("Location: PerfilCliente/PaginaPrincipal.php");
                    }
                    
                }
                else {
                    $shouldShowAlert = true;

                if ($shouldShowAlert) {
                echo "<script type='text/javascript'>alert('Contraseña incorrecta');</script>";
                    
                }/*echo "Invalid password";*/ }
                
            }
            else {
                $shouldShowAlert = true;

                if ($shouldShowAlert) {
                echo "<script type='text/javascript'>alert('Usuario no encontrado');</script>";
                    
                }


                /*echo "No user found.";*/
            }
        }
    }
    else if ($accion == "register") {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $username = $_POST['user'];
            $name = $_POST['name'];
            $password = $_POST['password'];
            $correo = $_POST['correo'];

            // Prevenir SQL Injection
            $username = $conn->real_escape_string($username);
            $name = $conn->real_escape_string($name);
            $password = $conn->real_escape_string($password);
            $correo = $conn->real_escape_string($correo);
        
            
            $password_hashed = password_hash($password, PASSWORD_BCRYPT);
        
            $sql = "INSERT INTO users (username, email, password, nombre) VALUES ('$username', '$correo','$password_hashed', '$name')";
        
            if ($conn->query($sql) === TRUE) {
                $shouldShowAlert = true;
        
            if ($shouldShowAlert) {
                echo "<script type='text/javascript'>alert('Usuario registrado');</script>";
                header("Location: PerfilCliente/PaginaPrincipal.php");
            }
                /*echo "User registered successfully!";*/
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
    }
    else {
        echo "<script type='text/javascript'>alert('error');</script>";
    }
}
    
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login/Register</title>
    <link rel="stylesheet" href="estilos2.css">
    <link rel="stylesheet" href="fondo.css">
    
  
</head>
<body onload="mostrarLogin()">
    <main>
        <div class="contenedor">
            <div class="form-container">
                <form action="index.php" method="post" class="formulario" id="formulario-login">
                    <h2>Iniciar sesión</h2>
                    <input type="hidden" name="accion" value="login">
                    <input type="text" placeholder="Nombre de usuario" name="username" class="input" required>
                    <input type="password" placeholder="Clave" name="clave" class="input" required>
                    <input type="submit" value="Entrar" class="button">
                    <p>¿No tienes cuenta? <a href="#" id="link-registrarse">Regístrate aquí</a></p>
                </form>
                <form action="index.php" method="post" class="formulario" id="formulario-register">
                    <h2>Crea tu cuenta</h2>
                    <input type="hidden" name="accion" value="register">
                    <input type="text" placeholder="Nombre completo" name="name" class="input" required>
                    <input type="text" placeholder="Nombre de usuario" name="user" class="input" required>
                    <input type="email" placeholder="Correo electrónico" name="correo" class="input" required>
                    <input type="password" placeholder="Clave" name="password" class="input" required>
                    <input type="submit" value="Crear cuenta" class="button">
                    <p>¿Ya tienes cuenta? <a href="#" id="link-iniciar-sesion">Inicia sesión aquí</a></p>
                </form>
            </div>
        </div>
    </main>
    <script src="script2.js"></script>
    





</body>


</html>




