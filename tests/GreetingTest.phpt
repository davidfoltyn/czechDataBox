<?php declare(strict_types=1);

namespace HelpPC\Test\CzechDataBox;

use HelpPC\CzechDataBox\Connector\DataBox;
use HelpPC\CzechDataBox\Connector\DataMessage;
use HelpPC\CzechDataBox\Connector\SearchDataBox;
use HelpPC\CzechDataBox\Exception\BadOptionException;
use HelpPC\CzechDataBox\Manager;
use Tester\Assert;
use Tester\TestCase;

require_once __DIR__ . '/bootstrap.php';

class GreetingTest extends TestCase
{
    /** @var Manager */
    private $manager;

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
            $account->setPassword($config['ovm']['password'])
                ->setLoginName($config['ovm']['login'])
                ->setLoginType(\HelpPC\CzechDataBox\Connector\Account::LOGIN_NAME_PASSWORD)
                ->setPortalType(\HelpPC\CzechDataBox\Connector\Account::ENV_TEST);
            $self->manager = Manager::create();
            $self->manager->connect($account);
        });
    }

    public function testTwo()
    {
        Assert::type(DataMessage::class, $this->manager->message());
        Assert::type(SearchDataBox::class, $this->manager->search());
        Assert::type(DataBox::class, $this->manager->box());
    }

    public function testThree()
    {
        Assert::true($this->manager->message()->isConnected());
    }

}

(new GreetingTest())->run();