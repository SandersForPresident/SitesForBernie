<!doctype html>
<html class="no-js" <?php language_attributes(); ?>>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
  </head>
  <body <?php body_class(); ?>>

    <header>
      <div class="container">
        <a href="/" class="logo"><img src="http://placehold.it/200x100" /></a>
        <nav>
          <?php wp_nav_menu(array('menu' => 'header')); ?>
        </nav>
      </div>
    </header>
