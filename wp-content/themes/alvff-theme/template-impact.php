<?php
/**
 * Template Name: impact
 */
get_header();

function imp_f( $key, $default = '' ) {
    $v = function_exists('get_field') ? get_field( $key ) : false;
    return ( $v !== false && $v !== '' && $v !== null ) ? $v : $default;
}
function imp_img( $key, $fallback = '' ) {
    $v = function_exists('get_field') ? get_field( $key ) : false;
    if ( is_array( $v ) ) return $v['url'] ?? $fallback;
    return $v ?: $fallback;
}

$pill_text  = imp_f( 'impact_pill_text',  'Impact' );
$main_title = imp_f( 'impact_main_title', 'Notre Impact' );
$subtitle   = imp_f( 'impact_subtitle',   '25 ans de lutte pour les droits des femmes' );
$intro      = imp_f( 'impact_intro',      "Depuis 1996, l'ALVFF transforme des vies et des communautés dans l'Extrême-Nord du Cameroun. Découvrez les résultats concrets de notre engagement." );

$stat_defs = array(
    1 => array( 'bx bx-group',  '50,000+', 'Femmes accompagnées' ),
    2 => array( 'bx bx-shield', '12,000+', 'Survivantes prises en charge' ),
    3 => array( 'bx bx-heart',  '8,500+',  'Filles protégées des MGF' ),
    4 => array( 'bx bx-award',  '25+',     "Années d'engagement" ),
);
$impact_stats = array();
for ( $i = 1; $i <= 4; $i++ ) {
    $impact_stats[] = array(
        'icon'   => $stat_defs[$i][0],
        'number' => imp_f( "impact_stat_{$i}_number", $stat_defs[$i][1] ),
        'label'  => imp_f( "impact_stat_{$i}_label",  $stat_defs[$i][2] ),
    );
}

$row_defs = array(
    1 => array( 'Lutte contre les MGF',       "Plus de 8 500 filles sauvées de l'excision grâce à nos programmes de sensibilisation et d'intervention communautaire dans l'Extrême-Nord du Cameroun.", '8,500+ filles',         'left'  ),
    2 => array( "Centres d'Écoute",           "Nos centres d'écoute pilotes, comme celui du Lamidat de Mokolo, offrent un espace sûr pour les femmes victimes de violence.",                          '12,000+ femmes',        'right' ),
    3 => array( 'Autonomisation Économique',  "Formation professionnelle et soutien aux activités génératrices de revenus pour les femmes survivantes.",                                               '50,000+ bénéficiaires', 'left'  ),
    4 => array( 'Plaidoyer & Reconnaissance', "Notre coordinatrice Aïssa Doumara Ngatansou a reçu de nombreuses distinctions internationales pour son engagement.",                                   'Prix Simone Veil 🏆',   'right' ),
);
$impact_rows = array();
for ( $i = 1; $i <= 4; $i++ ) {
    $impact_rows[] = array(
        'img'   => imp_img( "impact_row_{$i}_image", get_template_directory_uri() . '/assets/img/2.jpg' ),
        'stat'  => imp_f( "impact_row_{$i}_stat",  $row_defs[$i][2] ),
        'title' => imp_f( "impact_row_{$i}_title", $row_defs[$i][0] ),
        'desc'  => imp_f( "impact_row_{$i}_desc",  $row_defs[$i][1] ),
        'side'  => $row_defs[$i][3],
    );
}

$timeline_events = array(
    array( '1996', "Création de l'ALVF-EN",                      'left',  'default'  ),
    array( '2005', "Premier centre d'écoute",                    'right', 'default'  ),
    array( '2015', '10,000 femmes accompagnées',                 'left',  'default'  ),
    array( '2019', 'Prix Simone Veil 🏆',                        'right', 'featured' ),
    array( '2024', 'Transformation en ALVFF',                    'left',  'default'  ),
    array( '2026', "Citoyenneté d'honneur de Compiègne 🌍",      'right', 'green'    ),
);
?>

<!-- ═══ HERO ═══ -->
<section class="py-5" style="background: linear-gradient(160deg, #fdf5f0 0%, #fef9f6 60%, #f5f2ea 100%); min-height: 340px; display:flex; align-items:center;">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-7 d-flex flex-column align-items-center text-center">
        <div class="impact-pill mb-4">
          <i class="bx bx-trending-up me-1" style="font-size:1rem;"></i>
          <?php echo esc_html( $pill_text ); ?>
        </div>
        <h1 class="fw-bold mb-3" style="font-size:clamp(2rem,5vw,3rem);"><?php echo esc_html( $main_title ); ?></h1>
        <p class="lead mb-3" style="color:#333;"><?php echo esc_html( $subtitle ); ?></p>
        <p class="text-muted-foreground" style="max-width:560px;"><?php echo esc_html( $intro ); ?></p>
      </div>
    </div>
  </div>
</section>

<!-- ═══ STATS ═══ -->
<section class="py-5" style="background-color:#161616;">
  <div class="container">
    <div class="row justify-content-center text-center g-4">
      <?php foreach ( $impact_stats as $stat ) : ?>
      <div class="col-md-3 col-6">
        <i class="<?php echo esc_attr( $stat['icon'] ); ?> mb-3 d-block" style="font-size:2rem; color:#e46212;"></i>
        <h2 class="fw-bold text-white mb-1" style="font-size:clamp(1.8rem,4vw,2.6rem);"><?php echo esc_html( $stat['number'] ); ?></h2>
        <p style="color:#9e9e9e; font-size:.9rem; margin:0;"><?php echo esc_html( $stat['label'] ); ?></p>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- ═══ IMPACT ROWS ═══ -->
