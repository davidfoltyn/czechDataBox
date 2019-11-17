<?php declare(strict_types=1);
namespace HelpPC\Test\CzechDataBox;

use HelpPC\CzechDataBox\Connector\DataBox;
use HelpPC\CzechDataBox\Connector\DataMessage;
use HelpPC\CzechDataBox\Connector\Dispatcher;
use HelpPC\CzechDataBox\Connector\SearchDataBox;
use HelpPC\Serializer\SerializerFactory;
use HelpPC\Test\FakeConnector;
use Tester\Assert;
use Tester\TestCase;

require_once __DIR__ . '/bootstrap.php';

class AccountTest extends TestCase
{

    public function testOne()
    {
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

        Assert::noError(function () use ($manager, $account) {
            $ownerInformation = $manager->GetOwnerInfoFromLogin($account);
            Assert::true($ownerInformation->getStatus()->isOk());
            Assert::true($manager->GetPasswordExpirationInfo($account)->getStatus()->isOk());
        });
    }

}

(new AccountTest())->run();