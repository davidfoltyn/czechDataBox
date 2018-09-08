<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: Tomas Kulhanek
 * Email: info@tirus.cz
 */

namespace HelpPC\CzechDataBox\Entity;


use Doctrine\Common\Collections\ArrayCollection;
use HelpPC\CzechDataBox\Traits\DataMessageEnvelope;
use HelpPC\CzechDataBox\Traits\GetMainFile;
use JMS\Serializer\Annotation as Serializer;

/**
 * Class MessageEnvelope
 * @package HelpPC\CzechDataBox\Entity
 * @Serializer\XmlRoot(name="p:dmDm")
 * @Serializer\XmlNamespace(uri="http://isds.czechpoint.cz/v20",prefix="p")
 */
class MessageEnvelope
{
    use GetMainFile;
    use DataMessageEnvelope;
    /**
     * @var ArrayCollection
     * @Serializer\Type("ArrayCollection<HelpPC\CzechDataBox\Entity\File>")
     * @Serializer\XmlList(entry="dmFile", inline=false,namespace="http://isds.czechpoint.cz/v20")
     * @Serializer\SerializedName("dmFiles")
     * @Serializer\XmlElement(cdata=false,namespace="http://isds.czechpoint.cz/v20")
     */
    protected $files;


    public function __construct()
    {
        $this->files = new ArrayCollection();
    }

    /**
     * @return ArrayCollection
     */
    public function getFiles(): ArrayCollection
    {
        return $this->files;
    }

    /**
     * @param ArrayCollection $files
     * @return MessageEnvelope
     */
    public function setFiles(ArrayCollection $files): MessageEnvelope
    {
        $this->files = $files;
        return $this;
    }
}