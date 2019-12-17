<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>


<header>
    <div class="container">
        <div class="row">
            <div class="header_top">
                <div class="col-md-1">
                    <div class="logo_img" style="margin: 5px 0 0 20px;">
                        <a href="#"><?php the_custom_logo(); ?></a>
                    </div>
                </div>

                <div class="col-md-11">

                    <div class="menu_bar">
                        <nav role="navigation" class="navbar navbar-default">
                            <div class="navbar-header">
                                <button aria-controls="navbar" aria-expanded="false" data-target="#navbar"
                                        data-toggle="collapse" class="navbar-toggle collapsed" type="button">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                            </div>

                            <div class="collapse navbar-collapse" id="navbar">
								<?php wp_nav_menu( array(
									'theme_location' => 'header-menu',
									'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
									'menu_class'     => 'nav navbar-nav',
									'menu_id'        => 'menu',
									'depth'          => 2
								) ); ?>
                            </div>
                        </nav>
                    </div>

                </div>

            </div>
        </div>
    </div>
</header>