<section class="py-5">
  <div class="container">
    <?php foreach ( $impact_rows as $row ) :
        $is_left = $row['side'] === 'left';
    ?>
    <div class="row align-items-center mb-5 g-5">
      <?php if ( $is_left ) : ?>
      <div class="col-md-5">
        <div class="impact-img-wrap">
          <img src="<?php echo esc_url( $row['img'] ); ?>" class="impact-img" alt="">
          <span class="impact-stat-badge"><?php echo esc_html( $row['stat'] ); ?></span>
        </div>
      </div>
      <div class="col-md-1"></div>
      <div class="col-md-6">
        <h2 class="fw-bold mb-3"><?php echo esc_html( $row['title'] ); ?></h2>
        <p class="text-muted-foreground lead"><?php echo esc_html( $row['desc'] ); ?></p>
      </div>
      <?php else : ?>
      <div class="col-md-6">
        <h2 class="fw-bold mb-3"><?php echo esc_html( $row['title'] ); ?></h2>
        <p class="text-muted-foreground lead"><?php echo esc_html( $row['desc'] ); ?></p>
      </div>
      <div class="col-md-1"></div>
      <div class="col-md-5">
        <div class="impact-img-wrap">
          <img src="<?php echo esc_url( $row['img'] ); ?>" class="impact-img" alt="">
          <span class="impact-stat-badge"><?php echo esc_html( $row['stat'] ); ?></span>
        </div>
      </div>
      <?php endif; ?>
    </div>
    <?php endforeach; ?>
  </div>
</section>

<!-- ═══ TIMELINE ═══ -->
<section class="py-5" style="background-color:#fdf5f0;">
  <div class="container">
    <div class="row justify-content-center mb-5">
      <div class="col-lg-6 text-center">
        <h2 class="fw-bold" style="font-size:clamp(1.6rem,3vw,2.2rem);"><?php esc_html_e( 'Notre Parcours', 'alvff-theme' ); ?></h2>
      </div>
    </div>
    <div style="position:relative; max-width:700px; margin:0 auto;">

      <!-- Central vertical line -->
      <div style="position:absolute; left:50%; top:0; bottom:0; width:2px; background:#e0d8d0; transform:translateX(-50%);"></div>

      <?php foreach ( $timeline_events as $ev ) :
          $is_left = $ev[2] === 'left';

          /* Card colours */
          if ( $ev[3] === 'featured' ) {
              $card_bg     = '#fff3e0';
              $card_border = '#e46212';
              $year_color  = '#e46212';
          } elseif ( $ev[3] === 'green' ) {
              $card_bg     = '#e3eee5';
              $card_border = '#3f8834';
              $year_color  = '#3f8834';
          } else {
              $card_bg     = '#ffffff';
              $card_border = '#ddd';
              $year_color  = '#c0392b';
          }

          /* Dot colour */
          $dot_bg = $ev[3] === 'green' ? '#3f8834' : ( $ev[3] === 'featured' ? '#e46212' : '#c0392b' );
      ?>
      <div style="display:flex; align-items:center; margin-bottom:2rem; position:relative;">

        <!-- Left half -->
        <div style="flex:1; padding-right:2rem; text-align:right;">
          <?php if ( $is_left ) : ?>
            <div style="display:inline-block; background:<?php echo $card_bg; ?>; border:1px solid <?php echo $card_border; ?>; border-radius:10px; padding:1rem 1.25rem; max-width:240px; text-align:left; box-shadow:0 2px 8px rgba(0,0,0,.06);">
              <p style="font-size:.75rem; font-weight:700; color:<?php echo $year_color; ?>; margin:0 0 .25rem;"><?php echo esc_html( $ev[0] ); ?></p>
              <p style="font-size:.9rem; font-weight:600; margin:0; color:#222;"><?php echo esc_html( $ev[1] ); ?></p>
            </div>
          <?php endif; ?>
        </div>

        <!-- Centre dot -->
        <div style="flex:0 0 14px; width:14px; height:14px; border-radius:50%; background:<?php echo $dot_bg; ?>; border:3px solid #fff; box-shadow:0 0 0 2px <?php echo $dot_bg; ?>; position:relative; z-index:1;"></div>

        <!-- Right half -->
        <div style="flex:1; padding-left:2rem; text-align:left;">
          <?php if ( ! $is_left ) : ?>
            <div style="display:inline-block; background:<?php echo $card_bg; ?>; border:1px solid <?php echo $card_border; ?>; border-radius:10px; padding:1rem 1.25rem; max-width:240px; box-shadow:0 2px 8px rgba(0,0,0,.06);">
              <p style="font-size:.75rem; font-weight:700; color:<?php echo $year_color; ?>; margin:0 0 .25rem;"><?php echo esc_html( $ev[0] ); ?></p>
              <p style="font-size:.9rem; font-weight:600; margin:0; color:#222;"><?php echo esc_html( $ev[1] ); ?></p>
            </div>
          <?php endif; ?>
        </div>

      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<?php get_footer(); ?>