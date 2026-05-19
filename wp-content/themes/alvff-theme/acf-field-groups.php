<?php
/**
 * ACF Field Groups — ALL ALVFF Templates
 * ACF FREE compatible (no Repeaters).
 *
 * Add to functions.php:
 *   require_once get_template_directory() . '/acf-field-groups.php';
 */

if ( ! function_exists( 'acf_add_local_field_group' ) ) return;

add_action( 'acf/init', 'alvff_register_all_acf_groups' );

function alvff_register_all_acf_groups() {

    /* ── Shared helpers ── */
    function alvff_loc( $template ) {
        return array( array( array( 'param' => 'page_template', 'operator' => '==', 'value' => $template ) ) );
    }
    function alvff_img( $key, $label, $name ) {
        return array( 'key' => $key, 'label' => $label, 'name' => $name, 'type' => 'image', 'return_format' => 'array', 'preview_size' => 'medium' );
    }
    function alvff_txt( $key, $label, $name, $default = '' ) {
        return array( 'key' => $key, 'label' => $label, 'name' => $name, 'type' => 'text', 'default_value' => $default );
    }
    function alvff_ta( $key, $label, $name, $default = '', $rows = 3 ) {
        return array( 'key' => $key, 'label' => $label, 'name' => $name, 'type' => 'textarea', 'rows' => $rows, 'default_value' => $default );
    }

    /* ══════════════════════════════════════════════
     * 1. FRONT PAGE  (front-page.php)
     * ════════════════════════════════════════════ */

    /* 1a — Carousel */
    $slide_defs = array(
        1 => array( 'title' => 'Ensemble, Protégeons les Femmes et les Filles',   'subtitle' => "Depuis 1996, l'ALVFF lutte contre toutes les formes de violence dans l'Extrême-Nord du Cameroun." ),
        2 => array( 'title' => 'Mettons fin aux Mutilations Génitales Féminines', 'subtitle' => "Plus de 8 500 filles protégées grâce à nos programmes de sensibilisation." ),
        3 => array( 'title' => 'Les Femmes, Actrices de Paix et de Résilience',   'subtitle' => "Autonomisation économique, plaidoyer et accompagnement psychosocial." ),
    );
    $slide_fields = array();
    for ( $i = 1; $i <= 3; $i++ ) {
        $slide_fields[] = alvff_img( "field_fp_sl{$i}_img", "Slide {$i} – Image",      "slide_{$i}_image" );
        $slide_fields[] = alvff_txt( "field_fp_sl{$i}_tit", "Slide {$i} – Titre",      "slide_{$i}_title",    $slide_defs[$i]['title'] );
        $slide_fields[] = alvff_ta(  "field_fp_sl{$i}_sub", "Slide {$i} – Sous-titre", "slide_{$i}_subtitle", $slide_defs[$i]['subtitle'], 2 );
    }
    acf_add_local_field_group( array( 'key' => 'group_fp_carousel', 'title' => '🎠 Accueil – Carousel', 'fields' => $slide_fields, 'location' => alvff_loc('front-page.php'), 'menu_order' => 10 ) );

    /* 1b — Stats */
    $stat_defs = array(
        1 => array( '15 000+', 'Femmes Accompagnées',  'bx bxs-heart' ),
        2 => array( '120+',    'Communautés Touchées', 'bx bxs-map' ),
        3 => array( '50+',     'Partenaires',          'bx bxs-group' ),
        4 => array( '10+',     "Années d'Expérience",  'bx bxs-award' ),
    );
    $stat_fields = array();
    for ( $i = 1; $i <= 4; $i++ ) {
        $stat_fields[] = alvff_txt( "field_fp_st{$i}_n", "Stat {$i} – Nombre",  "stat_{$i}_number", $stat_defs[$i][0] );
        $stat_fields[] = alvff_txt( "field_fp_st{$i}_l", "Stat {$i} – Libellé", "stat_{$i}_label",  $stat_defs[$i][1] );
        $stat_fields[] = alvff_txt( "field_fp_st{$i}_i", "Stat {$i} – Icône",   "stat_{$i}_icon",   $stat_defs[$i][2] );
    }
    acf_add_local_field_group( array( 'key' => 'group_fp_stats', 'title' => '📊 Accueil – Statistiques', 'fields' => $stat_fields, 'location' => alvff_loc('front-page.php'), 'menu_order' => 20 ) );

    /* 1c — Mission */
    $val_defs = array( 1 => array('Non-Violence','bx bxs-shield'), 2 => array('Dignité','bx bxs-star'), 3 => array('Solidarité','bx bxs-hand-heart'), 4 => array('Égalité','bx bxs-balance-scale') );
    $val_fields = array();
    for ( $i = 1; $i <= 4; $i++ ) {
        $val_fields[] = alvff_txt( "field_fp_vl{$i}_l", "Valeur {$i} – Libellé", "value_{$i}_label", $val_defs[$i][0] );
        $val_fields[] = alvff_txt( "field_fp_vl{$i}_i", "Valeur {$i} – Icône",   "value_{$i}_icon",  $val_defs[$i][1] );
    }
    acf_add_local_field_group( array( 'key' => 'group_fp_mission', 'title' => '🎯 Accueil – Mission', 'fields' => array_merge( array(
        alvff_img( 'field_fp_mi1', 'Mission – Grande image',   'mission_image_1' ),
        alvff_img( 'field_fp_mi2', 'Mission – Petite image 1', 'mission_image_2' ),
        alvff_img( 'field_fp_mi3', 'Mission – Petite image 2', 'mission_image_3' ),
        alvff_txt( 'field_fp_mey', 'Mission – Surtitre', 'mission_eyebrow', 'ALIF' ),
        alvff_txt( 'field_fp_mti', 'Mission – Titre',    'mission_title',   'Notre Mission' ),
        alvff_ta(  'field_fp_mte', 'Mission – Paragraphe','mission_text',   "L'ALVFF œuvre quotidiennement pour la prévention et la prise en charge des violences basées sur le genre.", 4 ),
    ), $val_fields, array(
        alvff_ta(  'field_fp_qte', 'Citation',      'mission_quote_text',   '"Dans le Bassin du Lac Tchad, les femmes sont actrices de paix."', 2 ),
        alvff_txt( 'field_fp_qna', 'Nom',           'mission_quote_name',   'Aïssa Doumara Ngatansou' ),
        alvff_txt( 'field_fp_qro', 'Rôle',          'mission_quote_role',   'Coordinatrice Nationale' ),
        alvff_img( 'field_fp_qav', 'Photo avatar',  'mission_quote_avatar' ),
    ) ), 'location' => alvff_loc('front-page.php'), 'menu_order' => 30 ) );

    /* 1d — Projets headings */
    acf_add_local_field_group( array( 'key' => 'group_fp_proj', 'title' => '🗂️ Accueil – Projets', 'fields' => array(
        alvff_txt( 'field_fp_pey', 'Surtitre',   'projects_eyebrow',  'Nos Actions' ),
        alvff_txt( 'field_fp_pti', 'Titre',      'projects_title',    'Nos Projets' ),
        alvff_txt( 'field_fp_psu', 'Sous-titre', 'projects_subtitle', 'Découvrez nos actions sur le terrain' ),
    ), 'location' => alvff_loc('front-page.php'), 'menu_order' => 40 ) );

    /* 1e — Don */
    $imp_defs = array(
        1 => array( '23€', '1 Mois de soutien',       'Accompagnement psychosocial pour une survivante', 'bx bxs-heart-circle' ),
        2 => array( '50€', 'Autonomisation économique','Formation professionnelle pour une femme',        'bx bxs-briefcase' ),
    );
    $don_fields = array(
        alvff_txt( 'field_fp_dey', 'Surtitre',    'donation_eyebrow',   'Faire la différence' ),
        alvff_txt( 'field_fp_dti', 'Titre',       'donation_title',     'Soutenez Notre Action' ),
        alvff_txt( 'field_fp_dsu', 'Sous-titre',  'donation_subtitle',  'Votre don change des vies' ),
        alvff_txt( 'field_fp_dle', 'Note légale', 'donation_legal_note','Vos dons sont sécurisés et peuvent être déductibles des impôts selon votre pays.' ),
        array( 'key' => 'field_fp_dam', 'label' => 'Montants prédéfinis', 'name' => 'donation_preset_amounts', 'type' => 'textarea', 'rows' => 4, 'default_value' => "10\n25\n50\n100", 'instructions' => 'Un montant par ligne, sans €' ),
        array( 'key' => 'field_fp_dpm', 'label' => 'Moyens de paiement', 'name' => 'donation_payment_methods', 'type' => 'checkbox',
            'choices' => array( 'Visa / Mastercard' => 'Visa / Mastercard', 'PayPal' => 'PayPal', 'Orange Money' => 'Orange Money', 'MTN Money' => 'MTN Money' ),
            'default_value' => array( 'Visa / Mastercard', 'PayPal', 'Orange Money', 'MTN Money' ), 'layout' => 'horizontal' ),
    );
    for ( $i = 1; $i <= 2; $i++ ) {
        $don_fields[] = alvff_txt( "field_fp_im{$i}a", "Impact {$i} – Montant", "impact_{$i}_amount", $imp_defs[$i][0] );
        $don_fields[] = alvff_txt( "field_fp_im{$i}l", "Impact {$i} – Titre",   "impact_{$i}_label",  $imp_defs[$i][1] );
        $don_fields[] = alvff_txt( "field_fp_im{$i}d", "Impact {$i} – Desc",    "impact_{$i}_desc",   $imp_defs[$i][2] );
        $don_fields[] = alvff_txt( "field_fp_im{$i}i", "Impact {$i} – Icône",   "impact_{$i}_icon",   $imp_defs[$i][3] );
    }
    acf_add_local_field_group( array( 'key' => 'group_fp_don', 'title' => '💳 Accueil – Don', 'fields' => $don_fields, 'location' => alvff_loc('front-page.php'), 'menu_order' => 50 ) );

    /* 1f — Parrainage */
    $ben_defs = array(
        1 => array( 'Éducation',  "Accès à l'école et aux fournitures scolaires", 'bx bxs-book-open' ),
        2 => array( 'Santé',      'Suivi médical et accès aux soins de base',     'bx bxs-plus-circle' ),
        3 => array( 'Protection', 'Environnement sécurisé et accompagnement',     'bx bxs-shield-alt-2' ),
        4 => array( 'Avenir',     'Formation professionnelle et insertion',       'bx bxs-rocket' ),
    );
    $spon_home_fields = array(
        alvff_img( 'field_fp_spim', 'Photo',        'sponsorship_image' ),
        alvff_txt( 'field_fp_spey', 'Surtitre',     'sponsorship_eyebrow',  'Programme de Parrainage' ),
        alvff_txt( 'field_fp_spti', 'Titre',        'sponsorship_title',    'Parrainez un Enfant' ),
        alvff_txt( 'field_fp_spsu', 'Sous-titre',   'sponsorship_subtitle', 'Offrez un avenir meilleur à une fille vulnérable' ),
        alvff_txt( 'field_fp_spbt', 'Bouton – Texte','sponsorship_cta_text','Devenir parrain / marraine' ),
        array( 'key' => 'field_fp_spbu', 'label' => 'Bouton – Lien', 'name' => 'sponsorship_cta_url', 'type' => 'url' ),
    );
    for ( $i = 1; $i <= 4; $i++ ) {
        $spon_home_fields[] = alvff_txt( "field_fp_bn{$i}t", "Bénéfice {$i} – Titre", "benefit_{$i}_title", $ben_defs[$i][0] );
        $spon_home_fields[] = alvff_txt( "field_fp_bn{$i}d", "Bénéfice {$i} – Desc",  "benefit_{$i}_desc",  $ben_defs[$i][1] );
        $spon_home_fields[] = alvff_txt( "field_fp_bn{$i}i", "Bénéfice {$i} – Icône", "benefit_{$i}_icon",  $ben_defs[$i][2] );
    }
    acf_add_local_field_group( array( 'key' => 'group_fp_spon', 'title' => '👧 Accueil – Parrainage', 'fields' => $spon_home_fields, 'location' => alvff_loc('front-page.php'), 'menu_order' => 60 ) );

    /* 1g — News + Partners */
    acf_add_local_field_group( array( 'key' => 'group_fp_news', 'title' => '📰 Accueil – Actualités & Partenaires', 'fields' => array(
        alvff_txt( 'field_fp_ney', 'Actualités – Surtitre', 'news_eyebrow', 'Actualité' ),
        alvff_txt( 'field_fp_nti', 'Actualités – Titre',    'news_title',   'Dernières Nouvelles' ),
        alvff_ta(  'field_fp_par', 'Partenaires (un par ligne)', 'homepage_partners', "ONU Femmes\nUnion Européenne\nMINPROFF\nNORCAP\nTeam Europe\nWANEP", 6 ),
    ), 'location' => alvff_loc('front-page.php'), 'menu_order' => 70 ) );

    /* ══════════════════════════════════════════════
     * 2. MISSION  (template-mission.php)
     * ════════════════════════════════════════════ */
    $ms_val_defs = array(
        1 => array( 'Non-Violence',  'Nous promouvons une culture de paix et de respect mutuel.' ),
        2 => array( 'Dignité Humaine','Chaque femme et fille mérite d\'être traitée avec dignité.' ),
        3 => array( 'Justice Sociale','Nous luttons pour l\'égalité des droits et des opportunités.' ),
        4 => array( 'Autonomisation', 'Nous aidons les femmes à devenir actrices de leur propre développement.' ),
    );
    $ms_val_fields = array();
    for ( $i = 1; $i <= 4; $i++ ) {
        $ms_val_fields[] = alvff_txt( "field_ms_v{$i}t", "Valeur {$i} – Titre", "ms_value_{$i}_title", $ms_val_defs[$i][0] );
        $ms_val_fields[] = alvff_ta(  "field_ms_v{$i}d", "Valeur {$i} – Desc",  "ms_value_{$i}_desc",  $ms_val_defs[$i][1], 2 );
    }
    $ms_item_defs = array(
        1 => array( 'Prévention des VBG',          'Sensibilisation communautaire et plaidoyer auprès des autorités.', 'bx bxs-shield' ),
        2 => array( 'Accompagnement Psychosocial',  "Soutien aux survivantes dans nos centres d'écoute.",              'bx bxs-heart-circle' ),
        3 => array( 'Assistance Juridique',         "Aide à l'accès à la justice pour les victimes.",                  'bx bxs-institution' ),
    );
    $ms_item_fields = array();
    for ( $i = 1; $i <= 3; $i++ ) {
        $ms_item_fields[] = alvff_txt( "field_ms_it{$i}t", "Item {$i} – Titre", "mission_item_{$i}_title", $ms_item_defs[$i][0] );
        $ms_item_fields[] = alvff_txt( "field_ms_it{$i}d", "Item {$i} – Desc",  "mission_item_{$i}_desc",  $ms_item_defs[$i][1] );
        $ms_item_fields[] = alvff_txt( "field_ms_it{$i}i", "Item {$i} – Icône", "mission_item_{$i}_icon",  $ms_item_defs[$i][2] );
    }
    acf_add_local_field_group( array( 'key' => 'group_mission', 'title' => '🎯 Page Mission', 'fields' => array_merge( array(
        alvff_img( 'field_ms_himg', 'Hero – Image de fond',  'mission_hero_image' ),
        alvff_txt( 'field_ms_heye', 'Hero – Surtitre',       'mission_hero_eyebrow', 'Qui nous sommes' ),
        alvff_txt( 'field_ms_htit', 'Hero – Titre',          'mission_hero_title',   'Notre Mission' ),
        alvff_ta(  'field_ms_htxt', 'Hero – Texte',          'mission_hero_text',    "L'ALVFF est une organisation de la société civile camerounaise engagée depuis 1996." ),
        alvff_txt( 'field_ms_vtit', 'Vision – Titre',        'vision_title',   'Notre Vision' ),
        alvff_ta(  'field_ms_vtxt', 'Vision – Texte',        'vision_text',    "Une société camerounaise où les femmes et les filles vivent libres de toute forme de violence." ),
        alvff_img( 'field_ms_vimg', 'Vision – Image',        'vision_image' ),
        alvff_txt( 'field_ms_mtit', 'Mission – Titre',       'mission_section_title', 'Notre Mission' ),
        alvff_ta(  'field_ms_mtxt', 'Mission – Texte',       'mission_section_text',  "Contribuer à l'élimination de toutes les formes de violences faites aux femmes et aux filles." ),
    ), $ms_item_fields, $ms_val_fields, array(
        alvff_txt( 'field_ms_ctit', 'CTA – Titre', 'mission_cta_title', 'Rejoignez Notre Combat' ),
        alvff_ta(  'field_ms_ctxt', 'CTA – Texte', 'mission_cta_text',  'Ensemble, nous pouvons mettre fin aux violences faites aux femmes et aux filles.' ),
    ) ), 'location' => alvff_loc('template-mission.php'), 'menu_order' => 10 ) );

    /* ══════════════════════════════════════════════
     * 3. IMPACT  (template-impact.php)
     * ════════════════════════════════════════════ */
    $imp_row_defs = array(
        1 => array( 'Lutte contre les MGF',       "Plus de 8 500 filles sauvées de l'excision grâce à nos programmes.", '8,500+ filles' ),
        2 => array( "Centres d'Écoute",           "Nos centres d'écoute offrent un espace sûr pour les femmes victimes de violence.", '12,000+ femmes' ),
        3 => array( 'Autonomisation Économique',  "Formation professionnelle et soutien aux activités génératrices de revenus.", '50,000+ bénéficiaires' ),
        4 => array( 'Plaidoyer & Reconnaissance', "Aïssa Doumara Ngatansou a reçu de nombreuses distinctions internationales.", 'Prix Simone Veil 🏆' ),
    );
    $imp_fields = array(
        alvff_txt( 'field_imp_pill', 'Pill – Texte',     'impact_pill_text',  'Impact' ),
        alvff_txt( 'field_imp_titl', 'Titre principal',  'impact_main_title', 'Notre Impact' ),
        alvff_txt( 'field_imp_subt', 'Sous-titre',       'impact_subtitle',   '25 ans de lutte pour les droits des femmes' ),
        alvff_ta(  'field_imp_intr', 'Introduction',     'impact_intro',      "Depuis 1996, l'ALVFF transforme des vies et des communautés dans l'Extrême-Nord du Cameroun." ),
        alvff_txt( 'field_imp_s1n', 'Stat 1 – Nombre',  'impact_stat_1_number', '50,000+' ), alvff_txt( 'field_imp_s1l', 'Stat 1 – Libellé', 'impact_stat_1_label', 'Femmes accompagnées' ),
        alvff_txt( 'field_imp_s2n', 'Stat 2 – Nombre',  'impact_stat_2_number', '12,000+' ), alvff_txt( 'field_imp_s2l', 'Stat 2 – Libellé', 'impact_stat_2_label', 'Survivantes prises en charge' ),
        alvff_txt( 'field_imp_s3n', 'Stat 3 – Nombre',  'impact_stat_3_number', '8,500+' ),  alvff_txt( 'field_imp_s3l', 'Stat 3 – Libellé', 'impact_stat_3_label', 'Filles protégées des MGF' ),
        alvff_txt( 'field_imp_s4n', 'Stat 4 – Nombre',  'impact_stat_4_number', '25+' ),     alvff_txt( 'field_imp_s4l', 'Stat 4 – Libellé', 'impact_stat_4_label', "Années d'engagement" ),
    );
    for ( $i = 1; $i <= 4; $i++ ) {
        $imp_fields[] = alvff_img( "field_imp_r{$i}img", "Ligne {$i} – Image", "impact_row_{$i}_image" );
        $imp_fields[] = alvff_txt( "field_imp_r{$i}sta", "Ligne {$i} – Badge", "impact_row_{$i}_stat",  $imp_row_defs[$i][2] );
        $imp_fields[] = alvff_txt( "field_imp_r{$i}tit", "Ligne {$i} – Titre", "impact_row_{$i}_title", $imp_row_defs[$i][0] );
        $imp_fields[] = alvff_ta(  "field_imp_r{$i}txt", "Ligne {$i} – Texte", "impact_row_{$i}_desc",  $imp_row_defs[$i][1] );
    }
    acf_add_local_field_group( array( 'key' => 'group_impact', 'title' => '📈 Page Impact', 'fields' => $imp_fields, 'location' => alvff_loc('template-impact.php'), 'menu_order' => 10 ) );

    /* ══════════════════════════════════════════════
     * 4. HISTORY  (template-history.php)
     * ════════════════════════════════════════════ */
    $tl_defs = array(
        1 => array( '1996', "Création de l'ALVFF",      "Fondation de l'ALVFF au Cameroun, antenne Extrême-Nord à Maroua.",           'bx bx-calendar', 'left',  'default' ),
        2 => array( '2005', "Premiers centres d'écoute","Ouverture des premiers centres d'écoute et d'accompagnement psychosocial.",   'bx bx-group',    'right', 'default' ),
        3 => array( '2014', 'Lutte contre les MGF',     "Lancement des programmes intensifs contre les MGF dans l'Extrême-Nord.",     'bx bx-shield',   'left',  'default' ),
        4 => array( '2019', 'Prix Simone Veil 🏆',      "Aïssa Doumara Ngatansou reçoit le Prix Simone Veil.",                        'bx bx-award',    'right', 'featured' ),
        5 => array( '2024', 'Expansion régionale',      "Extension dans le Bassin du Lac Tchad et création du réseau RESOF.",         'bx bx-map-alt',  'left',  'default' ),
        6 => array( '2026', 'ALVF devient ALVFF',       "Rebranding et engagement élargi envers les femmes et les filles.",           'bx bx-flag',     'right', 'green' ),
    );
    $hist_fields = array(
        alvff_img( 'field_hs_himg', 'Hero – Image de fond',         'history_hero_image' ),
        alvff_txt( 'field_hs_htit', 'Hero – Titre',                  'history_hero_title',    'Notre Histoire' ),
        alvff_txt( 'field_hs_hsub', 'Hero – Sous-titre',             'history_hero_subtitle', 'Plus de 25 ans de combat pour les droits des femmes et des filles' ),
        alvff_ta(  'field_hs_intr', 'Introduction',                  'history_intro',         "Depuis 1996, l'ALVFF s'engage sans relâche pour protéger les femmes et les filles." ),
        alvff_img( 'field_hs_limg', 'Photo de la leader',            'history_leader_image' ),
        alvff_ta(  'field_hs_lcap', 'Légende photo de la leader',    'history_leader_caption',"Aïssa Doumara Ngatansou - Citoyenne d'honneur de Compiègne, France (2026)" ),
        alvff_txt( 'field_hs_ctit', 'CTA – Titre',                   'history_cta_title',    "Continuez l'histoire avec nous" ),
        alvff_ta(  'field_hs_ctxt', 'CTA – Texte',                   'history_cta_text',     "Rejoignez notre mouvement et participez à l'écriture des prochains chapitres." ),
        alvff_txt( 'field_hs_cbtn', 'CTA – Bouton',                  'history_cta_button',   'Rejoindre le mouvement' ),
    );
    for ( $i = 1; $i <= 6; $i++ ) {
        $hist_fields[] = alvff_txt( "field_hs_tl{$i}y", "Événement {$i} – Année", "timeline_{$i}_year",  $tl_defs[$i][0] );
        $hist_fields[] = alvff_txt( "field_hs_tl{$i}t", "Événement {$i} – Titre", "timeline_{$i}_title", $tl_defs[$i][1] );
        $hist_fields[] = alvff_ta(  "field_hs_tl{$i}d", "Événement {$i} – Texte", "timeline_{$i}_desc",  $tl_defs[$i][2] );
        $hist_fields[] = alvff_txt( "field_hs_tl{$i}i", "Événement {$i} – Icône", "timeline_{$i}_icon",  $tl_defs[$i][3] );
    }
    acf_add_local_field_group( array( 'key' => 'group_history', 'title' => '📖 Page Histoire', 'fields' => $hist_fields, 'location' => alvff_loc('template-history.php'), 'menu_order' => 10 ) );

    /* ══════════════════════════════════════════════
     * 5. PARTENAIRES  (partners.php)
     * ════════════════════════════════════════════ */
    $part_defs = array(
        1 => array( 'ONU Femmes',        "Partenaire stratégique pour l'autonomisation des femmes.",    'international' ),
        2 => array( 'Union Européenne',  "Soutien aux initiatives #TeamEurope contre les VBG.",        'international' ),
        3 => array( 'NORCAP',            'Norwegian Refugee Council – Renforcement des capacités.',     'international' ),
        4 => array( 'MINPROFF',          'Ministère de la Promotion de la Femme et de la Famille.',    'gouvernemental' ),
        5 => array( 'WANEP',             "Réseau Ouest-Africain pour l'Édification de la Paix.",       'regional' ),
        6 => array( 'RESOF-PRD-BLT',     'Mouvement de femmes pour la paix au Sahel.',                 'regional' ),
        7 => array( 'Ville de Compiègne','Partenariat franco-camerounais pour les droits des femmes.', 'local' ),
        8 => array( 'Agora 21',          'Association pour le rapprochement France-Afrique.',          'local' ),
    );
    $part_fields = array(
        alvff_txt( 'field_pt_htit', 'Hero – Titre',        'partners_hero_title',    'Nos Partenaires' ),
        alvff_txt( 'field_pt_hsub', 'Hero – Sous-titre',   'partners_hero_subtitle', 'Ensemble pour les droits des femmes et des filles' ),
        alvff_ta(  'field_pt_htxt', 'Hero – Texte',        'partners_hero_text',     "L'ALVFF travaille en étroite collaboration avec des organisations nationales et internationales." ),
        alvff_txt( 'field_pt_ctit', 'CTA – Titre',         'partners_cta_title',     'Devenir Partenaire' ),
        alvff_ta(  'field_pt_ctxt', 'CTA – Texte',         'partners_cta_text',      'Vous souhaitez soutenir notre mission ? Contactez-nous pour explorer les possibilités de partenariat.' ),
        alvff_img( 'field_pt_gal1', 'Galerie – Image 1',   'partners_gallery_1' ),
        alvff_img( 'field_pt_gal2', 'Galerie – Image 2',   'partners_gallery_2' ),
        alvff_img( 'field_pt_gal3', 'Galerie – Image 3',   'partners_gallery_3' ),
    );
    foreach ( $part_defs as $i => $p ) {
        $part_fields[] = alvff_txt( "field_pt_p{$i}n", "Partenaire {$i} – Nom",    "partner_{$i}_name", $p[0] );
        $part_fields[] = alvff_ta(  "field_pt_p{$i}d", "Partenaire {$i} – Desc",   "partner_{$i}_desc", $p[1], 2 );
        $part_fields[] = array( 'key' => "field_pt_p{$i}g", 'label' => "Partenaire {$i} – Groupe", 'name' => "partner_{$i}_group", 'type' => 'select',
            'choices' => array( 'international' => 'International', 'gouvernemental' => 'Gouvernemental', 'regional' => 'Régional', 'local' => 'Local' ),
            'default_value' => $p[2], 'return_format' => 'value' );
    }
    acf_add_local_field_group( array( 'key' => 'group_partners', 'title' => '🤝 Page Partenaires', 'fields' => $part_fields, 'location' => alvff_loc('partners.php'), 'menu_order' => 10 ) );

    /* ══════════════════════════════════════════════
     * 6. SPONSOR  (template-sponsor.php)
     * ════════════════════════════════════════════ */
    $inc_defs = array(
        1 => array( 'Éducation complète', 'Frais de scolarité, fournitures et uniformes',   'bx bx-book-open' ),
        2 => array( 'Nutrition',          "Repas équilibrés à l'école",                    'bx bx-bowl-hot' ),
        3 => array( 'Protection',         'Environnement sûr et suivi régulier',            'bx bx-shield-alt-2' ),
        4 => array( 'Correspondance',     'Lettres et photos de votre filleule',            'bx bx-envelope' ),
    );
    $sp_fields = array(
        alvff_txt( 'field_sp_eyeb', 'Surtitre',          'sponsor_eyebrow',   'Programme de parrainage' ),
        alvff_txt( 'field_sp_titl', 'Titre',             'sponsor_title',     'Parrainez une Fille' ),
        alvff_ta(  'field_sp_subt', 'Sous-titre',        'sponsor_subtitle',  "Offrez un avenir meilleur à une fille vulnérable de l'Extrême-Nord du Cameroun." ),
        alvff_img( 'field_sp_img1', 'Image 1',           'sponsor_image_1' ),
        alvff_img( 'field_sp_img2', 'Image 2',           'sponsor_image_2' ),
        alvff_txt( 'field_sp_s1n',  'Stat 1 – Nombre',   'sponsor_stat_1_number', '500+' ),
        alvff_txt( 'field_sp_s1l',  'Stat 1 – Libellé',  'sponsor_stat_1_label',  'Filles parrainées' ),
        alvff_txt( 'field_sp_s2n',  'Stat 2 – Nombre',   'sponsor_stat_2_number', '98%' ),
        alvff_txt( 'field_sp_s2l',  'Stat 2 – Libellé',  'sponsor_stat_2_label',  'Taux de réussite' ),
        alvff_txt( 'field_sp_s3n',  'Stat 3 – Nombre',   'sponsor_stat_3_number', '12' ),
        alvff_txt( 'field_sp_s3l',  'Stat 3 – Libellé',  'sponsor_stat_3_label',  'Communautés' ),
        alvff_txt( 'field_sp_itit', 'Section inclusions – Titre', 'sponsor_includes_title', 'Ce que comprend votre parrainage' ),
    );
    for ( $i = 1; $i <= 4; $i++ ) {
        $sp_fields[] = alvff_txt( "field_sp_i{$i}t", "Inclusion {$i} – Titre", "sponsor_include_{$i}_title", $inc_defs[$i][0] );
        $sp_fields[] = alvff_txt( "field_sp_i{$i}d", "Inclusion {$i} – Desc",  "sponsor_include_{$i}_desc",  $inc_defs[$i][1] );
        $sp_fields[] = alvff_txt( "field_sp_i{$i}i", "Inclusion {$i} – Icône", "sponsor_include_{$i}_icon",  $inc_defs[$i][2] );
    }
    acf_add_local_field_group( array( 'key' => 'group_sponsor', 'title' => '👧 Page Parrainage/Sponsor', 'fields' => $sp_fields, 'location' => alvff_loc('template-sponsor.php'), 'menu_order' => 10 ) );

    /* ══════════════════════════════════════════════
     * 7. TEAM  (template-team.php)
     * ════════════════════════════════════════════ */
    $aw_defs = array(
        1 => array( '2019', 'Prix Simone Veil',                 'République Française' ),
        2 => array( '2026', "Citoyenne d'Honneur de Compiègne", 'France' ),
    );
    $team_fields = array(
        alvff_txt( 'field_tm_heye', 'Hero – Surtitre',           'team_hero_eyebrow', 'Notre Équipe' ),
        alvff_txt( 'field_tm_htit', 'Hero – Titre',              'team_hero_title',   'Notre Équipe' ),
        alvff_ta(  'field_tm_htxt', 'Hero – Texte',              'team_hero_text',    'Des femmes et des hommes engagés au service des droits des femmes et des filles.' ),
        alvff_img( 'field_tm_lpho', 'Direction – Photo',         'team_leader_photo' ),
        alvff_txt( 'field_tm_lnam', 'Direction – Nom',           'team_leader_name',  'Aïssa Doumara Ngatansou' ),
        alvff_txt( 'field_tm_lrol', 'Direction – Rôle',          'team_leader_role',  'Coordinatrice Nationale' ),
        alvff_ta(  'field_tm_lbio', 'Direction – Bio',           'team_leader_bio',   'Militante des droits des femmes depuis plus de 25 ans, lauréate du Prix Simone Veil 2019.' ),
        alvff_txt( 'field_tm_lb1',  'Badge 1',                   'team_leader_badge_1','Prix Simone Veil 2019' ),
        alvff_txt( 'field_tm_lb2',  'Badge 2',                   'team_leader_badge_2',"Citoyenne d'honneur Compiègne" ),
        alvff_txt( 'field_tm_rtit', 'Reconnaissance – Titre',    'team_recognition_title', 'Reconnaissance Internationale' ),
        alvff_ta(  'field_tm_rtxt', 'Reconnaissance – Texte',    'team_recognition_text',  "L'engagement de l'ALVFF a été reconnu à travers de nombreuses distinctions nationales et internationales." ),
        alvff_img( 'field_tm_ri1',  'Reconnaissance – Image 1',  'team_recognition_image_1' ),
        alvff_img( 'field_tm_ri2',  'Reconnaissance – Image 2',  'team_recognition_image_2' ),
    );
    for ( $i = 1; $i <= 2; $i++ ) {
        $team_fields[] = alvff_txt( "field_tm_aw{$i}y", "Prix {$i} – Année",        "team_award_{$i}_year",  $aw_defs[$i][0] );
        $team_fields[] = alvff_txt( "field_tm_aw{$i}t", "Prix {$i} – Titre",        "team_award_{$i}_title", $aw_defs[$i][1] );
        $team_fields[] = alvff_txt( "field_tm_aw{$i}o", "Prix {$i} – Organisation", "team_award_{$i}_org",   $aw_defs[$i][2] );
    }
    acf_add_local_field_group( array( 'key' => 'group_team', 'title' => '👥 Page Équipe', 'fields' => $team_fields, 'location' => alvff_loc('template-team.php'), 'menu_order' => 10 ) );
}