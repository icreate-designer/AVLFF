<?php
/**
 * Template Name: Page d'Accueil
 * The front page template for the ALVFF theme.
 * All content is editable via ACF (see acf-field-groups.php).
 */
get_header();

/* ── Helper: resolve an ACF image field to a URL ── */
function alvff_img_url( $field_name, $fallback = '' ) {
    $img = get_field( $field_name );
    if ( ! empty( $img ) && is_array( $img ) ) {
        return esc_url( $img['url'] );
    }
    return esc_url( $fallback );
}
?>

<!-- ═══ CAROUSEL / HERO ═══ -->
<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel" data-bs-interval="2000">

  <!-- Nav arrows — above the dot indicators -->
  <button class="carousel-control-prev btn btn-danger d-flex align-items-center justify-content-center"
          type="button"
          data-bs-target="#carouselExampleCaptions"
          data-bs-slide="prev"
          style="width:46px; height:46px; border-radius:50%; bottom:2.6rem; top:auto; left:calc(50% - 60px);">
    <span class="carousel-control-prev-icon" style="width:1.1rem; height:1.1rem;"></span>
    <span class="visually-hidden">Précédent</span>
  </button>

  <button class="carousel-control-next btn btn-danger d-flex align-items-center justify-content-center"
          type="button"
          data-bs-target="#carouselExampleCaptions"
          data-bs-slide="next"
          style="width:46px; height:46px; border-radius:50%; bottom:2.6rem; top:auto; left:calc(50% + 14px);">
    <span class="carousel-control-next-icon" style="width:1.1rem; height:1.1rem;"></span>
    <span class="visually-hidden">Suivant</span>
  </button>

  <!-- Dot indicators -->
  <div class="carousel-indicators" style="bottom:0.6rem;">
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"></button>
  </div>

  <div class="carousel-inner">

    <?php
    $slide_defaults = array(
        1 => array(
            'image'    => get_template_directory_uri() . '/assets/img/slide1.jpg',
            'title'    => __( 'Ensemble, Protégeons les Femmes et les Filles', 'alvff-theme' ),
            'subtitle' => __( "Depuis 1996, l'ALVFF lutte contre toutes les formes de violence faites aux femmes et aux filles dans l'Extrême-Nord du Cameroun.", 'alvff-theme' ),
        ),
        2 => array(
            'image'    => get_template_directory_uri() . '/assets/img/slide1.jpg',
            'title'    => __( 'Mettons fin aux Mutilations Génitales Féminines', 'alvff-theme' ),
            'subtitle' => __( "Plus de 8 500 filles protégées grâce à nos programmes de sensibilisation et d'intervention communautaire.", 'alvff-theme' ),
        ),
        3 => array(
            'image'    => get_template_directory_uri() . '/assets/img/slide1.jpg',
            'title'    => __( 'Les Femmes, Actrices de Paix et de Résilience', 'alvff-theme' ),
            'subtitle' => __( 'Autonomisation économique, plaidoyer et accompagnement psychosocial pour bâtir un avenir digne pour chaque femme.', 'alvff-theme' ),
        ),
    );

    for ( $i = 1; $i <= 3; $i++ ) :
        $slide_img   = alvff_img_url( "slide_{$i}_image", $slide_defaults[ $i ]['image'] );
        $slide_title = get_field( "slide_{$i}_title" ) ?: $slide_defaults[ $i ]['title'];
        $slide_sub   = get_field( "slide_{$i}_subtitle" ) ?: $slide_defaults[ $i ]['subtitle'];
        $active      = ( $i === 1 ) ? ' active' : '';
    ?>
    <div class="carousel-item<?php echo $active; ?> carousel-image"
         style="background-image: url('<?php echo $slide_img; ?>');">
      <div class="carousel-overlay"></div>
      <div class="carousel-content container">
        <div class="carousel-text text-white">
          <div class="badge-danger-light mb-3 text-sm"><span class="dot-red me-3"></span>Maroua, Cameroun</div>
          <h1 class="fw-bold"><?php echo esc_html( $slide_title ); ?></h1>
          <p class="text-white"><?php echo esc_html( $slide_sub ); ?></p>
          <a href="#faire-un-don" class="btn btn-danger"><span class="bx bx-heart"></span> <?php esc_html_e( 'Faire un don', 'alvff-theme' ); ?></a>
          <a href="#nos-projets" class="btn btn-success ms-2">
            <?php esc_html_e( 'Découvrir nos actions', 'alvff-theme' ); ?>
            <span class="bx bx-right-arrow-alt"></span>
          </a>
        </div>
      </div>
    </div>
    <?php endfor; ?>

  </div>
