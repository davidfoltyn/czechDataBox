<?php

use HelpPC\CzechDataBox\Connector\DataBox;
use HelpPC\CzechDataBox\Connector\DataMessage;
use HelpPC\CzechDataBox\Connector\Dispatcher;
use HelpPC\CzechDataBox\Connector\SearchDataBox;
use HelpPC\Serializer\SerializerFactory;

if(file_exists('../../../autoload.php')){
    require_once '../../../autoload.php';
    \Doctrine\Common\Annotations\AnnotationRegistry::registerAutoloadNamespace(
        'JMS\Serializer\Annotation', __DIR__ . '/../../../jms/serializer/src'
    );
}else{
    require_once '../vendor/autoload.php';
    \Doctrine\Common\Annotations\AnnotationRegistry::registerAutoloadNamespace(
        'JMS\Serializer\Annotation', __DIR__ . '/../vendor/jms/serializer/src'
    );
}
$console = new \Symfony\Component\Console\Output\ConsoleOutput();
if (file_exists(__DIR__ . '/../tests/config.local.yaml')) {
    $config = \Symfony\Component\Yaml\Yaml::parse(file_get_contents(__DIR__ . '/../tests/config.local.yaml'));
} else {
    $config = \Symfony\Component\Yaml\Yaml::parse(file_get_contents(__DIR__ . '/../tests/config.yaml'));
}
$type = 'fo';
define('ISDS_USER', $config[$type]['login']);
define('ISDS_PASS', $config[$type]['password']);
define('ISDS_ID', $config[$type]['id']);
$account = new \HelpPC\CzechDataBox\Connector\Account();
try {
    $account->setPassword(ISDS_PASS)
        ->setLoginName(ISDS_USER)
        ->setLoginType(\HelpPC\CzechDataBox\Connector\Account::LOGIN_NAME_PASSWORD)
        ->setPortalType(\HelpPC\CzechDataBox\Connector\Account::ENV_TEST);
} catch (\HelpPC\CzechDataBox\Exception\BadOptionException $exception) {
    die($exception->getMessage());
}
$client = new Dispatcher();
$serializer = SerializerFactory::create();
$dataBox = new DataBox($serializer, $client);
$dataMessage = new DataMessage($serializer, $client);
$searchDataBox = new SearchDataBox($serializer, $client);
$manager = new \HelpPC\CzechDataBox\Manager($dataBox, $dataMessage, $searchDataBox);