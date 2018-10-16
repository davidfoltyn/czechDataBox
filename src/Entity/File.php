<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: Tomas Kulhanek
 * Email: info@tirus.cz
 */

namespace HelpPC\CzechDataBox\Entity;

use HelpPC\Serializer\Utils\SplFileInfo;
use JMS\Serializer\Annotation as Serializer;

/**
 * Class File
 * @package HelpPC\CzechDataBox\Entity
 * @Serializer\XmlRoot(name="p:dmFile")
 * @Serializer\XmlNamespace(uri="http://isds.czechpoint.cz/v20",prefix="p")
 * @Serializer\AccessType("public_method")
 */
class File
{
    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\XmlAttribute
     * @Serializer\SerializedName("dmMimeType")
     */
    protected $mimeType;
    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\XmlAttribute
     * @Serializer\SerializedName("dmFileMetaType")
     */
    protected $metaType;
    /**
     * @var string|null
     * @Serializer\Type("string")
     * @Serializer\SkipWhenEmpty
     * @Serializer\XmlAttribute
     * @Serializer\SerializedName("dmFileGuid")
     */
    protected $guid;
    /**
     * @var string|null
     * @Serializer\Type("string")
     * @Serializer\SkipWhenEmpty
     * @Serializer\XmlAttribute
     * @Serializer\SerializedName("dmUpFileGuid")
     */
    protected $upGuid;
    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\XmlAttribute
     * @Serializer\SerializedName("dmFileDescr")
     */
    protected $description;
    /**
     * @var string|null
     * @Serializer\SkipWhenEmpty
     * @Serializer\Type("string")
     * @Serializer\XmlAttribute
     * @Serializer\SerializedName("dmFormat")
     */
    protected $format;
    /**
     * @var SplFileInfo|null
     * @Serializer\Type("base64Binary")
     * @Serializer\SerializedName("p:dmEncodedContent")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty()
     */
    protected $encodedContent;
    /**
     * @var string|null
     * @Serializer\Type("string")
     * @Serializer\SerializedName("p:dmXMLContent")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty()
     */
    protected $xmlContent;

    /**
     * @return string
     */
    public function getMimeType(): string
    {
        return $this->mimeType;
    }

    /**
     * @param string $mimeType
     * @return File
     */
    public function setMimeType(string $mimeType): File
    {
        $this->mimeType = $mimeType;
        return $this;
    }

    /**
     * @return string
     */
    public function getMetaType(): string
    {
        return $this->metaType;
    }

    /**
     * @param string $metaType
     * @return File
     */
    public function setMetaType(string $metaType): File
    {
        $this->metaType = $metaType;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getGuid(): ?string
    {
        return $this->guid;
    }

    /**
     * @param null|string $guid
     * @return File
     */
    public function setGuid(?string $guid): File
    {
        $this->guid = $guid;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getUpGuid(): ?string
    {
        return $this->upGuid;
    }

    /**
     * @param null|string $upGuid
     * @return File
     */
    public function setUpGuid(?string $upGuid): File
    {
        $this->upGuid = $upGuid;
        return $this;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     * @return File
     */
    public function setDescription(string $description): File
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getFormat(): ?string
    {
        return $this->format;
    }

    /**
     * @param null|string $format
     * @return File
     */
    public function setFormat(?string $format): File
    {
        $this->format = $format;
        return $this;
    }

    /**
     * @return SplFileInfo|null
     */
    public function getEncodedContent(): ?SplFileInfo
    {
        return $this->encodedContent;
    }

    /**
     * @param SplFileInfo $encodedContent
     * @return File
     */
    public function setEncodedContent(SplFileInfo $encodedContent): File
    {
        $this->encodedContent = $encodedContent;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getXmlContent(): ?string
    {
        return $this->xmlContent;
    }

    /**
     * @param string $xmlContent
     * @return File
     */
    public function setXmlContent(string $xmlContent): File
    {
        $this->xmlContent = $xmlContent;
        return $this;
    }


}