</div>
<!-- ═══ CAROUSEL END ═══ -->

</section><!-- close header section opened in header.php -->


<!-- ═══ STATS ═══ -->
<section class="py-5 bg-success text-white">
  <div class="container">
    <div class="row justify-content-center">

      <?php
      $stat_defaults = array(
          1 => array( 'number' => '15 000+', 'label' => __( 'Femmes Accompagnées', 'alvff-theme' ), 'icon' => 'bx bxs-heart' ),
          2 => array( 'number' => '120+',    'label' => __( 'Communautés Touchées', 'alvff-theme' ), 'icon' => 'bx bxs-map' ),
          3 => array( 'number' => '50+',     'label' => __( 'Partenaires', 'alvff-theme' ),           'icon' => 'bx bxs-group' ),
          4 => array( 'number' => '10+',     'label' => __( "Années d'Expérience", 'alvff-theme' ),   'icon' => 'bx bxs-award' ),
      );

      for ( $i = 1; $i <= 4; $i++ ) :
          $stat_number = get_field( "stat_{$i}_number" ) ?: $stat_defaults[ $i ]['number'];
          $stat_label  = get_field( "stat_{$i}_label" )  ?: $stat_defaults[ $i ]['label'];
          $stat_icon   = get_field( "stat_{$i}_icon" )   ?: $stat_defaults[ $i ]['icon'];
      ?>
      <div class="col-md-3 col-6 d-flex flex-column align-items-center text-center">
        <div class="icon-circle d-flex justify-content-center align-items-center text-danger">
          <i class="<?php echo esc_attr( $stat_icon ); ?>" style="font-size:1.4rem; color:#fff;"></i>
        </div>
        <h1 class="fw-bold lh-0 mt-2"><?php echo esc_html( $stat_number ); ?></h1>
        <p class="text-sm mt-0 text-white"><?php echo esc_html( $stat_label ); ?></p>
      </div>
      <?php endfor; ?>

    </div>
  </div>
</section>
<!-- ═══ STATS END ═══ -->


<!-- ═══ MISSION & VISION ═══ -->
<section class="py-5">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <div class="row">
          <div class="col-md-6">
            <img src="<?php echo alvff_img_url( 'mission_image_1', get_template_directory_uri() . '/assets/img/1.jpg' ); ?>"
                 class="img-fluid rounded-lg" alt="">
          </div>
          <div class="col-md-6">
            <ul class="list-unstyled">
              <li><img src="<?php echo alvff_img_url( 'mission_image_2', get_template_directory_uri() . '/assets/img/2.jpg' ); ?>"
                       class="img-fluid rounded-lg mb-3" alt=""></li>
              <li><img src="<?php echo alvff_img_url( 'mission_image_3', get_template_directory_uri() . '/assets/img/3.jpg' ); ?>"
                       class="img-fluid rounded-lg mb-3" alt=""></li>
            </ul>
          </div>
        </div>
      </div>

      <div class="col-md-6">
        <div class="px-5">
          <p class="text-sm text-danger"><?php echo esc_html( get_field( 'mission_eyebrow' ) ?: 'ALIF' ); ?></p>
          <h2 class="fw-bold"><?php echo esc_html( get_field( 'mission_title' ) ?: __( 'Notre Mission', 'alvff-theme' ) ); ?></h2>
          <p class="text-muted-foreground lead">
            <?php echo esc_html( get_field( 'mission_text' ) ?: __( "L'ALVFF œuvre quotidiennement pour la prévention et la prise en charge des violences basées sur le genre, l'accompagnement psychosocial et juridique des survivantes, la promotion de la scolarisation des filles et l'autonomisation économique des femmes.", 'alvff-theme' ) ); ?>
          </p>

          <div class="row">
            <?php
            $value_defaults = array(
                1 => array( 'label' => __( 'Non-Violence', 'alvff-theme' ), 'icon' => 'bx bx-check' ),
                2 => array( 'label' => __( 'Dignité',      'alvff-theme' ), 'icon' => 'bx bx-check' ),
                3 => array( 'label' => __( 'Solidarité',   'alvff-theme' ), 'icon' => 'bx bx-check' ),
                4 => array( 'label' => __( 'Égalité',      'alvff-theme' ), 'icon' => 'bx bx-check' ),
            );

            for ( $i = 1; $i <= 4; $i++ ) :
                $val_label = get_field( "value_{$i}_label" ) ?: $value_defaults[ $i ]['label'];
                $val_icon  = get_field( "value_{$i}_icon" )  ?: $value_defaults[ $i ]['icon'];
            ?>
            <div class="col-6">
              <div class="d-flex mb-3">
                <div class="icon-circle-sm me-3 text-danger">
                  <i class="<?php echo esc_attr( $val_icon ); ?>" style="font-size:.9rem;"></i>
                </div>
                <div><p><?php echo esc_html( $val_label ); ?></p></div>
              </div>
            </div>
            <?php endfor; ?>

            <!-- Quote Card -->
            <?php
            $quote_text   = get_field( 'mission_quote_text' )   ?: __( '"Dans le Bassin du Lac Tchad, les femmes sont actrices de paix, de résilience et de transformation."', 'alvff-theme' );
            $quote_name   = get_field( 'mission_quote_name' )   ?: 'Aïssa Doumara Ngatansou';
            $quote_role   = get_field( 'mission_quote_role' )   ?: __( 'Coordinatrice Nationale', 'alvff-theme' );
            $quote_avatar = alvff_img_url( 'mission_quote_avatar', get_template_directory_uri() . '/assets/img/profile.jpg' );
            ?>
            <div style="background-color:#f5f2ea; border-left-width:5px; border-left-color:red;"
                 class="p-3 rounded">
              <div class="card-body px-3">
                <p class="mb-4 fst-italic"><?php echo esc_html( $quote_text ); ?></p>
                <div class="d-flex">
                  <div class="icon-circle me-3"
                       style="background-image:url('<?php echo $quote_avatar; ?>'); background-size:cover;"></div>
                  <div>
                    <p class="fw-bold mb-0"><?php echo esc_html( $quote_name ); ?></p>
                    <p class="text-sm fw-light"><?php echo esc_html( $quote_role ); ?></p>
                  </div>
                </div>
              </div>
            </div>

          </div><!-- .row -->
        </div>
      </div>
    </div>
  </div>
