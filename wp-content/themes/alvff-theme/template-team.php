<?php
/**
 * Template Name: team
 */
get_header();

function tm_f( $key, $default = '' ) {
    $v = function_exists('get_field') ? get_field( $key ) : false;
    return ( $v !== false && $v !== '' && $v !== null ) ? $v : $default;
}
function tm_img( $key, $fallback = '' ) {
    $v = function_exists('get_field') ? get_field( $key ) : false;
    if ( is_array( $v ) ) return $v['url'] ?? $fallback;
    return $v ?: $fallback;
}

$hero_eye   = tm_f( 'team_hero_eyebrow', 'Notre Équipe' );
$hero_title = tm_f( 'team_hero_title',   'Notre Équipe' );
$hero_text  = tm_f( 'team_hero_text',    'Des femmes et des hommes engagés au service des droits des femmes et des filles.' );

$leader_photo = tm_img( 'team_leader_photo', get_template_directory_uri() . '/assets/img/fondatrice.jpg' );
$leader_name  = tm_f( 'team_leader_name',  'Aïssa Doumara Ngatansou' );
$leader_role  = tm_f( 'team_leader_role',  'Coordinatrice Nationale' );
$leader_bio   = tm_f( 'team_leader_bio',   "Militante des droits des femmes depuis plus de 25 ans, lauréate du Prix Simone Veil 2019, Citoyenne d'honneur de Compiègne." );
$badge_1      = tm_f( 'team_leader_badge_1', 'Prix Simone Veil 2019' );
$badge_2      = tm_f( 'team_leader_badge_2', "Citoyenne d'honneur Compiègne" );

$recog_title = tm_f( 'team_recognition_title', 'Reconnaissance Internationale' );
$recog_text  = tm_f( 'team_recognition_text',  "L'engagement de l'ALVFF et de sa coordinatrice a été reconnu à travers de nombreuses distinctions nationales et internationales." );
$recog_img1  = tm_img( 'team_recognition_image_1', get_template_directory_uri() . '/assets/img/hell1.jpg' );
$recog_img2  = tm_img( 'team_recognition_image_2', get_template_directory_uri() . '/assets/img/hell1.jpg' );

$award_defs = array(
    1 => array( '2019', 'Prix Simone Veil',                 'République Française' ),
    2 => array( '2026', "Citoyenne d'Honneur de Compiègne", 'France' ),
);
$awards = array();
for ( $i = 1; $i <= 2; $i++ ) {
    $awards[] = array(
        'year'  => tm_f( "team_award_{$i}_year",  $award_defs[$i][0] ),
        'title' => tm_f( "team_award_{$i}_title", $award_defs[$i][1] ),
        'org'   => tm_f( "team_award_{$i}_org",   $award_defs[$i][2] ),
    );
}
?>

<!-- Hero -->
<section class="py-7 text-white" style="background-image: url('<?php bloginfo('template_directory');?>/assets/img/1.jpg'); background-size: cover; background-position: center; position: relative;">
  <div style="position: absolute; inset: 0; background-color: rgba(43, 121, 32, 0.7);"></div>
  <div class="container" style="position: relative; z-index: 1;">
    <div class="row">
      <div class="col-md-6">
        <p class="text-sm text-white"><?php echo esc_html( $hero_eye ); ?></p>
        <h1><?php echo esc_html( $hero_title ); ?></h1>
        <p class="text-white"><?php echo esc_html( $hero_text ); ?></p>
      </div>
    </div>
  </div>
</section>

<!-- Direction -->
<div class="section py-5 bg-light">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <h2 class="text-center mb-3">Direction</h2>
      </div>
    </div>
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card mb-3">
          <div class="row g-0">
            <div class="col-md-4">
              <img src="<?php echo esc_url( $leader_photo ); ?>" class="img-fluid rounded-start" alt="<?php echo esc_attr( $leader_name ); ?>">
            </div>
            <div class="col-md-8">
              <div class="card-body">
                <div class="py-5">
                  <ul class="list-unstyled mb-3">
                    <li class="list-inline-item me-2">
                      <div class="badge bg-danger-light-1 text-danger fw-light"><?php echo esc_html( $badge_1 ); ?></div>
                    </li>
                    <li class="list-inline-item me-2">
                      <div class="badge bg-danger-light-1 text-danger fw-light"><?php echo esc_html( $badge_2 ); ?></div>
                    </li>
                  </ul>
                  <h5 class="card-title"><?php echo esc_html( $leader_name ); ?></h5>
                  <h6 class="text-danger"><?php echo esc_html( $leader_role ); ?></h6>
                  <p class="card-text"><?php echo esc_html( $leader_bio ); ?></p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Reconnaissance -->
<section class="py-5" style="background-color:#f9f9f6;">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <h2><?php echo esc_html( $recog_title ); ?></h2>
        <p><?php echo esc_html( $recog_text ); ?></p>
        <ul class="list-unstyled">
          <?php foreach ( $awards as $award ) : ?>
          <li class="mb-3">
            <div class="card border-0 py-2 px-3 rounded">
              <div class="d-flex">
                <div class="icon-circle me-3 bg-danger-light-1 text-danger fw-light"><?php echo esc_html( $award['year'] ); ?></div>
                <div>
                  <p class="fw-bold mb-0"><?php echo esc_html( $award['title'] ); ?></p>
                  <p class="text-sm"><?php echo esc_html( $award['org'] ); ?></p>
                </div>
              </div>
            </div>
          </li>
          <?php endforeach; ?>
        </ul>
      </div>
      <div class="col-md-6">
        <div class="row">
          <div class="col-md-6">
            <img src="<?php echo esc_url( $recog_img1 ); ?>" class="img-fluid" alt="">
          </div>
          <div class="col-md-6">
            <img src="<?php echo esc_url( $recog_img2 ); ?>" class="img-fluid" alt="">
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Partenaires -->
<section class="py-5 bg-light">
  <div class="container">
    <div class="row justify-content-center mb-5">
      <h2 class="text-center">Nos Partenaires</h2>
      <p class="text-center mb-4">Nous travaillons avec des partenaires nationaux et internationaux pour maximiser notre impact.</p>
    </div>
    <div class="row justify-content-center">
      <?php
      $partner_list = array(
          array( 'ONU Femmes',      'UN Agency' ),
          array( 'Union Européenne','International' ),
          array( 'MINPROFF',        'Government' ),
          array( 'NORCAP',          'NGO' ),
          array( 'WANEP',           'Regional' ),
          array( 'Team Europe',     'International' ),
      );
      foreach ( $partner_list as $pl ) : ?>
      <div class="col-md-2 col-6">
        <div class="card mb-3">
          <div class="card-body">
            <h6 class="text-center fw-bold mb-0"><?php echo esc_html( $pl[0] ); ?></h6>
            <p class="text-center text-sm"><?php echo esc_html( $pl[1] ); ?></p>
          </div>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<?php get_footer(); ?>
