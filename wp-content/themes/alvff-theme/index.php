<?php
/**
 * The main template file (blog index / fallback).
 */
get_header();
?>

<section class="py-5 mt-5">
  <div class="container">
    <div class="row">
      <div class="col-md-8">
        <?php if ( have_posts() ) : ?>
          <h1 class="fw-bold mb-5"><?php single_cat_title( '', true ); ?></h1>
          <?php while ( have_posts() ) : the_post(); ?>
          <article id="post-<?php the_ID(); ?>" <?php post_class( 'mb-5' ); ?>>
            <?php if ( has_post_thumbnail() ) : ?>
              <a href="<?php the_permalink(); ?>">
                <?php the_post_thumbnail( 'alvff-card', array( 'class' => 'img-fluid rounded-lg mb-3 w-100' ) ); ?>
              </a>
            <?php endif; ?>
            <h2 class="fw-bold"><a class="text-dark text-decoration-none" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
            <p class="text-sm text-muted"><?php echo get_the_date(); ?> &middot; <?php the_author(); ?></p>
            <p class="text-muted-foreground"><?php the_excerpt(); ?></p>
            <a href="<?php the_permalink(); ?>" class="btn btn-outline-danger btn-sm">
              <?php esc_html_e( 'Lire la suite', 'alvff-theme' ); ?>
            </a>
          </article>
          <?php endwhile; ?>

          <div class="d-flex justify-content-between mt-4">
            <?php previous_posts_link( '<button class="btn btn-outline-secondary">&larr; ' . __( 'Plus récent', 'alvff-theme' ) . '</button>' ); ?>
            <?php next_posts_link( '<button class="btn btn-outline-secondary">' . __( 'Plus ancien', 'alvff-theme' ) . ' &rarr;</button>' ); ?>
          </div>

        <?php else : ?>
          <p><?php esc_html_e( 'Aucun article trouvé.', 'alvff-theme' ); ?></p>
        <?php endif; ?>
      </div>

      <div class="col-md-4">
        <?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
          <aside class="ps-md-4">
            <?php dynamic_sidebar( 'sidebar-1' ); ?>
          </aside>
        <?php endif; ?>
      </div>
    </div>
  </div>
</section>

<?php get_footer(); ?>