</section>
<!-- ═══ MISSION END ═══ -->


<!-- ═══ NOS PROJETS ═══ -->
<section id="nos-projets" class="py-5" style="background-color:#f5f2ea;">
  <div class="container">
    <div class="row justify-content-center mb-5">
      <div class="col-md-6 text-center">
        <p class="text-danger"><?php echo esc_html( get_field( 'projects_eyebrow' ) ?: __( 'Nos Actions', 'alvff-theme' ) ); ?></p>
        <h1 class="fw-bold"><?php echo esc_html( get_field( 'projects_title' ) ?: __( 'Nos Projets', 'alvff-theme' ) ); ?></h1>
        <p class="text-muted"><?php echo esc_html( get_field( 'projects_subtitle' ) ?: __( 'Découvrez nos actions sur le terrain', 'alvff-theme' ) ); ?></p>
      </div>
    </div>

    <div class="row g-4">
      <?php
      /* Status badge colour map — same as template-projects.php */
      $status_colors = array(
          'En cours' => array( 'bg' => '#e3eee5', 'color' => '#3f8834' ),
          'Terminé'  => array( 'bg' => '#e8e8e8', 'color' => '#555555' ),
          'Planifié' => array( 'bg' => '#e8f0fe', 'color' => '#1a73e8' ),
          'En pause' => array( 'bg' => '#fdf0e8', 'color' => '#e46212' ),
      );

      /* Primary query: projet CPT, limit 3 for homepage */
      $projects_query = new WP_Query( array(
          'post_type'      => 'projet',
          'posts_per_page' => 3,
          'post_status'    => 'publish',
          'orderby'        => 'date',
          'order'          => 'DESC',
      ) );

      /* Fallback: posts in 'projets' category if no CPT posts yet */
      if ( ! $projects_query->have_posts() ) {
          wp_reset_postdata();
          $projects_query = new WP_Query( array(
              'post_type'      => 'post',
              'posts_per_page' => 3,
              'post_status'    => 'publish',
              'category_name'  => 'projets',
              'orderby'        => 'date',
              'order'          => 'DESC',
          ) );
      }

      if ( $projects_query->have_posts() ) :
          while ( $projects_query->have_posts() ) : $projects_query->the_post();
              $cats      = get_the_category();
              $partner   = get_field( 'project_partner' );
              $badge_label = $partner ?: ( ! empty( $cats ) ? $cats[0]->name : '' );
              $location  = get_field( 'project_location' );
              $benef     = get_field( 'project_beneficiaries' );
              $progress  = (int) get_field( 'project_progress' );
              $p_status  = get_field( 'project_status' ) ?: 'En cours';
              $img_url   = get_the_post_thumbnail_url( null, 'alvff-card' )
                           ?: get_template_directory_uri() . '/assets/img/1.jpg';
              $sc = $status_colors[ $p_status ] ?? array( 'bg' => '#f0f0f0', 'color' => '#555' );
      ?>
      <div class="col-md-4">
        <div class="proj-card">

          <div class="project-img-wrap">
            <img src="<?php echo esc_url( $img_url ); ?>" class="project-img" alt="<?php the_title_attribute(); ?>">
            <?php if ( $badge_label ) : ?>
              <span class="project-badge"><?php echo esc_html( $badge_label ); ?></span>
            <?php endif; ?>
            <span class="proj-status-badge"
                  style="background:<?php echo esc_attr( $sc['bg'] ); ?>; color:<?php echo esc_attr( $sc['color'] ); ?>;">
              <?php echo esc_html( $p_status ); ?>
            </span>
          </div>

          <div class="proj-card-body">
            <h5 class="fw-bold mb-2"><?php the_title(); ?></h5>
            <p class="text-sm text-muted-foreground mb-3"><?php echo wp_trim_words( get_the_excerpt(), 18, '…' ); ?></p>

            <ul class="list-unstyled mb-3">
              <?php if ( $location ) : ?>
              <li class="proj-meta-row mb-2">
                <i class="bx bx-map-pin proj-meta-icon"></i>
                <span class="text-sm"><?php echo esc_html( $location ); ?></span>
              </li>
              <?php endif; ?>
              <?php if ( $benef ) : ?>
              <li class="proj-meta-row">
                <i class="bx bx-group proj-meta-icon"></i>
                <span class="text-sm"><?php echo esc_html( $benef ); ?></span>
              </li>
              <?php endif; ?>
            </ul>

            <?php if ( $progress ) : ?>
            <div class="proj-progress-wrap">
              <div class="d-flex justify-content-between mb-1">
                <span class="text-sm text-muted-foreground"><?php esc_html_e( 'Progression', 'alvff-theme' ); ?></span>
                <span class="text-sm fw-bold text-danger"><?php echo $progress; ?>%</span>
              </div>
              <div class="progress proj-progress">
                <div class="progress-bar bg-danger" role="progressbar"
                     style="width:<?php echo $progress; ?>%;"
                     aria-valuenow="<?php echo $progress; ?>" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>
            <?php endif; ?>
          </div>

          <div class="proj-card-footer">
            <a href="<?php the_permalink(); ?>" class="btn btn-outline-danger w-100">
              <?php esc_html_e( 'En savoir plus', 'alvff-theme' ); ?>
              <i class="bx bx-right-arrow-alt ms-1"></i>
            </a>
          </div>

        </div>
      </div>
      <?php endwhile;
      wp_reset_postdata();

      else :
          /* Static fallback cards when no posts exist at all */
          $fallback_projects = array(
              array( 'title' => "16 Jours d'Activisme",     'desc' => "Campagne annuelle de sensibilisation contre les violences faites aux femmes et aux filles.", 'img' => '/assets/img/1.jpg', 'partner' => 'ONU Femmes',  'location' => 'Maroua, Mokolo, Yagoua', 'benef' => '5 000 bénéficiaires', 'progress' => 75 ),
              array( 'title' => "Programme de Parrainage",  'desc' => "Offrez un avenir meilleur à une fille vulnérable grâce à notre programme de parrainage.",   'img' => '/assets/img/2.jpg', 'partner' => 'UNICEF',      'location' => 'Maroua, Mora, Kousséri', 'benef' => '1 200 bénéficiaires', 'progress' => 60 ),
              array( 'title' => "Autonomisation Économique",'desc' => "Formation professionnelle et accompagnement pour l'autonomisation des femmes.",              'img' => '/assets/img/3.jpg', 'partner' => 'ONU Femmes',  'location' => 'Extrême-Nord',           'benef' => '3 500 bénéficiaires', 'progress' => 88 ),
          );
          foreach ( $fallback_projects as $proj ) :
              $sc_fb = $status_colors['En cours'];
      ?>
      <div class="col-md-4">
        <div class="proj-card">
          <div class="project-img-wrap">
            <img src="<?php echo esc_url( get_template_directory_uri() . $proj['img'] ); ?>" class="project-img" alt="">
            <span class="project-badge"><?php echo esc_html( $proj['partner'] ); ?></span>
            <span class="proj-status-badge"
                  style="background:<?php echo esc_attr( $sc_fb['bg'] ); ?>; color:<?php echo esc_attr( $sc_fb['color'] ); ?>;">
              <?php esc_html_e( 'En cours', 'alvff-theme' ); ?>
            </span>
          </div>
          <div class="proj-card-body">
            <h5 class="fw-bold mb-2"><?php echo esc_html( $proj['title'] ); ?></h5>
            <p class="text-sm text-muted-foreground mb-3"><?php echo esc_html( $proj['desc'] ); ?></p>
            <ul class="list-unstyled mb-3">
              <li class="proj-meta-row mb-2">
                <i class="bx bx-map-pin proj-meta-icon"></i>
                <span class="text-sm"><?php echo esc_html( $proj['location'] ); ?></span>
              </li>
              <li class="proj-meta-row">
                <i class="bx bx-group proj-meta-icon"></i>
                <span class="text-sm"><?php echo esc_html( $proj['benef'] ); ?></span>
              </li>
            </ul>
            <div class="proj-progress-wrap">
              <div class="d-flex justify-content-between mb-1">
                <span class="text-sm text-muted-foreground"><?php esc_html_e( 'Progression', 'alvff-theme' ); ?></span>
                <span class="text-sm fw-bold text-danger"><?php echo esc_html( $proj['progress'] ); ?>%</span>
              </div>
              <div class="progress proj-progress">
                <div class="progress-bar bg-danger" role="progressbar"
                     style="width:<?php echo esc_attr( $proj['progress'] ); ?>%;"
                     aria-valuenow="<?php echo $proj['progress']; ?>" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>
          </div>
          <div class="proj-card-footer">
            <a href="<?php echo esc_url( get_post_type_archive_link( 'projet' ) ); ?>" class="btn btn-outline-danger w-100">
              <?php esc_html_e( 'En savoir plus', 'alvff-theme' ); ?>
              <i class="bx bx-right-arrow-alt ms-1"></i>
            </a>
          </div>
        </div>
      </div>
      <?php endforeach;
      endif; ?>
    </div>

    <div class="row justify-content-center mt-5">
      <div class="col-md-6 text-center">
        <a href="<?php echo esc_url( get_post_type_archive_link( 'nos-projets' ) ?: get_permalink( get_page_by_path( 'nos-projets' ) ) ); ?>"
           class="btn btn-outline-danger">
          <?php esc_html_e( 'Voir tous les projets', 'alvff-theme' ); ?> <i class="bx bx-right-arrow-alt ms-1"></i>
        </a>
      </div>
    </div>
  </div>
