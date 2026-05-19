<?php
/**
 * Template Name: Nos projets
 */
get_header();

/* ── ACF helpers (free version) ── */
function alvff_proj_field( $key, $default = '' ) {
    $v = get_field( $key );
    return ( $v !== false && $v !== '' && $v !== null ) ? $v : $default;
}
function alvff_proj_img( $key, $fallback = '' ) {
    $v = get_field( $key );
    if ( is_array( $v ) ) return $v['url'] ?? $fallback;
    return $v ?: $fallback;
}

/* ── Fallback project data ── */
$fallback_projects = array(
    array(
        'title'        => "16 Jours d'Activisme contre les VBG",
        'desc'         => "Campagne annuelle de sensibilisation et de mobilisation contre les violences faites aux femmes et aux filles dans l'Extrême-Nord du Cameroun.",
        'img'          => get_template_directory_uri() . '/assets/img/1.jpg',
        'partner'      => 'ONU Femmes',
        'location'     => 'Maroua, Mokolo, Yagoua',
        'beneficiares' => '5,000 bénéficiaires',
        'progress'     => 75,
        'link'         => '#',
    ),
    array(
        'title'        => 'Programme de Parrainage des Filles',
        'desc'         => "Offrez un avenir meilleur à une fille vulnérable grâce à notre programme de parrainage scolaire et social.",
        'img'          => get_template_directory_uri() . '/assets/img/2.jpg',
        'partner'      => 'UNICEF',
        'location'     => 'Maroua, Mora, Kousséri',
        'beneficiares' => '1,200 bénéficiaires',
        'progress'     => 60,
        'link'         => '#',
    ),
    array(
        'title'        => 'Autonomisation Économique des Femmes',
        'desc'         => "Formation professionnelle, accès au microcrédit et accompagnement pour l'autonomisation économique des femmes rurales.",
        'img'          => get_template_directory_uri() . '/assets/img/3.jpg',
        'partner'      => 'ONU Femmes',
        'location'     => 'Extrême-Nord',
        'beneficiares' => '3,500 bénéficiaires',
        'progress'     => 88,
        'link'         => '#',
    ),
    array(
        'title'        => 'Lutte contre les MGF',
        'desc'         => "Programmes intensifs de sensibilisation et d'abandon des mutilations génitales féminines dans les communautés rurales.",
        'img'          => get_template_directory_uri() . '/assets/img/1.jpg',
        'partner'      => 'NORCAP',
        'location'     => 'Extrême-Nord, Adamaoua',
        'beneficiares' => '8,500 bénéficiaires',
        'progress'     => 92,
        'link'         => '#',
    ),
    array(
        'title'        => 'Centres d\'Écoute et d\'Accompagnement',
        'desc'         => "Soutien psychosocial et juridique aux survivantes de violences basées sur le genre dans nos centres d'écoute.",
        'img'          => get_template_directory_uri() . '/assets/img/2.jpg',
        'partner'      => 'MINPROFF',
        'location'     => 'Maroua, Yagoua, Mora',
        'beneficiares' => '2,800 bénéficiaires',
        'progress'     => 70,
        'link'         => '#',
    ),
    array(
        'title'        => 'Femmes Actrices de Paix au Sahel',
        'desc'         => "Renforcement du rôle des femmes dans les processus de paix et de réconciliation dans le Bassin du Lac Tchad.",
        'img'          => get_template_directory_uri() . '/assets/img/3.jpg',
        'partner'      => 'WANEP',
        'location'     => 'Bassin du Lac Tchad',
        'beneficiares' => '4,000 bénéficiaires',
        'progress'     => 45,
        'link'         => '#',
    ),
);
?>

<!-- ═══ HERO ═══ -->
<section class="py-7 text-white" style="background-image: url('<?php bloginfo('template_directory');?>/assets/img/1.jpg'); background-size: cover; background-position: center; position: relative;">
  <div style="position: absolute; inset: 0; background-color: rgba(63, 136, 52, 0.70);"></div>
  <div class="container" style="position: relative; z-index: 1;">
    <div class="row">
      <div class="col-md-6">
        <p class="text-sm text-white"><?php esc_html_e( 'NOS ACTIONS', 'alvff-theme' ); ?></p>
        <h1><?php esc_html_e( 'Projets en Cours', 'alvff-theme' ); ?></h1>
        <p class="text-white"><?php esc_html_e( "Découvrez nos programmes actifs et leur impact sur les communautés de l'Extrême-Nord du Cameroun.", 'alvff-theme' ); ?></p>
      </div>
    </div>
  </div>
