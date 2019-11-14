<?php declare(strict_types=1);

use Tester\Environment;

require __DIR__ . '/../vendor/autoload.php';
Environment::setup();
date_default_timezone_set('Europe/Prague');
\Doctrine\Common\Annotations\AnnotationRegistry::registerAutoloadNamespace(
    'JMS\Serializer\Annotation', __DIR__ . '/../vendor/jms/serializer/src'
);
