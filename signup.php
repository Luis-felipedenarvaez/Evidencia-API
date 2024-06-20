<?php 
session_start(); //Inicia o reanuda la sesion actual
require_once('conexion.php'); //Es el archivo que contiene la conexion a la BD

$message = ""; //Variable para almacenar el mensaje de alerta

//Code for Registration 
if($_SERVER['REQUEST_METHOD'] == 'POST'){ //Verifica si el formulario se ha enviado con el metodo POST
    //Validacion y obtencion de datos
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $contactno=$_POST['contactno'];

    //Insertar nueva persona a la BD
    $sql= "INSERT INTO users (fname, lname, email, password, contactno) VALUES ('$fname', '$lname', '$email', '$password', '$contactno')";
    $result = $conn->query($sql);

    if($result){
        $message = "Registro Exitoso";
    }else{
        $message = "Error al Registrar";
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
        <title>Registro de usuario | Sistema de registro e inicio de sesión</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>


</script>

    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <!-- Alerta de error o éxito -->
                                    <?php if (!empty($message)): ?>
                                        <div class="alert <?php echo ($result) ? 'alert-succes' : 'alert-danger'; ?> alert-dismissible fade show" role="alert">
                                            <?php echo $message; ?>
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                    <?php endif; ?>  
                                    <div class="card-header">
                                        <h2 align="center">Sistema de registro e inicio de sesión</h2>
                                        <hr />
                                        <h3 class="text-center font-weight-light my-4">Crear una cuenta</h3></div>
                                    <div class="card-body">
        <form method="post" action="signup.php">
            <div class="form-floating">
                <label for="nombre">Nombre: </label>  
                <input class="form-control" id="fname" name="fname" type="text" placeholder="Digite su nombre" required > 
            </div>
            <div class="form-floating">
                <label for="apellido">Apellido: </label>  
                <input class="form-control" id="lname" name="lname" type="text" placeholder="Digite su apellido" required > 
            </div>
            <div class="form-floating">
                <label for="email">Email: </label>  
                <input class="form-control" id="email" name="email" type="text" placeholder="Digite su correo" required > 
            </div>
            <div class="form-floating">
                <label for="contactno">Telefono: </label>  
                <input class="form-control" id="contactno" name="contactno" type="text" placeholder="Digite su telefono" required > 
            </div>
            <div class="form-floating">
                <label for="password">Clave: </label>  
                <input class="form-control" id="password" name="password" type="text" placeholder="Digite su password" required > 
            </div>
            <div class="mt-4 mb-0">
            <div class="d-grid"><button type="submit" class="btn btn-primary btn-block" name="submit">Crear una cuenta</button></div>
            </div>
        </form>
    </div>
    <div class="card-footer text-center py-3">
    <div class="small"><a href="login.php">¿Ya tienes una cuenta? Inicia sesion</a></div>
 
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
       
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
