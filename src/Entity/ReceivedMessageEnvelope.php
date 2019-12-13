<?php
declare(strict_types=1);

namespace HelpPC\CzechDataBox\Entity;

use JMS\Serializer\Annotation as Serializer;
use Doctrine\Common\Collections\ArrayCollection;
use HelpPC\CzechDataBox\Entity\File;
use HelpPC\CzechDataBox\Traits\DataMessageEnvelope;
use HelpPC\CzechDataBox\Traits\GetMainFile;

class ReceivedMessageEnvelope
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

    public function getFiles(): ArrayCollection
    {
        return $this->files;
    }

    public function setFiles(ArrayCollection $files): ReceivedMessageEnvelope
    {
        $this->files = $files;
        return $this;
    }
}