<?php declare(strict_types=1);

use Tester\Environment;

require_once '../vendor/autoload.php';
\Doctrine\Common\Annotations\AnnotationRegistry::registerLoader('class_exists');
Environment::setup();
date_default_timezone_set('Europe/Prague');