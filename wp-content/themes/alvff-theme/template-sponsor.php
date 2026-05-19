<?php
/**
 * Template Name: Sponsor
 */
get_header();

function sp_f( $key, $default = '' ) {
    $v = function_exists('get_field') ? get_field( $key ) : false;
    return ( $v !== false && $v !== '' && $v !== null ) ? $v : $default;
}
function sp_img( $key, $fallback = '' ) {
    $v = function_exists('get_field') ? get_field( $key ) : false;
    if ( is_array( $v ) ) return $v['url'] ?? $fallback;
    return $v ?: $fallback;
}

$eyebrow  = sp_f( 'sponsor_eyebrow',  'Programme de parrainage' );
$title    = sp_f( 'sponsor_title',    'Parrainez une Fille' );
$subtitle = sp_f( 'sponsor_subtitle', "Offrez un avenir meilleur à une fille vulnérable de l'Extrême-Nord du Cameroun. Votre soutien change une vie." );
$image_1  = sp_img( 'sponsor_image_1', get_template_directory_uri() . '/assets/img/1.jpg' );
$image_2  = sp_img( 'sponsor_image_2', get_template_directory_uri() . '/assets/img/1.jpg' );

$stat_defs = array(
    1 => array( '500+', 'Filles parrainées' ),
    2 => array( '98%',  'Taux de réussite'  ),
    3 => array( '12',   'Communautés'       ),
);
$stats = array();
for ( $i = 1; $i <= 3; $i++ ) {
    $stats[] = array(
        'number' => sp_f( "sponsor_stat_{$i}_number", $stat_defs[$i][0] ),
        'label'  => sp_f( "sponsor_stat_{$i}_label",  $stat_defs[$i][1] ),
    );
}

$includes_title = sp_f( 'sponsor_includes_title', 'Ce que comprend votre parrainage' );

$inc_defs = array(
    1 => array( 'Éducation complète', 'Frais de scolarité, fournitures et uniformes',  'bx bx-book-open'    ),
    2 => array( 'Nutrition',          "Repas équilibrés à l'école",                   'bx bx-bowl-hot'     ),
    3 => array( 'Protection',         'Environnement sûr et suivi régulier',           'bx bx-shield-alt-2' ),
    4 => array( 'Correspondance',     'Lettres et photos de votre filleule',           'bx bx-envelope'     ),
);
$includes = array();
for ( $i = 1; $i <= 4; $i++ ) {
    $includes[] = array(
        'title' => sp_f( "sponsor_include_{$i}_title", $inc_defs[$i][0] ),
        'desc'  => sp_f( "sponsor_include_{$i}_desc",  $inc_defs[$i][1] ),
        'icon'  => sp_f( "sponsor_include_{$i}_icon",  $inc_defs[$i][2] ),
    );
}
?>

<!-- Hero -->
<section class="py-7 bg-success text-white">
    <div class="container">
        <div class="row">
            <div class="col-md-6 py-5">
                <p class="text-sm text-white"><?php echo esc_html( $eyebrow ); ?></p>
                <h1 class="fw-bold"><?php echo esc_html( $title ); ?></h1>
                <p class="text-white lead"><?php echo esc_html( $subtitle ); ?></p>
                <div class="card text-white border-0" style="background-color:#ffffff30;">
                    <div class="card-body">
                        <div class="row">
                            <?php foreach ( $stats as $stat ) : ?>
                            <div class="col-md-4 justify-content-center align-content-center my-2">
                                <h2 class="text-center mb-0"><?php echo esc_html( $stat['number'] ); ?></h2>
                                <p class="text-center text-white text-sm"><?php echo esc_html( $stat['label'] ); ?></p>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-6">
                        <img src="<?php echo esc_url( $image_1 ); ?>" class="img-fluid rounded shadow" alt="">
                    </div>
                    <div class="col-md-6">
                        <img src="<?php echo esc_url( $image_2 ); ?>" class="img-fluid rounded shadow" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Ce que comprend le parrainage -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row justify-content-center mb-4">
            <div class="col-md-7 text-center">
                <h2 class="fw-bold"><?php echo esc_html( $includes_title ); ?></h2>
            </div>
        </div>
        <div class="row justify-content-center">
            <?php foreach ( $includes as $inc ) : ?>
            <div class="col-md-3 mb-4">
                <div class="card h-100">
                    <div class="card-body d-flex flex-column align-items-center text-center">
                        <div class="icon-circle d-flex justify-content-center align-items-center m-4" style="background-color:#f9ece4;">
                            <i class="<?php echo esc_attr( $inc['icon'] ); ?>" style="font-size:1.4rem; color:#e46212;"></i>
                        </div>
                        <p class="fw-bold mb-1"><?php echo esc_html( $inc['title'] ); ?></p>
                        <p class="text-sm text-center"><?php echo esc_html( $inc['desc'] ); ?></p>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- ═══ WIZARD : DEVENEZ PARRAIN ═══ -->