</section>
<!-- ═══ PROJETS END ═══ -->


<!-- ═══ DONATION ═══ -->
<section id="faire-un-don" class="py-5" style="background-color:#fbf3ef;">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <p class="text-danger"><?php echo esc_html( get_field( 'donation_eyebrow' ) ?: __( 'FAIRE LA DIFFERENCE', 'alvff-theme' ) ); ?></p>
        <h2 class="fw-bold h1"><?php echo esc_html( get_field( 'donation_title' ) ?: __( 'Soutenez Notre Action', 'alvff-theme' ) ); ?></h2>
        <p class="text-muted-foreground lead"><?php echo esc_html( get_field( 'donation_subtitle' ) ?: __( 'Votre don change des vies', 'alvff-theme' ) ); ?></p>

        <?php
        $impact_defaults = array(
            1 => array( 'amount' => '23€', 'label' => __( '1 Mois de soutien', 'alvff-theme' ),        'desc' => __( 'Accompagnement psychosocial pour une survivante', 'alvff-theme' ), 'icon' => 'bx bx-heart',   'green' => false ),
            2 => array( 'amount' => '50€', 'label' => __( 'Autonomisation économique', 'alvff-theme' ), 'desc' => __( 'Formation professionnelle pour une femme', 'alvff-theme' ),        'icon' => 'bx bx-wallet', 'green' => true ),
        );

        for ( $i = 1; $i <= 2; $i++ ) :
            $amount = get_field( "impact_{$i}_amount" ) ?: $impact_defaults[ $i ]['amount'];
            $label  = get_field( "impact_{$i}_label" )  ?: $impact_defaults[ $i ]['label'];
            $desc   = get_field( "impact_{$i}_desc" )   ?: $impact_defaults[ $i ]['desc'];
            $icon   = get_field( "impact_{$i}_icon" )   ?: $impact_defaults[ $i ]['icon'];
            $green  = $impact_defaults[ $i ]['green'];
            $circle_class = $green ? 'icon-circle-sm me-3 icon-circle-green' : 'icon-circle-sm me-3 text-danger';
            $icon_style   = $green ? 'font-size:.9rem; color:#3f8834;' : 'font-size:.9rem;';
        ?>
        <div class="d-flex mb-3">
          <div class="<?php echo $circle_class; ?>">
            <i class="<?php echo esc_attr( $icon ); ?>" style="<?php echo $icon_style; ?>"></i>
          </div>
          <div>
            <p class="fw-bold mb-0"><?php echo esc_html( $amount ); ?> = <?php echo esc_html( $label ); ?></p>
            <p class="text-muted-foreground text-sm"><?php echo esc_html( $desc ); ?></p>
          </div>
        </div>
        <?php endfor; ?>

        <p><?php esc_html_e( 'Moyen de paiement', 'alvff-theme' ); ?></p>
        <ul class="list-unstyled">
          <?php
          $payment_methods = get_field( 'donation_payment_methods' );
          if ( empty( $payment_methods ) ) {
              $payment_methods = array( 'Visa / Mastercard', 'PayPal', 'Orange Money', 'MTN Money' );
          }
          foreach ( $payment_methods as $method ) : ?>
          <li class="list-inline-item">
            <div class="card bg-white rounded mb-3">
              <div class="card-body"><?php echo esc_html( $method ); ?></div>
            </div>
          </li>
          <?php endforeach; ?>
        </ul>
      </div>

      <div class="col-md-6">
        <div class="card">
          <div class="card-body">
            <div class="py-2">

              <h4 class="text-center mb-3"><?php esc_html_e( 'Faire un don', 'alvff-theme' ); ?></h4>

              <!-- Donation type toggle -->
              <div class="donation-type-group d-flex w-100 mb-3">
                <button class="donation-type-btn active" data-type="unique">
                  <?php esc_html_e( 'Don Unique', 'alvff-theme' ); ?>
                </button>
                <button class="donation-type-btn" data-type="mensuel">
                  <?php esc_html_e( 'Don Mensuel', 'alvff-theme' ); ?>
                </button>
              </div>

            </div>

            <div class="row justify-content-center">
              <?php
              $amounts_raw = get_field( 'donation_preset_amounts' );
              $amounts = ! empty( $amounts_raw )
                  ? array_filter( array_map( 'trim', explode( "\n", $amounts_raw ) ) )
                  : array( 10, 25, 50, 100 );

              foreach ( $amounts as $amount ) : ?>
              <div class="col-md-6">
                <button class="btn btn-outline-danger btn-lg w-100 mb-3 donation-btn"
                        data-amount="<?php echo esc_attr( $amount ); ?>">
                  <?php echo esc_html( $amount ); ?>€
                </button>
              </div>
              <?php endforeach; ?>
            </div>

            <input type="text" class="form-control mb-3 mt-3"
                   placeholder="<?php esc_attr_e( 'Autre montant', 'alvff-theme' ); ?>">

            <button id="donateBtn" class="btn btn-danger w-100">
              <?php esc_html_e( 'Faire un Don €0', 'alvff-theme' ); ?>
            </button>

            <p class="text-sm text-center text-muted-foreground mt-3 mb-3">
              <?php echo esc_html( get_field( 'donation_legal_note' ) ?: __( 'Vos dons sont sécurisés et peuvent être déductibles des impôts selon votre pays.', 'alvff-theme' ) ); ?>
            </p>
          </div>
        </div>

        <script>
        document.querySelectorAll('.donation-type-btn').forEach( function(btn) {
          btn.addEventListener('click', function() {
            document.querySelectorAll('.donation-type-btn').forEach( function(b) {
              b.classList.remove('active');
            });
            btn.classList.add('active');
          });
        });
        </script>
      </div>
    </div>
  </div>
