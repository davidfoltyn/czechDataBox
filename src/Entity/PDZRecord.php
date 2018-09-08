<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: Tomas Kulhanek
 * Email: info@tirus.cz
 */

namespace HelpPC\CzechDataBox\Entity;

use JMS\Serializer\Annotation as Serializer;

/**
 * Class CreditRecord
 * @package HelpPC\CzechDataBox\Entity
 * @Serializer\XmlRoot(name="p:dbPDZRecord")
 * @Serializer\XmlNamespace(uri="http://isds.czechpoint.cz/v20",prefix="p")
 */
class PDZRecord
{
    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("p:PDZType")
     * @Serializer\XmlElement(cdata=false)
     */
    protected $type;
    /**
     * @var string|null
     * @Serializer\Type("string")
     * @Serializer\SerializedName("p:PDZRecip")
     * @Serializer\XmlElement(cdata=false)
     */
    protected $recipient;
    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("p:PDZPayer")
     * @Serializer\XmlElement(cdata=false)
     */
    protected $payer;
    /**
     * @var \DateTime|null
     * @Serializer\Type("DateTime<'Y-m-d\TH:i:s.uP','Europe/Prague'>")
     * @Serializer\SerializedName("p:PDZExpire")
     * @Serializer\XmlElement(cdata=false)
     */
    protected $expire;
    /**
     * @var int|null
     * @Serializer\Type("int")
     * @Serializer\SerializedName("p:PDZCnt")
     * @Serializer\XmlElement(cdata=false)
     */
    protected $count;
    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("p:ODZIdent")
     * @Serializer\XmlElement(cdata=false)
     */
    protected $ident;

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     * @return PDZRecord
     */
    public function setType(string $type): PDZRecord
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getRecipient(): ?string
    {
        return $this->recipient;
    }

    /**
     * @param null|string $recipient
     * @return PDZRecord
     */
    public function setRecipient(?string $recipient): PDZRecord
    {
        $this->recipient = $recipient;
        return $this;
    }

    /**
     * @return string
     */
    public function getPayer(): string
    {
        return $this->payer;
    }

    /**
     * @param string $payer
     * @return PDZRecord
     */
    public function setPayer(string $payer): PDZRecord
    {
        $this->payer = $payer;
        return $this;
    }

    /**
     * @return \DateTime|null
     */
    public function getExpire(): ?\DateTime
    {
        return $this->expire;
    }

    /**
     * @param \DateTime|null $expire
     * @return PDZRecord
     */
    public function setExpire(?\DateTime $expire): PDZRecord
    {
        $this->expire = $expire;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getCount(): ?int
    {
        return $this->count;
    }

    /**
     * @param int|null $count
     * @return PDZRecord
     */
    public function setCount(?int $count): PDZRecord
    {
        $this->count = $count;
        return $this;
    }

    /**
     * @return string
     */
    public function getIdent(): string
    {
        return $this->ident;
    }

    /**
     * @param string $ident
     * @return PDZRecord
     */
    public function setIdent(string $ident): PDZRecord
    {
        $this->ident = $ident;
        return $this;
    }


}