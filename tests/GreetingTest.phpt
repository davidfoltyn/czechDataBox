<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: Tomas Kulhanek
 * Email: info@tirus.cz
 *
 */

namespace HelpPC\Test\CzechDataBox;

use HelpPC\CzechDataBox\Connector\DataBox;
use HelpPC\CzechDataBox\Connector\DataMessage;
use HelpPC\CzechDataBox\Connector\Dispatcher;
use HelpPC\CzechDataBox\Connector\SearchDataBox;
use HelpPC\CzechDataBox\Exception\BadOptionException;
use HelpPC\Serializer\SerializerFactory;
use Tester\Assert;
use Tester\TestCase;


require_once __DIR__ . '/bootstrap.php';

class GreetingTest extends TestCase
{
     public function testOne()
    {
        $badOption = 'badOption';
        Assert::exception(function () use ($badOption) {
            $account = new \HelpPC\CzechDataBox\Connector\Account();
            $account
                ->setLoginType($badOption);
        }, BadOptionException::class, sprintf('The value %s is not allowed. Use one of Account::LOGIN_CERT Account::LOGIN_HOSTED_SPIS Account::LOGIN_NAME_PASSWORD', $badOption));
        Assert::exception(function () use ($badOption) {
            $account = new \HelpPC\CzechDataBox\Connector\Account();
            $account
                ->setPortalType($badOption);
        }, BadOptionException::class, sprintf('The value %s is not allowed. Use one of Account::ENV_PROD Account::ENV_TEST', $badOption));

        $self = $this;
        Assert::noError(function () use ($self) {
            $config = \Symfony\Component\Yaml\Yaml::parse(file_get_contents(__DIR__ . '/config.yaml'));

            $account = new \HelpPC\CzechDataBox\Connector\Account();
            $account->setPassword(getenv('ISDS_PASSWORD'))
                ->setLoginName(getenv('ISDS_LOGIN'))
                ->setLoginType(\HelpPC\CzechDataBox\Connector\Account::LOGIN_NAME_PASSWORD)
                ->setPortalType(\HelpPC\CzechDataBox\Connector\Account::ENV_TEST);
            $client = new Dispatcher();
            $serializer = SerializerFactory::create();
            $dataBox = new DataBox($serializer, $client);
            $dataMessage = new DataMessage($serializer, $client);
            $searchDataBox = new SearchDataBox($serializer, $client);
            $manager = new \HelpPC\CzechDataBox\Manager($dataBox, $dataMessage, $searchDataBox);
        });
    }

}

(new GreetingTest())->run();