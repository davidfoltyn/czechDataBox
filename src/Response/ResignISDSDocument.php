<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: Tomas Kulhanek
 * Email: info@tirus.cz
 */

namespace HelpPC\CzechDataBox\Response;


use HelpPC\CzechDataBox\IResponse;
use HelpPC\CzechDataBox\Traits\DataMessageStatus;
use HelpPC\Serializer\Utils\SplFileInfo;
use JMS\Serializer\Annotation as Serializer;

/**
 * Class ResignISDSDocument
 * @package HelpPC\CzechDataBox\Response
 * @Serializer\XmlNamespace(uri="http://isds.czechpoint.cz/v20",prefix="p")
 * @Serializer\XmlRoot(name="p:Re-signISDSDocumentResponse", namespace="http://isds.czechpoint.cz/v20")
 */
class ResignISDSDocument implements IResponse
{
    use DataMessageStatus;
    /**
     * @var SplFileInfo
     * @Serializer\Type("HelpPC\Serializer\Utils\SplFileInfo")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("p:dmResultDoc")
     */
    protected $document;
    /**
     * @var \DateTimeImmutable|null
     * @Serializer\SkipWhenEmpty()
     * @Serializer\Type("DateTimeImmutable<'Y-m-d'>")
     * @Serializer\SerializedName("p:dmValidTo")
     * @Serializer\XmlElement(cdata=false)
     */
    protected $validTo;

    /**
     * @return \HelpPC\CzechDataBox\Entity\DataMessageStatus
     */
    public function getStatus(): \HelpPC\CzechDataBox\Entity\DataMessageStatus
    {
        return $this->status;
    }

    /**
     * @param \HelpPC\CzechDataBox\Entity\DataMessageStatus $status
     * @return ResignISDSDocument
     */
    public function setStatus(\HelpPC\CzechDataBox\Entity\DataMessageStatus $status): ResignISDSDocument
    {
        $this->status = $status;
        return $this;
    }

    /**
     * @return SplFileInfo
     */
    public function getDocument(): SplFileInfo
    {
        return $this->document;
    }

    /**
     * @param SplFileInfo $document
     * @return ResignISDSDocument
     */
    public function setDocument(SplFileInfo $document): ResignISDSDocument
    {
        $this->document = $document;
        return $this;
    }

    /**
     * @return \DateTimeImmutable|null
     */
    public function getValidTo(): ?\DateTimeImmutable
    {
        return $this->validTo;
    }

    /**
     * @param \DateTimeImmutable|null $validTo
     * @return ResignISDSDocument
     */
    public function setValidTo(?\DateTimeImmutable $validTo): ResignISDSDocument
    {
        $this->validTo = $validTo;
        return $this;
    }


}