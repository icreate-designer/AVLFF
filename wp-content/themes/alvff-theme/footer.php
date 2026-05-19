<!-- ═══ FOOTER ═══ -->
<footer class="bg-dark text-footer">

  <!-- ── Newsletter band ── -->
  <div class="py-4">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-md-8 mb-3 mb-md-0">
          <h3 class="text-white mb-1 fw-bold"><?php esc_html_e( 'Inscrivez-vous à notre newsletter', 'alvff-theme' ); ?></h3>
          <p class="mb-0" style="color:#9e9e9e;"><?php esc_html_e( 'Restez informé de nos actions et de notre impact.', 'alvff-theme' ); ?></p>
        </div>
        <div class="col-md-4">
          <?php if ( function_exists( 'mc4wp_form' ) ) : ?>
            <?php mc4wp_form(); ?>
          <?php else : ?>
          <div class="d-flex gap-2">
            <input class="form-control" type="email" name="newsletter_email"
                   placeholder="<?php esc_attr_e( 'Email', 'alvff-theme' ); ?>"
                   style="background:#2a2a2a; border-color:#333; color:#fff;">
            <button class="btn btn-danger flex-shrink-0" type="button">
              <?php esc_html_e( "S'inscrire", 'alvff-theme' ); ?>
            </button>
          </div>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>

  <!-- ── Main footer body ── -->
  <div class="py-5" style="border-top:1px solid #2a2a2a;">
    <div class="container">
      <div class="row g-4">

        <!-- Col 1 — Logo + description + socials -->
        <div class="col-md-3 col-12">
          <!-- Logo -->
          <div class="d-flex align-items-center gap-2 mb-3">
             <img src="<?php bloginfo('template_directory');?>/assets/img/logo-alvff.png"
                   alt=""
                   style="width:44px; height:44px; border-radius:8px; object-fit:cover;">
            <span class="text-white fw-bold" style="font-size:1.1rem;"><?php bloginfo( 'name' ); ?></span>
          </div>

          <!-- Tagline -->
          <p style="color:#9e9e9e; font-size:.85rem; line-height:1.6;">
            <?php echo esc_html( get_theme_mod( 'alvff_footer_desc', "Association de Lutte contre les Violences Faites aux Femmes et Filles" ) ); ?>
          </p>

          <!-- Social icons -->
          <div class="d-flex gap-2 mt-3">
            <a href="<?php echo esc_url( get_theme_mod( 'alvff_facebook', '#' ) ); ?>"
               aria-label="Facebook" class="text-decoration-none"
               style="width:36px;height:36px;border-radius:50%;background:#2a2a2a;display:flex;align-items:center;justify-content:center;">
              <i class="bx bxl-facebook" style="font-size:1.1rem; color:#9e9e9e;"></i>
            </a>
            <a href="<?php echo esc_url( get_theme_mod( 'alvff_twitter', '#' ) ); ?>"
               aria-label="Twitter" class="text-decoration-none"
               style="width:36px;height:36px;border-radius:50%;background:#2a2a2a;display:flex;align-items:center;justify-content:center;">
              <i class="bx bxl-twitter" style="font-size:1.1rem; color:#9e9e9e;"></i>
            </a>
            <a href="<?php echo esc_url( get_theme_mod( 'alvff_instagram', '#' ) ); ?>"
               aria-label="Instagram" class="text-decoration-none"
               style="width:36px;height:36px;border-radius:50%;background:#2a2a2a;display:flex;align-items:center;justify-content:center;">
              <i class="bx bxl-instagram" style="font-size:1.1rem; color:#9e9e9e;"></i>
            </a>
            <a href="<?php echo esc_url( get_theme_mod( 'alvff_youtube', '#' ) ); ?>"
               aria-label="YouTube" class="text-decoration-none"
               style="width:36px;height:36px;border-radius:50%;background:#2a2a2a;display:flex;align-items:center;justify-content:center;">
              <i class="bx bxl-youtube" style="font-size:1.1rem; color:#9e9e9e;"></i>
            </a>
          </div>
        </div>

        <!-- Col 2 — À Propos -->
        <div class="col-md-3 col-6 ps-md-5">
          <p class="text-white fw-bold mb-3" style="font-size:.95rem;"><?php esc_html_e( 'À Propos', 'alvff-theme' ); ?></p>
          <?php
          wp_nav_menu( array(
              'theme_location' => 'footer',
              'container'      => false,
              'menu_class'     => 'list-unstyled mb-0',
              'fallback_cb'    => false,
              'depth'          => 1,
              'link_before'    => '',
              'link_after'     => '',
              'items_wrap'     => '<ul class="list-unstyled mb-0">%3$s</ul>',
              'walker'         => new class extends Walker_Nav_Menu {
                  public function start_el( &$output, $data_object, $depth = 0, $args = null, $current_object_id = 0 ) {
                      $url   = $data_object->url;
                      $title = $data_object->title;
                      $output .= '<li class="mb-2"><a href="' . esc_url( $url ) . '" class="text-decoration-none" style="color:#9e9e9e; font-size:.88rem;">' . esc_html( $title ) . '</a></li>';
                  }
              },
          ) );

          /* Fallback links if no menu assigned */
          if ( ! has_nav_menu( 'footer' ) ) : ?>
          <ul class="list-unstyled mb-0">
            <li class="mb-2"><a href="<?php echo esc_url( home_url( '/mission/' ) ); ?>"      class="text-decoration-none" style="color:#9e9e9e; font-size:.88rem;"><?php esc_html_e( 'Notre Mission',   'alvff-theme' ); ?></a></li>
            <li class="mb-2"><a href="<?php echo esc_url( home_url( '/equipe/' ) ); ?>"        class="text-decoration-none" style="color:#9e9e9e; font-size:.88rem;"><?php esc_html_e( 'Notre Équipe',    'alvff-theme' ); ?></a></li>
            <li class="mb-2"><a href="<?php echo esc_url( home_url( '/histoire/' ) ); ?>"      class="text-decoration-none" style="color:#9e9e9e; font-size:.88rem;"><?php esc_html_e( 'Notre Histoire',  'alvff-theme' ); ?></a></li>
            <li class="mb-2"><a href="<?php echo esc_url( home_url( '/partenaires/' ) ); ?>"   class="text-decoration-none" style="color:#9e9e9e; font-size:.88rem;"><?php esc_html_e( 'Nos Partenaires', 'alvff-theme' ); ?></a></li>
          </ul>
          <?php endif; ?>
        </div>

        <!-- Col 3 — Prendre Action -->
        <div class="col-md-3 col-6">
          <p class="text-white fw-bold mb-3" style="font-size:.95rem;"><?php esc_html_e( 'Prendre Action', 'alvff-theme' ); ?></p>
          <ul class="list-unstyled mb-0">
            <li class="mb-2"><a href="<?php echo esc_url( home_url( '/don/' ) ); ?>"             class="text-decoration-none" style="color:#9e9e9e; font-size:.88rem;"><?php esc_html_e( 'Faire un Don',        'alvff-theme' ); ?></a></li>
            <li class="mb-2"><a href="<?php echo esc_url( home_url( '/parrainage/' ) ); ?>"      class="text-decoration-none" style="color:#9e9e9e; font-size:.88rem;"><?php esc_html_e( 'Parrainer un Enfant',  'alvff-theme' ); ?></a></li>
            <li class="mb-2"><a href="<?php echo esc_url( home_url( '/benevole/' ) ); ?>"        class="text-decoration-none" style="color:#9e9e9e; font-size:.88rem;"><?php esc_html_e( 'Devenir Bénévole',     'alvff-theme' ); ?></a></li>
            <li class="mb-2"><a href="<?php echo esc_url( get_post_type_archive_link( 'projet' ) ?: home_url( '/nos-projets/' ) ); ?>" class="text-decoration-none" style="color:#9e9e9e; font-size:.88rem;"><?php esc_html_e( 'Projets en Cours',   'alvff-theme' ); ?></a></li>
          </ul>
        </div>

        <!-- Col 4 — Contact -->
        <div class="col-md-3 col-12">
          <p class="text-white fw-bold mb-3" style="font-size:.95rem;"><?php esc_html_e( 'Contact', 'alvff-theme' ); ?></p>
          <ul class="list-unstyled mb-0">
            <li class="mb-3 d-flex align-items-start gap-2">
              <div style="width:32px;height:32px;border-radius:50%;background:#2a2a2a;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                <i class="bx bx-map" style="color:#e46212; font-size:1rem;"></i>
              </div>
              <span style="color:#9e9e9e; font-size:.88rem; padding-top:6px;">
                <?php echo esc_html( get_theme_mod( 'alvff_address', 'Maroua, Extrême-Nord, Cameroun' ) ); ?>
              </span>
            </li>
            <li class="mb-3 d-flex align-items-center gap-2">
              <div style="width:32px;height:32px;border-radius:50%;background:#2a2a2a;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                <i class="bx bx-phone" style="color:#e46212; font-size:1rem;"></i>
              </div>
              <span style="color:#9e9e9e; font-size:.88rem;">
                <?php echo esc_html( get_theme_mod( 'alvff_phone', '+237 6XX XXX XXX' ) ); ?>
              </span>
            </li>
            <li class="d-flex align-items-center gap-2">
              <div style="width:32px;height:32px;border-radius:50%;background:#2a2a2a;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                <i class="bx bx-envelope" style="color:#e46212; font-size:1rem;"></i>
              </div>
              <a class="text-decoration-none" style="color:#9e9e9e; font-size:.88rem;"
                 href="mailto:<?php echo esc_attr( get_theme_mod( 'alvff_email', 'contact@alvff.org' ) ); ?>">
                <?php echo esc_html( get_theme_mod( 'alvff_email', 'contact@alvff.org' ) ); ?>
              </a>
            </li>
          </ul>
        </div>

      </div>
    </div>
  </div>

  <!-- ── Copyright bar ── -->
  <div style="border-top:1px solid #2a2a2a; padding:1.1rem 0;">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-md-4 col-12 text-md-start text-center mb-2 mb-md-0">
          <span style="color:#9e9e9e; font-size:.82rem;">
            &copy; <?php echo date( 'Y' ); ?> <?php bloginfo( 'name' ); ?>.
            <?php esc_html_e( 'Tous droits réservés', 'alvff-theme' ); ?>
          </span>
        </div>
        <div class="col-md-4 col-12 text-center mb-2 mb-md-0">
          <a href="<?php echo esc_url( home_url( '/mentions-legales/' ) ); ?>"
             class="text-decoration-none me-3" style="color:#9e9e9e; font-size:.82rem;">
            <?php esc_html_e( 'Mentions Légales', 'alvff-theme' ); ?>
          </a>
          <a href="<?php echo esc_url( home_url( '/politique-de-confidentialite/' ) ); ?>"
             class="text-decoration-none" style="color:#9e9e9e; font-size:.82rem;">
            <?php esc_html_e( 'Politique de Confidentialité', 'alvff-theme' ); ?>
          </a>
        </div>
        <div class="col-md-4 col-12 text-md-end text-center">
          <span style="color:#9e9e9e; font-size:.82rem;">
            <?php esc_html_e( 'Fait avec', 'alvff-theme' ); ?>
            <i class="bx bx-heart" style="color:#e46212;"></i>
            <?php esc_html_e( 'au Cameroun', 'alvff-theme' ); ?>
          </span>
        </div>
      </div>
    </div>
  </div>

</footer>
<!-- ═══ FOOTER END ═══ -->

<?php wp_footer(); ?>
</body>
</html>