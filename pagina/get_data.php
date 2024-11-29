<?php  
include 'data.php'; 
require "conn.php";

if (!empty($news)) {  
    echo '<h1>Últimas Noticias</h1>';  
    echo '<div class="news-list">';  

    foreach ($news as $article) {  
        echo '<div class="news-item">';  
        echo '<h2>' . htmlspecialchars($article['title']) . '</h2>';  
        echo '<p>' . htmlspecialchars($article['description']) . '</p>';  
        echo '<img src="' . htmlspecialchars($article['image']) . '" alt="' . htmlspecialchars($article['title']) . '">';  
        echo '<a href="' . htmlspecialchars($article['link']) . '">Leer más</a>';  
        echo '</div>'; 
    }  
    echo '</div>'; 
} else {  
    echo '<p>No hay noticias disponibles.</p>';  
}  

