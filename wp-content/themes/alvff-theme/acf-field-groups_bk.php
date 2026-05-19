<?php
/**
 * ACF Field Groups for the ALVFF Theme – Page d'Accueil
 * Compatible with ACF FREE (no Repeater fields).
 *
 * Drop this file in your theme root and add to functions.php:
 *   require_once get_template_directory() . '/acf-field-groups.php';
 */

if ( ! function_exists( 'acf_add_local_field_group' ) ) {
    return;
}

add_action( 'acf/init', 'alvff_register_acf_field_groups' );

function alvff_register_acf_field_groups() {

    $location = array( array( array(
        'param'    => 'page_template',
        'operator' => '==',
        'value'    => 'front-page.php',
    ) ) );

    /* ─────────────────────────────────────────────────────────────────────
     * 1. HERO / CAROUSEL  (3 fixed slides)
     * ───────────────────────────────────────────────────────────────────── */
    $slide_defaults = array(
        1 => array(
            'title'    => 'Ensemble, Protégeons les Femmes et les Filles',
            'subtitle' => "Depuis 1996, l'ALVFF lutte contre toutes les formes de violence faites aux femmes et aux filles dans l'Extrême-Nord du Cameroun.",
        ),
        2 => array(
            'title'    => 'Mettons fin aux Mutilations Génitales Féminines',
            'subtitle' => "Plus de 8 500 filles protégées grâce à nos programmes de sensibilisation et d'intervention communautaire.",
        ),
        3 => array(
            'title'    => 'Les Femmes, Actrices de Paix et de Résilience',
            'subtitle' => "Autonomisation économique, plaidoyer et accompagnement psychosocial pour bâtir un avenir digne pour chaque femme.",
        ),
    );
    $slide_fields = array();
    for ( $i = 1; $i <= 3; $i++ ) {
        $slide_fields[] = array( 'key' => "field_slide_{$i}_image",    'label' => "Diapositive {$i} – Image",      'name' => "slide_{$i}_image",    'type' => 'image',    'return_format' => 'array', 'preview_size' => 'medium' );
        $slide_fields[] = array( 'key' => "field_slide_{$i}_title",    'label' => "Diapositive {$i} – Titre",      'name' => "slide_{$i}_title",    'type' => 'text',     'default_value' => $slide_defaults[$i]['title'] );
        $slide_fields[] = array( 'key' => "field_slide_{$i}_subtitle", 'label' => "Diapositive {$i} – Sous-titre", 'name' => "slide_{$i}_subtitle", 'type' => 'textarea', 'rows' => 2, 'default_value' => $slide_defaults[$i]['subtitle'] );
    }

    acf_add_local_field_group( array(
        'key'        => 'group_hero',
        'title'      => '🎠 Héro / Carousel',
        'fields'     => $slide_fields,
        'location'   => $location,
        'menu_order' => 10,
    ) );

    /* ─────────────────────────────────────────────────────────────────────
     * 2. STATISTIQUES  (4 fixed stats)
     * ───────────────────────────────────────────────────────────────────── */
    $stat_defaults = array(
        1 => array( 'number' => '15 000+', 'label' => 'Femmes Accompagnées',  'icon' => 'bx bxs-heart' ),
        2 => array( 'number' => '120+',    'label' => 'Communautés Touchées', 'icon' => 'bx bxs-map' ),
        3 => array( 'number' => '50+',     'label' => 'Partenaires',          'icon' => 'bx bxs-group' ),
        4 => array( 'number' => '10+',     'label' => "Années d'Expérience",  'icon' => 'bx bxs-award' ),
    );
    $stat_fields = array();
    for ( $i = 1; $i <= 4; $i++ ) {
        $stat_fields[] = array( 'key' => "field_stat_{$i}_number", 'label' => "Stat {$i} – Nombre",  'name' => "stat_{$i}_number", 'type' => 'text', 'default_value' => $stat_defaults[$i]['number'] );
        $stat_fields[] = array( 'key' => "field_stat_{$i}_label",  'label' => "Stat {$i} – Libellé", 'name' => "stat_{$i}_label",  'type' => 'text', 'default_value' => $stat_defaults[$i]['label'] );
        $stat_fields[] = array( 'key' => "field_stat_{$i}_icon",   'label' => "Stat {$i} – Icône",   'name' => "stat_{$i}_icon",   'type' => 'text', 'default_value' => $stat_defaults[$i]['icon'], 'instructions' => 'Classe Boxicons, ex: bx bxs-heart — voir boxicons.com' );
    }

    acf_add_local_field_group( array(
        'key'        => 'group_stats',
        'title'      => '📊 Statistiques',
        'fields'     => $stat_fields,
        'location'   => $location,
        'menu_order' => 20,
    ) );

    /* ─────────────────────────────────────────────────────────────────────
     * 3. MISSION  (4 fixed values)
     * ───────────────────────────────────────────────────────────────────── */
    $value_defaults = array(
        1 => array( 'label' => 'Non-Violence', 'icon' => 'bx bxs-shield' ),
        2 => array( 'label' => 'Dignité',      'icon' => 'bx bxs-star' ),
        3 => array( 'label' => 'Solidarité',   'icon' => 'bx bxs-hand-heart' ),
        4 => array( 'label' => 'Égalité',      'icon' => 'bx bxs-balance-scale' ),
    );
    $value_fields = array();
    for ( $i = 1; $i <= 4; $i++ ) {
        $value_fields[] = array( 'key' => "field_value_{$i}_label", 'label' => "Valeur {$i} – Libellé", 'name' => "value_{$i}_label", 'type' => 'text', 'default_value' => $value_defaults[$i]['label'] );
        $value_fields[] = array( 'key' => "field_value_{$i}_icon",  'label' => "Valeur {$i} – Icône",   'name' => "value_{$i}_icon",  'type' => 'text', 'default_value' => $value_defaults[$i]['icon'] );
    }

    acf_add_local_field_group( array(
        'key'        => 'group_mission',
        'title'      => '🎯 Section Mission',
        'fields'     => array_merge(
            array(
                array( 'key' => 'field_mission_image_1', 'label' => 'Grande image',    'name' => 'mission_image_1', 'type' => 'image', 'return_format' => 'array', 'preview_size' => 'medium' ),
                array( 'key' => 'field_mission_image_2', 'label' => 'Petite image 1',  'name' => 'mission_image_2', 'type' => 'image', 'return_format' => 'array', 'preview_size' => 'thumbnail' ),
                array( 'key' => 'field_mission_image_3', 'label' => 'Petite image 2',  'name' => 'mission_image_3', 'type' => 'image', 'return_format' => 'array', 'preview_size' => 'thumbnail' ),
                array( 'key' => 'field_mission_eyebrow', 'label' => 'Surtitre (rouge)', 'name' => 'mission_eyebrow', 'type' => 'text',     'default_value' => 'ALIF' ),
                array( 'key' => 'field_mission_title',   'label' => 'Titre',            'name' => 'mission_title',   'type' => 'text',     'default_value' => 'Notre Mission' ),
                array( 'key' => 'field_mission_text',    'label' => 'Paragraphe',       'name' => 'mission_text',    'type' => 'textarea', 'rows' => 5,
                    'default_value' => "L'ALVFF œuvre quotidiennement pour la prévention et la prise en charge des violences basées sur le genre, l'accompagnement psychosocial et juridique des survivantes, la promotion de la scolarisation des filles et l'autonomisation économique des femmes." ),
            ),
            $value_fields,
            array(
                array( 'key' => 'field_mission_quote_text',   'label' => 'Citation',      'name' => 'mission_quote_text',   'type' => 'textarea', 'rows' => 3,
                    'default_value' => '"Dans le Bassin du Lac Tchad, les femmes sont actrices de paix, de résilience et de transformation."' ),
                array( 'key' => 'field_mission_quote_name',   'label' => 'Nom',            'name' => 'mission_quote_name',   'type' => 'text', 'default_value' => 'Aïssa Doumara Ngatansou' ),
                array( 'key' => 'field_mission_quote_role',   'label' => 'Rôle / Titre',   'name' => 'mission_quote_role',   'type' => 'text', 'default_value' => 'Coordinatrice Nationale' ),
                array( 'key' => 'field_mission_quote_avatar', 'label' => 'Photo (avatar)', 'name' => 'mission_quote_avatar', 'type' => 'image', 'return_format' => 'array', 'preview_size' => 'thumbnail' ),
            )
        ),
        'location'   => $location,
        'menu_order' => 30,
    ) );

    /* ─────────────────────────────────────────────────────────────────────
     * 4. PROJETS  (3 fixed fallback cards + section headings)
     * ───────────────────────────────────────────────────────────────────── */
    $proj_defaults = array(
        1 => array( 'title' => "16 Jours d'Activisme",     'desc' => "Campagne annuelle de sensibilisation contre les violences faites aux femmes et aux filles." ),
        2 => array( 'title' => "Programme de Parrainage",  'desc' => "Offrez un avenir meilleur à une fille vulnérable grâce à notre programme de parrainage." ),
        3 => array( 'title' => "Autonomisation Économique",'desc' => "Formation professionnelle et accompagnement pour l'autonomisation des femmes." ),
    );
    $proj_fields = array(
        array( 'key' => 'field_projects_eyebrow',  'label' => 'Surtitre',   'name' => 'projects_eyebrow',  'type' => 'text', 'default_value' => 'Nos Actions' ),
        array( 'key' => 'field_projects_title',    'label' => 'Titre',      'name' => 'projects_title',    'type' => 'text', 'default_value' => 'Nos Projets' ),
        array( 'key' => 'field_projects_subtitle', 'label' => 'Sous-titre', 'name' => 'projects_subtitle', 'type' => 'text', 'default_value' => 'Découvrez nos actions sur le terrain' ),
    );
    for ( $i = 1; $i <= 3; $i++ ) {
        $proj_fields[] = array( 'key' => "field_proj_{$i}_image", 'label' => "Projet {$i} – Image", 'name' => "proj_{$i}_image", 'type' => 'image', 'return_format' => 'array', 'preview_size' => 'thumbnail', 'instructions' => "Affiché uniquement si aucun article de la catégorie \"projets\" n'existe." );
        $proj_fields[] = array( 'key' => "field_proj_{$i}_title", 'label' => "Projet {$i} – Titre",       'name' => "proj_{$i}_title", 'type' => 'text',     'default_value' => $proj_defaults[$i]['title'] );
        $proj_fields[] = array( 'key' => "field_proj_{$i}_desc",  'label' => "Projet {$i} – Description", 'name' => "proj_{$i}_desc",  'type' => 'textarea', 'rows' => 2, 'default_value' => $proj_defaults[$i]['desc'] );
    }

    acf_add_local_field_group( array(
        'key'        => 'group_projects',
        'title'      => '🗂️ Section Projets',
        'fields'     => $proj_fields,
        'location'   => $location,
        'menu_order' => 40,
    ) );

    /* ─────────────────────────────────────────────────────────────────────
     * 5. DONATION  (2 fixed impact examples)
     * ───────────────────────────────────────────────────────────────────── */
    $impact_defaults = array(
        1 => array( 'amount' => '23€', 'label' => '1 Mois de soutien',        'desc' => 'Accompagnement psychosocial pour une survivante', 'icon' => 'bx bxs-heart-circle' ),
        2 => array( 'amount' => '50€', 'label' => 'Autonomisation économique', 'desc' => 'Formation professionnelle pour une femme',        'icon' => 'bx bxs-briefcase' ),
    );
    $donation_fields = array(
        array( 'key' => 'field_donation_eyebrow',  'label' => 'Surtitre',    'name' => 'donation_eyebrow',   'type' => 'text', 'default_value' => 'Faire la différence' ),
        array( 'key' => 'field_donation_title',    'label' => 'Titre',       'name' => 'donation_title',     'type' => 'text', 'default_value' => 'Soutenez Notre Action' ),
        array( 'key' => 'field_donation_subtitle', 'label' => 'Sous-titre',  'name' => 'donation_subtitle',  'type' => 'text', 'default_value' => 'Votre don change des vies' ),
        array( 'key' => 'field_donation_legal',    'label' => 'Note légale', 'name' => 'donation_legal_note','type' => 'text', 'default_value' => 'Vos dons sont sécurisés et peuvent être déductibles des impôts selon votre pays.' ),
        array(
            'key'          => 'field_donation_preset_amounts',
            'label'        => 'Montants prédéfinis',
            'name'         => 'donation_preset_amounts',
            'type'         => 'textarea',
            'instructions' => 'Un montant par ligne, chiffre seul sans €. Ex: 10',
            'rows'         => 4,
            'default_value'=> "10\n25\n50\n100",
        ),
        array(
            'key'           => 'field_donation_payment_methods',
            'label'         => 'Moyens de paiement',
            'name'          => 'donation_payment_methods',
            'type'          => 'checkbox',
            'choices'       => array(
                'Visa / Mastercard' => 'Visa / Mastercard',
                'PayPal'            => 'PayPal',
                'Orange Money'      => 'Orange Money',
                'MTN Money'         => 'MTN Money',
            ),
            'default_value' => array( 'Visa / Mastercard', 'PayPal', 'Orange Money', 'MTN Money' ),
            'layout'        => 'horizontal',
        ),
    );
    for ( $i = 1; $i <= 2; $i++ ) {
        $donation_fields[] = array( 'key' => "field_impact_{$i}_amount", 'label' => "Impact {$i} – Montant",     'name' => "impact_{$i}_amount", 'type' => 'text', 'default_value' => $impact_defaults[$i]['amount'] );
        $donation_fields[] = array( 'key' => "field_impact_{$i}_label",  'label' => "Impact {$i} – Titre",       'name' => "impact_{$i}_label",  'type' => 'text', 'default_value' => $impact_defaults[$i]['label'] );
        $donation_fields[] = array( 'key' => "field_impact_{$i}_desc",   'label' => "Impact {$i} – Description", 'name' => "impact_{$i}_desc",   'type' => 'text', 'default_value' => $impact_defaults[$i]['desc'] );
        $donation_fields[] = array( 'key' => "field_impact_{$i}_icon",   'label' => "Impact {$i} – Icône",       'name' => "impact_{$i}_icon",   'type' => 'text', 'default_value' => $impact_defaults[$i]['icon'] );
    }

    acf_add_local_field_group( array(
        'key'        => 'group_donation',
        'title'      => '💳 Section Don',
        'fields'     => $donation_fields,
        'location'   => $location,
        'menu_order' => 50,
    ) );

    /* ─────────────────────────────────────────────────────────────────────
     * 6. PARRAINAGE  (4 fixed benefits)
     * ───────────────────────────────────────────────────────────────────── */
    $benefit_defaults = array(
        1 => array( 'title' => 'Éducation',  'desc' => "Accès à l'école et aux fournitures scolaires", 'icon' => 'bx bxs-book-open' ),
        2 => array( 'title' => 'Santé',      'desc' => 'Suivi médical et accès aux soins de base',     'icon' => 'bx bxs-plus-circle' ),
        3 => array( 'title' => 'Protection', 'desc' => 'Environnement sécurisé et accompagnement',     'icon' => 'bx bxs-shield-alt-2' ),
        4 => array( 'title' => 'Avenir',     'desc' => 'Formation professionnelle et insertion',       'icon' => 'bx bxs-rocket' ),
    );
    $benefit_fields = array(
        array( 'key' => 'field_sponsorship_image',    'label' => 'Photo principale', 'name' => 'sponsorship_image',    'type' => 'image', 'return_format' => 'array', 'preview_size' => 'medium' ),
        array( 'key' => 'field_sponsorship_eyebrow',  'label' => 'Surtitre',         'name' => 'sponsorship_eyebrow',  'type' => 'text', 'default_value' => 'Programme de Parrainage' ),
        array( 'key' => 'field_sponsorship_title',    'label' => 'Titre',            'name' => 'sponsorship_title',    'type' => 'text', 'default_value' => 'Parrainez un Enfant' ),
        array( 'key' => 'field_sponsorship_subtitle', 'label' => 'Sous-titre',       'name' => 'sponsorship_subtitle', 'type' => 'text', 'default_value' => 'Offrez un avenir meilleur à une fille vulnérable' ),
        array( 'key' => 'field_sponsorship_cta_text', 'label' => 'Texte du bouton',  'name' => 'sponsorship_cta_text', 'type' => 'text', 'default_value' => 'Devenir parrain / marraine' ),
        array( 'key' => 'field_sponsorship_cta_url',  'label' => 'Lien du bouton',   'name' => 'sponsorship_cta_url',  'type' => 'url' ),
    );
    for ( $i = 1; $i <= 4; $i++ ) {
        $benefit_fields[] = array( 'key' => "field_benefit_{$i}_title", 'label' => "Bénéfice {$i} – Titre",       'name' => "benefit_{$i}_title", 'type' => 'text', 'default_value' => $benefit_defaults[$i]['title'] );
        $benefit_fields[] = array( 'key' => "field_benefit_{$i}_desc",  'label' => "Bénéfice {$i} – Description", 'name' => "benefit_{$i}_desc",  'type' => 'text', 'default_value' => $benefit_defaults[$i]['desc'] );
        $benefit_fields[] = array( 'key' => "field_benefit_{$i}_icon",  'label' => "Bénéfice {$i} – Icône",       'name' => "benefit_{$i}_icon",  'type' => 'text', 'default_value' => $benefit_defaults[$i]['icon'] );
    }

    acf_add_local_field_group( array(
        'key'        => 'group_sponsorship',
        'title'      => '👧 Section Parrainage',
        'fields'     => $benefit_fields,
        'location'   => $location,
        'menu_order' => 60,
    ) );

    /* ─────────────────────────────────────────────────────────────────────
     * 7. ACTUALITÉS
     * ───────────────────────────────────────────────────────────────────── */
    acf_add_local_field_group( array(
        'key'        => 'group_news',
        'title'      => '📰 Section Actualités',
        'fields'     => array(
            array( 'key' => 'field_news_eyebrow', 'label' => 'Surtitre', 'name' => 'news_eyebrow', 'type' => 'text', 'default_value' => 'Actualité' ),
            array( 'key' => 'field_news_title',   'label' => 'Titre',    'name' => 'news_title',   'type' => 'text', 'default_value' => 'Dernières Nouvelles' ),
        ),
        'location'   => $location,
        'menu_order' => 70,
    ) );
}