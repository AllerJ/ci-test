<!DOCTYPE html>
<html>
  <head>
	<title>Distance & Time</title>

	<?php include('pwa.php'); ?>

	<?= link_tag('/vendor/uikit/css/uikit.min.css'); ?>
	<?= link_tag('/css/theme.css'); ?>

	<?= script_tag('/vendor/uikit/js/uikit.min.js'); ?>
	<?= script_tag('/vendor/uikit/js/uikit-icons.min.js'); ?>
	<?= script_tag('https://maps.googleapis.com/maps/api/js?key='.getenv('GOOGLE_API_PLACE').'&libraries=places'); ?>

  </head>

  <body>
	<nav class="uk-navbar-container uk-section-primary uk-navbar-transparent uk-margin uk-margin-remove-bottom" uk-navbar>
	  <div class="uk-navbar-center">
		<a class="uk-navbar-item uk-logo" href="/"><img src="/images/dis-time-logo.svg"></a>
	  </div>
	</nav>
