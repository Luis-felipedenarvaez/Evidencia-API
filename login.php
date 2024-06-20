<?php 
session_start(); //Inicia o reanuda la sesion actual
include_once('conexion.php'); //Es el archivo que contiene la conexion a la BD

$message = ""; //Variable para almacenar el mensaje de alerta


// Code for login 
if($_SERVER['REQUEST_METHOD'] == 'POST'){ //Verifica si el formulario se ha enviado mediante el metodo POST
    $email= $_POST['email']; //Se obtiene el valor del email
    $password=$_POST['password']; //Obtiene el valor de la contraseña

    $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'"; //Verifica una coincidencia con los datos anteriores en BD
    $result = $conn->query($sql); //Ejecuta consulta

    if($result->num_rows > 0){ //Verifica si encuentra al menos una fila en el resultado de la consulta, si es así, se concidera exitoso
        $_SESSION['loggedin']= true; //Indica que el usuario ha iniciado sesión
        $message = "Inicio de sesión exitoso"; //Mensaje de inicio de sesion exitoso
        //header("refresh:2;url=welcome.php");
     } else {
        $message = "Usuario o contraseña incorrecta"; // Mensaje de error
    }
}
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>User Inicio de sesión | Sistema de registro e inicio de sesión</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <!-- Alerta de error o éxito -->
                                    <?php if (!empty($message)): ?>
                                        <div class="alert <?php echo ($result->num_rows > 0) ? 'alert-succes' : 'alert-danger'; ?> alert-dismissible fade show" role="alert">
                                            <?php echo $message; ?>
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                    <?php endif; ?>   
                                    <div class="card-header">
                                        <h2 align="center">Bienvenido</h2>
                                        <hr />
                                        <h3 class="text-center font-weight-light my-4">Inicio de sesión</h3></div>
                                        <div class="card-body">
                                            <form method="post" action="login.php">
                                                <div class="form-floating">
                                                    <label for="email">Email: </label>  
                                                    <input class="form-control" id="email" name="email" type="text" placeholder="Digite su correo" required > 
                                                </div>
                                                <div class="form-floating">
                                                    <label for="password">Clave: </label>  
                                                    <input class="form-control" id="password" name="password" type="text" placeholder="Digite su password" required > 
                                                </div>    
                                                <button class="btn btn-primary" name="login" type="submit">Iniciar Sesión</button>
                                            </form>
                                        </div>
                                        <div class="card-footer text-center py-3">
                                            <div class="small"><a href="signup.php">Necesita una cuenta? Registrarse!</a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