</section>
<!-- ═══ DONATION END ═══ -->


<!-- ═══ PARRAINAGE ═══ -->
<section class="py-5 bg-success text-white">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <div class="px-3">
          <img src="<?php echo alvff_img_url( 'sponsorship_image', get_template_directory_uri() . '/assets/img/0.jpg' ); ?>"
               class="img-fluid rounded-lg" alt="">
        </div>
      </div>
      <div class="col-md-6 p-5">
        <div class="py-5 mt-5">
          <p class="text-white mb-3"><?php echo esc_html( get_field( 'sponsorship_eyebrow' ) ?: __( 'Programme de Parrainage', 'alvff-theme' ) ); ?></p>
          <h1 class="fw-bold text-white"><?php echo esc_html( get_field( 'sponsorship_title' ) ?: __( 'Parrainez un Enfant', 'alvff-theme' ) ); ?></h1>
          <p class="text-white lead"><?php echo esc_html( get_field( 'sponsorship_subtitle' ) ?: __( 'Offrez un avenir meilleur à une fille vulnérable', 'alvff-theme' ) ); ?></p>
        </div>
        <div class="row">
          <?php
          $benefit_defaults = array(
              1 => array( 'title' => __( 'Éducation',  'alvff-theme' ), 'desc' => __( "Accès à l'école et aux fournitures scolaires", 'alvff-theme' ), 'icon' => 'bx bxs-book-open' ),
              2 => array( 'title' => __( 'Santé',      'alvff-theme' ), 'desc' => __( 'Suivi médical et accès aux soins de base', 'alvff-theme' ),     'icon' => 'bx bx-heart' ),
              3 => array( 'title' => __( 'Protection', 'alvff-theme' ), 'desc' => __( 'Environnement sécurisé et accompagnement', 'alvff-theme' ),     'icon' => 'bx bx-shield-alt-2' ),
              4 => array( 'title' => __( 'Avenir',     'alvff-theme' ), 'desc' => __( 'Formation professionnelle et insertion', 'alvff-theme' ),       'icon' => 'bx bx-rocket' ),
          );

          for ( $i = 1; $i <= 4; $i++ ) :
              $ben_title = get_field( "benefit_{$i}_title" ) ?: $benefit_defaults[ $i ]['title'];
              $ben_desc  = get_field( "benefit_{$i}_desc" )  ?: $benefit_defaults[ $i ]['desc'];
              $ben_icon  = get_field( "benefit_{$i}_icon" )  ?: $benefit_defaults[ $i ]['icon'];
          ?>
          <div class="col-md-6">
            <div class="d-flex mb-3">
              <div class="icon-circle me-4">
                <i class="<?php echo esc_attr( $ben_icon ); ?>" style="font-size:1.3rem; color:#fff;"></i>
              </div>
              <div>
                <p class="fw-bold mb-0 text-white"><?php echo esc_html( $ben_title ); ?></p>
                <p class="mt-0 text-white fw-light text-sm"><?php echo esc_html( $ben_desc ); ?></p>
              </div>
            </div>
          </div>
          <?php endfor; ?>
        </div>
        <?php
        $spon_cta_text = get_field( 'sponsorship_cta_text' ) ?: __( 'Devenir parrain / marraine', 'alvff-theme' );
        $spon_cta_url  = get_field( 'sponsorship_cta_url' )  ?: '#';
        ?>
        <a href="<?php echo esc_url( $spon_cta_url ); ?>" class="btn btn-light btn-lg text-success">
          <span class="bx bx-heart me-2"></span><?php echo esc_html( $spon_cta_text ); ?>
        </a>
      </div>
    </div>
  </div>
