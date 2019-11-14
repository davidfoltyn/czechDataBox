<?php declare(strict_types=1);

namespace HelpPC\CzechDataBox\Connector;

use HelpPC\CzechDataBox\Entity\File;
use HelpPC\CzechDataBox\Exception\FileSizeOverflow;
use HelpPC\CzechDataBox\Exception\MissingMainFile;
use HelpPC\CzechDataBox\Exception\MissingRequiredField;
use HelpPC\CzechDataBox\Exception\RecipientCountOverflow;
use HelpPC\CzechDataBox\Response;
use HelpPC\CzechDataBox\Request;
use HelpPC\CzechDataBox\Utils\BinarySuffix;

class DataMessage extends Connector
{

    /**
     * Ověření platnosti uložené datové zprávy
     * @param Request\AuthenticateMessage $input
     * @return Response\AuthenticateMessage
     * @throws \HelpPC\CzechDataBox\Exception\ConnectionException
     * @throws \HelpPC\CzechDataBox\Exception\SystemExclusion
     */
    public function AuthenticateMessage(Request\AuthenticateMessage $input): Response\AuthenticateMessage
    {
        return $this->send($this->getLocation(self::OPERATIONSWS), $input, Response\AuthenticateMessage::class);
    }

    /**
     * Ověření kopie uložené zprávy proti originálu v ISDS
     * @param Request\VerifyMessage $input
     * @return Response\VerifyMessage
     * @throws \HelpPC\CzechDataBox\Exception\ConnectionException
     * @throws \HelpPC\CzechDataBox\Exception\SystemExclusion
     * @deprecated
     */
    public function VerifyMessage(Request\VerifyMessage $input): Response\VerifyMessage
    {
        return $this->send($this->getLocation(self::INFOWS), $input, Response\VerifyMessage::class);
    }


    /**
     * Vytvoření a odeslání nové zprávy pro více adresátů
     * @param Request\CreateMessage $input
     * @return Response\CreateMessage
     * @throws FileSizeOverflow
     * @throws MissingMainFile
     * @throws MissingRequiredField
     * @throws RecipientCountOverflow
     * @throws \HelpPC\CzechDataBox\Exception\ConnectionException
     * @throws \HelpPC\CzechDataBox\Exception\SystemExclusion
     */
    public function CreateMessage(Request\CreateMessage $input): Response\CreateMessage
    {
        $recipientsCount = $input->getRecipients()->count();
        if ($recipientsCount < 1) {
            throw new MissingRequiredField('recipient');
        }
        if ($recipientsCount > 50) {
            throw new RecipientCountOverflow(sprintf('More than 50 recipients are assigned. Currently, %d are added.', $recipientsCount));
        }
        $sumFileSize = 0;
        /** @var File $file */
        foreach ($input->getFiles() as $file) {
            if ($file->getEncodedContent() instanceof \SplFileInfo) {
                $sumFileSize += $file->getEncodedContent()->getSize();
            }
        }
        if ($sumFileSize > 26214400) {
            throw new FileSizeOverflow(sprintf('Maximum size of all files can be maximal 25MB. Current size is %s.', BinarySuffix::convert($sumFileSize)));
        }
        if (!$input->getMainFile() instanceof File) {
            throw new MissingMainFile('The message can\'t be send without main attachment');
        }
        if ($input->getEnvelope()->getAnnotation() == null) {
            throw new MissingRequiredField('annotation');
        }
        return $this->send($this->getLocation(self::OPERATIONSWS), $input, Response\CreateMessage::class);
    }

    /**
     * Stažení došlé zprávy
     * @param Request\MessageDownload $input
     * @return Response\MessageDownload
     * @throws \HelpPC\CzechDataBox\Exception\ConnectionException
     * @throws \HelpPC\CzechDataBox\Exception\SystemExclusion
     */
    public function MessageDownload(Request\MessageDownload $input): Response\MessageDownload
    {
        return $this->send($this->getLocation(self::OPERATIONSWS), $input, Response\MessageDownload::class);
    }

    /**
     * Stažení došlé zprávy s podpisem značkou MV
     * @param Request\SignedMessageDownload $input
     * @return Response\SignedMessageDownload
     * @throws \HelpPC\CzechDataBox\Exception\ConnectionException
     * @throws \HelpPC\CzechDataBox\Exception\SystemExclusion
     */
    public function SignedMessageDownload(Request\SignedMessageDownload $input): Response\SignedMessageDownload
    {
        return $this->send($this->getLocation(self::OPERATIONSWS), $input, Response\SignedMessageDownload::class);
    }

    /**
     * Stažení odeslané zprávy s podpisem MV
     * @param Request\SignedSentMessageDownload $input
     * @return Response\SignedSentMessageDownload
     * @throws \HelpPC\CzechDataBox\Exception\ConnectionException
     * @throws \HelpPC\CzechDataBox\Exception\SystemExclusion
     */
    public function SignedSentMessageDownload(Request\SignedSentMessageDownload $input): Response\SignedSentMessageDownload
    {
        return $this->send($this->getLocation(self::OPERATIONSWS), $input, Response\SignedSentMessageDownload::class);
    }


