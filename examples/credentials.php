<?php

use HelpPC\CzechDataBox\Connector\DataBox;
use HelpPC\CzechDataBox\Connector\DataMessage;
use HelpPC\CzechDataBox\Connector\Dispatcher;
use HelpPC\CzechDataBox\Connector\SearchDataBox;
use HelpPC\CzechDataBox\Enum\LoginTypeEnum;
use HelpPC\CzechDataBox\Enum\PortalTypeEnum;
use HelpPC\Serializer\SerializerFactory;

if(file_exists('../../../autoload.php')){
    require_once '../../../autoload.php';
}else{
    require_once '../vendor/autoload.php';
}
\Doctrine\Common\Annotations\AnnotationRegistry::registerLoader('class_exists');
$console = new \Symfony\Component\Console\Output\ConsoleOutput();

$account = new \HelpPC\CzechDataBox\Connector\Account();
$account->setPortalType(\HelpPC\CzechDataBox\Enum\PortalTypeEnum::get(\HelpPC\CzechDataBox\Enum\PortalTypeEnum::CZEBOX));
$account->setLoginType(\HelpPC\CzechDataBox\Enum\LoginTypeEnum::get(\HelpPC\CzechDataBox\Enum\LoginTypeEnum::LOGIN_HOSTED_SPIS));
$account->setCertPrivateFileName(realpath(__DIR__ . '/../../../temp/systemovy.key.pem'));
$account->setCertPublicFileName(realpath(__DIR__ . '/../../../temp/systemovy.crt.pem'));
$account->setDataBoxId('unhfjvx');
$account->setPassPhrase('Admin123');

$client = new Dispatcher();
$serializer = SerializerFactory::create();
$dataBox = new DataBox($serializer, $client);
$dataMessage = new DataMessage($serializer, $client);
$searchDataBox = new SearchDataBox($serializer, $client);
$manager = new \HelpPC\CzechDataBox\Manager($dataBox, $dataMessage, $searchDataBox);
