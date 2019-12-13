<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: Tomas Kulhanek
 * Email: info@tirus.cz
 */

namespace HelpPC\CzechDataBox\Entity;


use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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
     * @var Collection<int, File>
     * @Serializer\Type("ArrayCollection<HelpPC\CzechDataBox\Entity\File>")
     * @Serializer\XmlList(entry="dmFile", inline=false,namespace="http://isds.czechpoint.cz/v20")
     * @Serializer\SerializedName("dmFiles")
     * @Serializer\XmlElement(cdata=false,namespace="http://isds.czechpoint.cz/v20")
     */
    protected Collection $files;


    public function __construct()
    {
        $this->files = new ArrayCollection();
    }

    /**
     * @return Collection<int, File>
     */
    public function getFiles(): Collection
    {
        return $this->files;
    }

    /**
     * @param Collection<int, File> $files
     * @return MessageEnvelope
     */
    public function setFiles(Collection $files): MessageEnvelope
    {
        $this->files = $files;
        return $this;
    }
}