    /**
     * Přepodepsání zprávy, dodejky či doručenky
     * @param Request\ResignISDSDocument $input
     * @return Response\ResignISDSDocument
     * @throws \HelpPC\CzechDataBox\Exception\ConnectionException
     * @throws \HelpPC\CzechDataBox\Exception\SystemExclusion
     */
    public function ResignISDSDocument(Request\ResignISDSDocument $input): Response\ResignISDSDocument
    {
        return $this->send($this->getLocation(self::OPERATIONSWS), $input, Response\ResignISDSDocument::class);
    }

    /**
     * Stažení obálky došlé zprávy
     * @param Request\MessageEnvelopeDownload $input
     * @return Response\MessageEnvelopeDownload
     * @throws \HelpPC\CzechDataBox\Exception\ConnectionException
     * @throws \HelpPC\CzechDataBox\Exception\SystemExclusion
     */
    public function MessageEnvelopeDownload(Request\MessageEnvelopeDownload $input): Response\MessageEnvelopeDownload
    {
        return $this->send($this->getLocation(self::INFOWS), $input, Response\MessageEnvelopeDownload::class);
    }

    /**
     * Označení zprávy jako „Přečtená“
     * @param Request\MarkMessageAsDownloaded $input
     * @return Response\MarkMessageAsDownloaded
     * @throws \HelpPC\CzechDataBox\Exception\ConnectionException
     * @throws \HelpPC\CzechDataBox\Exception\SystemExclusion
     */
    public function MarkMessageAsDownloaded(Request\MarkMessageAsDownloaded $input): Response\MarkMessageAsDownloaded
    {
        return $this->send($this->getLocation(self::INFOWS), $input, Response\MarkMessageAsDownloaded::class);
    }


    /**
     * Stažení informace o dodání a doručování zprávy
     * @param Request\GetDeliveryInfo $input
     * @return Response\GetDeliveryInfo
     * @throws \HelpPC\CzechDataBox\Exception\ConnectionException
     * @throws \HelpPC\CzechDataBox\Exception\SystemExclusion
     */
    public function GetDeliveryInfo(Request\GetDeliveryInfo $input): Response\GetDeliveryInfo
    {
        return $this->send($this->getLocation(self::INFOWS), $input, Response\GetDeliveryInfo::class);
    }

    /**
     * Stažení informace o dodání a doručování zprávy, s podpisem značkou MV
     * @param Request\GetSignedDeliveryInfo $input
     * @return Response\GetSignedDeliveryInfo
     * @throws \HelpPC\CzechDataBox\Exception\ConnectionException
     * @throws \HelpPC\CzechDataBox\Exception\SystemExclusion
     */
    public function GetSignedDeliveryInfo(Request\GetSignedDeliveryInfo $input): Response\GetSignedDeliveryInfo
    {
        return $this->send($this->getLocation(self::INFOWS), $input, Response\GetSignedDeliveryInfo::class);
    }


    /**
     * Stazeni seznamu odeslanych zprav urceneho casovym intervalem, organizacni jednotkou odesilatele,
     * filtrem na stav zprav a usekem poradovych cisel zaznamu. Vrati seznam zprav.
     *
     * @param Request\GetListOfSentMessages $input
     * @return Response\GetListOfSentMessages
     * @throws \HelpPC\CzechDataBox\Exception\ConnectionException
     * @throws \HelpPC\CzechDataBox\Exception\SystemExclusion
     */
    public function GetListOfSentMessages(Request\GetListOfSentMessages $input): Response\GetListOfSentMessages
    {
        return $this->send($this->getLocation(self::INFOWS), $input, Response\GetListOfSentMessages::class);
    }

    /**
     * Stazeni seznamu doslych zprav urceneho casovym intervalem,
     * zpresnenim organizacni jednotky adresata (pouze ESS), filtrem na stav zprav
     * a usekem poradovych cisel zaznamu
     *
     * @param Request\GetListOfReceivedMessages $input
     * @return Response\GetListOfReceivedMessages
     * @throws \HelpPC\CzechDataBox\Exception\ConnectionException
     * @throws \HelpPC\CzechDataBox\Exception\SystemExclusion
     */
    public function GetListOfReceivedMessages(Request\GetListOfReceivedMessages $input): Response\GetListOfReceivedMessages
    {
        return $this->send($this->getLocation(self::INFOWS), $input, Response\GetListOfReceivedMessages::class);
    }

    /**
     * Stažení seznamu odeslaných zpráv, u nichž došlo ke změně stavu
     * @param Request\GetMessageStateChanges $input
     * @return Response\GetMessageStateChanges
     * @throws \HelpPC\CzechDataBox\Exception\ConnectionException
     * @throws \HelpPC\CzechDataBox\Exception\SystemExclusion
     */
    public function GetMessageStateChanges(Request\GetMessageStateChanges $input): Response\GetMessageStateChanges
    {
        return $this->send($this->getLocation(self::INFOWS), $input, Response\GetMessageStateChanges::class);
    }

    /**
     * Potvrzeni doruceni komercni zpravy
     * @param Request\ConfirmDelivery $input
     * @return Response\ConfirmDelivery
     * @throws \HelpPC\CzechDataBox\Exception\ConnectionException
     * @throws \HelpPC\CzechDataBox\Exception\SystemExclusion
     * @deprecated
     */
    function ConfirmDelivery(Request\ConfirmDelivery $input): Response\ConfirmDelivery
    {
        return $this->send($this->getLocation(self::INFOWS), $input, Response\ConfirmDelivery::class);
    }

}