<?php  
// Conectar a la base de datos  
$conexion = mysqli_connect("localhost", "root", "", "pagina_web");  

// Verificar conexión  
if (mysqli_connect_errno()) {  
    echo "Error al conectar a la base de datos: " . mysqli_connect_error();  
    exit();  
}  

// Asegurarse de que 'noticia_id' está definido y se ha pasado correctamente  
if (isset($_GET['noticia_id'])) {  
    // Obtener el ID de la noticia  
    $noticia_id = mysqli_real_escape_string($conexion, $_GET['noticia_id']);  
    $query = "SELECT * FROM Noticias WHERE noticia_id = '$noticia_id'";  
    $result = mysqli_query($conexion, $query);  
    $noticia = mysqli_fetch_assoc($result);  

    if (!$noticia) {  
        echo "Noticia no encontrada.";  
        exit();  
    }  
} else {  
    echo "Error: No se ha proporcionado un ID válido.";  
    exit();  
}  
?>  

<!-- Formulario para modificar la noticia -->  
<form method="post" action="">  
    <input type="hidden" name="noticia_id" value="<?php echo htmlspecialchars($noticia['noticia_id'] ?? ''); ?>">  
    <label for="title">Título:</label>  
    <input type="text" name="news_title" id="title" value="<?php echo htmlspecialchars($noticia['title'] ?? ''); ?>" required>  
    
    <label for="image">Imagen URL:</label>  
    <input type="text" name="news_image" id="image" value="<?php echo htmlspecialchars($noticia['image'] ?? ''); ?>" required>  
    
    <label for="description">Descripción:</label>  
    <textarea name="news_description" id="description" required><?php echo htmlspecialchars($noticia['description'] ?? ''); ?></textarea>  
    
    <label for="link">Link:</label>  
    <input type="text" name="news_link" id="link" value="<?php echo htmlspecialchars($noticia['link'] ?? ''); ?>" required>  
    
    <button type="submit">Modificar Noticia</button>  
</form>  

<?php  
if ($_SERVER["REQUEST_METHOD"] == "POST") {  
    // Asegurarse de que 'noticia_id' se ha enviado  
    if (isset($_POST['noticia_id'])) {  
        $noticia_id = mysqli_real_escape_string($conexion, $_POST['noticia_id']);  
        $title = mysqli_real_escape_string($conexion, $_POST['title']);  
        $image = mysqli_real_escape_string($conexion, $_POST['image']);  
        $description = mysqli_real_escape_string($conexion, $_POST['description']);  
        $link = mysqli_real_escape_string($conexion, $_POST['link']);  

        // Consulta para actualizar  
        $query = "UPDATE Noticias SET title='$title', image='$image', description='$description', link='$link' WHERE noticia_id='$noticia_id'";  

        if (mysqli_query($conexion, $query)) {  
            echo "Noticia modificada correctamente.";  
        } else {  
            echo "Error: " . mysqli_error($conexion);  
        }  
    } else {  
        echo "Error: No se ha proporcionado un ID válido para la modificación.";  
    }  
}  

// Enlace para eliminar  
if (isset($noticia['noticia_id'])) {  
    echo "<a href='eliminar_noticia.php?noticia_id=" . htmlspecialchars($noticia['noticia_id']) . "'>Eliminar</a>";  
}  

// Cerrar la conexión al final del script  
mysqli_close($conexion);  
?>