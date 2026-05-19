<?php
/**
 * Single template for the 'projet' custom post type.
 * WordPress automatically loads this file when visiting
 * any single projet post (e.g. /projets/mon-projet/).
 *
 * DO NOT add "Template Name:" here — that would make it
 * a selectable page template instead of a CPT template.
 */
get_header();

/* ── ACF helpers ── */
if ( ! function_exists( 'alvff_detail_field' ) ) {
    function alvff_detail_field( $key, $default = '' ) {
        $v = get_field( $key );
        return ( $v !== false && $v !== '' && $v !== null ) ? $v : $default;
    }
}
if ( ! function_exists( 'alvff_detail_img' ) ) {
    function alvff_detail_img( $key, $fallback = '' ) {
        $v = get_field( $key );
        if ( is_array( $v ) ) return $v['url'] ?? $fallback;
        return $v ?: $fallback;
    }
}

/* ── Pull all dynamic fields ── */
the_post(); // load the global post

$location  = alvff_detail_field( 'project_location' );
$benef     = alvff_detail_field( 'project_beneficiaries' );
$duration  = alvff_detail_field( 'project_duration' );
$partner   = alvff_detail_field( 'project_partner' );
$budget    = alvff_detail_field( 'project_budget' );
$progress  = (int) alvff_detail_field( 'project_progress', 0 );
$status    = alvff_detail_field( 'project_status', 'En cours' );
$cats      = get_the_category();
$cat_label = ! empty( $cats ) ? $cats[0]->name : '';
$hero_img  = get_the_post_thumbnail_url( null, 'full' )
             ?: get_template_directory_uri() . '/assets/img/1.jpg';
?>

<!-- ═══ HERO ═══ -->
<section class="proj-detail-hero" style="background-image: url('<?php echo esc_url( $hero_img ); ?>');">
  <div class="proj-detail-overlay"></div>
  <div class="container proj-detail-hero-content">
    <div class="row">
      <div class="col-lg-8">
        <?php if ( $cat_label ) : ?>
          <span class="project-badge mb-3 d-inline-block"><?php echo esc_html( $cat_label ); ?></span>
        <?php endif; ?>
        <h1 class="fw-bold text-white"><?php the_title(); ?></h1>
        <?php if ( $location ) : ?>
          <p class="text-white mb-0">
            <i class="bx bx-map-pin me-1"></i><?php echo esc_html( $location ); ?>
          </p>
        <?php endif; ?>
      </div>
    </div>
  </div>
</section>

<!-- ═══ MAIN CONTENT ═══ -->
<section class="py-5">
  <div class="container">
    <div class="row g-5">

      <!-- ── Left: article content ── -->
      <div class="col-lg-8">

        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb" class="mb-4">
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="<?php echo esc_url( home_url() ); ?>" class="text-danger text-decoration-none">
                <?php esc_html_e( 'Accueil', 'alvff-theme' ); ?>
              </a>
            </li>
            <li class="breadcrumb-item">
              <a href="<?php echo esc_url( get_post_type_archive_link( 'projet' ) ); ?>"
                 class="text-danger text-decoration-none">
                <?php esc_html_e( 'Projets', 'alvff-theme' ); ?>
              </a>
            </li>
            <li class="breadcrumb-item active" aria-current="page"><?php the_title(); ?></li>
          </ol>
        </nav>

        <!-- Progress bar -->
        <?php if ( $progress ) : ?>
        <div class="p-4 rounded-lg mb-4" style="background:#f9f7f4;">
          <div class="d-flex justify-content-between mb-2">
            <span class="fw-bold"><?php esc_html_e( 'Progression du projet', 'alvff-theme' ); ?></span>
            <span class="fw-bold text-danger"><?php echo $progress; ?>%</span>
          </div>
          <div class="progress proj-progress">
            <div class="progress-bar bg-danger" role="progressbar"
                 style="width:<?php echo $progress; ?>%;"
                 aria-valuenow="<?php echo $progress; ?>" aria-valuemin="0" aria-valuemax="100"></div>
          </div>
        </div>
        <?php endif; ?>

        <!-- WordPress post content (written in the editor) -->
        <div class="post-content">
          <?php the_content(); ?>
        </div>

        <!-- Back link -->
        <div class="mt-5 pt-3 border-top">
          <a href="<?php echo esc_url( get_post_type_archive_link( 'projet' ) ); ?>"
             class="btn btn-outline-danger">
            <i class="bx bx-arrow-back me-2"></i>
            <?php esc_html_e( 'Retour aux projets', 'alvff-theme' ); ?>
          </a>
        </div>

      </div>

      <!-- ── Right: sidebar ── -->
      <div class="col-lg-4">

        <!-- Project info card -->
        <div class="card border-0 shadow-sm mb-4">
          <div class="card-body p-4">
            <h5 class="fw-bold mb-4"><?php esc_html_e( 'Informations', 'alvff-theme' ); ?></h5>
            <?php
            $meta_rows = array(
                array( 'icon' => 'bx bx-map-pin',      'label' => __( 'Localisation',  'alvff-theme' ), 'value' => $location ),
                array( 'icon' => 'bx bx-group',        'label' => __( 'Bénéficiaires', 'alvff-theme' ), 'value' => $benef ),
                array( 'icon' => 'bx bx-time',         'label' => __( 'Durée',         'alvff-theme' ), 'value' => $duration ),
                array( 'icon' => 'bx bx-buildings',    'label' => __( 'Partenaire',    'alvff-theme' ), 'value' => $partner ),
                array( 'icon' => 'bx bx-wallet',       'label' => __( 'Budget',        'alvff-theme' ), 'value' => $budget ),
                array( 'icon' => 'bx bx-loader-circle','label' => __( 'Statut',        'alvff-theme' ), 'value' => $status ),
            );
            foreach ( $meta_rows as $row ) :
                if ( empty( $row['value'] ) ) continue;
            ?>
            <div class="d-flex align-items-start mb-3">
              <div class="proj-meta-icon-sq me-3">
                <i class="<?php echo esc_attr( $row['icon'] ); ?>"></i>
              </div>
              <div>
                <p class="text-sm text-muted-foreground mb-0"><?php echo esc_html( $row['label'] ); ?></p>
                <p class="fw-bold mb-0"><?php echo esc_html( $row['value'] ); ?></p>
              </div>
            </div>
            <?php endforeach; ?>
          </div>
        </div>

        <!-- Donate CTA -->
        <div class="card border-0 p-4 text-center" style="background:#fbf3ef;">
          <i class="bx bx-heart text-danger mb-2" style="font-size:2rem;"></i>
          <h5 class="fw-bold"><?php esc_html_e( 'Soutenez ce projet', 'alvff-theme' ); ?></h5>
          <p class="text-sm text-muted-foreground">
            <?php esc_html_e( 'Votre don aide directement les bénéficiaires de ce programme.', 'alvff-theme' ); ?>
          </p>
          <a href="<?php echo esc_url( home_url( '/don/' ) ); ?>" class="btn btn-danger w-100">
            <?php esc_html_e( 'Faire un Don', 'alvff-theme' ); ?>
          </a>
        </div>

      </div>
    </div>
  </div>
