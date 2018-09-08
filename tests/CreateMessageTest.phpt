<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: Tomas Kulhanek
 * Email: info@tirus.cz
 */

namespace HelpPC\Test\CzechDataBox;


use HelpPC\CzechDataBox\Exception\MissingMainFile;
use HelpPC\CzechDataBox\Exception\MissingRequiredField;
use HelpPC\CzechDataBox\Manager;
use HelpPC\Serializer\SerializerFactory;
use HelpPC\Test\FakeConnector;
use Tester\Assert;
use Tester\Environment;
use Tester\TestCase;

require_once __DIR__ . '/bootstrap.php';

class CreateMessageTest extends TestCase
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
                ->setPortalType(\HelpPC\CzechDataBox\Connector\Account::ENV_FAKE);
            $self->manager = Manager::create();
            $self->manager->connect($account);
        });
    }

    public function testOne()
    {
        $self = $this;

        Assert::exception(function () use ($self) {
            $createMessage = new \HelpPC\CzechDataBox\Request\CreateMessage();
            $createMessage
                ->setEnvelope((new \HelpPC\CzechDataBox\Entity\Envelope()));
            $createMessage->getEnvelope()
                ->setAnnotation('Test message - ' . date('Y-m-d'));
            $recipient = new \HelpPC\CzechDataBox\Entity\Recipient();
            $recipient->setDataBoxId('pokus')
                ->setToHand('toHandRec')
                ->setOrgUnitNum(1000)
                ->setOrgUnit('orgUnitRec');
            $createMessage->addRecipient($recipient);
            /** @var \HelpPC\CzechDataBox\Response\CreateMessage $res */
            $self->manager->message()->CreateMessage($createMessage);
        }, MissingMainFile::class);

        Assert::exception(function () use ($self) {
            $createMessage = new \HelpPC\CzechDataBox\Request\CreateMessage();
            $createMessage
                ->setEnvelope((new \HelpPC\CzechDataBox\Entity\Envelope()));
            for ($i = 0; $i <= 3; $i++) {
                $file = new \HelpPC\CzechDataBox\Entity\File();
                $file->setEncodedContent(\HelpPC\Serializer\Utils\SplFileInfo::createInTemp(file_get_contents(__DIR__ . '/../examples/example.pdf')))
                    ->setFormat('pdf')
                    ->setDescription('example.pdf')
                    ->setMimeType('application/pdf')
                    ->setMetaType(($i == 0 ? 'main' : 'enclosure'));
                $createMessage->addFile($file);
            }
            $recipient = new \HelpPC\CzechDataBox\Entity\Recipient();
            $recipient->setDataBoxId('pokus')
                ->setToHand('toHandRec')
                ->setOrgUnitNum(1000)
                ->setOrgUnit('orgUnitRec');
            $createMessage->addRecipient($recipient);
            /** @var \HelpPC\CzechDataBox\Response\CreateMessage $res */
            $self->manager->message()->CreateMessage($createMessage);
        }, MissingRequiredField::class);

        Assert::noError(function () use ($self) {

            $createMessage = new \HelpPC\CzechDataBox\Request\CreateMessage();
            $createMessage
                ->setEnvelope((new \HelpPC\CzechDataBox\Entity\Envelope()));
            $createMessage->getEnvelope()
                ->setPersonalDelivery(false)
                ->setOVM(false)
                ->setLegalTitleSect('legalTitleSect')
                ->setLegalTitlePoint('legalTitlePoint')
                ->setLegalTitlePar('legalTitlePar')
                ->setLegalTitleLaw(666)
                ->setAllowSubstDelivery(true)
                ->setAnnotation('Test message - ' . date('Y-m-d'))
                ->setLegalTitleYear(intval(date('Y')))
                ->setPublishOwnID(false)
                ->setRecipientIdent('recipientIdent')
                ->setRecipientOrgUnit('recipientOrgUnit')
                ->setRecipientOrgUnitNum(777)
                ->setRecipientRefNumber('recipientRefNumber')
                ->setSenderIdent('senderIdent')
                ->setSenderOrgUnit('senderOrgUnit')
                ->setSenderOrgUnitNum(999)
                ->setSenderRefNumber('senderRefNumber')
                ->setToHands('toHands')
                ->setType('type');

            for ($i = 0; $i <= 3; $i++) {
                $file = new \HelpPC\CzechDataBox\Entity\File();
                $file->setEncodedContent(\HelpPC\Serializer\Utils\SplFileInfo::createInTemp(file_get_contents(__DIR__ . '/../examples/example.pdf')))
                    ->setFormat('pdf')
                    ->setDescription('example.pdf')
                    ->setMimeType('application/pdf')
                    ->setMetaType(($i == 0 ? 'main' : 'enclosure'));
                $createMessage->addFile($file);
            }


            $recipient = new \HelpPC\CzechDataBox\Entity\Recipient();
            $recipient->setDataBoxId('pokus')
                ->setToHand('toHandRec')
                ->setOrgUnitNum(1000)
                ->setOrgUnit('orgUnitRec');
            $createMessage->addRecipient($recipient);
            $recipient = new \HelpPC\CzechDataBox\Entity\Recipient();
            $recipient->setDataBoxId('fake')
                ->setToHand('toHandRec')
                ->setOrgUnitNum(1000)
                ->setOrgUnit('orgUnitRec');
            $createMessage->addRecipient($recipient);
            /** @var \HelpPC\CzechDataBox\Response\CreateMessage $res */
            $res = $self->manager->message()->CreateMessage($createMessage);

            Assert::true($res->isOk());
            Assert::false($res->getMultipleStatus()[1]->getStatus()->isOk());
            Assert::true($res->getMultipleStatus()[0]->getStatus()->isOk());
        });
    }

}

(new CreateMessageTest())->run();