<section class="py-5" style="background-color:#fbf3ef;">
    <div class="container">
        <div class="row justify-content-center mb-4">
            <div class="col-md-7 text-center">
                <p class="text-danger fw-bold" style="font-size:.75rem; letter-spacing:2px; text-transform:uppercase;">Rejoignez-nous</p>
                <h2 class="fw-bold">Devenez Parrain / Marraine</h2>
            </div>
        </div>

        <!-- Step indicators -->
        <div class="row justify-content-center mb-4">
            <div class="col-md-6">
                <div class="d-flex align-items-center justify-content-center gap-2">
                    <div class="d-flex align-items-center gap-2" id="step-indicator-1">
                        <div id="step-dot-1" style="width:36px;height:36px;border-radius:50%;background:#e46212;color:#fff;display:flex;align-items:center;justify-content:center;font-weight:700;font-size:.85rem;flex-shrink:0;">1</div>
                        <span style="font-size:.82rem;font-weight:600;color:#e46212;">Formule</span>
                    </div>
                    <div style="flex:1;height:2px;background:#e8e4dc;max-width:60px;"></div>
                    <div class="d-flex align-items-center gap-2" id="step-indicator-2">
                        <div id="step-dot-2" style="width:36px;height:36px;border-radius:50%;background:#e8e4dc;color:#999;display:flex;align-items:center;justify-content:center;font-weight:700;font-size:.85rem;flex-shrink:0;">2</div>
                        <span style="font-size:.82rem;font-weight:600;color:#aaa;" id="step-label-2">Vos infos</span>
                    </div>
                    <div style="flex:1;height:2px;background:#e8e4dc;max-width:60px;"></div>
                    <div class="d-flex align-items-center gap-2" id="step-indicator-3">
                        <div id="step-dot-3" style="width:36px;height:36px;border-radius:50%;background:#e8e4dc;color:#999;display:flex;align-items:center;justify-content:center;font-weight:700;font-size:.85rem;flex-shrink:0;">3</div>
                        <span style="font-size:.82rem;font-weight:600;color:#aaa;" id="step-label-3">Récapitulatif</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Wizard card -->
        <div class="row justify-content-center">
            <div class="col-md-7">
                <div class="card shadow-sm border-0 rounded-lg">
                    <div class="card-body p-4 p-md-5">

                        <!-- STEP 1 -->
                        <div id="wizard-step-1">
                            <h5 class="fw-bold mb-1">Choisissez votre formule</h5>
                            <p class="text-muted mb-4" style="font-size:.9rem;">Sélectionnez le niveau de soutien mensuel qui vous convient.</p>
                            <div class="row g-3 mb-4">
                                <div class="col-md-4">
                                    <input type="radio" class="btn-check" name="formule" id="formule-essentiel" value="essentiel" autocomplete="off" checked>
                                    <label class="card text-center p-3 w-100" for="formule-essentiel" style="cursor:pointer;border:2px solid #e8e4dc;border-radius:1rem;transition:border-color .2s;">
                                        <p class="fw-bold mb-1 mt-2">Essentiel</p>
                                        <h3 class="fw-bold text-danger mb-0">30€</h3>
                                        <p class="text-muted mb-2" style="font-size:.78rem;">/mois</p>
                                    </label>
                                </div>
                                <div class="col-md-4">
                                    <input type="radio" class="btn-check" name="formule" id="formule-complet" value="complet" autocomplete="off">
                                    <label class="card text-center p-3 w-100" for="formule-complet" style="cursor:pointer;border:2px solid #e8e4dc;border-radius:1rem;transition:border-color .2s;">
                                        <p class="fw-bold mb-1">Complet</p>
                                        <h3 class="fw-bold text-danger mb-0">50€</h3>
                                        <p class="text-muted mb-2" style="font-size:.78rem;">/mois</p>
                                    </label>
                                </div>
                                <div class="col-md-4">
                                    <input type="radio" class="btn-check" name="formule" id="formule-premium" value="premium" autocomplete="off">
                                    <label class="card text-center p-3 w-100" for="formule-premium" style="cursor:pointer;border:2px solid #e8e4dc;border-radius:1rem;transition:border-color .2s;">
                                        <p class="fw-bold mb-1 mt-2">Premium</p>
                                        <h3 class="fw-bold text-danger mb-0">75€</h3>
                                        <p class="text-muted mb-2" style="font-size:.78rem;">/mois</p>
                                    </label>
                                </div>
                            </div>
                            <div class="d-flex justify-content-end">
                                <button class="btn btn-danger px-5" onclick="goToStep(2)">Continuer <i class="bx bx-right-arrow-alt ms-1"></i></button>
                            </div>
                        </div>

                        <!-- STEP 2 -->
                        <div id="wizard-step-2" style="display:none;">
                            <h5 class="fw-bold mb-1">Vos informations</h5>
                            <p class="text-muted mb-4" style="font-size:.9rem;">Renseignez vos coordonnées pour finaliser votre parrainage.</p>
                            <div class="row g-3 mb-3">
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold" style="font-size:.85rem;">Prénom <span class="text-danger">*</span></label>
                                    <input type="text" id="sponsor-prenom" class="form-control" placeholder="Marie">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold" style="font-size:.85rem;">Nom <span class="text-danger">*</span></label>
                                    <input type="text" id="sponsor-nom" class="form-control" placeholder="Dupont">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold" style="font-size:.85rem;">Email <span class="text-danger">*</span></label>
                                    <input type="email" id="sponsor-email" class="form-control" placeholder="marie@exemple.fr">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold" style="font-size:.85rem;">Téléphone</label>
                                    <input type="tel" id="sponsor-tel" class="form-control" placeholder="+33 6 00 00 00 00">
                                </div>
                                <div class="col-12">
                                    <label class="form-label fw-semibold" style="font-size:.85rem;">Pays <span class="text-danger">*</span></label>
                                    <select id="sponsor-pays" class="form-select">
                                        <option value="">Sélectionnez votre pays</option>
                                        <option>France</option><option>Cameroun</option><option>Belgique</option>
                                        <option>Suisse</option><option>Canada</option><option>Autre</option>
                                    </select>
                                </div>
                                <div class="col-12">
                                    <label class="form-label fw-semibold" style="font-size:.85rem;">Message (optionnel)</label>
                                    <textarea id="sponsor-message" class="form-control" rows="3" placeholder="Un mot pour votre filleule ou pour l'équipe ALVFF…"></textarea>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between mt-4">
                                <button class="btn btn-outline-secondary px-4" onclick="goToStep(1)"><i class="bx bx-left-arrow-alt me-1"></i> Retour</button>
                                <button class="btn btn-danger px-5" onclick="goToStep(3)">Continuer <i class="bx bx-right-arrow-alt ms-1"></i></button>
                            </div>
                        </div>

                        <!-- STEP 3 -->
                        <div id="wizard-step-3" style="display:none;">
                            <h5 class="fw-bold mb-1">Récapitulatif</h5>
                            <p class="text-muted mb-4" style="font-size:.9rem;">Vérifiez vos informations avant de confirmer.</p>
                            <div style="background:#f5f2ea;border-radius:1rem;padding:1.4rem 1.6rem;" class="mb-4">
                                <p class="fw-bold mb-3" style="font-size:.8rem;letter-spacing:1.5px;text-transform:uppercase;color:#888;">Formule choisie</p>
                                <div class="d-flex align-items-center gap-3 mb-4">
                                    <div style="width:44px;height:44px;border-radius:50%;background:#e46212;display:flex;align-items:center;justify-content:center;">
                                        <i class="bx bxs-heart" style="color:#fff;font-size:1.3rem;"></i>
                                    </div>
                                    <div>
                                        <p class="fw-bold mb-0" id="summary-formule">—</p>
                                        <p class="mb-0 text-danger fw-bold" id="summary-montant">—</p>
                                    </div>
                                </div>
                                <hr style="border-color:#e8e4dc;">
                                <p class="fw-bold mb-3 mt-3" style="font-size:.8rem;letter-spacing:1.5px;text-transform:uppercase;color:#888;">Vos coordonnées</p>
                                <div class="row g-2" style="font-size:.88rem;">
                                    <div class="col-6"><p class="mb-1 text-muted">Prénom</p><p class="fw-semibold mb-0" id="summary-prenom">—</p></div>
                                    <div class="col-6"><p class="mb-1 text-muted">Nom</p><p class="fw-semibold mb-0" id="summary-nom">—</p></div>
                                    <div class="col-6"><p class="mb-1 text-muted">Email</p><p class="fw-semibold mb-0" id="summary-email">—</p></div>
                                    <div class="col-6"><p class="mb-1 text-muted">Pays</p><p class="fw-semibold mb-0" id="summary-pays">—</p></div>
                                </div>
                            </div>
                            <p class="text-muted mb-4" style="font-size:.8rem;">
                                <i class="bx bxs-lock-alt me-1 text-success"></i>
                                Vos données sont sécurisées. Vous recevrez une confirmation par email après validation.
                            </p>
                            <div class="d-flex justify-content-between">
                                <button class="btn btn-outline-secondary px-4" onclick="goToStep(2)"><i class="bx bx-left-arrow-alt me-1"></i> Retour</button>
                                <button class="btn btn-danger px-5" onclick="submitSponsorship()"><i class="bx bxs-heart me-1"></i> Confirmer le parrainage</button>
                            </div>
                        </div>

                        <!-- SUCCESS -->
                        <div id="wizard-success" style="display:none;" class="text-center py-4">
                            <div style="width:70px;height:70px;border-radius:50%;background:#e3eee5;display:flex;align-items:center;justify-content:center;margin:0 auto 1.2rem;">
                                <i class="bx bxs-check-circle" style="font-size:2.4rem;color:#3f8834;"></i>
                            </div>
                            <h4 class="fw-bold mb-2">Merci pour votre engagement !</h4>
                            <p class="text-muted">Votre demande de parrainage a été reçue. Notre équipe vous contactera sous 48h pour finaliser votre parrainage.</p>
                            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn btn-success mt-2">Retour à l'accueil</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
