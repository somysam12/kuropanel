<?php

// Path to the front controller (this file)
define('FCPATH', __DIR__ . DIRECTORY_SEPARATOR);

/*
 *---------------------------------------------------------------
 * BOOTSTRAP THE APPLICATION
 *---------------------------------------------------------------
 * This process sets up the path constants, loads the vendor
 * autoload file, and kicks off the CodeIgniter engine.
 */

// Load our paths config file
$pathsConfig = FCPATH . '../app/Config/Paths.php';
require realpath($pathsConfig) ?: $pathsConfig;

$paths = new Config\Paths();

// Location of the framework bootstrap file.
$bootstrap = rtrim($paths->systemDirectory, '\\/ ') . DIRECTORY_SEPARATOR . 'bootstrap.php';

$app = require realpath($bootstrap) ?: $bootstrap;

/*
 *---------------------------------------------------------------
 * LAUNCH THE APPLICATION
 *---------------------------------------------------------------
 * Now that everything is setup, feel free to sit back and
 * relax while the application is launched.
 */

echo "Handled by CI4"; $app->run();