</section>
<!-- ═══ PARRAINAGE END ═══ -->


<!-- ═══ BLOG / ACTUALITES ═══ -->
<section class="py-5">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <p class="text-danger text-center"><?php echo esc_html( get_field( 'news_eyebrow' ) ?: __( 'Actualité', 'alvff-theme' ) ); ?></p>
        <h2 class="text-center mb-5 fw-bold"><?php echo esc_html( get_field( 'news_title' ) ?: __( 'Dernières Nouvelles', 'alvff-theme' ) ); ?></h2>
      </div>
    </div>

    <div class="row">
      <?php
      $news_query = new WP_Query( array(
          'post_type'      => 'post',
          'posts_per_page' => 3,
          'post_status'    => 'publish',
      ) );

      if ( $news_query->have_posts() ) :
          while ( $news_query->have_posts() ) : $news_query->the_post();
              $categories  = get_the_category();
              $badge_label = ! empty( $categories ) ? $categories[0]->name : '';
              $date        = get_the_date( 'j F Y' );
      ?>
          <div class="col-md-4 mb-4">
            <div class="card rounded border-0 shadow h-100 news-card">
              <div class="project-img-wrap">
                <?php if ( has_post_thumbnail() ) : ?>
                  <?php the_post_thumbnail( 'alvff-card', array( 'class' => 'project-img' ) ); ?>
                <?php else : ?>
                  <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/2.jpg' ); ?>"
                       class="project-img" alt="">
                <?php endif; ?>
              </div>
              <div class="card-body d-flex flex-column">
                <div class="d-flex align-items-center gap-3 mb-2">
                  <?php if ( $badge_label ) : ?>
                  <span class="news-badge"><?php echo esc_html( $badge_label ); ?></span>
                  <?php endif; ?>
                  <span class="news-date">
                    <i class="bx bx-calendar me-1"></i><?php echo esc_html( $date ); ?>
                  </span>
                </div>
                <h5 class="fw-bold mb-3"><?php the_title(); ?></h5>
                <div class="mt-auto">
                  <a href="<?php the_permalink(); ?>" class="news-read-more">
                    <?php esc_html_e( 'Lire la suite', 'alvff-theme' ); ?>
                    <i class="bx bx-right-arrow-alt ms-1"></i>
                  </a>
                </div>
              </div>
            </div>
          </div>
      <?php endwhile;
      wp_reset_postdata();

      else :
          $fallback_news = array(
              array( 'title' => "Résolution 1325 : Les femmes pour la paix au Sahel",         'cat' => 'ONU Femmes', 'date' => '25 Novembre 2025' ),
              array( 'title' => "16 Jours d'Activisme contre les violences faites aux femmes", 'cat' => 'Campagne',   'date' => '25 Novembre 2025' ),
              array( 'title' => "Autonomisation économique : nouvelles formations",             'cat' => 'Formation',  'date' => '10 Novembre 2025' ),
          );
          foreach ( $fallback_news as $item ) : ?>
          <div class="col-md-4 mb-4">
            <div class="card rounded border-0 shadow h-100 news-card">
              <div class="project-img-wrap">
                <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/2.jpg' ); ?>"
                     class="project-img" alt="">
              </div>
              <div class="card-body d-flex flex-column">
                <div class="d-flex align-items-center gap-3 mb-2">
                  <span class="news-badge"><?php echo esc_html( $item['cat'] ); ?></span>
                  <span class="news-date">
                    <i class="bx bx-calendar me-1"></i><?php echo esc_html( $item['date'] ); ?>
                  </span>
                </div>
                <h5 class="fw-bold mb-3"><?php echo esc_html( $item['title'] ); ?></h5>
                <div class="mt-auto">
                  <a href="#" class="news-read-more">
                    <?php esc_html_e( 'Lire la suite', 'alvff-theme' ); ?>
                    <i class="bx bx-right-arrow-alt ms-1"></i>
                  </a>
                </div>
              </div>
            </div>
          </div>
          <?php endforeach;
      endif; ?>
    </div>
  </div>
