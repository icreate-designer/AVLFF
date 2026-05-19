<!doctype html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<!-- ═══ NAVBAR ═══ -->
<section>
  <nav id="mainNavbar" class="navbar navbar-expand-lg fixed-top" style="padding-bottom:0px; padding-top:0px;">
    <div class="container">

      <a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>">
        
      
      <div class="d-flex">
        <div class="me-2">
          <img src="<?php bloginfo('template_directory');?>/assets/img/logo-alvff.png" style="height:50px; width:auto;">
        </div>
        <div>
           <p class="fw-bold text-success lh-0 mb-0"><?php bloginfo( 'name' ); ?></p>
           <p class="mt-0" style="font-size:7pt;">Maroua, Cameroun</p>
        </div>
      </div>
      
       
        
      </a>

      <button class="navbar-toggler" type="button"
              data-bs-toggle="collapse"
              data-bs-target="#navbarSupportedContent"
              aria-controls="navbarSupportedContent"
              aria-expanded="false"
              aria-label="<?php esc_attr_e( 'Toggle navigation', 'alvff-theme' ); ?>">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <?php
        wp_nav_menu( array(
            'theme_location' => 'primary',
            'container'      => false,
            'menu_class'     => 'navbar-nav mx-auto mb-2 mb-lg-0 text-navbar',
            'fallback_cb'    => 'alvff_fallback_menu',
            'walker'         => new ALVFF_Bootstrap_Walker(),
        ) );
        ?>
        <div>
          <a href="<?php echo esc_url( get_permalink( get_page_by_path( 'don' ) ) ); ?>"
             class="btn btn-danger"><span class="bx bx-heart me-1"></span>
            <?php esc_html_e( 'Faire un don', 'alvff-theme' ); ?>
          </a>
        </div>
      </div><!-- .collapse -->

    </div><!-- .container -->
  </nav>
  <!-- ═══ NAVBAR END ═══ -->
