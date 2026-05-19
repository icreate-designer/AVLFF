<?php
/**
 * Template Name: History
 */
get_header();

function alvff_h( $key, $default = '' ) {
    $v = function_exists('get_field') ? get_field( $key ) : false;
    return ( $v !== false && $v !== '' && $v !== null ) ? $v : $default;
}
function alvff_hi( $key, $fallback = '' ) {
    $v = function_exists('get_field') ? get_field( $key ) : false;
    if ( is_array( $v ) ) return $v['url'] ?? $fallback;
    return $v ?: $fallback;
}

$hero_img = alvff_hi( 'history_hero_image', get_template_directory_uri() . '/assets/img/1.jpg' );

$tl_defaults = array(
    1 => array( 'year' => '1996', 'title' => "Création de l'ALVFF",      'desc' => "Fondation de l'ALVFF au Cameroun, antenne Extrême-Nord à Maroua.",           'icon' => 'bx bx-calendar', 'side' => 'left',  'style' => 'default'  ),
    2 => array( 'year' => '2005', 'title' => "Premiers centres d'écoute", 'desc' => "Ouverture des premiers centres d'écoute et d'accompagnement psychosocial.", 'icon' => 'bx bx-group',    'side' => 'right', 'style' => 'default'  ),
    3 => array( 'year' => '2014', 'title' => 'Lutte contre les MGF',      'desc' => "Lancement des programmes intensifs contre les MGF dans l'Extrême-Nord.",   'icon' => 'bx bx-shield',   'side' => 'left',  'style' => 'default'  ),
    4 => array( 'year' => '2019', 'title' => 'Prix Simone Veil 🏆',       'desc' => "Aïssa Doumara Ngatansou reçoit le Prix Simone Veil.",                       'icon' => 'bx bx-award',    'side' => 'right', 'style' => 'featured' ),
    5 => array( 'year' => '2024', 'title' => 'Expansion régionale',       'desc' => "Extension dans le Bassin du Lac Tchad et création du réseau RESOF.",        'icon' => 'bx bx-map-alt',  'side' => 'left',  'style' => 'default'  ),
    6 => array( 'year' => '2026', 'title' => 'ALVF devient ALVFF',        'desc' => "Rebranding et engagement élargi envers les femmes et les filles.",          'icon' => 'bx bx-flag',     'side' => 'right', 'style' => 'green'    ),
);
$events = array();
for ( $i = 1; $i <= 6; $i++ ) {
    $events[] = array(
        'year'  => alvff_h( "timeline_{$i}_year",  $tl_defaults[$i]['year'] ),
        'title' => alvff_h( "timeline_{$i}_title", $tl_defaults[$i]['title'] ),
        'desc'  => alvff_h( "timeline_{$i}_desc",  $tl_defaults[$i]['desc'] ),
        'icon'  => alvff_h( "timeline_{$i}_icon",  $tl_defaults[$i]['icon'] ),
        'side'  => $tl_defaults[$i]['side'],
        'style' => $tl_defaults[$i]['style'],
    );
}

$leader_img = alvff_hi( 'history_leader_image', get_template_directory_uri() . '/assets/img/award.jpg' );
$leader_cap = alvff_h( 'history_leader_caption', "Aïssa Doumara Ngatansou - Citoyenne d'honneur de Compiègne, France (2026)" );
?>

<!-- Hero -->
<section class="py-7 text-white" style="background-image:url('<?php echo esc_url( $hero_img ); ?>'); background-size:cover; background-position:center; position:relative;">
  <div style="position:absolute;inset:0;background-color:rgba(32,97,22,0.7);"></div>
  <div class="container" style="position:relative;z-index:1;">
    <div class="row justify-content-center">
      <div class="col-md-6 text-center">
        <h1 class="fw-bold"><?php echo esc_html( alvff_h( 'history_hero_title', 'Notre Histoire' ) ); ?></h1>
        <p class="text-white"><?php echo esc_html( alvff_h( 'history_hero_subtitle', 'Plus de 25 ans de combat pour les droits des femmes et des filles' ) ); ?></p>
      </div>
    </div>
  </div>
</section>

<!-- Intro + Timeline -->
<section class="py-5" style="background-color:#f9f7f4;">
  <div class="container">
    <div class="row justify-content-center mb-5">
      <div class="col-lg-7 text-center">
        <p class="text-muted-foreground"><?php echo esc_html( alvff_h( 'history_intro', "Depuis 1996, l'ALVFF s'engage sans relâche pour protéger les femmes et les filles contre toutes les formes de violence." ) ); ?></p>
      </div>
    </div>

    <div class="tl-wrap">
      <div class="tl-line"></div>
      <?php foreach ( $events as $event ) :
          $is_left    = $event['side'] === 'left';
          $card_class = 'tl-card' . ( $event['style'] === 'featured' ? ' tl-card--featured' : '' ) . ( $event['style'] === 'green' ? ' tl-card--green' : '' );
          $icon_class = 'tl-icon' . ( $event['style'] === 'green' ? ' tl-icon--green' : '' );
      ?>
      <div class="tl-row <?php echo $is_left ? 'tl-row--left' : 'tl-row--right'; ?>">
        <div class="tl-card-wrap">
          <div class="<?php echo $card_class; ?>">
            <p class="tl-year"><?php echo esc_html( $event['year'] ); ?></p>
            <h5 class="tl-title"><?php echo esc_html( $event['title'] ); ?></h5>
            <p class="tl-desc"><?php echo esc_html( $event['desc'] ); ?></p>
          </div>
        </div>
        <div class="<?php echo $icon_class; ?>"><i class="<?php echo esc_attr( $event['icon'] ); ?>"></i></div>
        <div class="tl-card-wrap tl-empty"></div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- Leader photo -->
<section class="py-5 bg-light">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8 text-center">
        <img src="<?php echo esc_url( $leader_img ); ?>" class="img-fluid rounded-lg shadow" alt="">
        <p class="text-center mt-3 fst-italic text-muted-foreground"><?php echo esc_html( $leader_cap ); ?></p>
      </div>
    </div>
  </div>
</section>

<!-- CTA -->
<section class="py-5 bg-danger text-white">
  <div class="container">
    <div class="row justify-content-center text-center">
      <div class="col-md-6">
        <h1><?php echo esc_html( alvff_h( 'history_cta_title', "Continuez l'histoire avec nous" ) ); ?></h1>
        <p class="lead text-white"><?php echo esc_html( alvff_h( 'history_cta_text', "Rejoignez notre mouvement et participez à l'écriture des prochains chapitres." ) ); ?></p>
        <a href="<?php echo esc_url( get_permalink( get_page_by_path( 'benevole' ) ) ); ?>" class="btn btn-light btn-lg mt-2">
          <i class="bx bxs-hand-heart me-1"></i>
          <?php echo esc_html( alvff_h( 'history_cta_button', 'Rejoindre le mouvement' ) ); ?>
          <span class="bx bx-right-arrow-alt"></span>
        </a>
      </div>
    </div>
  </div>
</section>

<?php get_footer(); ?>
