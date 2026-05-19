<?php
/**
 * Template Name: contact
 */
get_header();
?>

<!-- Hero -->
<section class="py-7 bg-success text-white">
  
  <div class="container" style="z-index: 1;">
    <div class="row">
      <div class="col-md-6">
        <p class="text-sm text-white">Contacter-nous</p>
        <h1>Nous Sommes à Votre Écoute</h1>
        <p class="text-white">
          N'hésitez pas à nous contacter pour toute question, suggestion ou demande de partenariat.
        </p>
      </div>
    </div>
  </div>
</section>
<!-- Hero End -->

<!-- Contact Section -->
<section class="py-5 bg-light">
  <div class="container">
    <div class="row g-4">

      <!-- LEFT: Form -->
      <div class="col-md-7">
        <div class="card h-100">
          <h3 class="text-center card-title pt-4 mb-3 px-3">
            Envoyez-nous un message
          </h3>

          <div class="card-body">
            <form action="" method="post">

              <div class="row">

                <div class="col-md-6">
                  <label class="form-label">Prénom</label>
                  <input type="text" class="form-control mb-3" name="prenom" placeholder="Prénom">
                </div>

                <div class="col-md-6">
                  <label class="form-label">Nom</label>
                  <input type="text" class="form-control mb-3" name="nom" placeholder="Nom">
                </div>

                <div class="col-md-6">
                  <label class="form-label">Email</label>
                  <input type="email" class="form-control mb-3" name="email" placeholder="Email">
                </div>

                <div class="col-md-6">
                  <label class="form-label">Numéro de Téléphone</label>
                  <input type="tel" class="form-control mb-3" name="telephone" placeholder="Tel">
                </div>

              

                <div class="col-md-12">
                  <label class="form-label">Sujet</label>
                  <select class="form-select mb-3" name="sujet">
                    <option selected>Demande générale</option>
                    <option>Don / Parrainage</option>
                    <option>Bénévolat</option>
                    <option>Partenariat</option>
                    <option>Presse / Media</option>
                    <option>Demande d'aide</option>
                  </select>
                </div>

                <div class="col-md-12">
                  <label class="form-label">Message</label>
                  <textarea class="form-control mb-3" name="message" rows="4"></textarea>
                </div>

                <div class="col-md-12">
                  <button type="submit" class="btn btn-danger w-100">
                    <i class="bx bx-send me-2"></i> Envoyer le message
                  </button>
                </div>

              </div>

            </form>
          </div>
        </div>
      </div>

      <!-- RIGHT: Address -->
      <div class="col-md-5">
        <div class="card">
          <div class="card-body">

            <ul class="list-unstyled mb-0">

              <li class="mb-4">
                <div class="d-flex">
                  <div class="me-3">
                    <div class="muted-btn">
                      <i class="bx bxs-bank"></i>
                    </div>
                  </div>
                  <div>
                    <p class="fw-bold mb-1">Adresse</p>
                    <p class="text-sm mb-0">
                      BP 213, Maroua, Extrême-Nord, Cameroun
                    </p>
                  </div>
                </div>
              </li>

              <!-- You can add more contact items here -->
              <!-- Example -->
              <li class="mb-4">
                <div class="d-flex">
                  <div class="me-3">
                    <div class="muted-btn">
                      <i class="bx bxs-phone"></i>
                    </div>
                  </div>
                  <div>
                    <p class="fw-bold mb-1">Téléphone</p>
                    <p class="text-sm mb-0">+237 XXX XXX XXX</p>
                  </div>
                </div>
              </li>

              <li class="mb-4">
                <div class="d-flex">
                  <div class="me-3">
                    <div class="muted-btn">
                      <i class="bx bxs-envelope"></i>
                    </div>
                  </div>
                  <div>
                    <p class="fw-bold mb-1">Email</p>
                    <p class="text-sm mb-0">contact@votresite.com</p>
                  </div>
                </div>
              </li>

               <li class="mb-4">
                <div class="d-flex">
                  <div class="me-3">
                    <div class="muted-btn">
                      <i class="bx bxs-watch"></i>
                    </div>
                  </div>
                  <div>
                    <p class="fw-bold mb-1">Horaire</p>
                    <p class="text-sm mb-0">Lun - Ven: 8h - 17h</p>
                  </div>
                </div>
              </li>

            </ul>

          </div>
        </div>

        <!-- social media handles -->
         <div class="card mt-3 mb-3">
            <div class="card-body">
                <h4 class="mb-3">Suivez-nous</h4>
                 <ul class="list-unstyled d-flex flex-wrap gap-2">
          <li><a href="#" aria-label="Facebook" class="text-decoration-none">
            <div class="muted-btn"><i class="bx bxl-facebook" style="font-size:1.2rem;"></i></div>
          </a></li>
          <li><a href="#" aria-label="Twitter" class="text-decoration-none">
            <div class="muted-btn"><i class="bx bxl-twitter" style="font-size:1.2rem; "></i></div>
          </a></li>
          <li><a href="#" aria-label="Instagram" class="text-decoration-none">
            <div class="muted-btn"><i class="bx bxl-instagram" style="font-size:1.2rem; "></i></div>
          </a></li>
          <li><a href="#" aria-label="LinkedIn" class="text-decoration-none">
            <div class="muted-btn"><i class="bx bxl-linkedin" style="font-size:1.2rem;"></i></div>
          </a></li>
        </ul>
            </div>
         </div>
         <!-- end of social media handles -->

         <!-- emergency number -->
          <div class="card bg-light3 border-danger">
            <div class="card-body">
                <p class="text-danger mb-0">Ligne d'Urgence</p>
                <h3 class="fw-bold mb-0 text-danger">+237 6XX XXX XXX</h3>
                <p class="text-sm text-danger">Disponible 24h/24, 7j/7</p>
            </div>
          </div>
          <!-- end of emergency number -->

      </div>

    </div>
  </div>
</section>

<!-- map -->
 <!-- Google Map Section -->
<section class="py-5">
  <div class="container">
    <div class="text-center mb-4">
      <h3>Notre Localisation</h3>
      <p class="text-muted">Retrouvez-nous à Maroua, Cameroun</p>
    </div>

    <div style="width: 100%; height: 800px;" class="rounded">
      <iframe 
        src="https://www.google.com/maps?q=Maroua,Cameroon&output=embed"
        width="100%" 
        height="100%" 
        style="border:0;" 
        allowfullscreen="" 
        loading="lazy">
      </iframe>
    </div>
  </div>
</section>
<!-- map-end -->
<?php get_footer(); ?>