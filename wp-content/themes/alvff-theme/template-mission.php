<?php
/**
 * Template Name: Mission
 */
get_header();
?>


<!-- Hero -->
<section class="py-7 text-white" style="background-image: url('<?php bloginfo('template_directory');?>/assets/img/1.jpg'); background-size: cover; background-position: center; position: relative;">
  <div style="position: absolute; inset: 0; background-color: rgba(63, 136, 52, 0.70);"></div>
  <div class="container" style="position: relative; z-index: 1;">
    <div class="row">
      <div class="col-md-6">
        <p class="text-sm text-white">Qui nous sommes</p>
        <h1>Notre Mission</h1>
        <p class="text-white">L'ALVFF est une organisation de la société civile camerounaise engagée depuis 1996 dans la lutte contre les violences basées sur le genre et la promotion des droits des femmes et des filles.</p>
      </div>
    </div>
  </div>
</section>
<!-- hero end -->


<!-- vision & mission -->
<section class="py-5">
  <div class="container">
    <div class="row align-items-start g-5">
 
      <!-- Left: Vision -->
      <div class="col-md-6">
        <h2 class="fw-bold mb-3"><?php esc_html_e( 'Notre Vision', 'alvff-theme' ); ?></h2>
        <p class="text-muted-foreground mb-4">
          <?php esc_html_e( 'Une société camerounaise où les femmes et les filles vivent libres de toute forme de violence, jouissent pleinement de leurs droits et participent activement au développement de leurs communautés.', 'alvff-theme' ); ?>
        </p>
        <div class="project-img-wrap rounded-lg overflow-hidden">
          <img src="<?php bloginfo('template_directory'); ?>/assets/img/slide1.jpg"
               class="project-img w-100" style="height:340px;" alt="">
        </div>
      </div>
 
      <!-- Spacer -->
      <!-- <div class="col-md-1 d-none d-md-block"></div> -->
 
      <!-- Right: Mission -->
      <div class="col-md-5">
        <h2 class="fw-bold mb-3"><?php esc_html_e( 'Notre Mission', 'alvff-theme' ); ?></h2>
        <p class="text-muted-foreground mb-4">
          <?php esc_html_e( 'Contribuer à l\'élimination de toutes les formes de violences faites aux femmes et aux filles à travers la prévention, la prise en charge des survivantes, le plaidoyer et le renforcement des capacités des acteurs communautaires.', 'alvff-theme' ); ?>
        </p>
 
        <?php
        $mission_items = array(
            array( 'icon' => 'bx bxs-shield',        'title' => 'Prévention des VBG',           'desc' => 'Sensibilisation communautaire et plaidoyer auprès des autorités.' ),
            array( 'icon' => 'bx bxs-heart-circle',  'title' => 'Accompagnement Psychosocial',   'desc' => 'Soutien aux survivantes dans nos centres d\'écoute.' ),
            array( 'icon' => 'bx bxs-institution',   'title' => 'Assistance Juridique',          'desc' => 'Aide à l\'accès à la justice pour les victimes.' ),
        );
        foreach ( $mission_items as $item ) : ?>
        <div class="mission-item d-flex align-items-center mb-3 p-3 rounded-lg">
          <div class="mission-icon-circle me-3 flex-shrink-0">
            <i class="<?php echo esc_attr( $item['icon'] ); ?>"></i>
          </div>
          <div>
            <p class="text-dark fw-bold mb-1"><?php echo esc_html( $item['title'] ); ?></p>
            <p class="text-sm text-muted-foreground mb-0"><?php echo esc_html( $item['desc'] ); ?></p>
          </div>
        </div>
        <?php endforeach; ?>
      </div>
 
    </div>
  </div>
</section>


