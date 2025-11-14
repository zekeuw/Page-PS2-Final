<?php 
/*
Template Name: Single Videojuego
Template Post Type: videojuegos
Descripción: Muestra la información detallada de un solo videojuego, incluyendo la carátula, descripción, gameplay (YouTube) y enlaces de descarga.
*/
get_header(); 
?>

<style>
    /* Estilos generales para esta página */
    .videojuego-single { 
        color: white; 
        padding: 50px 0; 
        font-family: Arial, sans-serif;
        background: radial-gradient(#4d2e99, #000000); /* Fondo ligeramente más oscuro */
    }

    /* Contenedor principal (Desktop: 2 columnas, Móvil: 1 columna) */
    .contenedor {
        max-width: 1200px; 
        margin: auto; 
        padding: 0 20px; /* Padding horizontal para evitar que el contenido toque los bordes */
        display: grid; 
        grid-template-columns: 1fr; /* Por defecto, 1 columna en móvil */
        gap: 40px; 
        align-items: start;
    }

    /* Columna Derecha (donde están la imagen y los botones) */
    .columna-derecha {
        text-align: center; 
        width: 100%; /* Ocupa el 100% en móvil */
        max-width: 400px; /* Limite de ancho para la imagen y botones */
        margin: 0 auto; /* Centrar la columna derecha en móvil */
        justify-self: center; 
        align-self: center;
        order: -1; /* CLAVE: Mover la carátula y enlaces por encima del texto en móvil */
    }

    /* Estilo de la carátula */
    .imagen-portada img {
        width: 100%; 
        height: auto; 
        border-radius: 15px; /* Bordes más redondeados */
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.5);
    }
    .imagen-portada {
        margin-bottom: 30px;
    }

    /* Títulos */
    .columna-izquierda h1 {
        font-size: 2rem; /* Título más pequeño en móvil */
        margin-bottom: 15px;
    }

    /* Botones de descarga */
    .link-btn {
        display: block; 
        background: #7b4dff; 
        color: white; 
        padding: 12px; 
        border-radius: 10px; 
        margin: 15px 0; 
        text-decoration: none;
        font-weight: bold;
        transition: background 0.3s, transform 0.2s;
    }
    .link-btn:hover {
        background: #9a7bff;
        transform: translateY(-2px);
    }

    /* Contenedor de Video (aspect ratio) */
    .video {
        position: relative;
        padding-bottom: 56.25%; /* 16:9 Aspect Ratio */
        height: 0;
        overflow: hidden;
        max-width: 100%;
        margin-top: 20px;
    }

    .video iframe {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        border: none;
        border-radius: 10px;
    }

    /* ======================================= */
    /* --- MEDIA QUERIES (TABLET Y DESKTOP) --- */
    /* ======================================= */

    @media (min-width: 768px) {
        /* Vuelve a 2 columnas */
        .contenedor {
            grid-template-columns: 2fr 1fr; /* Columna izquierda (texto) más ancha que la derecha (imagen) */
            gap: 50px;
            padding: 0 40px;
        }

        /* Título grande */
        .columna-izquierda h1 {
            font-size: 3rem;
        }

        /* La columna derecha vuelve a su orden natural y ajuste de tamaño */
        .columna-derecha {
            order: initial; 
            max-width: 100%; /* Permite que ocupe el 1/3 del grid */
            width: auto;
        }
    }
</style>

<main class="videojuego-single">

    <?php while (have_posts()) : the_post(); ?>

        <section class="contenedor">
            
            <!-- Columna Izquierda (Descripción, Contenido, Gameplay) -->
            <div class="columna-izquierda">

                <h1><?php the_title(); ?></h1>

                <p style="font-size: 1.2rem; margin-bottom: 20px; color: #ccc;">
                    <strong>Categoría:</strong> 
                    <?php 
                        $cats = get_the_terms(get_the_ID(), 'categorias_videojuegos');
                        if ($cats && !is_wp_error($cats)) {
                            $nombres = wp_list_pluck($cats, 'name');
                            echo esc_html(implode(', ', $nombres));
                        }
                    ?>
                </p>

                <div class="descripcion" style="margin-bottom: 20px; font-size: 1.1rem;">
                    <?php the_content(); ?>
                </div>

                <!-- Gameplay -->
                <?php 
                $video = get_field('gameplay');
                if ($video) :

                    // Convertir URL normal de YouTube a formato embed
                    if (preg_match('/(?:youtu\.be\/|youtube\.com\/(?:watch\?v=|embed\/|shorts\/))([a-zA-Z0-9_-]+)/', $video, $matches)) {
                        $video_id = $matches[1];
                        $video = 'https://www.youtube.com/embed/' . $video_id;
                    }
                ?>
                    <h2 style="font-size: 1.5rem; margin-top: 30px; border-bottom: 2px solid #7b4dff; padding-bottom: 5px;">Gameplay:</h2>
                    <div class="video">
                        <iframe src="<?php echo esc_url($video); ?>" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                <?php endif; ?>


            </div>

            <!-- Columna Derecha (Carátula y Botones) -->
            <div class="columna-derecha">

                <?php if (has_post_thumbnail()) : ?>
                    <div class="imagen-portada">
                        <?php the_post_thumbnail('medium'); ?>
                    </div>
                <?php endif; ?>

                <?php 
                    $link1 = get_post_meta(get_the_ID(), '_link1', true);
                    $link2 = get_post_meta(get_the_ID(), '_link2', true);
                ?>

                <?php if ($link1) : ?>
                    <a href="<?php echo esc_url($link1); ?>" target="_blank" class="link-btn">Descargar (Link 1)</a>
                <?php endif; ?>

                <?php if ($link2) : ?>
                    <a href="<?php echo esc_url($link2); ?>" target="_blank" class="link-btn">Descargar (Link 2)</a>
                <?php endif; ?>

            </div>

        </section>

    <?php endwhile; ?>

</main>

<?php get_footer(); ?>