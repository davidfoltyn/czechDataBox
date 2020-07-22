<?php
require 'credentials.php';
$console->writeln(sprintf('Komunikovat bude probihat vuci %s za datovou schranku s id %s typu %s ', ($account->getPortalType()->equalsValue(\HelpPC\CzechDataBox\Enum\PortalTypeEnum::MOJEDATOVASCHRANKA) ? 'mojedatovaschranka.cz' : 'czebox.cz'), ISDS_ID, $type));
/** @var \HelpPC\CzechDataBox\Manager $manager */


$createMessage = new \HelpPC\CzechDataBox\Request\CreateMessage();
$createMessage
    ->setEnvelope((new \HelpPC\CzechDataBox\Entity\Envelope()));
$createMessage->getEnvelope()
    ->setPersonalDelivery(false)
    ->setOvm(false)
    ->setLegalTitleSect('legalTitleSect')
    ->setLegalTitlePoint('legalTitlePoint')
    ->setLegalTitlePar('legalTitlePar')
    ->setLegalTitleLaw(666)
    ->setAllowSubstDelivery(true)
    ->setAnnotation('Test message - ' . date('Y-m-d'))
    ->setLegalTitleYear(date('Y'))
    ->setPublishOwnId(false)
    ->setRecipientIdent('recipientIdent')
    ->setRecipientId('ju8fjv4')
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
    $file->setEncodedContent(\HelpPC\Serializer\Utils\SplFileInfo::createInTemp(file_get_contents(__DIR__ . '/example.pdf')))
        ->setFormat('pdf')
        ->setDescription('example.pdf')
        ->setMimeType('application/pdf')
        ->setMetaType(($i == 0 ? 'main' : 'enclosure'));
    $createMessage->addFile($file);
}


$recipient = new \HelpPC\CzechDataBox\Entity\Recipient();
$recipient->setDataBoxId('ju8fjv4')
    ->setToHand('toHandRec')
    ->setOrgUnitNum(1000)
    ->setOrgUnit('orgUnitRec');
$createMessage->addRecipient($recipient);
$recipient = new \HelpPC\CzechDataBox\Entity\Recipient();
$recipient->setDataBoxId('ju8fjv4')
    ->setToHand('toHandRec')
    ->setOrgUnitNum(1000)
    ->setOrgUnit('orgUnitRec');
$createMessage->addRecipient($recipient);
for ($i = 0; $i <= 1; $i++) {
    $recipient = new \HelpPC\CzechDataBox\Entity\Recipient();
    $recipient->setDataBoxId('unhfjvx')
        ->setToHand('toHandRec')
        ->setOrgUnitNum(1000)
        ->setOrgUnit('orgUnitRec');
    $createMessage->addRecipient($recipient);
}

$console->write('Probiha odesilani DZ');
/** @var \HelpPC\CzechDataBox\Response\CreateMessage $res */
$res = $manager->createMessage($account, $createMessage);
if ($res->isOk()) {
    $console->writeln(' -> OK');
    /** @var \HelpPC\CzechDataBox\Entity\MessageStatus $messageStatus */
    foreach ($res->getMultipleStatus() as $key => $messageStatus) {
        /** @var \HelpPC\CzechDataBox\Entity\Recipient $messageRecipient */
        $messageRecipient = $createMessage->getRecipients()->get($key);
        if ($messageStatus->getStatus()->isOk()) {
            $console->writeln(sprintf('     - Prijemci %s byla zprava odeslana a DZ bylo prideleno cislo %s', $messageRecipient->getDataBoxId(), $messageStatus->getDataMessageId()));
        } else {
            $console->writeln(sprintf('     - Prijemci %s se DZ nepodarilo odeslat kvuli chybe [%d] %s', $messageRecipient->getDataBoxId(), $messageStatus->getStatus()->getCode(), $messageStatus->getStatus()->getMessage()));
        }
    }
} else {
    $console->writeln(' -> FAIL [' . $res->getStatus()->getCode() . '] ' . $res->getStatus()->getMessage());
}


