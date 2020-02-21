<?php define( 'WP_USE_THEMES', false );
get_header(); ?>

<div class="container <?php echo is_single() ? 'single' : 'plural' ?>">
    <?php if (is_single()): ?>
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>


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


	<?php endwhile; else : ?>
		<p><?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?></p>
	<?php endif; ?>

    <?php else: ?>
        <!-- looping -->
	<div class="row">
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<div class="col-sm-6">
			<h2 class="mt-4"><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h2>
			<a href="<?php the_permalink() ?>">
			<?php if (has_post_thumbnail( $post->ID ) ): ?>
			    <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
			    <img src='<?php echo $image[0]; ?>' class="img-fluid" />
			<?php endif; ?>
			</a>
		</div>
	<?php endwhile; else : ?>
		<p><?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?></p>
	<?php endif; ?>
	</div>

    <?php endif ?>
</div><!-- /container -->

<?php get_footer() ?>
