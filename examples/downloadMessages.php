<?php declare(strict_types=1);
require_once __DIR__ . '/credentials.php';
$console->writeln(sprintf('Komunikovat bude probihat vuci %s za datovou schranku s id %s typu %s ', ($account->getPortalType()->equalsValue(\HelpPC\CzechDataBox\Enum\PortalTypeEnum::MOJEDATOVASCHRANKA) ? 'mojedatovaschranka.cz' : 'czebox.cz'), ISDS_ID, $type));


$messageStatus = new \HelpPC\CzechDataBox\Request\GetMessageStateChanges();
$messageStatus->setChangesFrom((new \DateTimeImmutable())->modify('-3 month'))
    ->setChangesTo((new \DateTimeImmutable()));

$a = $manager->getMessageStateChanges($account, $messageStatus);


/** @var \HelpPC\CzechDataBox\Manager $manager */
$console->writeln('Probiha stahovani seznamu odeslanych DZ');
$listSended = new \HelpPC\CzechDataBox\Request\GetListOfSentMessages();
$listSended->setStatusFilter(\HelpPC\CzechDataBox\Utils\MessageStatus::getDecEntryForStatus(\HelpPC\CzechDataBox\Utils\MessageStatus::FILTER_ALL))
    ->setListTo(new \DateTimeImmutable())
    ->setListFrom((new \DateTimeImmutable())->modify('-3 month'));

$listSendedRes = $manager->getListOfSentMessages($account, $listSended);

if ($listSendedRes->getStatus()->isOk()) {
    $console->writeln('Stahovani seznamu odeslanych DZ bylo dokonceno uspesne');
    $console->writeln(' - seznam obsahuje ' . $listSendedRes->getRecord()->count() . ' DZ');
    /** @var \HelpPC\CzechDataBox\Entity\MessageRecord $record */
    foreach ($listSendedRes->getRecord() as $record) {

        $console->writeln(sprintf('         - %d. prijemce "%s", predmet "%s" byla dorucena %s a prectena %s ',
            $record->getOrdinal(),
            $record->getRecipient(),
            $record->getAnnotation(),
            $record->getDeliveryTime()->format('j.n.Y, G:i'),
            ($record->getAcceptanceTime() instanceof \DateTimeImmutable ? $record->getAcceptanceTime()->format('j.n.Y, G:i') : '')));
        if ($listSendedRes->getRecord()->indexOf($record) > 0) {
            continue;
        }
        /*********************************************************/
        $console->write('             : stahnuti podepsane dorucenky');
        /** @var \HelpPC\CzechDataBox\Response\GetSignedDeliveryInfo $res */
        $res = $manager->getSignedDeliveryInfo($account, (new \HelpPC\CzechDataBox\Request\GetSignedDeliveryInfo())->setDataMessageId($record->getDataMessageId()));
        if ($res->getStatus()->isOk()) {
            $console->writeln(' -> OK');
        } else {
            $console->writeln(' -> FAIL [' . $res->getStatus()->getCode() . '] ' . $res->getStatus()->getMessage());
        }
        /*********************************************************/
        $console->write('             : ziskani hashe DZ');
        /** @var \HelpPC\CzechDataBox\Response\VerifyMessage $res */
        $res = $manager->verifyMessage($account, (new \HelpPC\CzechDataBox\Request\VerifyMessage())->setDataMessageId($record->getDataMessageId()));
        if ($res->getStatus()->isOk()) {
            $console->writeln(' -> ' . $res->getHash()->getAlgorithm() . ' = ' . $res->getHash()->getValue()->getContents());
        } else {
            $console->writeln(' -> FAIL [' . $res->getStatus()->getCode() . '] ' . $res->getStatus()->getMessage());
        }
        /*********************************************************/
        $console->write('             : stahovani podepsane DZ podepsane XML dle XADES');
        /** @var \HelpPC\CzechDataBox\Response\SignedSentMessageDownload $res */
        $res = $manager->signedSentMessageDownload($account, (new \HelpPC\CzechDataBox\Request\SignedSentMessageDownload())->setDataMessageId($record->getDataMessageId()));
        $sentBinary = $res->getSignature();
        if ($res->getStatus()->isOk()) {
            $console->writeln(' -> OK ');
        } else {
            $console->writeln(' -> FAIL [' . $res->getStatus()->getCode() . '] ' . $res->getStatus()->getMessage());
        }
        /*********************************************************/
        $console->write('             : kontrola spravnosti DZ');
        /** @var \HelpPC\CzechDataBox\Response\AuthenticateMessage $res */
        // kontrola spravnosti DZ, zasila se binarka
        $res = $manager->authenticateMessage($account, (new \HelpPC\CzechDataBox\Request\AuthenticateMessage())->setDataMessage($sentBinary));
        if ($res->getStatus()->isOk()) {
            $console->writeln(' -> DZ ' . ($res->isAuthenticated() ? 'je' : 'neni') . ' OK');
        } else {
            $console->writeln(' -> FAIL [' . $res->getStatus()->getCode() . '] ' . $res->getStatus()->getMessage());
        }
        /*********************************************************/
        $console->write('             : potvrzeni doruceni');
        /** @var \HelpPC\CzechDataBox\Response\ConfirmDelivery $res */
        $res = $manager->confirmDelivery($account, (new \HelpPC\CzechDataBox\Request\ConfirmDelivery())->setDataMessageId($record->getDataMessageId()));
        if ($res->getStatus()->isOk()) {
            $console->writeln(' -> OK');
        } else {
            $console->writeln(' -> FAIL [' . $res->getStatus()->getCode() . '] ' . $res->getStatus()->getMessage());
        }
        /*********************************************************/
        $console->write('             : prerazitkovani DZ');
        /** @var \HelpPC\CzechDataBox\Response\ResignISDSDocument $res */
        $res = $manager->resignIsdsDocument($account, (new \HelpPC\CzechDataBox\Request\ResignISDSDocument())->setDocument($sentBinary));
        if ($res->getStatus()->isOk()) {
            $console->writeln(' -> OK');
        } else {
            $console->writeln(' -> FAIL [' . $res->getStatus()->getCode() . '] ' . $res->getStatus()->getMessage());
        }
    }


} else {
    $console->writeln('Stahovani seznamu odeslanych DZ bylo dokonceno s chybou [' . $listSendedRes->getStatus()->getCode() . ']: ' . $listSendedRes->getStatus()->getMessage());
}

