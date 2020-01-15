<?php declare(strict_types=1);

namespace HelpPC\CzechDataBox\Connector;


use HelpPC\CzechDataBox\Request;
use HelpPC\CzechDataBox\Response;

class SearchDataBox extends Connector
{
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
        return $this->send($account, self::SEARCHWS, $input, Response\FindDataBox::class);
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
        return $this->send($account, self::SEARCHWS, $input, Response\PDZInfo::class);
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
        return $this->send($account, self::SEARCHWS, $input, Response\DataBoxCreditInfo::class);
    }

    /**
     * fulltextove vyhledavani
     *
     * @param Account $account
     * @param Request\ISDSSearch3 $input
     * @return Response\ISDSSearch3
     * @throws \HelpPC\CzechDataBox\Exception\ConnectionException
     * @throws \HelpPC\CzechDataBox\Exception\SystemExclusion
     */
    public function ISDSSearch3(Account $account, Request\ISDSSearch3 $input): Response\ISDSSearch3
    {
        return $this->send($account, self::SEARCHWS, $input, Response\ISDSSearch3::class);
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
        return $this->send($account, self::SEARCHWS, $input, Response\GetDataBoxActivityStatus::class);
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
        return $this->send($account, self::SEARCHWS, $input, Response\DTInfo::class);
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
        return $this->send($account, self::SEARCHWS, $input, Response\PDZSendInfo::class);
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
        return $this->send($account, self::SEARCHWS, $input, Response\FindPersonalDataBox::class);
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
        return $this->send($account, self::SEARCHWS, $input, Response\GetDataBoxList::class);
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
        return $this->send($account, self::SEARCHWS, $input, Response\CheckDataBox::class);
    }
}