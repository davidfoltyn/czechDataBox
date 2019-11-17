<?php declare(strict_types=1);
require_once __DIR__ . '/credentials.php';
$console->writeln(sprintf('Komunikovat bude probihat vuci %s za datovou schranku s id %s typu %s ', ($account->getPortalType() == $account::ENV_PROD ? 'mojedatovaschranka.cz' : 'czebox.cz'), ISDS_ID, $type));


$messageStatus = new \HelpPC\CzechDataBox\Request\GetMessageStateChanges();
$messageStatus->setChangesFrom((new \DateTime())->modify('-3 month'))
    ->setChangesTo((new \DateTime()));

$a = $manager->GetMessageStateChanges($account, $messageStatus);


/** @var \HelpPC\CzechDataBox\Manager $manager */
$console->writeln('Probiha stahovani seznamu odeslanych DZ');
$listSended = new \HelpPC\CzechDataBox\Request\GetListOfSentMessages();
$listSended->setStatusFilter(\HelpPC\CzechDataBox\Utils\MessageStatus::getDecEntryForStatus(\HelpPC\CzechDataBox\Utils\MessageStatus::FILTER_ALL))
    ->setListTo(new \DateTime())
    ->setListFrom((new \DateTime())->modify('-3 month'));

$listSendedRes = $manager->GetListOfSentMessages($account, $listSended);

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
            ($record->getAcceptanceTime() instanceof \DateTime ? $record->getAcceptanceTime()->format('j.n.Y, G:i') : '')));
        if ($listSendedRes->getRecord()->indexOf($record) > 0) {
            continue;
        }
        /*********************************************************/
        $console->write('             : stahnuti podepsane dorucenky');
        /** @var \HelpPC\CzechDataBox\Response\GetSignedDeliveryInfo $res */
        $res = $manager->GetSignedDeliveryInfo($account, (new \HelpPC\CzechDataBox\Request\GetSignedDeliveryInfo())->setDataMessageId($record->getDataMessageId()));
        if ($res->getStatus()->isOk()) {
            $console->writeln(' -> OK');
        } else {
            $console->writeln(' -> FAIL [' . $res->getStatus()->getCode() . '] ' . $res->getStatus()->getMessage());
        }
        /*********************************************************/
        $console->write('             : ziskani hashe DZ');
        /** @var \HelpPC\CzechDataBox\Response\VerifyMessage $res */
        $res = $manager->VerifyMessage($account, (new \HelpPC\CzechDataBox\Request\VerifyMessage())->setDataMessageId($record->getDataMessageId()));
        if ($res->getStatus()->isOk()) {
            $console->writeln(' -> ' . $res->getHash()->getAlgorithm() . ' = ' . $res->getHash()->getValue()->getContents());
        } else {
            $console->writeln(' -> FAIL [' . $res->getStatus()->getCode() . '] ' . $res->getStatus()->getMessage());
        }
        /*********************************************************/
        $console->write('             : stahovani podepsane DZ podepsane XML dle XADES');
        /** @var \HelpPC\CzechDataBox\Response\SignedSentMessageDownload $res */
        $res = $manager->SignedSentMessageDownload($account, (new \HelpPC\CzechDataBox\Request\SignedSentMessageDownload())->setDataMessageId($record->getDataMessageId()));
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
        $res = $manager->AuthenticateMessage($account, (new \HelpPC\CzechDataBox\Request\AuthenticateMessage())->setDataMessage($sentBinary));
        if ($res->getStatus()->isOk()) {
            $console->writeln(' -> DZ ' . ($res->isAuthenticated() ? 'je' : 'neni') . ' OK');
        } else {
            $console->writeln(' -> FAIL [' . $res->getStatus()->getCode() . '] ' . $res->getStatus()->getMessage());
        }
        /*********************************************************/
        $console->write('             : potvrzeni doruceni');
        /** @var \HelpPC\CzechDataBox\Response\ConfirmDelivery $res */
        $res = $manager->ConfirmDelivery($account, (new \HelpPC\CzechDataBox\Request\ConfirmDelivery())->setDataMessageId($record->getDataMessageId()));
        if ($res->getStatus()->isOk()) {
            $console->writeln(' -> OK');
        } else {
            $console->writeln(' -> FAIL [' . $res->getStatus()->getCode() . '] ' . $res->getStatus()->getMessage());
        }
        /*********************************************************/
        $console->write('             : prerazitkovani DZ');
        /** @var \HelpPC\CzechDataBox\Response\ResignISDSDocument $res */
        $res = $manager->ResignISDSDocument($account, (new \HelpPC\CzechDataBox\Request\ResignISDSDocument())->setDocument($sentBinary));
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
    ->setListTo(new \DateTime())
    ->setListFrom((new \DateTime())->modify('-3 month'));