</section>

<!-- ═══ STATS ═══ -->
<section class="py-4 bg-danger text-white">
  <div class="container">
    <div class="row justify-content-center text-center">
      <?php
      $proj_stats = array(
          array( 'number' => '6',      'label' => 'Projets actifs' ),
          array( 'number' => '20 000+','label' => 'Bénéficiaires' ),
          array( 'number' => '15',     'label' => 'Partenaires' ),
          array( 'number' => '50+',    'label' => 'Communautés' ),
      );
      foreach ( $proj_stats as $s ) : ?>
      <div class="col-md-3 col-6 py-2">
        <h2 class="fw-bold mb-0"><?php echo esc_html( $s['number'] ); ?></h2>
        <p class="text-white mb-0"><?php echo esc_html( $s['label'] ); ?></p>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- ═══ PROJECT CARDS ═══ -->
<section class="py-5" style="background-color:#f5f2ea;">
  <div class="container">

    <?php
    /* ── Status filter ── */
    $allowed_statuses = array( 'En cours', 'Terminé', 'Planifié', 'En pause' );
    $active_filter    = isset( $_GET['statut'] ) ? sanitize_text_field( $_GET['statut'] ) : '';
    if ( $active_filter && ! in_array( $active_filter, $allowed_statuses, true ) ) {
        $active_filter = ''; // reject unknown values
    }
    $current_url = get_permalink();
    ?>

    <!-- Filter bar -->
    <div class="proj-filter-bar mb-5">
      <a href="<?php echo esc_url( $current_url ); ?>"
         class="proj-filter-btn <?php echo $active_filter === '' ? 'active' : ''; ?>">
        <?php esc_html_e( 'Tous', 'alvff-theme' ); ?>
      </a>
      <?php foreach ( $allowed_statuses as $status_option ) :
          $filter_url = add_query_arg( 'statut', urlencode( $status_option ), $current_url );
      ?>
      <a href="<?php echo esc_url( $filter_url ); ?>"
         class="proj-filter-btn <?php echo $active_filter === $status_option ? 'active' : ''; ?>">
        <?php echo esc_html( $status_option ); ?>
      </a>
      <?php endforeach; ?>
    </div>

    <?php
    /* ── Build meta_query if a filter is active ── */
    $meta_query_args = array();
    if ( $active_filter !== '' ) {
        $meta_query_args = array(
            array(
                'key'     => 'project_status',
                'value'   => $active_filter,
                'compare' => '=',
            ),
        );
    }

    /* ── Primary query: projet CPT ── */
    $proj_query = new WP_Query( array(
        'post_type'      => 'projet',
        'posts_per_page' => -1,
        'post_status'    => 'publish',
        'orderby'        => 'date',
        'order'          => 'DESC',
        'meta_query'     => $meta_query_args ?: array(),
    ) );

    /* ── Fallback: regular posts in 'projets' category ── */
    if ( ! $proj_query->have_posts() && $active_filter === '' ) {
        wp_reset_postdata();
        $proj_query = new WP_Query( array(
            'post_type'      => 'post',
            'posts_per_page' => 6,
            'post_status'    => 'publish',
            'category_name'  => 'projets',
            'orderby'        => 'date',
            'order'          => 'DESC',
        ) );
    }
    ?>

    <div class="row g-4">
      <?php if ( $proj_query->have_posts() ) :
          while ( $proj_query->have_posts() ) : $proj_query->the_post();
              $cats      = get_the_category();
              $cat_label = ! empty( $cats ) ? $cats[0]->name : '';
              $location  = alvff_proj_field( 'project_location' );
              $benef     = alvff_proj_field( 'project_beneficiaries' );
              $progress  = (int) alvff_proj_field( 'project_progress', 0 );
              $partner   = alvff_proj_field( 'project_partner' );
              $p_status  = alvff_proj_field( 'project_status', 'En cours' );
              $img_url   = get_the_post_thumbnail_url( null, 'alvff-card' ) ?: get_template_directory_uri() . '/assets/img/1.jpg';

              /* Status badge colour */
              $status_colors = array(
                  'En cours' => array( 'bg' => '#e3eee5', 'color' => '#3f8834' ),
                  'Terminé'  => array( 'bg' => '#e8e8e8', 'color' => '#555555' ),
                  'Planifié' => array( 'bg' => '#e8f0fe', 'color' => '#1a73e8' ),
                  'En pause' => array( 'bg' => '#fdf0e8', 'color' => '#e46212' ),
              );
              $sc = $status_colors[ $p_status ] ?? array( 'bg' => '#f0f0f0', 'color' => '#555' );
      ?>
      <div class="col-md-4">
        <div class="proj-card">

          <div class="project-img-wrap">
            <img src="<?php echo esc_url( $img_url ); ?>" class="project-img" alt="">
            <?php if ( $partner ) : ?>
              <span class="project-badge"><?php echo esc_html( $partner ); ?></span>
            <?php endif; ?>
            <!-- Status badge top-right -->
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
                <span class="text-sm text-muted-foreground">Progression</span>
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
      <?php endwhile; wp_reset_postdata();

      else :
          /* No results for this filter */
          if ( $active_filter !== '' ) : ?>
          <div class="col-12 text-center py-5">
            <i class="bx bx-folder-open text-muted" style="font-size:3rem;"></i>
            <p class="text-muted-foreground mt-3">
              <?php printf(
                  esc_html__( 'Aucun projet "%s" pour le moment.', 'alvff-theme' ),
                  esc_html( $active_filter )
              ); ?>
            </p>
            <a href="<?php echo esc_url( $current_url ); ?>" class="btn btn-outline-danger mt-2">
              <?php esc_html_e( 'Voir tous les projets', 'alvff-theme' ); ?>
            </a>
          </div>
          <?php else :
              /* Fallback static cards when no CPT posts at all */
              foreach ( $fallback_projects as $proj ) : ?>
          <div class="col-md-4">
            <div class="proj-card">
              <div class="project-img-wrap">
                <img src="<?php echo esc_url( $proj['img'] ); ?>" class="project-img" alt="">
                <?php if ( ! empty( $proj['partner'] ) ) : ?>
                  <span class="project-badge"><?php echo esc_html( $proj['partner'] ); ?></span>
                <?php endif; ?>
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
                    <span class="text-sm"><?php echo esc_html( $proj['beneficiares'] ); ?></span>
                  </li>
                </ul>
                <div class="proj-progress-wrap">
                  <div class="d-flex justify-content-between mb-1">
                    <span class="text-sm text-muted-foreground">Progression</span>
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
                <a href="<?php echo esc_url( $proj['link'] ); ?>" class="btn btn-outline-danger w-100">
                  <?php esc_html_e( 'En savoir plus', 'alvff-theme' ); ?>
                  <i class="bx bx-right-arrow-alt ms-1"></i>
                </a>
              </div>
            </div>
          </div>
          <?php endforeach;
          endif;
      endif; ?>
    </div>
  </div>
</section>

<!-- ═══ CTA ═══ -->
<section class="py-5" style="background-color:#fbf3ef;">
  <div class="container">
    <div class="row justify-content-center text-center">
      <div class="col-md-6">
        <h1 class="fw-bold"><?php esc_html_e( 'Soutenez Nos Projets', 'alvff-theme' ); ?></h1>
        <p class="lead text-muted-foreground"><?php esc_html_e( "Votre contribution nous permet de poursuivre et d'étendre nos actions sur le terrain.", 'alvff-theme' ); ?></p>
        <a href="<?php echo esc_url( get_permalink( get_page_by_path( 'don' ) ) ); ?>"
           class="btn btn-danger btn-lg mt-2">
          <i class="bx bx-heart me-1"></i>
          <?php esc_html_e( 'Faire un Don', 'alvff-theme' ); ?>
        </a>
      </div>
    </div>
  </div>
</section>

<?php get_footer(); ?>