<?php
/**
 * Template Name: Benevole
 *
 * Place this file in your alvff-theme/ folder.
 * Then in WordPress admin: Pages → Edit "Mission" → Page Attributes → Template → "Notre Mission"
 */
get_header();
?>


<!-- Hero -->
<section class="py-7 text-white" style="background-image: url('<?php bloginfo('template_directory');?>/assets/img/1.jpg'); background-size: cover; background-position: center; position: relative;">
  <div style="position: absolute; inset: 0; background-color: rgba(63, 136, 52, 0.70);"></div>
  <div class="container" style="position: relative; z-index: 1;">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <p class="text-center"><span class="badge bg-danger">Get involved</span></div></p>
        <h1 class="text-center">Devenez Bénévole</h1>
        <p class="text-white text-center lead">Rejoignez notre équipe et contribuez à changer des vies</p>
        
      </div>
    </div>
  </div>
</section>
<!-- hero end -->

<section class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <p class="lead text-center">
                    Que vous soyez au Cameroun ou à l'international, votre engagement fait la différence. Ensemble, nous pouvons mettre fin aux violences faites aux femmes et aux filles.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- domaine d'engagement -->
<section class="bg-danger-light py-5 mt-0">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <h2 class="text-center fw-bold mb-4">Domaines d'engagement</h2>
            </div>
        </div>
        <div class="row justify-content-center">

            <div class="col-md-4">
                <div class="card mb-3 shadow-sm">
                    <div class="card-body d-flex">
                        <div>
                            <div class="muted-btn me-4"><i class="bx bxs-bank"></i></div>
                        </div>
                        <div>
                             <p class="lead fw-bold mb-0">Agent de terrain</p>
                        <p>Participer aux actions de sensibilisation dans les communautés.</p>
                        </div>
                       
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card mb-3 shadow-sm">
                    <div class="card-body d-flex">
                        <div>
                            <div class="muted-btn me-4"><i class="bx bxs-bank"></i></div>
                        </div>
                        <div>
                             <p class="lead fw-bold mb-0">Accompagnement psychosocial</p>
                        <p>Soutenir les survivantes dans leur parcours de guérison.</p>
                        </div>
                       
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card mb-3 shadow-sm">
                    <div class="card-body d-flex">
                        <div>
                            <div class="muted-btn me-4"><i class="bx bxs-bank"></i></div>
                        </div>
                        <div>
                             <p class="lead fw-bold mb-0">Éducation</p>
                        <p>Animer des ateliers éducatifs pour les jeunes filles.</p>
                        </div>
                       
                    </div>
                </div>
            </div>


        </div>

        <div class="row justify-content-center">

            <div class="col-md-4">
                <div class="card mb-3 shadow-sm">
                    <div class="card-body d-flex">
                        <div>
                            <div class="muted-btn me-4"><i class="bx bxs-bank"></i></div>
                        </div>
                        <div>
                             <p class="lead fw-bold mb-0">Communication</p>
                        <p>Documenter et partager nos actions sur les réseaux.</p>
                        </div>
                       
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card mb-3 shadow-sm">
                    <div class="card-body d-flex">
                        <div>
                            <div class="muted-btn me-4"><i class="bx bxs-bank"></i></div>
                        </div>
                        <div>
                             <p class="lead fw-bold mb-0">Plaidoyer</p>
                        <p>Porter la voix des femmes auprès des décideurs.</p>
                        </div>
                       
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card mb-3 shadow-sm">
                    <div class="card-body d-flex">
                        <div>
                            <div class="muted-btn me-4"><i class="bx bxs-bank"></i></div>
                        </div>
                        <div>
                             <p class="lead fw-bold mb-0">Bénévole international</p>
                        <p>Contribuer depuis l'étranger à notre mission.</p>
                        </div>
                       
                    </div>
                </div>
            </div>


        </div>


    </div>
</section>

<!-- formulaire d'enregistrement -->
 <section class="py-5 bg-danger-light mt-0">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <h3 class="text-center card-title pt-4">Formulaire de candidature</h3>
                    <p class="text-center mt-0 mb-3">Remplissez ce formulaire et nous vous contacterons rapidement.</p>
                    <div class="card-body">
                        <form action="">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="" class="form-label ">Prénom</label>
                                    <input type="text" class="form-control mb-3" placeholder="Prénom">
                                </div>
                                 <div class="col-md-6">
                                    <label for="" class="form-label">Nom</label>
                                    <input type="text" class="form-control mb-3" placeholder="Nom">
                                </div>
                                <div class="col-md-6">
                                    <label for="" class="form-label">Email</label>
                                    <input type="email" class="form-control mb-3" placeholder="Email">
                                </div>
                                 <div class="col-md-6">
                                    <label for="" class="form-label">Numero de Telephone</label>
                                    <input type="Number" class="form-control mb-3" placeholder="Tel">
                                </div>
                                <div class="col-md-6">
                                    <label for="" class="form-label">Pays</label>
                                    <input type="text" class="form-control mb-3" placeholder="pays">
                                </div>
                                <div class="col-md-6">
                                    <label for="" class="form-label">Ville</label>
                                    <input type="text" class="form-control mb-3" placeholder="Ville">
                                </div>
                                <div class="col-md-12">
                                    <label for="" class="form-label">Domaine d'intérêt</label>
                                    <div class="mb-3">
                                        <select
                                            class="form-select form-select mb-3"
                                            name=""
                                            id=""
                                        >
                                            <option selected>Agent de terrain</option>
                                            <option value="">Accompagnement psychosocial</option>
                                            <option value="">Èducation</option>
                                            <option value="">Communication</option>
                                            <option value="">Plaidoyer</option>
                                            <option value="">Bénévole international</option>
                                        </select>
                                    </div>
                                    
                                </div>

                                <div class="col-md-12">
                                    <label for="" class="form-label">
                                        Votre motivation
                                    </label>
                                    <textarea name="" class="form-control mb-3" id=""></textarea>
                                </div>

                                <div class="col-md-12">
                                    <button class="btn btn-danger w-100">
                                       <span class="bx bx-envelope me-2"></span> Envoyer ma candidature
                                    </button>
                                </div>


                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
 </section>
 <!-- formulaire d'enregistrement -->
<?php get_footer();?>