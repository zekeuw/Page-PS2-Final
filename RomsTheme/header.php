<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php wp_title( '|', true, 'right' ); ?><?php bloginfo( 'name' ); ?></title>
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/style.css">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<header>
    <div class="header-container">
        <!-- Logo -->
        <div class="logo">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                <img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" alt="Logo PS2 Roms">
            </a>
        </div>

        <!-- Botón de Menú (Solo visible en móviles por CSS) -->
        <button id="menu-toggle" class="menu-toggle" aria-expanded="false" aria-controls="primary-menu-nav">
            <!-- Icono de Hamburguesa (Unicode) -->
            &#9776;
        </button>

        <!-- Navegación Principal -->
        <nav id="primary-menu-nav">
            <?php
            // Muestra el menú de WordPress
            wp_nav_menu( array(
                'theme_location'    => 'primary', // Define la ubicación del menú (debes registrarla en functions.php)
                'container'         => false,     // No usar un div contenedor adicional
                'menu_class'        => 'main-menu', // Clase UL para aplicar los estilos existentes
                'fallback_cb'       => false,     // No mostrar nada si no hay menú asignado
            ) );
            ?>
        </nav>
    </div>
</header>

<!-- SCRIPT JS PARA EL TOGGLE DEL MENÚ MÓVIL -->
<script>
    // Se usa un evento 'DOMContentLoaded' para asegurar que el DOM está cargado
    document.addEventListener('DOMContentLoaded', function() {
        const toggleButton = document.getElementById('menu-toggle');
        const navContainer = document.getElementById('primary-menu-nav');

        if (toggleButton && navContainer) {
            toggleButton.addEventListener('click', function() {
                // Alterna la clase 'toggled' en el NAV, que usaremos en CSS
                navContainer.classList.toggle('toggled');
                
                // Alterna el atributo ARIA para accesibilidad
                const isExpanded = toggleButton.getAttribute('aria-expanded') === 'true' || false;
                toggleButton.setAttribute('aria-expanded', !isExpanded);
            });
        }
    });
</script>

<main class="site-content">
<!-- El contenido de tu página va aquí (ej: index.php o page.php) -->