</section>

<!-- ═══ RELATED PROJECTS ═══ -->
<?php
$related = new WP_Query( array(
    'post_type'      => 'projet',
    'posts_per_page' => 3,
    'post_status'    => 'publish',
    'post__not_in'   => array( get_the_ID() ),
) );
if ( $related->have_posts() ) : ?>
<section class="py-5" style="background-color:#f5f2ea;">
  <div class="container">
    <h4 class="fw-bold mb-4"><?php esc_html_e( 'Autres Projets', 'alvff-theme' ); ?></h4>
    <div class="row g-4">
      <?php while ( $related->have_posts() ) : $related->the_post();
          $r_cats     = get_the_category();
          $r_cat      = ! empty( $r_cats ) ? $r_cats[0]->name : '';
          $r_location = alvff_detail_field( 'project_location' );
          $r_progress = (int) alvff_detail_field( 'project_progress', 0 );
          $r_benef    = alvff_detail_field( 'project_beneficiaries' );
          $r_img      = get_the_post_thumbnail_url( null, 'alvff-card' )
                        ?: get_template_directory_uri() . '/assets/img/1.jpg';
      ?>
      <div class="col-md-4">
        <div class="proj-card">
          <div class="project-img-wrap">
            <img src="<?php echo esc_url( $r_img ); ?>" class="project-img" alt="">
            <?php if ( $r_cat ) : ?>
              <span class="project-badge"><?php echo esc_html( $r_cat ); ?></span>
            <?php endif; ?>
          </div>
          <div class="proj-card-body">
            <h5 class="fw-bold mb-2"><?php the_title(); ?></h5>
            <?php if ( $r_location ) : ?>
            <div class="proj-meta-row mb-2">
              <i class="bx bx-map-pin proj-meta-icon"></i>
              <span class="text-sm"><?php echo esc_html( $r_location ); ?></span>
            </div>
            <?php endif; ?>
            <?php if ( $r_benef ) : ?>
            <div class="proj-meta-row mb-3">
              <i class="bx bx-group proj-meta-icon"></i>
              <span class="text-sm"><?php echo esc_html( $r_benef ); ?></span>
            </div>
            <?php endif; ?>
            <?php if ( $r_progress ) : ?>
            <div class="d-flex justify-content-between mb-1">
              <span class="text-sm text-muted-foreground">Progression</span>
              <span class="text-sm fw-bold text-danger"><?php echo $r_progress; ?>%</span>
            </div>
            <div class="progress proj-progress">
              <div class="progress-bar bg-danger" role="progressbar"
                   style="width:<?php echo $r_progress; ?>%;"></div>
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
      <?php endwhile; wp_reset_postdata(); ?>
    </div>
  </div>
</section>
<?php endif; ?>

<?php get_footer(); ?>