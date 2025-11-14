<?php
/**
 * footer.php
 *
 * Plantilla de pie de página (footer) con diseño responsive.
 */

// Función de FALLBACK: Muestra una lista estática si el usuario no asigna un menú en WP Admin.
if (!function_exists('romsps2_footer_menu_fallback')) {
    function romsps2_footer_menu_fallback($args) {
        // Solo aplica el fallback si no hay una theme_location definida o asignada
        if (!has_nav_menu($args['theme_location'])) {
            $menu_html = '<ul class="footer-menu-list">';
            $menu_html .= '<li><a href="#">Enlace de Ejemplo 1</a></li>';
            $menu_html .= '<li><a href="#">Enlace de Ejemplo 2</a></li>';
            $menu_html .= '<li><a href="#">Enlace de Ejemplo 3</a></li>';
            $menu_html .= '</ul>';
            echo $menu_html;
        }
    }
}
?>

</main><!-- Cierre del main/content si existe -->

<style>
    /* Estilos del Footer */
    .site-footer {
        background-color: #0d0026; /* Fondo oscuro */
        color: #fff;
        padding: 40px 20px;
        font-family: Arial, sans-serif;
    }

    .footer-container {
        max-width: 1200px;
        margin: 0 auto;
        display: flex;
        flex-direction: column; /* Apilados por defecto en móvil */
        gap: 40px; /* Espacio entre las secciones */
    }

    /* Columna de Marca y Redes Sociales */
    .footer-brand {
        text-align: center;
    }
    .brand-title {
        font-size: 2rem;
        color: #7b4dff; /* Color de acento */
        margin-bottom: 20px;
    }
    .footer-social {
        display: flex;
        justify-content: center;
        gap: 20px;
        margin-top: 15px;
    }
    .footer-social a {
        color: #fff;
        font-size: 1.5rem;
        transition: color 0.3s;
    }
    .footer-social a:hover {
        color: #7b4dff;
    }

    /* Contenedor de Enlaces (Menús) */
    .footer-links {
        display: grid;
        grid-template-columns: 1fr; /* Una columna en móvil */
        gap: 30px;
        text-align: center; /* Centrar texto en móvil */
    }

    .footer-col h4 {
        font-size: 1.2rem;
        margin-bottom: 15px;
        border-bottom: 2px solid #330066;
        display: inline-block; /* Ajuste para el borde inferior */
        padding-bottom: 5px;
        color: #ccc;
    }

    /* ESTILOS CLAVE PARA EL MENÚ DE WORDPRESS */
    .footer-menu-list { 
        list-style: none;
        padding: 0;
        margin: 0;
    }
    .footer-col .footer-menu-list li a {
        color: #aaa; 
        text-decoration: none;
        display: block;
        padding: 5px 0;
        transition: color 0.3s;
    }
    .footer-col .footer-menu-list li a:hover {
        color: #7b4dff;
    }
    /* FIN ESTILOS CLAVE */


    /* Pie de página con copyright */
    .footer-copyright {
        text-align: center;
        margin-top: 40px;
        padding-top: 20px;
        border-top: 1px solid #330066;
        font-size: 0.9rem;
        color: #888;
    }

    /* --- MEDIA QUERY (TABLET / DESKTOP) --- */
    @media (min-width: 768px) {
        .footer-container {
            flex-direction: row; 
            justify-content: space-between;
            align-items: flex-start;
        }

        .footer-brand {
            text-align: left;
            flex-basis: 30%; 
        }
        .footer-brand h2 {
            margin-bottom: 15px;
        }
        .footer-social {
            justify-content: flex-start; 
        }
        
        .footer-links {
            /* 2 columnas de menú */
            grid-template-columns: repeat(2, 1fr); 
            flex-basis: 65%;
            text-align: left;
        }
    }
</style>

<footer class="site-footer" role="contentinfo">
    <div class="footer-container">

        <!-- Columna izquierda (Marca y Redes Sociales) -->
        <div class="footer-brand">
            <h2 class="brand-title">RomsPS2</h2>
            <p style="color: #aaa; font-size: 0.9rem;">El portal de conservación de la era PS2.</p>
            <div class="footer-social" aria-label="Redes sociales">
                <!-- FontAwesome CSS debe estar cargado en header.php -->
                <a href="#" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                <a href="#" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                <a href="#" aria-label="YouTube"><i class="fab fa-youtube"></i></a>
                <a href="#" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
            </div>
        </div>

        <!-- Columnas de enlaces dinámicos -->
        <div class="footer-links" role="navigation" aria-label="Enlaces de pie de página">
            
            <!-- MENÚ 1: Páginas Principales -->
            <div class="footer-col">
                <h4>Páginas</h4>
                <?php
                // Usa la función de fallback para asegurar que se muestren enlaces
                wp_nav_menu( array(
                    'theme_location' => 'footer_menu_pages', 
                    'container'      => false, 
                    'menu_class'     => 'footer-menu-list', 
                    'fallback_cb'    => 'romsps2_footer_menu_fallback', // Llama a la función de fallback
                ) );
                ?>
            </div>

            <!-- MENÚ 2: Categorías -->
            <div class="footer-col">
                <h4>Categorías</h4>
                <?php
                // Usa la función de fallback para asegurar que se muestren enlaces
                wp_nav_menu( array(
                    'theme_location' => 'footer_menu_categories', 
                    'container'      => false,
                    'menu_class'     => 'footer-menu-list', 
                    'fallback_cb'    => 'romsps2_footer_menu_fallback', // Llama a la función de fallback
                ) );
                ?>
            </div>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>