</section>
<!-- ═══ BLOG END ═══ -->


<!-- ═══ NOS PARTENAIRES ═══ -->
<section class="py-5" style="background-color:#f5f2ea;">
  <div class="container">

    <div class="row justify-content-center mb-4">
      <div class="col-12 text-center">
        <p class="text-danger fw-bold" style="letter-spacing:0.08em; font-size:9pt;">
          <?php esc_html_e( 'NOS PARTENAIRES', 'alvff-theme' ); ?>
        </p>
      </div>
    </div>

    <div class="row justify-content-center align-items-center g-3">
      <?php
      $partners_raw = get_field( 'homepage_partners' );
      if ( ! empty( $partners_raw ) ) {
          $partners = array_filter( array_map( 'trim', explode( "\n", $partners_raw ) ) );
      } else {
          $partners = array( 'ONU Femmes', 'Union Européenne', 'MINPROFF', 'NORCAP', 'Team Europe', 'WANEP' );
      }

      foreach ( $partners as $partner ) : ?>
      <div class="col-auto">
        <div class="partner-pill">
          <?php echo esc_html( $partner ); ?>
        </div>
      </div>
      <?php endforeach; ?>
    </div>

  </div>
</section>
<!-- ═══ NOS PARTENAIRES END ═══ -->

<?php get_footer(); ?>