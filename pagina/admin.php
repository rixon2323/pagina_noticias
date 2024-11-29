<?php  
// Conectar a la base de datos  
$conexion = mysqli_connect("localhost", "root", "", "pagina_web");  

// Verificar conexión  
if (mysqli_connect_errno()) {  
    echo "Error al conectar a la base de datos: " . mysqli_connect_error();  
    exit();  
}  

// Lógica para agregar una nueva noticia  
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['action']) && $_POST['action'] == 'add') {  
    $title = mysqli_real_escape_string($conexion, $_POST['news_title']);  
    $image = mysqli_real_escape_string($conexion, $_POST['news_image']);  
    $description = mysqli_real_escape_string($conexion, $_POST['news_description']);  
    $link = mysqli_real_escape_string($conexion, $_POST['news_link']);  

    $query = "INSERT INTO Noticias (title, image, description, link) VALUES ('$title', '$image', '$description', '$link')";  
    if (mysqli_query($conexion, $query)) {  
        echo "<p>Noticia agregada correctamente.</p>";  
    } else {  
        echo "<p>Error al agregar noticia: " . mysqli_error($conexion) . "</p>";  
    }  
}  

// Obtener todas las noticias  
$query = "SELECT * FROM Noticias";  
$result = mysqli_query($conexion, $query);  
if (!$result) {  
    echo "Error en la consulta: " . mysqli_error($conexion);  
    exit();
}

// Comprobar si hay resultados  
$noticias = mysqli_fetch_all($result, MYSQLI_ASSOC);  
?>  

<!DOCTYPE html>  
<html lang="es">  
<head>  
    <meta charset="UTF-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <title>Administrar Noticias</title>  
    <style>  
        body {  
            font-family: Arial, sans-serif;  
            background-color: #f4f4f4;  
            margin: 0;  
            padding: 20px;  
        }  
        h1, h2 {  
            color: #333;  
        }  
        form {  
            margin-bottom: 20px;  
            padding: 10px;  
            background: #fff;  
            border: 1px solid #ccc;  
            border-radius: 5px;  
        }  
        input[type="text"], textarea {  
            width: 100%;  
            margin: 10px 0;  
            padding: 8px;  
            box-sizing: border-box;  
        }  
        button {  
            background-color: #28a745;  
            color: white;  
            padding: 10px;  
            border: none;  
            border-radius: 5px;  
            cursor: pointer;  
            margin: 5px 0;  
        }  
        button:hover {  
            background-color: #218838;  
        }  
        .btn-delete {  
            background-color: #dc3545;  
        }  
        .btn-delete:hover {  
            background-color: #c82333;  
        }  
        table {  
            width: 100%;  
            border-collapse: collapse;  
            margin-top: 20px;  
            background: #fff;  
        }  
        th, td {  
            border: 1px solid #ddd;  
            padding: 8px;  
            text-align: left;  
        }  
        th {  
            background-color: #f2f2f2;  
        }  
        tr:nth-child(even) {  
            background-color: #f9f9f9;  
        }  
        tr:hover {  
            background-color: #f1f1f1;  
        }  
    </style>  
</head>  
<body>  

<h1>Administrar Noticias</h1>  

<!-- Formulario para agregar una nueva noticia -->  
<h2>Agregar Noticia</h2>  
<form method="post" action="">  
    <input type="hidden" name="action" value="add">  
    <label for="news_title">Título:</label>  
    <input type="text" name="news_title" id="news_title" required><br>  
    
    <label for="news_image">Imagen URL:</label>  
    <input type="text" name="news_image" id="news_image" required><br>  
    
    <label for="news_description">Descripción:</label>  
    <textarea name="news_description" id="news_description" required></textarea><br>  
    
    <label for="news_link">Link:</label>  
    <input type="text" name="news_link" id="news_link" required><br>  
    
    <button type="submit">Agregar Noticia</button>  
</form>  

<!-- Listado de noticias -->  
<h2>Listado de Noticias</h2>  
<table>  
    <tr>  
        <th>Título</th>  
        <th>Imagen</th>  
        <th>Descripción</th>  
        <th>Link</th>  
        <th>Acciones</th>  
    </tr>  
    <?php if (!empty($noticias)): ?>  
        <?php foreach ($noticias as $noticia): ?>  
            <tr>  
                <td><?php echo isset($noticia['title']) ? htmlspecialchars($noticia['title']) : 'No disponible'; ?></td>  
                <td>
                    <?php if (isset($noticia['image']) && !empty($noticia['image'])): ?>
                        <img src="<?php echo htmlspecialchars($noticia['image']); ?>" alt="Imagen" style="max-width: 100px;">
                    <?php else: ?>
                        No disponible
                    <?php endif; ?>
                </td>  
                <td><?php echo isset($noticia['description']) ? htmlspecialchars($noticia['description']) : 'No disponible'; ?></td>  
                <td><a href="<?php echo isset($noticia['link']) ? htmlspecialchars($noticia['link']) : '#'; ?>" target="_blank">Ver Link</a></td>  
                <td>  
                    <form method="get" action="modificar_noticia.php" style="display:inline;">  
                        <input type="hidden" name="noticia_id" value="<?php echo htmlspecialchars($noticia['noticia_id']); ?>">  
                        <button type="submit">Editar</button>  
                    </form>  
                    <form method="get" action="eliminar_noticia.php" style="display:inline;" onsubmit="return confirm('¿Seguro que deseas eliminar esta noticia?');">  
                        <input type="hidden" name="noticia_id" value="<?php echo htmlspecialchars($noticia['noticia_id']); ?>">  
                        <button type="submit" class="btn-delete">Eliminar</button>  
                    </form>  
                </td>  
            </tr>  
        <?php endforeach; ?>  
    <?php else: ?>  
        <tr>  
            <td colspan="5">No hay noticias para mostrar.</td>  
        </tr>  
    <?php endif; ?>  
</table>  

<?php  
// Cerrar la conexión al final del script  
mysqli_close($conexion);  
?>  

</body>
</html>
