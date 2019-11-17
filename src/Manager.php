<?php declare(strict_types=1);

namespace HelpPC\CzechDataBox;

use HelpPC\CzechDataBox\Connector\{Account, DataBox, DataMessage, SearchDataBox};
use HelpPC\CzechDataBox\Entity\File;
use HelpPC\CzechDataBox\Exception\ConnectionNotEstablish;
use HelpPC\CzechDataBox\Exception\FileSizeOverflow;
use HelpPC\CzechDataBox\Exception\MissingMainFile;
use HelpPC\CzechDataBox\Exception\MissingRequiredField;
use HelpPC\CzechDataBox\Exception\RecipientCountOverflow;
use HelpPC\CzechDataBox\Utils\BinarySuffix;

class Manager
{
    /** @var DataBox */
    private $dataBox;
    /** @var DataMessage */
    private $dataMessage;
    /** @var SearchDataBox */
    private $searchData;

    public function __construct(DataBox $dataBox, DataMessage $dataMessage, SearchDataBox $searchDataBox)
    {
        $this->dataBox = $dataBox;
        $this->dataMessage = $dataMessage;
        $this->searchData = $searchDataBox;
    }

    public function GetOwnerInfoFromLogin(Account $account): Response\GetOwnerInfoFromLogin
    {
        return $this->dataBox->GetOwnerInfoFromLogin($account);
    }

    public function ChangeISDSPassword(Account $account, Request\ChangeISDSPassword $input): Response\ChangeISDSPassword
    {
        return $this->dataBox->ChangeISDSPassword($account, $input);
    }

    public function GetPasswordExpirationInfo(Account $account): Response\GetPasswordInfo
    {
        return $this->dataBox->GetPasswordExpirationInfo($account);
    }

    /**
     * Ověření platnosti uložené datové zprávy
     * @param Account $account
     * @param Request\AuthenticateMessage $input
     * @return Response\AuthenticateMessage
     * @throws \HelpPC\CzechDataBox\Exception\ConnectionException
     * @throws \HelpPC\CzechDataBox\Exception\SystemExclusion
     */
    public function AuthenticateMessage(Account $account, Request\AuthenticateMessage $input): Response\AuthenticateMessage
    {
        return $this->dataMessage->AuthenticateMessage($account, $input);
    }

    /**
     * Ověření kopie uložené zprávy proti originálu v ISDS
     * @param Account $account
     * @param Request\VerifyMessage $input
     * @return Response\VerifyMessage
     * @throws \HelpPC\CzechDataBox\Exception\ConnectionException
     * @throws \HelpPC\CzechDataBox\Exception\SystemExclusion
     * @deprecated
     */
    public function VerifyMessage(Account $account, Request\VerifyMessage $input): Response\VerifyMessage
    {
        return $this->dataMessage->VerifyMessage($account, $input);
    }


    /**
     * Vytvoření a odeslání nové zprávy pro více adresátů
     * @param Account $account
     * @param Request\CreateMessage $input
     * @return Response\CreateMessage
     * @throws FileSizeOverflow
     * @throws MissingMainFile
     * @throws MissingRequiredField
     * @throws RecipientCountOverflow
     * @throws \HelpPC\CzechDataBox\Exception\ConnectionException
     * @throws \HelpPC\CzechDataBox\Exception\SystemExclusion
     */
    public function CreateMessage(Account $account, Request\CreateMessage $input): Response\CreateMessage
    {
        return $this->dataMessage->CreateMessage($account, $input);
    }

    /**
     * Stažení došlé zprávy
     * @param Account $account
     * @param Request\MessageDownload $input
     * @return Response\MessageDownload
     * @throws \HelpPC\CzechDataBox\Exception\ConnectionException
     * @throws \HelpPC\CzechDataBox\Exception\SystemExclusion
     */
    public function MessageDownload(Account $account, Request\MessageDownload $input): Response\MessageDownload
    {
        return $this->dataMessage->MessageDownload($account, $input);
    }

