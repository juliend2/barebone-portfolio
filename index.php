<?php define( 'WP_USE_THEMES', false );
get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<div class="container">

    <?php if (is_single()): ?>
        <!-- single entry -->
        <div class="row">
            <div class="col-12">
                <h2><?php the_title(); ?></h2>
                <section class="content">
                    <?php the_content(); ?>
                </section>
                <nav><a href="<?php echo bloginfo('home') ?>">Back</a></nav>
            </div>
        </div>
    <?php else: ?>
        <!-- looping -->
        <a href="<?php the_permalink() ?>">
        <?php if (has_post_thumbnail( $post->ID ) ): ?>
            <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
            <img src='<?php echo $image[0]; ?>' class="img-fluid" />
        <?php endif; ?>
        </a>

    <?php endif ?>

</div><!-- /container -->

<?php endwhile; else : ?>
	<p><?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif; ?>

<?php get_footer() ?>