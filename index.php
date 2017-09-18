<?php

/**
 *  Slim Application setting
 *  and bootstrapping
 */

use PHPMailer\PHPMailer\PHPMailer;

// Require composer autoloader
require __DIR__ . '/vendor/autoload.php';


// Application settings
$settings = require __DIR__ . '/app/settings.php';


// New Slim app instance
$app = new Slim\App( $settings );


// Add our dependencies to the container
require __DIR__ . '/app/dependencies.php';


// Require our route
require __DIR__ . '/app/routes.php';


// Run Slim
$app->run();