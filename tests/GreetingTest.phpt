<?php declare(strict_types=1);

namespace HelpPC\Test\CzechDataBox;

use HelpPC\CzechDataBox\Connector\DataBox;
use HelpPC\CzechDataBox\Connector\DataMessage;
use HelpPC\CzechDataBox\Connector\SearchDataBox;
use HelpPC\CzechDataBox\Enum\LoginTypeEnum;
use HelpPC\CzechDataBox\Enum\PortalTypeEnum;
use HelpPC\Serializer\SerializerFactory;
use Tester\Assert;
use Tester\TestCase;


require_once __DIR__ . '/bootstrap.php';

class GreetingTest extends TestCase
{
     public function testOne()
    {
        $self = $this;
        Assert::noError(function () use ($self) {
            $account = new \HelpPC\CzechDataBox\Connector\Account();
            $account->setPassword(getenv('ISDS_PASSWORD'))
                ->setLoginName(getenv('ISDS_LOGIN'))
                ->setLoginType(LoginTypeEnum::get(LoginTypeEnum::LOGIN_NAME_PASSWORD))
                ->setPortalType(PortalTypeEnum::get(PortalTypeEnum::CZEBOX));
            $client = new \Symfony\Component\HttpClient\HttpClient();
            $serializer = SerializerFactory::create();
            $dataBox = new DataBox($serializer, $client);
            $dataMessage = new DataMessage($serializer, $client);
            $searchDataBox = new SearchDataBox($serializer, $client);
            $manager = new \HelpPC\CzechDataBox\Manager($dataBox, $dataMessage, $searchDataBox);
        });
    }

}

(new GreetingTest())->run();
