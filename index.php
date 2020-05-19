<?php
define( 'WP_USE_THEMES', false );
get_header(); ?>

<div class="container <?php echo is_single() ? 'single' : 'plural' ?>">
    <?php if (is_single()): ?>
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>


        <!-- single entry -->
        <div class="row">
            <div class="col-12">
                <h2 class="mt-4"><?php the_title(); ?></h2>
                <section class="content">
                    <?php the_content(); ?>
                </section>
		<section>
		<?php
		$moods = jdbbt_get_tax_terms_string($post, 'jdbbt_mood');
		?>
		<?php if ($moods): ?>
			Mood: <?php echo $moods ?><br>
		<?php endif  ?>
		<?php
		$media = jdbbt_get_tax_terms_string($post, 'jdbbt_medium');
		?>
		<?php if ($media): ?>
			Medium: <?php echo $media ?><br>
		<?php endif  ?>
		</section>
                <nav class="mt-4"><a href="<?php echo bloginfo('home') ?>">Back</a></nav>
            </div>
        </div>


	<?php endwhile; else : ?>
		<p><?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?></p>
	<?php endif; ?>

    <?php else: ?>
        <!-- LOOP -->
	<?php if (is_tax()): ?>
		<div class="row">
			<div class="col-sm-12">
				<h2><?php echo get_the_archive_title() ?></h2>
			</div>
		</div>
	<?php endif ?>
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
	<?php if (is_tax()): ?>
	<div class="row">
		<div class="col-sm-12">
			<nav class="mt-4"><a href="<?php echo bloginfo('home') ?>">Back</a></nav>
		</div>
	</div>
	<?php endif ?>

    <?php endif ?>
</div><!-- /container -->

<?php get_footer() ?>