$console->writeln('Probiha stahovani seznamu prijatych DZ');
$listrec = new \HelpPC\CzechDataBox\Request\GetListOfReceivedMessages();
$listrec->setStatusFilter(\HelpPC\CzechDataBox\Utils\MessageStatus::getDecEntryForStatus(\HelpPC\CzechDataBox\Utils\MessageStatus::FILTER_ALL))
    ->setListTo(new \DateTimeImmutable())
    ->setListFrom((new \DateTimeImmutable())->modify('-3 month'));

$listrecRes = $manager->getListOfReceivedMessages($account, $listrec);
if ($listrecRes->getStatus()->isOk()) {
    $console->writeln('Stahovani seznamu prijatych DZ bylo dokonceno uspesne');
    $console->writeln(' - seznam obsahuje ' . $listrecRes->getRecord()->count() . ' DZ');
    /** @var \HelpPC\CzechDataBox\Entity\MessageRecord $record */
    foreach ($listrecRes->getRecord() as $record) {
        $console->writeln(sprintf('         - %d. odesilatel "%s", predmet "%s" byla dorucena %s a prectena %s ',
            $record->getOrdinal(),
            $record->getSender(),
            $record->getAnnotation(),
            $record->getDeliveryTime()->format('j.n.Y, G:i'),
            ($record->getAcceptanceTime() instanceof \DateTimeImmutable ? $record->getAcceptanceTime()->format('j.n.Y, G:i') : '')));
        if ($listrecRes->getRecord()->indexOf($record) > 0) {
            continue;
        }
        /*********************************************************/
        $console->write('             : stahnuti podepsane dorucenky');
        /** @var \HelpPC\CzechDataBox\Response\GetSignedDeliveryInfo $res */
        $res = $manager->getSignedDeliveryInfo($account, (new \HelpPC\CzechDataBox\Request\GetSignedDeliveryInfo())->setDataMessageId($record->getDataMessageId()));
        if ($res->getStatus()->isOk()) {
            $console->writeln(' -> OK');
        } else {
            $console->writeln(' -> FAIL [' . $res->getStatus()->getCode() . '] ' . $res->getStatus()->getMessage());
        }
        /*********************************************************/
        $console->write('             : ziskani hashe DZ');
        /** @var \HelpPC\CzechDataBox\Response\VerifyMessage $res */
        $res = $manager->verifyMessage($account, (new \HelpPC\CzechDataBox\Request\VerifyMessage())->setDataMessageId($record->getDataMessageId()));
        if ($res->getStatus()->isOk()) {
            $console->writeln(' -> ' . $res->getHash()->getAlgorithm() . ' = ' . $res->getHash()->getValue());
        } else {
            $console->writeln(' -> FAIL [' . $res->getStatus()->getCode() . '] ' . $res->getStatus()->getMessage());
        }
        /*********************************************************/
        $console->write('             : stahnuti podepsane DZ');
        /** @var \HelpPC\CzechDataBox\Response\SignedMessageDownload $res */
        $res = $manager->signedMessageDownload($account, (new \HelpPC\CzechDataBox\Request\SignedMessageDownload())->setDataMessageId($record->getDataMessageId()));
        $sentBinary = $res->getSignature();
        if ($res->getStatus()->isOk()) {
            $console->writeln(' -> OK');
        } else {
            $console->writeln(' -> FAIL [' . $res->getStatus()->getCode() . '] ' . $res->getStatus()->getMessage());
        }
        /*********************************************************/
        $console->write('             : kontrola spravnosti DZ');
        /** @var \HelpPC\CzechDataBox\Response\AuthenticateMessage $res */
        // kontrola spravnosti DZ, zasila se binarka
        $res = $manager->authenticateMessage($account, (new \HelpPC\CzechDataBox\Request\AuthenticateMessage())->setDataMessage($sentBinary));
        if ($res->getStatus()->isOk()) {
            $console->writeln(' -> DZ ' . ($res->isAuthenticated() ? 'je' : 'neni') . ' OK');
        } else {
            $console->writeln(' -> FAIL [' . $res->getStatus()->getCode() . '] ' . $res->getStatus()->getMessage());
        }
        /*********************************************************/
        $console->write('             : potvrzeni doruceni');
        /** @var \HelpPC\CzechDataBox\Response\ConfirmDelivery $res */
        $res = $manager->confirmDelivery($account, (new \HelpPC\CzechDataBox\Request\ConfirmDelivery())->setDataMessageId($record->getDataMessageId()));
        if ($res->getStatus()->isOk()) {
            $console->writeln(' -> OK');
        } else {
            $console->writeln(' -> FAIL [' . $res->getStatus()->getCode() . '] ' . $res->getStatus()->getMessage());
        }
        /*********************************************************/
        $console->write('             : prerazitkovani DZ');
        /** @var \HelpPC\CzechDataBox\Response\ResignISDSDocument $res */
        $res = $manager->resignIsdsDocument($account, (new \HelpPC\CzechDataBox\Request\ResignISDSDocument())->setDocument($sentBinary));
        if ($res->getStatus()->isOk()) {
            $console->writeln(' -> OK');
        } else {
            $console->writeln(' -> FAIL [' . $res->getStatus()->getCode() . '] ' . $res->getStatus()->getMessage());
        }
        /*********************************************************/
        $console->write('             : stahnuti obalky DZ');
        /** @var \HelpPC\CzechDataBox\Response\MessageEnvelopeDownload $res */
        $res = $manager->messageEnvelopeDownload($account, (new \HelpPC\CzechDataBox\Request\MessageEnvelopeDownload())->setDataMessageId($record->getDataMessageId()));
        if ($res->getStatus()->isOk()) {
            $console->writeln(' -> OK');
        } else {
            $console->writeln(' -> FAIL [' . $res->getStatus()->getCode() . '] ' . $res->getStatus()->getMessage());
        }
        /*********************************************************/
        $console->write('             : oznaceni za stazenou');
        /** @var \HelpPC\CzechDataBox\Response\MarkMessageAsDownloaded $res */
        $res = $manager->markMessageAsDownloaded($account, (new \HelpPC\CzechDataBox\Request\MarkMessageAsDownloaded())->setDataMessageId($record->getDataMessageId()));
        if ($res->getStatus()->isOk()) {
            $console->writeln(' -> OK');
        } else {
            $console->writeln(' -> FAIL [' . $res->getStatus()->getCode() . '] ' . $res->getStatus()->getMessage());
        }
        /*********************************************************/
        $console->write('             : stazeni zpravy');
        /** @var \HelpPC\CzechDataBox\Response\MessageDownload $res */
        // kontrola spravnosti DZ, zasila se binarka
        $res = $manager->messageDownload($account, (new \HelpPC\CzechDataBox\Request\MessageDownload())->setDataMessageId($record->getDataMessageId()));
        if ($res->getStatus()->isOk()) {
            $console->writeln(' -> OK ' . sprintf(' obsahuje %d priloh o celkove velikosti %d kb', $res->getReturnedMessage()->getDataMessage()->getFiles()->count(), $res->getReturnedMessage()->getAttachmentSize()));
        } else {
            $console->writeln(' -> FAIL [' . $res->getStatus()->getCode() . '] ' . $res->getStatus()->getMessage());
        }
    }
} else {
    $console->writeln('Stahovani seznamu odeslanych DZ bylo dokonceno s chybou [' . $listrecRes->getStatus()->getCode() . ']: ' . $listrecRes->getStatus()->getMessage());
}
