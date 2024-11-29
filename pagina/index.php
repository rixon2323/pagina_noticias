<?php include 'data.php'; ?>  
<!DOCTYPE html>  
<html lang="es">  
<head>  
    <meta charset="UTF-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <title>The Watermelon</title>  
    <style>  
        body { font-family: Arial, sans-serif; margin: 0; background-color: #f9f9f9; }  
        header { background-color: #003366; color: rgb(255, 255, 255); padding: 20px; text-align: center; }  
        nav { background-color: #ffffff; padding: 10px; text-align: center; box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); }  
        nav a { margin: 0 15px; text-decoration: none; color: #003366; font-weight: bold; }  
        .hero { background-image: url('imagenes/fondo/fondo.jpeg'); background-size: cover; color: rgb(0, 0, 0); padding: 100px 20px; text-align: center; border-radius: 8px; }  
        .hero h1 { font-size: 2.5em; }  
        .hero p { font-size: 1.2em; }  

        .main-content { display: flex; padding: 20px; }  
        .featured-news { flex: 2; display: grid; grid-template-columns: repeat(2, 1fr); gap: 20px; }  
        .news-item { background-color: white; border-radius: 8px; box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); overflow: hidden; cursor: pointer; text-decoration: none; color: inherit; }  
        .news-item img { width: 100%; height: auto; }  
        .news-item h3 { margin: 10px; font-size: 1.2em; color: #333; }  
        .news-item p { margin: 0 10px 10px; font-size: 0.9em; color: #555; }  
        .sidebar { flex: 1; padding-left: 20px; }  
        .sidebar h3 { margin: 10px 0; color: #003366; }  
        .sidebar p { background-color: #e7f1ff; padding: 10px; border-radius: 5px; }  
        footer { background-color: #003366; color: white; text-align: center; padding: 10px 0; }  
    </style>  
</head>  
<body>  
    <header>  
        <h1>The Watermelon</h1>  
    </header>  

    <nav>  
        <a href="#">VENEZUELA</a>  
        <a href="#">MUNDO</a>  
        <a href="#">ECONOMÍA</a>  
        <a href="#">DEPORTES</a>  
        <a href="#">CINE</a>  
    </nav>  

    <div class="hero">  
        <h1>Premian a María Corina Machado con la Medalla de la Democracia 2024</h1>  
        <p>Nov 11, 2024</p>  
    </div>  

    <div class="main-content">  
        <div class="featured-news">  
            <h2 style="text-align: center;">Noticias Destacadas</h2>  
            <?php foreach ($news as $item): ?>  
                <a class="news-item" href="<?php echo $item['link']; ?>">  
                    <img src="<?php echo $item['image']; ?>" alt="<?php echo $item['title']; ?>">  
                    <h3><?php echo $item['title']; ?></h3>  
                    <p><?php echo $item['description']; ?></p>  
                </a>  
            <?php endforeach; ?>  
        </div>  

        <aside class="sidebar">  
            <h3>Suscríbete</h3>  
            <p>¿Te gustaría recibir nuestro boletín informativo? Suscríbete gratis registrando tus datos.</p>  
        </aside>  
    </div>  

    <footer>  
        <p>&copy; 2024 The Watermelon. Todos los derechos reservados.</p>  
    </footer>  
</body>  
</html>