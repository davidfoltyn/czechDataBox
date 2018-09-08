<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: Tomas Kulhanek
 * Email: info@tirus.cz
 */

namespace HelpPC\CzechDataBox;


use HelpPC\CzechDataBox\Connector\{Account, DataBox, DataMessage, SearchDataBox};
use HelpPC\CzechDataBox\Exception\ConnectionNotEstablish;
use HelpPC\Serializer\SerializerFactory;
use JMS\Serializer\Serializer;

class Manager
{
    /**
     * @var Serializer
     */
    private static $serializer;
    /** @var DataBox */
    private $dataBox;
    /** @var DataMessage */
    private $dataMessage;
    /** @var SearchDataBox */
    private $searchData;

    public function __construct(DataBox $dataBox, DataMessage $dataMessage, SearchDataBox $searchDataBox)
    {
        $this->dataBox = $dataBox;
        $this->dataMessage = $dataMessage;
        $this->searchData = $searchDataBox;
    }

    public function connect(Account $account)
    {
        $this->dataBox->connect($account, $this->getProxyaddress(), $this->getProxyport(), $this->getProxylogin(), $this->getProxypwd());
        $this->dataMessage->connect($account, $this->getProxyaddress(), $this->getProxyport(), $this->getProxylogin(), $this->getProxypwd());
        $this->searchData->connect($account, $this->getProxyaddress(), $this->getProxyport(), $this->getProxylogin(), $this->getProxypwd());
    }

    public function getSerializer()
    {
        return self::$serializer;
    }

    /** @var string|null */
    protected $proxyaddress;
    /** @var int|null */
    protected $proxyport;
    /** @var string|null */
    protected $proxylogin;
    /** @var string|null */
    protected $proxypwd;

    /**
     * @return null|string
     */
    public function getProxyaddress(): ?string
    {
        return $this->proxyaddress;
    }

    /**
     * @param null|string $proxyaddress
     * @return Manager
     */
    public function setProxyaddress(?string $proxyaddress): Manager
    {
        $this->proxyaddress = $proxyaddress;
        return $this;
    }

    /**
     * @return null|int
     */
    public function getProxyport(): ?int
    {
        return $this->proxyport;
    }

    /**
     * @param null|int $proxyport
     * @return Manager
     */
    public function setProxyport(?int $proxyport): Manager
    {
        $this->proxyport = $proxyport;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getProxylogin(): ?string
    {
        return $this->proxylogin;
    }

    /**
     * @param null|string $proxylogin
     * @return Manager
     */
    public function setProxylogin(?string $proxylogin): Manager
    {
        $this->proxylogin = $proxylogin;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getProxypwd(): ?string
    {
        return $this->proxypwd;
    }

    /**
     * @param null|string $proxypwd
     * @return Manager
     */
    public function setProxypwd(?string $proxypwd): Manager
    {
        $this->proxypwd = $proxypwd;
        return $this;
    }


    /**
     * @param null $proxyaddress
     * @param null $proxyport
     * @param null $proxylogin
     * @param null $proxypwd
     * @return Manager
     */
    public static function create($proxyaddress = null, $proxyport = null, $proxylogin = null, $proxypwd = null): Manager
    {
        if (!self::$serializer instanceof Serializer) {
            self::$serializer = SerializerFactory::create();
        }
        $obj = new static(
            new DataBox(self::$serializer),
            new DataMessage(self::$serializer),
            new SearchDataBox(self::$serializer)
        );
        $obj->setProxyaddress($proxyaddress)
            ->setProxyport($proxyport)
            ->setProxylogin($proxylogin)
            ->setProxypwd($proxypwd);

        return $obj;
    }

    /**
     * Get DataMessage connector
     * @return DataMessage
     * @throws ConnectionNotEstablish
     */
    public function message(): DataMessage
    {
        if (!$this->dataMessage->isConnected()) {
            throw new ConnectionNotEstablish();
        }
        return $this->dataMessage;
    }

    /**
     * Get SearchDataBox connector
     * @return SearchDataBox
     * @throws ConnectionNotEstablish
     */
    public function search(): SearchDataBox
    {
        if (!$this->searchData->isConnected()) {
            throw new ConnectionNotEstablish();
        }
        return $this->searchData;
    }

    /**
     * Get DataBox connector
     * @return DataBox
     * @throws ConnectionNotEstablish
     */
    public function box(): DataBox
    {
        if (!$this->dataBox->isConnected()) {
            throw new ConnectionNotEstablish();
        }
        return $this->dataBox;
    }
}