<!DOCTYPE html>

<html class="no-js" <?php language_attributes(); ?>>

	<head>

		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1.0" >

		<link rel="profile" href="https://gmpg.org/xfn/11">

		<?php wp_head(); ?>

	</head>

	<body <?php body_class(); ?>>

		<?php
		wp_body_open();
		?>

        <header class="container">
            <div class="row">
                <h1 class="col-sm-8 mt-4">
		    <a href="<?php bloginfo('url') ?>"><?php echo bloginfo('title') ?></a>
                </h1>
                <nav class="col-sm-4">
                    <?php wp_nav_menu() ?>
                </nav>
            </div>
        </header>
