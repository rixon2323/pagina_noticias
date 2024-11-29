<?php  

$servidor = "localhost";  
$usuario = "root";  
$clave = "";  
$bd = "pagina_web";  

// Crear la conexión  
$conexion = mysqli_connect($servidor, $usuario, $clave, $bd);  

// Verificar la conexión  
if (!$conexion) {  
    die("Conexión fallida: " . mysqli_connect_error());  
}  

?>  

<form method="post">  

    <input type="text" name="title" placeholder="title" required>  
    <input type="text" name="image" placeholder="image" required>  
    <input type="text" name="description" placeholder="description" required>  
    <input type="text" name="link" placeholder="link" required>  
    
    <input type="submit" name="enviar" value="Enviar">  

</form>  

<?php  

if (isset($_POST['enviar'])) {  
    $title = $_POST['title'];  
    $image = $_POST['image'];  
    $description = $_POST['description'];  
    $link = $_POST['link'];  
    
    // Escapar caracteres especiales  
    $title = mysqli_real_escape_string($conexion, $title);  
    $image = mysqli_real_escape_string($conexion, $image);  
    $description = mysqli_real_escape_string($conexion, $description);  
    $link = mysqli_real_escape_string($conexion, $link);  
    
    // Consulta de inserción  
    $insertar = "INSERT INTO Noticias (title, image, description, link) VALUES ('$title', '$image', '$description', '$link')";  

    if (mysqli_query($conexion, $insertar)) {  
        echo "Nuevo registro creado exitosamente.";  
    } else {  
        echo "Error: " . mysqli_error($conexion); // Mostrar el error  
    }  
}  

mysqli_close($conexion); // Cerrar la conexión  

?>