const formuleData = {
    essentiel: { label: 'Essentiel', montant: '30€ / mois' },
    complet:   { label: 'Complet',   montant: '50€ / mois' },
    premium:   { label: 'Premium',   montant: '75€ / mois' },
};
function goToStep(step) {
    if (step === 3) {
        const prenom = document.getElementById('sponsor-prenom').value.trim();
        const nom    = document.getElementById('sponsor-nom').value.trim();
        const email  = document.getElementById('sponsor-email').value.trim();
        const pays   = document.getElementById('sponsor-pays').value;
        if (!prenom || !nom || !email || !pays) { alert('Veuillez remplir tous les champs obligatoires (*).'); return; }
        const formule = document.querySelector('input[name="formule"]:checked').value;
        document.getElementById('summary-formule').textContent = formuleData[formule].label;
        document.getElementById('summary-montant').textContent = formuleData[formule].montant;
        document.getElementById('summary-prenom').textContent  = prenom;
        document.getElementById('summary-nom').textContent     = nom;
        document.getElementById('summary-email').textContent   = email;
        document.getElementById('summary-pays').textContent    = pays;
    }
    [1,2,3].forEach(s => {
        document.getElementById('wizard-step-' + s).style.display = (s === step) ? 'block' : 'none';
        const dot   = document.getElementById('step-dot-'   + s);
        const label = document.getElementById('step-label-' + s);
        if (s < step)       { dot.style.background='#3f8834'; dot.style.color='#fff'; dot.innerHTML='<i class="bx bx-check" style="font-size:1.1rem;"></i>'; }
        else if (s === step){ dot.style.background='#e46212'; dot.style.color='#fff'; dot.textContent=s; }
        else                { dot.style.background='#e8e4dc'; dot.style.color='#999'; dot.textContent=s; }
        if (label) label.style.color = (s <= step) ? '#e46212' : '#aaa';
    });
}
document.querySelectorAll('input[name="formule"]').forEach(radio => {
    radio.addEventListener('change', function () {
        document.querySelectorAll('label[for^="formule-"]').forEach(l => l.style.borderColor = '#e8e4dc');
        document.querySelector('label[for="' + this.id + '"]').style.borderColor = '#e46212';
    });
});
document.querySelector('label[for="formule-essentiel"]').style.borderColor = '#e46212';
function submitSponsorship() {
    [1,2,3].forEach(s => document.getElementById('wizard-step-' + s).style.display = 'none');
    document.getElementById('wizard-success').style.display = 'block';
    [1,2,3].forEach(s => {
        const dot = document.getElementById('step-dot-' + s);
        dot.style.background='#3f8834'; dot.style.color='#fff';
        dot.innerHTML='<i class="bx bx-check" style="font-size:1.1rem;"></i>';
    });
}
</script>

<?php get_footer(); ?>