    /**
     * Stažení došlé zprávy s podpisem značkou MV
     * @param Account $account
     * @param Request\SignedMessageDownload $input
     * @return Response\SignedMessageDownload
     * @throws \HelpPC\CzechDataBox\Exception\ConnectionException
     * @throws \HelpPC\CzechDataBox\Exception\SystemExclusion
     */
    public function SignedMessageDownload(Account $account, Request\SignedMessageDownload $input): Response\SignedMessageDownload
    {
        return $this->dataMessage->SignedMessageDownload($account, $input);
    }

    /**
     * Stažení odeslané zprávy s podpisem MV
     * @param Account $account
     * @param Request\SignedSentMessageDownload $input
     * @return Response\SignedSentMessageDownload
     * @throws \HelpPC\CzechDataBox\Exception\ConnectionException
     * @throws \HelpPC\CzechDataBox\Exception\SystemExclusion
     */
    public function SignedSentMessageDownload(Account $account, Request\SignedSentMessageDownload $input): Response\SignedSentMessageDownload
    {
        return $this->dataMessage->SignedSentMessageDownload($account, $input);
    }


    /**
     * Přepodepsání zprávy, dodejky či doručenky
     * @param Account $account
     * @param Request\ResignISDSDocument $input
     * @return Response\ResignISDSDocument
     * @throws \HelpPC\CzechDataBox\Exception\ConnectionException
     * @throws \HelpPC\CzechDataBox\Exception\SystemExclusion
     */
    public function ResignISDSDocument(Account $account, Request\ResignISDSDocument $input): Response\ResignISDSDocument
    {
        return $this->dataMessage->ResignISDSDocument($account, $input);
    }

    /**
     * Stažení obálky došlé zprávy
     * @param Account $account
     * @param Request\MessageEnvelopeDownload $input
     * @return Response\MessageEnvelopeDownload
     * @throws \HelpPC\CzechDataBox\Exception\ConnectionException
     * @throws \HelpPC\CzechDataBox\Exception\SystemExclusion
     */
    public function MessageEnvelopeDownload(Account $account, Request\MessageEnvelopeDownload $input): Response\MessageEnvelopeDownload
    {
        return $this->dataMessage->MessageEnvelopeDownload($account, $input);
    }

    /**
     * Označení zprávy jako „Přečtená“
     * @param Account $account
     * @param Request\MarkMessageAsDownloaded $input
     * @return Response\MarkMessageAsDownloaded
     * @throws \HelpPC\CzechDataBox\Exception\ConnectionException
     * @throws \HelpPC\CzechDataBox\Exception\SystemExclusion
     */
    public function MarkMessageAsDownloaded(Account $account, Request\MarkMessageAsDownloaded $input): Response\MarkMessageAsDownloaded
    {
        return $this->dataMessage->MarkMessageAsDownloaded($account, $input);
    }

    /**
     * Stažení informace o dodání a doručování zprávy
     * @param Account $account
     * @param Request\GetDeliveryInfo $input
     * @return Response\GetDeliveryInfo
     * @throws \HelpPC\CzechDataBox\Exception\ConnectionException
     * @throws \HelpPC\CzechDataBox\Exception\SystemExclusion
     */
    public function GetDeliveryInfo(Account $account, Request\GetDeliveryInfo $input): Response\GetDeliveryInfo
    {
        return $this->dataMessage->GetDeliveryInfo($account, $input);
    }

    /**
     * Stažení informace o dodání a doručování zprávy, s podpisem značkou MV
     * @param Account $account
     * @param Request\GetSignedDeliveryInfo $input
     * @return Response\GetSignedDeliveryInfo
     * @throws \HelpPC\CzechDataBox\Exception\ConnectionException
     * @throws \HelpPC\CzechDataBox\Exception\SystemExclusion
     */
    public function GetSignedDeliveryInfo(Account $account, Request\GetSignedDeliveryInfo $input): Response\GetSignedDeliveryInfo
    {
        return $this->dataMessage->GetSignedDeliveryInfo($account, $input);
    }


