<?php declare(strict_types=1);

namespace HelpPC\CzechDataBox\Connector;


use HelpPC\CzechDataBox\Request;
use HelpPC\CzechDataBox\Response;

class SearchDataBox extends Connector
{
    /**
     * Vyhledani datove schranky
     *
     * @param Request\FindDataBox $input
     * @return Response\FindDataBox
     * @throws \HelpPC\CzechDataBox\Exception\ConnectionException
     * @throws \HelpPC\CzechDataBox\Exception\SystemExclusion
     */
    public function FindDataBox(Request\FindDataBox $input): Response\FindDataBox
    {
        return $this->send($this->getLocation(self::SEARCHWS), $input, Response\FindDataBox::class);
    }

    /**
     * todo check
     *
     * @param Request\PDZInfo $input
     * @return Response\PDZInfo
     * @throws \HelpPC\CzechDataBox\Exception\ConnectionException
     * @throws \HelpPC\CzechDataBox\Exception\SystemExclusion
     */
    public function PDZInfo(Request\PDZInfo $input): Response\PDZInfo
    {
        return $this->send($this->getLocation(self::SEARCHWS), $input, Response\PDZInfo::class);
    }

    /**
     * todo check ciRecord
     * @param Request\DataBoxCreditInfo $input
     * @return Response\DataBoxCreditInfo
     * @throws \HelpPC\CzechDataBox\Exception\ConnectionException
     * @throws \HelpPC\CzechDataBox\Exception\SystemExclusion
     */
    public function DataBoxCreditInfo(Request\DataBoxCreditInfo $input): Response\DataBoxCreditInfo
    {
        return $this->send($this->getLocation(self::SEARCHWS), $input, Response\DataBoxCreditInfo::class);
    }

    /**
     * fulltextove vyhledavani
     *
     * @param Request\ISDSSearch2 $input
     * @return Response\ISDSSearch2
     * @throws \HelpPC\CzechDataBox\Exception\ConnectionException
     * @throws \HelpPC\CzechDataBox\Exception\SystemExclusion
     */
    public function ISDSSearch2(Request\ISDSSearch2 $input): Response\ISDSSearch2
    {
        return $this->send($this->getLocation(self::SEARCHWS), $input, Response\ISDSSearch2::class);
    }

    /**
     * @param Request\GetDataBoxActivityStatus $input
     * @return Response\GetDataBoxActivityStatus
     * @throws \HelpPC\CzechDataBox\Exception\ConnectionException
     * @throws \HelpPC\CzechDataBox\Exception\SystemExclusion
     */
    public function GetDataBoxActivityStatus(Request\GetDataBoxActivityStatus $input): Response\GetDataBoxActivityStatus
    {
        return $this->send($this->getLocation(self::SEARCHWS), $input, Response\GetDataBoxActivityStatus::class);
    }

    /**
     * @param Request\DTInfo $input
     * @return Response\DTInfo
     * @throws \HelpPC\CzechDataBox\Exception\ConnectionException
     * @throws \HelpPC\CzechDataBox\Exception\SystemExclusion
     */
    public function DTInfo(Request\DTInfo $input): Response\DTInfo
    {
        return $this->send($this->getLocation(self::SEARCHWS), $input, Response\DTInfo::class);
    }

    /**
     * @param Request\PDZSendInfo $input
     * @return Response\PDZSendInfo
     * @throws \HelpPC\CzechDataBox\Exception\ConnectionException
     * @throws \HelpPC\CzechDataBox\Exception\SystemExclusion
     */
    public function PDZSendInfo(Request\PDZSendInfo $input): Response\PDZSendInfo
    {
        return $this->send($this->getLocation(self::SEARCHWS), $input, Response\PDZSendInfo::class);
    }

    /**
     * Vyhledavani osobnich schranek. Jde pouzit jen pro OVM
     *
     * @param Request\FindPersonalDataBox $input
     * @return Response\FindPersonalDataBox
     * @throws \HelpPC\CzechDataBox\Exception\ConnectionException
     * @throws \HelpPC\CzechDataBox\Exception\SystemExclusion
     */
    public function FindPersonalDataBox(Request\FindPersonalDataBox $input): Response\FindPersonalDataBox
    {
        return $this->send($this->getLocation(self::SEARCHWS), $input, Response\FindPersonalDataBox::class);
    }

    /**
     * @param Request\GetDataBoxList $input
     * @return Response\GetDataBoxList
     * @throws \HelpPC\CzechDataBox\Exception\ConnectionException
     * @throws \HelpPC\CzechDataBox\Exception\SystemExclusion
     */
    public function GetDataBoxList(Request\GetDataBoxList $input): Response\GetDataBoxList
    {
        return $this->send($this->getLocation(self::SEARCHWS), $input, Response\GetDataBoxList::class);
    }

    /**
     * Kontrola, zda datova schranka je aktivni
     *
     * @param Request\CheckDataBox $input
     * @return Response\CheckDataBox
     * @throws \HelpPC\CzechDataBox\Exception\ConnectionException
     * @throws \HelpPC\CzechDataBox\Exception\SystemExclusion
     */
    public function CheckDataBox(Request\CheckDataBox $input): Response\CheckDataBox
    {
        return $this->send($this->getLocation(self::SEARCHWS), $input, Response\CheckDataBox::class);
    }
}