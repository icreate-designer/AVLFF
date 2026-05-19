<?php
/**
 * The template for displaying single posts.
 */
get_header();
?>

<section class="py-5 mt-5">
  <div class="container">
    <div class="row">
      <div class="col-md-8">
        <?php while ( have_posts() ) : the_post(); ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
          <p class="text-danger text-sm"><?php the_category( ', ' ); ?></p>
          <h1 class="fw-bold"><?php the_title(); ?></h1>
          <p class="text-sm text-muted mb-4"><?php echo get_the_date(); ?> &middot; <?php the_author(); ?></p>

          <?php if ( has_post_thumbnail() ) : ?>
            <?php the_post_thumbnail( 'alvff-carousel', array( 'class' => 'img-fluid rounded-lg mb-4 w-100' ) ); ?>
          <?php endif; ?>

          <div class="post-content">
            <?php the_content(); ?>
          </div>

          <div class="mt-5">
            <?php the_tags( '<p class="text-sm">' . __( 'Tags: ', 'alvff-theme' ), ', ', '</p>' ); ?>
          </div>
        </article>

        <div class="mt-5 d-flex justify-content-between">
          <?php previous_post_link( '<a class="btn btn-outline-secondary btn-sm">&larr; %link</a>' ); ?>
          <?php next_post_link( '<a class="btn btn-outline-secondary btn-sm">%link &rarr;</a>' ); ?>
        </div>

        <?php if ( comments_open() || get_comments_number() ) : ?>
          <div class="mt-5">
            <?php comments_template(); ?>
          </div>
        <?php endif; ?>

        <?php endwhile; ?>
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
