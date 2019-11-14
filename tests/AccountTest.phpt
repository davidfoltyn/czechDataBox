<?php declare(strict_types=1);

namespace HelpPC\Test\CzechDataBox;

use HelpPC\CzechDataBox\Manager;
use Tester\Assert;
use Tester\TestCase;

require_once __DIR__ . '/bootstrap.php';

class AccountTest extends TestCase
{
    /** @var Manager */
    private $manager;

    public function setUp()
    {
        $self = $this;
        Assert::noError(function () use ($self) {
            $account = new \HelpPC\CzechDataBox\Connector\Account();
            $account->setPassword('fake')
                ->setLoginName('fake')
                ->setLoginType(\HelpPC\CzechDataBox\Connector\Account::LOGIN_NAME_PASSWORD)
                ->setPortalType(\HelpPC\CzechDataBox\Connector\Account::ENV_TEST);
            $self->manager = Manager::create();
            $self->manager->connect($account);
        });
    }

    public function testOne()
    {
        $self = $this;
        Assert::noError(function () use ($self) {
            $ownerInformation = $self->manager->box()->GetOwnerInfoFromLogin();
            Assert::true($ownerInformation->getStatus()->isOk());
            Assert::true($self->manager->box()->GetPasswordExpirationInfo()->getStatus()->isOk());
        });
    }

}

(new AccountTest())->run();