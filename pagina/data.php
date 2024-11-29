<?php  
// data.php  
$news = [  
    [  
        'title' => 'Colombia en situación de desastre por las fuertes lluvias e inundaciones',  
        'description' => 'Descripción breve de la noticia destacada...',  
        'image' => 'imagenes/noticias/colombia.png',  
        'link' => 'noticias/3.html',  // Corrige a .html  
    ],  
    [  
        'title' => 'Tarek William Saab: En Venezuela no hay niños detenidos, hay adolescentes',  
        'description' => 'Descripción breve de la noticia destacada...',  
        'image' => 'imagenes/noticias/tarek.jpg',  // Usar barra normal  
        'link' => 'pagina2/noticia-tarek.html', // Cambiar ruta a relativa  
    ],  
    [  
        'title' => 'Edmundo González en Bruselas: El 10 de enero estaremos tomando posesión del nuevo gobierno en Venezuela',  
        'description' => 'El líder opositor venezolano se reunirá con Josep Borrell...',  
        'image' => 'imagenes/noticias/edmundo.jpg',  
        'link' => 'noticias/noticia-edmundo.html', // Cambiar a .html  
    ],  
    [  
        'title' => 'En imágenes: España en alerta por una nueva DANA que está causando inundaciones',  
        'description' => 'Las tormentas que se avecinan también obligaron a suspender...',  
        'image' => 'imagenes/noticias/España.webp',  // Usar barra normal  
        'link' => 'pagina4.php', // Mantener ruta si es correcta  
    ],  
];  
 
include 'conn.php';  

// Consulta a la base de datos  
$query = "SELECT title, image, description, link FROM Noticias";  
$result = mysqli_query($conexion, $query);  

$news = [];  
if ($result) {  
    while ($row = mysqli_fetch_assoc($result)) {  
        $news[] = $row;  
    }  
} else {  
    echo "Error en la consulta: " . mysqli_error($conexion);  
}  
mysqli_close($conexion);  // Cerrar la conexión  
?>