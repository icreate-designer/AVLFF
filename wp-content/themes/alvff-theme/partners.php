<?php
/**
 * Template Name: Partenaires
 */
get_header();

function pt_f( $key, $default = '' ) {
    $v = function_exists('get_field') ? get_field( $key ) : false;
    return ( $v !== false && $v !== '' && $v !== null ) ? $v : $default;
}
function pt_img( $key, $fallback = '' ) {
    $v = function_exists('get_field') ? get_field( $key ) : false;
    if ( is_array( $v ) ) return $v['url'] ?? $fallback;
    return $v ?: $fallback;
}

$hero_title    = pt_f( 'partners_hero_title',    'Nos Partenaires' );
$hero_subtitle = pt_f( 'partners_hero_subtitle', 'Ensemble pour les droits des femmes et des filles' );
$hero_text     = pt_f( 'partners_hero_text',     "L'ALVFF travaille en étroite collaboration avec des organisations nationales et internationales pour maximiser l'impact de nos actions. Ces partenariats stratégiques nous permettent de renforcer nos capacités et d'étendre notre portée." );
$cta_title     = pt_f( 'partners_cta_title',     'Devenir Partenaire' );
$cta_text      = pt_f( 'partners_cta_text',      'Vous souhaitez soutenir notre mission ? Contactez-nous pour explorer les possibilités de partenariat.' );

$gallery_1 = pt_img( 'partners_gallery_1', get_template_directory_uri() . '/assets/img/2.jpg' );
$gallery_2 = pt_img( 'partners_gallery_2', get_template_directory_uri() . '/assets/img/2.jpg' );
$gallery_3 = pt_img( 'partners_gallery_3', get_template_directory_uri() . '/assets/img/2.jpg' );

/* Build partner list from ACF; fall back to hardcoded defaults */
$part_defs = array(
    1 => array( 'ONU Femmes',         "Partenaire stratégique pour l'autonomisation des femmes et l'égalité des genres",     'international' ),
    2 => array( 'Union Européenne',   'Soutien aux initiatives #TeamEurope contre les violences basées sur le genre',        'international' ),
    3 => array( 'NORCAP',             'Norwegian Refugee Council - Renforcement des capacités techniques',                   'international' ),
    4 => array( 'MINPROFF',           'Ministère de la Promotion de la Femme et de la Famille du Cameroun',                 'gouvernemental' ),
    5 => array( 'WANEP',              "Réseau Ouest-Africain pour l'Édification de la Paix",                                'regional' ),
    6 => array( 'RESOF-PRD-BLT',      'Mouvement de femmes pour la paix au Sahel',                                          'regional' ),
    7 => array( 'Ville de Compiègne', 'Partenariat franco-camerounais pour les droits des femmes',                          'local' ),
    8 => array( 'Agora 21',           'Association pour le rapprochement France-Afrique',                                   'local' ),
);
$partners = array();
for ( $i = 1; $i <= 8; $i++ ) {
    $partners[] = array(
        'name'  => pt_f( "partner_{$i}_name",  $part_defs[$i][0] ),
        'desc'  => pt_f( "partner_{$i}_desc",  $part_defs[$i][1] ),
        'group' => pt_f( "partner_{$i}_group", $part_defs[$i][2] ),
    );
}

/* Group them */
$groups = array(
    'international'  => array( 'label' => 'Partenaires Internationaux',   'icon' => 'bx bx-globe' ),
    'gouvernemental' => array( 'label' => 'Partenaires Gouvernementaux',  'icon' => 'bx bxs-bank' ),
    'regional'       => array( 'label' => 'Partenaires Régionaux',        'icon' => 'bx bx-group' ),
    'local'          => array( 'label' => 'Partenaires Locaux',           'icon' => 'bx bxs-buildings' ),
);
$grouped = array_fill_keys( array_keys( $groups ), array() );
foreach ( $partners as $p ) {
    $g = isset( $grouped[ $p['group'] ] ) ? $p['group'] : 'local';
    $grouped[ $g ][] = $p;
}
?>

<!-- Hero -->
<section class="py-7 bg-danger-light">
  <div class="container" style="position: relative; z-index: 1;">
    <div class="row justify-content-center">
      <div class="col-md-7 d-flex flex-column align-items-center text-center">
        <div class="pill-button d-flex justify-content-center align-items-center mb-3"><i class='bx bx-heart me-2'></i> Collaborations</div>
        <h1 class="text-center fw-bold"><?php echo esc_html( $hero_title ); ?></h1>
        <p class="lead text-center"><?php echo esc_html( $hero_subtitle ); ?></p>
        <p class="text-center"><?php echo esc_html( $hero_text ); ?></p>
      </div>
    </div>
  </div>
</section>

<div class="bg-light">

<?php foreach ( $groups as $group_key => $group_meta ) :
    if ( empty( $grouped[ $group_key ] ) ) continue;
?>
<section class="py-5 bg-light">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <div class="d-flex">
          <div><div class="muted-btn me-4"><i class='<?php echo esc_attr( $group_meta['icon'] ); ?>'></i></div></div>
          <div><h2 class="fw-bold mb-5"><?php echo esc_html( $group_meta['label'] ); ?></h2></div>
        </div>
      </div>
    </div>
    <div class="row">
      <?php foreach ( $grouped[ $group_key ] as $p ) : ?>
      <div class="col-md-3">
        <div class="card mb-3">
          <div class="card-body">
            <div class="py-5">
              <h5 class="text-success text-center mb-4"><?php echo esc_html( $p['name'] ); ?></h5>
              <p class="text-center"><?php echo esc_html( $p['desc'] ); ?></p>
            </div>
          </div>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>
<br>
<?php endforeach; ?>

<!-- Gallery -->
<section class="py-5" style="background-color:#f9f9f6;">
  <div class="container">
    <div class="row justify-content-center mb-4">
      <div class="col-md-6">
        <h2 class="text-center fw-bolder">En Action avec nos Partenaires</h2>
      </div>
    </div>
    <div class="row">
      <div class="col-md-4">
        <div class="card border-0 bg-transparent mb-3">
          <img src="<?php echo esc_url( $gallery_1 ); ?>" class="project-img rounded-lg shadow" alt="">
        </div>
      </div>
      <div class="col-md-4">
        <div class="card border-0 bg-transparent mb-3">
          <img src="<?php echo esc_url( $gallery_2 ); ?>" class="project-img rounded-lg shadow" alt="">
        </div>
      </div>
      <div class="col-md-4">
        <div class="card border-0 bg-transparent mb-3">
          <img src="<?php echo esc_url( $gallery_3 ); ?>" class="project-img rounded-lg shadow" alt="">
        </div>
      </div>
    </div>
  </div>
</section>

<!-- CTA -->
<section class="py-5 bg-success">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <p class="text-center" style="font-size:54pt;"><span class="bx bx-heart text-white"></span></p>
        <h1 class="text-center fw-bold text-white"><?php echo esc_html( $cta_title ); ?></h1>
        <p class="text-center text-white"><?php echo esc_html( $cta_text ); ?></p>
        <p class="text-center">
          <a href="<?php echo esc_url( get_permalink( get_page_by_path( 'contact' ) ) ); ?>" class="btn btn-light">Contactez-nous</a>
        </p>
      </div>
    </div>
  </div>
</section>
</div>

<?php get_footer(); ?>
