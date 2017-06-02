<?php

// register default elgg events
elgg_register_event_handler('plugins_boot', 'system', 'imagick_plugins_boot');

/**
 * Act on plugins boot
 *
 * @return void
 */
function imagick_plugins_boot() {

	if (!extension_loaded('imagick')) {
		// imagick isn't loaded so don't do anything
		return;
	}
	
	$sp = _elgg_services();
	$sp->setFactory('imageService', function($sp) {
		$imagine = new \Imagine\Imagick\Imagine();
		return new \Elgg\ImageService($imagine, $sp->config);
	});
}