    /**
     * Stazeni seznamu odeslanych zprav urceneho casovym intervalem, organizacni jednotkou odesilatele,
     * filtrem na stav zprav a usekem poradovych cisel zaznamu. Vrati seznam zprav.
     * @param Account $account
     * @param Request\GetListOfSentMessages $input
     * @return Response\GetListOfSentMessages
     * @throws \HelpPC\CzechDataBox\Exception\ConnectionException
     * @throws \HelpPC\CzechDataBox\Exception\SystemExclusion
     */
    public function GetListOfSentMessages(Account $account, Request\GetListOfSentMessages $input): Response\GetListOfSentMessages
    {
        return $this->dataMessage->GetListOfSentMessages($account, $input);
    }

    /**
     * Stazeni seznamu doslych zprav urceneho casovym intervalem,
     * zpresnenim organizacni jednotky adresata (pouze ESS), filtrem na stav zprav
     * a usekem poradovych cisel zaznamu
     *
     * @param Account $account
     * @param Request\GetListOfReceivedMessages $input
     * @return Response\GetListOfReceivedMessages
     * @throws \HelpPC\CzechDataBox\Exception\ConnectionException
     * @throws \HelpPC\CzechDataBox\Exception\SystemExclusion
     */
    public function GetListOfReceivedMessages(Account $account, Request\GetListOfReceivedMessages $input): Response\GetListOfReceivedMessages
    {
        return $this->dataMessage->GetListOfReceivedMessages($account, $input);
    }

    /**
     * Stažení seznamu odeslaných zpráv, u nichž došlo ke změně stavu
     * @param Account $account
     * @param Request\GetMessageStateChanges $input
     * @return Response\GetMessageStateChanges
     * @throws \HelpPC\CzechDataBox\Exception\ConnectionException
     * @throws \HelpPC\CzechDataBox\Exception\SystemExclusion
     */
    public function GetMessageStateChanges(Account $account, Request\GetMessageStateChanges $input): Response\GetMessageStateChanges
    {
        return $this->dataMessage->GetMessageStateChanges($account, $input);
    }

    /**
     * Potvrzeni doruceni komercni zpravy
     * @param Account $account
     * @param Request\ConfirmDelivery $input
     * @return Response\ConfirmDelivery
     * @throws \HelpPC\CzechDataBox\Exception\ConnectionException
     * @throws \HelpPC\CzechDataBox\Exception\SystemExclusion
     * @deprecated
     */
    function ConfirmDelivery(Account $account, Request\ConfirmDelivery $input): Response\ConfirmDelivery
    {
        return $this->dataMessage->ConfirmDelivery($account, $input);
    }

    /**
     * Vyhledani datove schranky
     *
     * @param Account $account
     * @param Request\FindDataBox $input
     * @return Response\FindDataBox
     * @throws \HelpPC\CzechDataBox\Exception\ConnectionException
     * @throws \HelpPC\CzechDataBox\Exception\SystemExclusion
     */
    public function FindDataBox(Account $account, Request\FindDataBox $input): Response\FindDataBox
    {
        return $this->searchData->FindDataBox($account,$input);
    }

    /**
     * todo check
     *
     * @param Account $account
     * @param Request\PDZInfo $input
     * @return Response\PDZInfo
     * @throws \HelpPC\CzechDataBox\Exception\ConnectionException
     * @throws \HelpPC\CzechDataBox\Exception\SystemExclusion
     */
    public function PDZInfo(Account $account, Request\PDZInfo $input): Response\PDZInfo
    {
        return $this->searchData->PDZInfo($account, $input);
    }

