<?php declare(strict_types=1);

use Tester\Environment;

require_once '../vendor/autoload.php';
\Doctrine\Common\Annotations\AnnotationRegistry::registerAutoloadNamespace(
    'JMS\Serializer\Annotation', __DIR__ . '/../vendor/jms/serializer/src'
);
Environment::setup();
date_default_timezone_set('Europe/Prague');