<?php
  use SandersForPresident\Wordpress\Models\HeaderModel;

  $header = new HeaderModel();
?>
<!doctype html>
<html class="no-js" <?php language_attributes(); ?>>
  <head>
  	<title><?php wp_title( '|', true, 'right' ); ?></title>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href='http://fonts.googleapis.com/css?family=Muli:300,400,300italic,400italic|Merriweather:900,700,700italic' rel='stylesheet' type='text/css'>
    <link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/favicon.ico">
    <link rel="shortcut icon" sizes="196x196" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/touch-android-highres.png">
    <link rel="shortcut icon" sizes="128x128" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/touch-android.png">
    <link rel="apple-touch-icon" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/touch-ios-iphone.png">
    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/touch-ios-ipad.png">
    <link rel="apple-touch-icon" sizes="120x120" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/touch-ios-iphone-retina.png">
    <link rel="apple-touch-icon" sizes="152x152" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/touch-ios-ipad-retina.png">
    <link rel="shortcut icon" href="https://berniesanders.com/wp-content/themes/berniesanders2016/favicon.ico">
    <meta name="theme-color" content="#147FD7"/>
    <?php wp_head(); ?>
  </head>
  <body <?php body_class(); ?>>

    <?php if ($header->hasNotification()) : ?>
      <section class="notification">
        <?php if ($header->hasNotificationTitle()) : ?>
          <span><?php echo $header->getNotificationTitle(); ?> - </span>
        <?php endif; ?>
        <p><?php echo $header->getNotificationHeadline(); ?></p>
        <a href="<?php echo $header->getNotificationLink(); ?>" class="button blue">Read More</a>
      </section>
    <?php endif; ?>
    <header>
      <div class="container">
        <div class="border-wrap">
          <a href="/" class="logo"><img src="<?php echo $header->getLogo(); ?>" /></a>
          <nav>
            <?php wp_nav_menu(array('theme_location' => 'header', 'container' => false)); ?>
            <a href="https://secure.actblue.com/contribute/page/lets-go-bernie" class="button">Contribute</a>
          </nav>
        </div>
      </div>
    </header>
