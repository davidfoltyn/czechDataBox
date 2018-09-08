<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: Tomas Kulhanek
 * Email: info@tirus.cz
 */

namespace HelpPC\CzechDataBox\Request;

use Doctrine\Common\Collections\ArrayCollection;
use HelpPC\CzechDataBox\Entity\Envelope;
use HelpPC\CzechDataBox\Entity\File;
use HelpPC\CzechDataBox\Entity\Recipient;
use HelpPC\CzechDataBox\IRequest;
use HelpPC\CzechDataBox\Traits\GetMainFile;
use JMS\Serializer\Annotation as Serializer;

/**
 * Class CreateMessage
 * @package HelpPC\CzechDataBox\Request
 * @Serializer\XmlNamespace(uri="http://isds.czechpoint.cz/v20",prefix="p")
 * @Serializer\XmlRoot(name="p:CreateMultipleMessage",namespace="http://isds.czechpoint.cz/v20")
 * @Serializer\AccessorOrder("custom",custom={"recipients","envelope","files"})
 */
class CreateMessage implements IRequest
{
    use GetMainFile;
    /**
     * @var Envelope
     * @Serializer\Type("HelpPC\CzechDataBox\Entity\Envelope")
     * @Serializer\SerializedName("p:dmEnvelope")
     * @Serializer\XmlElement(cdata=false)
     */
    protected $envelope;

    /**
     * @var ArrayCollection
     * @Serializer\Type("ArrayCollection<HelpPC\CzechDataBox\Entity\File>")
     * @Serializer\XmlList(entry="dmFile", inline=false,namespace="http://isds.czechpoint.cz/v20")
     * @Serializer\SerializedName("dmFiles")
     * @Serializer\XmlElement(cdata=false,namespace="http://isds.czechpoint.cz/v20")
     */
    protected $files;
    /**
     * @var ArrayCollection
     * @Serializer\Type("ArrayCollection<HelpPC\CzechDataBox\Entity\Recipient>")
     * @Serializer\XmlList(entry="dmRecipient", inline=false,namespace="http://isds.czechpoint.cz/v20")
     * @Serializer\SerializedName("dmRecipients")
     * @Serializer\XmlElement(cdata=false,namespace="http://isds.czechpoint.cz/v20")
     */
    protected $recipients;

    public function __construct()
    {
        $this->files = new ArrayCollection();
        $this->recipients = new ArrayCollection();
    }

    /**
     * @return Envelope
     */
    public function getEnvelope(): Envelope
    {
        return $this->envelope;
    }

    /**
     * @param Envelope $envelope
     * @return CreateMessage
     */
    public function setEnvelope(Envelope $envelope): CreateMessage
    {
        $this->envelope = $envelope;
        return $this;
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
     * @return CreateMessage
     */
    public function setFiles(ArrayCollection $files): CreateMessage
    {
        $this->files = $files;
        return $this;
    }

    /**
     * @return ArrayCollection
     */
    public function getRecipients(): ArrayCollection
    {
        return $this->recipients;
    }

    /**
     * @param ArrayCollection $recipients
     * @return CreateMessage
     */
    public function setRecipients(ArrayCollection $recipients): CreateMessage
    {
        $this->recipients = $recipients;
        return $this;
    }

    public function addRecipient(Recipient $recipient): CreateMessage
    {
        if (!$this->recipients->contains($recipient)) {
            $this->recipients->add($recipient);
        }
        return $this;
    }

    public function addFile(File $file): CreateMessage
    {
        if (!$this->files->contains($file)) {
            $this->files->add($file);
        }
        return $this;
    }

}