<!-- Nos Valeurs -->
<section class="py-5" style="background-color:#f9f9f6;">
  <div class="container">
    <div class="row justify-content-center mb-4">
      <div class="col-md-6">
        <h1 class="fw-bold text-center">Nos Valeurs</h1>
        <p class="text-muted text-center">Les principes qui guident notre action quotidienne</p>
      </div>
    </div>
    <div class="row justify-content-center">

      <div class="col-md-3 col-6 d-flex flex-column align-items-center text-center">
        <div class="card">
          <div class="card-body">
            <div class="icon-circle d-flex justify-content-center align-items-center bg-danger my-3 mx-auto" style="background-color:#fceee6 !important;"> 
              <i class="bx bx-shield text-danger" style="font-size:1.2rem;"></i>
            </div>
            <h5 class="text-center mb-0 fw-bold mb-3">Non-Violence</h5>
            <p class="text-sm text-center">Nous promouvons une culture de paix et de respect mutuel.</p>
          </div>
        </div>
      </div>

      <div class="col-md-3 col-6 d-flex flex-column align-items-center text-center">
        <div class="card">
          <div class="card-body">
            <div class="icon-circle d-flex justify-content-center align-items-center bg-danger my-3 mx-auto" style="background-color:#fceee6 !important;">
              <i class="bx bx-star text-danger" style="font-size:1.2rem;"></i>
            </div>
            <h5 class="text-center mb-0 fw-bold mb-3">Dignité Humaine</h5>
            <p class="text-sm text-center">Chaque femme et fille mérite d'être traitée avec dignité.</p>
          </div>
        </div>
      </div>

      <div class="col-md-3 col-6 d-flex flex-column align-items-center text-center">
        <div class="card">
          <div class="card-body">
            <div class="icon-circle d-flex justify-content-center align-items-center bg-danger my-3 mx-auto" style="background-color:#fceee6 !important;">
              <i class="bx bxs-balance-scale text-danger" style="font-size:1.2rem;"></i>
            </div>
            <h5 class="text-center mb-0 fw-bold mb-3">Justice Sociale</h5>
            <p class="text-sm text-center">Nous luttons pour l'égalité des droits et des opportunités.</p>
          </div>
        </div>
      </div>

      <div class="col-md-3 col-6 d-flex flex-column align-items-center text-center">
        <div class="card">
          <div class="card-body">
            <div class="icon-circle d-flex justify-content-center align-items-center bg-danger my-3 mx-auto" style="background-color:#fceee6 !important;">
              <i class="bx bx-rocket text-danger" style="font-size:1.2rem;"></i>
            </div>
            <h5 class="text-center mb-0 fw-bold mb-3">Autonomisation</h5>
            <p class="text-sm text-center">Nous aidons les femmes à devenir actrices de leur propre développement.</p>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>


<!-- Nos Domaines d'Intervention -->
<section class="py-5">
  <div class="container">
    <div class="row justify-content-center mb-5">
      <div class="col-md-8 text-center">
        <h2 class="fw-bold"><?php esc_html_e( "Nos Domaines d'Intervention", 'alvff-theme' ); ?></h2>
      </div>
    </div>
 
    <div class="row g-4">
      <?php
      $domaines = array(
          array( 'icon' => 'bx bxs-shield',        'title' => 'Prévention des VBG',          'desc' => 'Sensibilisation communautaire et plaidoyer auprès des autorités.',          'featured' => false ),
          array( 'icon' => 'bx bxs-heart-circle',  'title' => 'Accompagnement Psychosocial',  'desc' => "Soutien aux survivantes dans nos centres d'écoute.",                        'featured' => false ),
          array( 'icon' => 'bx bxs-institution',   'title' => 'Assistance Juridique',         'desc' => "Aide à l'accès à la justice pour les victimes.",                            'featured' => false ),
          array( 'icon' => 'bx bxs-graduation',    'title' => 'Scolarisation des Filles',     'desc' => "Promotion de l'éducation et bourses scolaires.",                            'featured' => false ),
          array( 'icon' => 'bx bxs-analyse',       'title' => 'Autonomisation Économique',    'desc' => 'Formation professionnelle et activités génératrices de revenus.',            'featured' => true  ),
          array( 'icon' => 'bx bxs-group',         'title' => 'Renforcement des Capacités',   'desc' => 'Formation des organisations de la société civile.',                         'featured' => false ),
      );
      foreach ( $domaines as $domaine ) :
          $card_class = $domaine['featured'] ? 'domaine-card domaine-card--featured' : 'domaine-card';
      ?>
      <div class="col-md-4">
        <div class="<?php echo $card_class; ?>">
          <div class="domaine-icon-sq flex-shrink-0">
            <i class="<?php echo esc_attr( $domaine['icon'] ); ?>"></i>
          </div>
          <div>
            <p class="fw-bold mb-1"><?php echo esc_html( $domaine['title'] ); ?></p>
            <p class="text-sm text-muted-foreground mb-0"><?php echo esc_html( $domaine['desc'] ); ?></p>
          </div>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
 
  </div>
</section>


<!-- CTA -->
<section class="py-5 bg-danger text-white">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <h1 class="text-center">Rejoignez Notre Combat</h1>
        <p class="text-center lead text-white">Ensemble, nous pouvons mettre fin aux violences faites aux femmes et aux filles.</p>
        <p class="text-center">
          <a href="<?php echo esc_url( get_permalink( get_page_by_path( 'don' ) ) ); ?>" class="btn btn-light me-2 text-danger">
            <i class="bx bx-heart me-1"></i> Faire un Don
          </a>
          <a href="<?php echo esc_url( get_permalink( get_page_by_path( 'benevole' ) ) ); ?>" class="btn btn-outline-light text-danger">
            <i class="bx bx-heart me-1"></i> Devenir Bénévole
          </a>
        </p>
      </div>
    </div>
  </div>
</section>




<?php get_footer(); ?>