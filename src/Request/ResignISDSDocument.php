<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: Tomas Kulhanek
 * Email: info@tirus.cz
 */

namespace HelpPC\CzechDataBox\Request;


use HelpPC\CzechDataBox\IRequest;
use HelpPC\Serializer\Utils\SplFileInfo;
use JMS\Serializer\Annotation as Serializer;

/**
 * Class ResignISDSDocument
 * @package HelpPC\CzechDataBox\Request
 * @Serializer\XmlNamespace(uri="http://isds.czechpoint.cz/v20",prefix="p")
 * @Serializer\XmlRoot(name="p:Re-signISDSDocument",namespace="http://isds.czechpoint.cz/v20")
 */
class ResignISDSDocument implements IRequest
{

    /**
     * @var SplFileInfo
     * @Serializer\Type("HelpPC\Serializer\Utils\SplFileInfo")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("p:dmDoc")
     */
    protected $document;

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


}