$listrecRes = $manager->GetListOfReceivedMessages($account, $listrec);
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
            ($record->getAcceptanceTime() instanceof \DateTime ? $record->getAcceptanceTime()->format('j.n.Y, G:i') : '')));
        if ($listrecRes->getRecord()->indexOf($record) > 0) {
            continue;
        }
        /*********************************************************/
        $console->write('             : stahnuti podepsane dorucenky');
        /** @var \HelpPC\CzechDataBox\Response\GetSignedDeliveryInfo $res */
        $res = $manager->GetSignedDeliveryInfo($account, (new \HelpPC\CzechDataBox\Request\GetSignedDeliveryInfo())->setDataMessageId($record->getDataMessageId()));
        if ($res->getStatus()->isOk()) {
            $console->writeln(' -> OK');
        } else {
            $console->writeln(' -> FAIL [' . $res->getStatus()->getCode() . '] ' . $res->getStatus()->getMessage());
        }
        /*********************************************************/
        $console->write('             : ziskani hashe DZ');
        /** @var \HelpPC\CzechDataBox\Response\VerifyMessage $res */
        $res = $manager->VerifyMessage($account, (new \HelpPC\CzechDataBox\Request\VerifyMessage())->setDataMessageId($record->getDataMessageId()));
        if ($res->getStatus()->isOk()) {
            $console->writeln(' -> ' . $res->getHash()->getAlgorithm() . ' = ' . $res->getHash()->getValue());
        } else {
            $console->writeln(' -> FAIL [' . $res->getStatus()->getCode() . '] ' . $res->getStatus()->getMessage());
        }
        /*********************************************************/
        $console->write('             : stahnuti podepsane DZ');
        /** @var \HelpPC\CzechDataBox\Response\SignedMessageDownload $res */
        $res = $manager->SignedMessageDownload($account, (new \HelpPC\CzechDataBox\Request\SignedMessageDownload())->setDataMessageId($record->getDataMessageId()));
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
        $res = $manager->AuthenticateMessage($account, (new \HelpPC\CzechDataBox\Request\AuthenticateMessage())->setDataMessage($sentBinary));
        if ($res->getStatus()->isOk()) {
            $console->writeln(' -> DZ ' . ($res->isAuthenticated() ? 'je' : 'neni') . ' OK');
        } else {
            $console->writeln(' -> FAIL [' . $res->getStatus()->getCode() . '] ' . $res->getStatus()->getMessage());
        }
        /*********************************************************/
        $console->write('             : potvrzeni doruceni');
        /** @var \HelpPC\CzechDataBox\Response\ConfirmDelivery $res */
        $res = $manager->ConfirmDelivery($account, (new \HelpPC\CzechDataBox\Request\ConfirmDelivery())->setDataMessageId($record->getDataMessageId()));
        if ($res->getStatus()->isOk()) {
            $console->writeln(' -> OK');
        } else {
            $console->writeln(' -> FAIL [' . $res->getStatus()->getCode() . '] ' . $res->getStatus()->getMessage());
        }
        /*********************************************************/
        $console->write('             : prerazitkovani DZ');
        /** @var \HelpPC\CzechDataBox\Response\ResignISDSDocument $res */
        $res = $manager->ResignISDSDocument($account, (new \HelpPC\CzechDataBox\Request\ResignISDSDocument())->setDocument($sentBinary));
        if ($res->getStatus()->isOk()) {
            $console->writeln(' -> OK');
        } else {
            $console->writeln(' -> FAIL [' . $res->getStatus()->getCode() . '] ' . $res->getStatus()->getMessage());
        }
        /*********************************************************/
        $console->write('             : stahnuti obalky DZ');
        /** @var \HelpPC\CzechDataBox\Response\MessageEnvelopeDownload $res */
        $res = $manager->MessageEnvelopeDownload($account, (new \HelpPC\CzechDataBox\Request\MessageEnvelopeDownload())->setDataMessageId($record->getDataMessageId()));
        if ($res->getStatus()->isOk()) {
            $console->writeln(' -> OK');
        } else {
            $console->writeln(' -> FAIL [' . $res->getStatus()->getCode() . '] ' . $res->getStatus()->getMessage());
        }
        /*********************************************************/
        $console->write('             : oznaceni za stazenou');
        /** @var \HelpPC\CzechDataBox\Response\MarkMessageAsDownloaded $res */
        $res = $manager->MarkMessageAsDownloaded($account, (new \HelpPC\CzechDataBox\Request\MarkMessageAsDownloaded())->setDataMessageId($record->getDataMessageId()));
        if ($res->getStatus()->isOk()) {
            $console->writeln(' -> OK');
        } else {
            $console->writeln(' -> FAIL [' . $res->getStatus()->getCode() . '] ' . $res->getStatus()->getMessage());
        }
        /*********************************************************/
        $console->write('             : stazeni zpravy');
        /** @var \HelpPC\CzechDataBox\Response\MessageDownload $res */
        // kontrola spravnosti DZ, zasila se binarka
        $res = $manager->MessageDownload($account, (new \HelpPC\CzechDataBox\Request\MessageDownload())->setDataMessageId($record->getDataMessageId()));
        if ($res->getStatus()->isOk()) {
            $console->writeln(' -> OK ' . sprintf(' obsahuje %d priloh o celkove velikosti %d kb', $res->getReturnedMessage()->getDataMessage()->getFiles()->count(), $res->getReturnedMessage()->getAttachmentSize()));
        } else {
            $console->writeln(' -> FAIL [' . $res->getStatus()->getCode() . '] ' . $res->getStatus()->getMessage());
        }
    }
} else {
    $console->writeln('Stahovani seznamu odeslanych DZ bylo dokonceno s chybou [' . $listrecRes->getStatus()->getCode() . ']: ' . $listrecRes->getStatus()->getMessage());
}
