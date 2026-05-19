<?php
/**
 * The template for displaying static pages.
 */
get_header();
?>

<section class="py-5 mt-5">
  <div class="container">
    <?php while ( have_posts() ) : the_post(); ?>
    <div class="row justify-content-center">
      <div class="col-md-9">
        <h1 class="fw-bold mb-4"><?php the_title(); ?></h1>
        <?php if ( has_post_thumbnail() ) : ?>
          <?php the_post_thumbnail( 'alvff-carousel', array( 'class' => 'img-fluid rounded-lg mb-4 w-100' ) ); ?>
        <?php endif; ?>
        <div class="page-content">
          <?php the_content(); ?>
        </div>
      </div>
    </div>
    <?php endwhile; ?>
  </div>
</section>

<?php get_footer(); ?>
