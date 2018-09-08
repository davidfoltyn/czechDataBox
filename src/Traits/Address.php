<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: Tomas Kulhanek
 * Email: info@tirus.cz
 */

namespace HelpPC\CzechDataBox\Traits;


use JMS\Serializer\Annotation as Serializer;

trait Address
{
    /**
     * @var string|null
     * @Serializer\Type("string")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("p:adCity")
     */
    protected $adCity;
    /**
     * @var string|null
     * @Serializer\Type("string")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("p:adStreet")
     */
    protected $adStreet;
    /**
     * @var string|null
     * @Serializer\Type("string")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("p:adNumberInStreet")
     */
    protected $adNumberInStreet;
    /**
     * @var string|null
     * @Serializer\Type("string")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("p:adNumberInMunicipality")
     */
    protected $adNumberInMunicipality;
    /**
     * @var string|null
     * @Serializer\Type("string")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("p:adZipCode")
     */
    protected $adZipCode;
    /**
     * @var string|null
     * @Serializer\Type("string")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("p:adState")
     */
    protected $adState;

    /**
     * @return null|string
     */
    public function getAdCity(): ?string
    {
        return $this->adCity;
    }

    /**
     * @param null|string $adCity
     * @return self
     */
    public function setAdCity(?string $adCity): self
    {
        $this->adCity = $adCity;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getAdStreet(): ?string
    {
        return $this->adStreet;
    }

    /**
     * @param null|string $adStreet
     * @return self
     */
    public function setAdStreet(?string $adStreet): self
    {
        $this->adStreet = $adStreet;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getAdNumberInStreet(): ?string
    {
        return $this->adNumberInStreet;
    }

    /**
     * @param null|string $adNumberInStreet
     * @return self
     */
    public function setAdNumberInStreet(?string $adNumberInStreet): self
    {
        $this->adNumberInStreet = $adNumberInStreet;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getAdNumberInMunicipality(): ?string
    {
        return $this->adNumberInMunicipality;
    }

    /**
     * @param null|string $adNumberInMunicipality
     * @return self
     */
    public function setAdNumberInMunicipality(?string $adNumberInMunicipality): self
    {
        $this->adNumberInMunicipality = $adNumberInMunicipality;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getAdZipCode(): ?string
    {
        return $this->adZipCode;
    }

    /**
     * @param null|string $adZipCode
     * @return self
     */
    public function setAdZipCode(?string $adZipCode): self
    {
        $this->adZipCode = $adZipCode;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getAdState(): ?string
    {
        return $this->adState;
    }

    /**
     * @param null|string $adState
     * @return self
     */
    public function setAdState(?string $adState): self
    {
        $this->adState = $adState;
        return $this;
    }


}