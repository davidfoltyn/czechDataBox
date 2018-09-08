<?php
$console = new \Symfony\Component\Console\Output\ConsoleOutput();
if (file_exists(__DIR__ . '/../tests/config.local.yaml')) {
    $config = \Symfony\Component\Yaml\Yaml::parse(file_get_contents(__DIR__ . '/../tests/config.local.yaml'));
} else {
    $config = \Symfony\Component\Yaml\Yaml::parse(file_get_contents(__DIR__ . '/../tests/config.yaml'));
}
$type = 'ovm';
define('ISDS_USER', $config[$type]['login']);
define('ISDS_PASS', $config[$type]['password']);
define('ISDS_ID', $config[$type]['id']);
\Doctrine\Common\Annotations\AnnotationRegistry::registerAutoloadNamespace(
    'JMS\Serializer\Annotation', __DIR__ . '/../vendor/jms/serializer/src'
);
$account = new \HelpPC\CzechDataBox\Connector\Account();
try {
    $account->setPassword(ISDS_PASS)
        ->setLoginName(ISDS_USER)
        ->setLoginType(\HelpPC\CzechDataBox\Connector\Account::LOGIN_NAME_PASSWORD)
        ->setPortalType(\HelpPC\CzechDataBox\Connector\Account::ENV_TEST);
} catch (\HelpPC\CzechDataBox\Exception\BadOptionException $exception) {
    die($exception->getMessage());
}

$manager = \HelpPC\CzechDataBox\Manager::create();
$manager->connect($account);