<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <!-- META IMPORTANTE PARA RESPONSIVIDAD -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RomsPS2</title>
    <style>
        /* --- ESTILOS BASE Y TIPOGRAFÍA --- */
        body { 
            font-family: 'Arial', sans-serif; 
            background: radial-gradient(#6342C5, #000000); 
            color: white; 
            margin: 0;
            line-height: 1.6;
        }
        h1, h2, h3 { color: #fff; margin-top: 0.5em; margin-bottom: 0.5em; }
        
        /* --- BOTONES --- */
        .btn { 
            display: inline-block; 
            margin: 10px 0; /* Ajuste para mejor control en el flujo */
            padding: 10px 20px; 
            background: #6B5ABA; 
            color: white; 
            text-decoration: none; 
            border-radius: 5px; 
            transition: background 0.3s; 
            font-weight: bold;
        }
        .btn:hover { background: #8572e0; }

        /* --- HERO SECTION --- */
        .hero { 
            padding: 20px; /* Reducido en móvil, se expandirá después */
            text-align: left;
            max-width: 1200px;
            margin: 0 auto;
        }
        .hero h1 { font-size: 2.5rem; }
        .hero p { margin-bottom: 20px; }
        .hero img {
            display: block; 
            margin: 20px auto; /* Separación */
            height: auto; /* Altura automática para ser flexible */
            max-height: 700px; 
            width: 100%; /* Ocupa el 100% del contenedor en móvil */
            max-width: 1000px; /* Limite de ancho en desktop */
            object-fit: cover; 
            border-radius: 8px; 
        }

        /* --- SECCIONES HORIZONTALES (VIDEOJUEGOS y TESTIMONIOS) --- */
        .seccion-titulo { padding: 40px 20px 20px; max-width: 1200px; margin: 0 auto; font-size: 2rem; }

        /* Contenedor de Grid de Videojuegos (Flexible y adaptable) */
        .videojuegos-grid {
            display: grid;
            /* CLAVE: Auto-fit asegura que las columnas se ajustan al espacio disponible */
            grid-template-columns: repeat(auto-fit, minmax(180px, 1fr)); 
            gap: 20px; 
            padding: 0 20px 40px;
            max-width: 1200px;
            margin: 0 auto;
        }
        .videojuego-item {
            text-align: center;
            background: #220044;
            padding: 15px;
            border-radius: 8px;
            transition: transform 0.2s;
        }
        .videojuego-item:hover {
            transform: translateY(-5px);
        }
        .videojuego-item img {
            width: 100%; 
            height: auto;
            border-radius: 5px;
            display: block;
        }
        .caratula { height: auto; margin-bottom: 10px; }


        /* --- SECCIÓN DE NOTICIAS --- */
        .news {
            display: grid;
            grid-template-columns: 1fr; /* Por defecto, una sola columna en móvil */
            gap: 40px; 
            padding: 20px; 
            max-width: 1200px; 
            margin: 0 auto; 
        }
        .news-card { 
            border-radius: 8px; 
            width: 100%; 
            /* Para que el enlace ocupe todo el espacio y el texto esté centrado en el botón */
            display: block; 
        } 
        .news-card img { 
            width: 100%; 
            height: 250px; 
            object-fit: cover; 
            border-radius: 8px; 
            margin-bottom: 15px;
        }

        /* --- SECCIÓN SOBRE NOSOTROS (RESPONSIVE) --- */
        .sobre-nosotros { 
            max-width: 1200px; 
            margin: auto; 
            padding: 40px 20px;
            display: grid; 
            /* Por defecto, apilamos elementos en móvil (1 columna) */
            grid-template-columns: 1fr; 
            gap: 40px; 
            align-items: center;
        }
        .sobre-nosotros h2 { font-size: 1.5rem; border-bottom: 2px solid #6B5ABA; padding-bottom: 5px; }
        .sobre-nosotros .columna-derecha { order: -1; /* Mueve la imagen arriba en móvil */ }
        .sobre-nosotros .columna-derecha img { 
            width: 100%; 
            height: auto;
            border-radius: 10px; 
            max-width: 400px; 
        }
        .columna-izquierda { 
            font-size: 1.1rem;
            display: grid;
            grid-template-columns: 1fr;
            gap: 20px;
        }
        .columna-izquierda div {
            padding: 10px;
            background: rgba(34, 0, 68, 0.5); /* Fondo semitransparente para los puntos */
            border-radius: 5px;
        }

        /* --- SECCIÓN DE TESTIMONIOS (RESPONSIVE) --- */
        .testimonios-grid {
            display: grid;
            grid-template-columns: 1fr; /* Por defecto, una columna en móvil */
            gap: 20px;
            padding: 20px 20px 40px;
            max-width: 1200px;
            margin: 0 auto;
        }
        .testimonio-card {
            background: rgba(34, 0, 68, 0.8);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
        }
        .testimonio-card h3 { 
            font-style: italic; 
            font-size: 1.1rem;
            margin-bottom: 15px;
        }
        .testimonio-avatar {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-top: 15px;
        }
        .testimonio-avatar img {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid #6B5ABA;
        }
        .testimonio-info {
            display: flex;
            flex-direction: column;
        }
        .testimonio-info span {
            font-size: 0.9rem;
            color: #ccc;
        }

        /* ======================================= */
        /* --- MEDIA QUERIES (TABLET Y DESKTOP) --- */
        /* ======================================= */

        @media (min-width: 768px) {
            /* HERO */
            .hero { padding: 40px 20px; }
            .hero h1 { font-size: 3.5rem; }
            
            /* NOTICIAS */
            .news {
                grid-template-columns: 1fr 1fr; /* 2 columnas en tablet/desktop */
                padding: 40px 20px;
            }

            /* SOBRE NOSOTROS */
            .sobre-nosotros {
                grid-template-columns: 1fr 1fr; /* Vuelve al diseño de 2 columnas */
            }
            .sobre-nosotros .columna-derecha {
                order: initial; /* La imagen vuelve a la derecha */
            }

            /* TESTIMONIOS */
            .testimonios-grid {
                grid-template-columns: 1fr 1fr; /* 2 columnas en tablet */
            }
        }

        @media (min-width: 1024px) {
            /* VIDEOJUEGOS */
            /* Minmax de 220px asegura que no se hagan demasiado pequeños */
            .videojuegos-grid {
                grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); 
            }

            /* TESTIMONIOS */
            .testimonios-grid {
                grid-template-columns: 1fr 1fr 1fr; /* 3 columnas en desktop */
            }
            
            /* GENERAL */
            .seccion-titulo { font-size: 2.5rem; }
            .hero, .seccion-titulo, .videojuegos-grid, .news, .sobre-nosotros, .testimonios-grid {
                padding-left: 0;
                padding-right: 0;
            }
        }
    </style>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<header>
    <?php get_header() ?>
</header>

<div class="hero">
    <h1>RomsPS2</h1>
    <p>La web de roms mas segura de mi casa</p>
    <a href="<?php echo esc_url( get_post_type_archive_link('videojuegos') ); ?>" class="btn">Juegos</a>
    <img 
    src="<?php echo get_template_directory_uri(); ?>/assets/Pagina-inicial-1.jpg" 
    alt="Imagen principal de la landing page" 
/>
</div>

<h1 class="seccion-titulo">Juegos destacados:</h1>
<div class="videojuegos-grid">
    <?php
    $destacados = new WP_Query(array(
        'post_type' => 'videojuegos',
        'posts_per_page' => 5,
        'orderby' => 'rand'
    ));
    if ($destacados->have_posts()) :
        while ($destacados->have_posts()) : $destacados->the_post(); ?>
            <div class="videojuego-item">
                <a href="<?php the_permalink(); ?>">
                    <div class="caratula">
                        <?php if (has_post_thumbnail()) {
                            the_post_thumbnail('medium');
                        } else {
                            echo '<img src="' . esc_url(get_template_directory_uri() . '/assets/no-image.jpg') . '" alt="Sin imagen">';
                        } ?>
                    </div>
                </a>
                <h3><?php the_title(); ?></h3>
                <p><?php the_terms(get_the_ID(), 'categorias_videojuegos', '', ', '); ?></p>
            </div>
        <?php endwhile;
        wp_reset_postdata();
    else :
        echo '<p>No hay juegos destacados aún.</p>';
    endif;
    ?>
</div>


<h1 class="seccion-titulo">Noticias</h1>
<div class="news">
<?php

$noticias = new WP_Query([
    'post_type'       => 'post',      
    'posts_per_page'  => 2,         
    'order'           => 'DESC'
]);

while ($noticias->have_posts()) : $noticias->the_post(); ?>

    <a href="<?php the_permalink(); ?>" class="news-card" style="text-decoration:none; color:inherit;">
        <?php if (has_post_thumbnail()): ?>
            <img src="<?php the_post_thumbnail_url('large'); ?>" alt="<?php the_title(); ?>">
        <?php endif; ?>
        <h3><?php the_title(); ?></h3>
        <p><?php echo wp_trim_words(get_the_excerpt(), 15); ?></p>
    </a>

<?php endwhile;
wp_reset_postdata();
?>
</div>

<div style="text-align:center; padding-bottom: 40px;">
    <?php 
    $news_page = get_page_by_path('noticias'); 
    $news_url = $news_page ? esc_url( get_permalink( $news_page ) ) : home_url('/noticias/'); 
    ?>
    <a class="btn" href="<?php echo $news_url; ?>">
        Mas noticias
    </a>
</div>

<h1 class="seccion-titulo">Sobre nosotros</h1>

<div class="sobre-nosotros">
    
    <!-- Columna Izquierda: Conservación, Comunidad, L'Oréal Paris -->
    <div class="columna-izquierda">
        <div>
            <h2>Conservación</h2>
            <p>Nos comprometemos con la conservación del medio ambiente.</p>
        </div>
        <div>
            <h2>Comunidad</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
        </div>
        <div>
            <h2>L'Oréal Paris</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
        </div>
    </div>

    <!-- Columna Derecha: Imagen (Se mueve arriba en móvil gracias a CSS 'order: -1') -->
    <div class="columna-derecha">
        <img 
            src="<?php echo get_template_directory_uri(); ?>/assets/Principal-sobre-nosotros.jpg" 
            alt="Sobre nosotros image" 
        />
    </div>

    <div style="text-align:center;">
        <?php $contact_page = get_page_by_path('contacto'); ?>
        <a class="btn" href="<?php echo $contact_page ? esc_url( get_permalink( $contact_page ) ) : '#'; ?>">
            Contactanos
        </a>
    </div>
</div>

<h1 class="seccion-titulo">Que dice mi gente</h1>

<div class="testimonios-grid">
<?php
$comentarios = new WP_Query([
    'post_type' => 'comentarios',
    'posts_per_page' => 3,
    'order' => 'rand'
]);

if ($comentarios->have_posts()) :
    while ($comentarios->have_posts()) : $comentarios->the_post();

        $nombre = get_post_meta(get_the_ID(), 'nombre', true);
        $descripcion = get_post_meta(get_the_ID(), 'descripcion', true);
?>
        <div class="testimonio-card">
            
            <!-- Comentario -->
            <h3><?php the_title(); ?></h3>

            <!-- Avatar + info -->
            <div class="testimonio-avatar">
                <?php 
                if (has_post_thumbnail()) {
                    // Usar 'thumbnail' o un tamaño personalizado para avatares
                    the_post_thumbnail('thumbnail'); 
                } else {
                    // Asegúrate de que esta ruta sea válida
                    echo '<img src="'.esc_url(get_template_directory_uri().'/assets/avatar-default.jpg').'" alt="avatar">';
                }
                ?>
                
                <div class="testimonio-info">
                    <strong><?php echo esc_html($nombre ?: 'Nombre'); ?></strong>
                    <span><?php echo esc_html($descripcion ?: 'Descripción'); ?></span>
                </div>
            </div>

        </div>
<?php
    endwhile;
    wp_reset_postdata();
endif;
?>
</div>

<footer>
    <?php get_footer() ?>
</footer>

</body>
</html>