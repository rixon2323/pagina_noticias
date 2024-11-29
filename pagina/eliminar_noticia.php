<?php  
// Conectar a la base de datos  
$conexion = mysqli_connect("localhost", "root", "", "pagina_web");  

// Verificar conexión  
if (mysqli_connect_errno()) {  
    echo "Error al conectar a la base de datos: " . mysqli_connect_error();  
    exit();  
}  

// Lógica para eliminar una noticia  
if (isset($_GET['noticia_id'])) {  
    $noticia_id = mysqli_real_escape_string($conexion, $_GET['noticia_id']);  

    // Eliminar noticia  
    $query = "DELETE FROM Noticias WHERE noticia_id = '$noticia_id'";  
    if (mysqli_query($conexion, $query)) {  
        // Redirigir a la página de administración después de eliminar  
        header("Location: admin.php");  
        exit();  
    } else {  
        echo "Error al eliminar la noticia: " . mysqli_error($conexion);  
    }  
}  

// Cerrar la conexión  
mysqli_close($conexion);  
?>