    /**
     * todo check ciRecord
     * @param Account $account
     * @param Request\DataBoxCreditInfo $input
     * @return Response\DataBoxCreditInfo
     * @throws \HelpPC\CzechDataBox\Exception\ConnectionException
     * @throws \HelpPC\CzechDataBox\Exception\SystemExclusion
     */
    public function DataBoxCreditInfo(Account $account, Request\DataBoxCreditInfo $input): Response\DataBoxCreditInfo
    {
        return $this->searchData->DataBoxCreditInfo($account, $input);
    }

    /**
     * fulltextove vyhledavani
     *
     * @param Account $account
     * @param Request\ISDSSearch2 $input
     * @return Response\ISDSSearch2
     * @throws \HelpPC\CzechDataBox\Exception\ConnectionException
     * @throws \HelpPC\CzechDataBox\Exception\SystemExclusion
     */
    public function ISDSSearch2(Account $account, Request\ISDSSearch2 $input): Response\ISDSSearch2
    {
        return $this->searchData->ISDSSearch2($account, $input);
    }

    /**
     * @param Account $account
     * @param Request\GetDataBoxActivityStatus $input
     * @return Response\GetDataBoxActivityStatus
     * @throws \HelpPC\CzechDataBox\Exception\ConnectionException
     * @throws \HelpPC\CzechDataBox\Exception\SystemExclusion
     */
    public function GetDataBoxActivityStatus(Account $account, Request\GetDataBoxActivityStatus $input): Response\GetDataBoxActivityStatus
    {
        return $this->searchData->GetDataBoxActivityStatus($account, $input);
    }

    /**
     * @param Account $account
     * @param Request\DTInfo $input
     * @return Response\DTInfo
     * @throws \HelpPC\CzechDataBox\Exception\ConnectionException
     * @throws \HelpPC\CzechDataBox\Exception\SystemExclusion
     */
    public function DTInfo(Account $account, Request\DTInfo $input): Response\DTInfo
    {
        return $this->searchData->DTInfo($account, $input);
    }

    /**
     * @param Account $account
     * @param Request\PDZSendInfo $input
     * @return Response\PDZSendInfo
     * @throws \HelpPC\CzechDataBox\Exception\ConnectionException
     * @throws \HelpPC\CzechDataBox\Exception\SystemExclusion
     */
    public function PDZSendInfo(Account $account, Request\PDZSendInfo $input): Response\PDZSendInfo
    {
        return $this->searchData->PDZSendInfo($account, $input);
    }

    /**
     * Vyhledavani osobnich schranek. Jde pouzit jen pro OVM
     *
     * @param Account $account
     * @param Request\FindPersonalDataBox $input
     * @return Response\FindPersonalDataBox
     * @throws \HelpPC\CzechDataBox\Exception\ConnectionException
     * @throws \HelpPC\CzechDataBox\Exception\SystemExclusion
     */
    public function FindPersonalDataBox(Account $account, Request\FindPersonalDataBox $input): Response\FindPersonalDataBox
    {
        return $this->searchData->FindPersonalDataBox($account, $input);
    }

    /**
     * @param Account $account
     * @param Request\GetDataBoxList $input
     * @return Response\GetDataBoxList
     * @throws \HelpPC\CzechDataBox\Exception\ConnectionException
     * @throws \HelpPC\CzechDataBox\Exception\SystemExclusion
     */
    public function GetDataBoxList(Account $account, Request\GetDataBoxList $input): Response\GetDataBoxList
    {
        return $this->searchData->GetDataBoxList($account, $input);
    }

    /**
     * Kontrola, zda datova schranka je aktivni
     *
     * @param Account $account
     * @param Request\CheckDataBox $input
     * @return Response\CheckDataBox
     * @throws \HelpPC\CzechDataBox\Exception\ConnectionException
     * @throws \HelpPC\CzechDataBox\Exception\SystemExclusion
     */
    public function CheckDataBox(Account $account, Request\CheckDataBox $input): Response\CheckDataBox
    {
        return $this->searchData->CheckDataBox($account, $input);
    }

}