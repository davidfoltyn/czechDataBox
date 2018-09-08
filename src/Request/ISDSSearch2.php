<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: Tomas Kulhanek
 * Email: info@tirus.cz
 */

namespace HelpPC\CzechDataBox\Request;


use HelpPC\CzechDataBox\IRequest;
use JMS\Serializer\Annotation as Serializer;

/**
 * Class ISDSSearch2
 * @package HelpPC\CzechDataBox\Request
 * @Serializer\XmlNamespace(uri="http://isds.czechpoint.cz/v20",prefix="p")
 * @Serializer\XmlRoot(name="p:ISDSSearch2",namespace="http://isds.czechpoint.cz/v20")
 */
class ISDSSearch2 implements IRequest
{


    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("p:searchText")
     */
    private $searchText;
    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("p:searchType")
     */
    private $searchType;
    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("p:searchScope")
     */
    private $searchScope;

    /**
     * @var int
     * @Serializer\Type("int")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("p:page")
     */
    private $page = 1;
    /**
     * @var int
     * @Serializer\Type("int")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("p:pageSize")
     */
    private $pageSize = 20;
    /**
     * @var bool|null
     * @Serializer\SkipWhenEmpty
     * @Serializer\Type("bool")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("p:highlighting")
     */
    private $highlighting;

    /**
     * @return string
     */
    public function getSearchText(): string
    {
        return $this->searchText;
    }

    /**
     * @param string $searchText
     * @return ISDSSearch2
     */
    public function setSearchText(string $searchText): ISDSSearch2
    {
        $this->searchText = $searchText;
        return $this;
    }

    /**
     * @return string
     */
    public function getSearchType(): string
    {
        return $this->searchType;
    }

    /**
     * @param string $searchType
     * @return ISDSSearch2
     */
    public function setSearchType(string $searchType): ISDSSearch2
    {
        $this->searchType = $searchType;
        return $this;
    }

    /**
     * @return string
     */
    public function getSearchScope(): string
    {
        return $this->searchScope;
    }

    /**
     * @param string $searchScope
     * @return ISDSSearch2
     */
    public function setSearchScope(string $searchScope): ISDSSearch2
    {
        $this->searchScope = $searchScope;
        return $this;
    }

    /**
     * @return int
     */
    public function getPage(): int
    {
        return $this->page;
    }

    /**
     * @param int $page
     * @return ISDSSearch2
     */
    public function setPage(int $page): ISDSSearch2
    {
        $this->page = $page;
        return $this;
    }

    /**
     * @return int
     */
    public function getPageSize(): int
    {
        return $this->pageSize;
    }

    /**
     * @param int $pageSize
     * @return ISDSSearch2
     */
    public function setPageSize(int $pageSize): ISDSSearch2
    {
        $this->pageSize = $pageSize;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function isHighlighting(): ?bool
    {
        return $this->highlighting;
    }

    /**
     * @param bool $highlighting
     * @return ISDSSearch2
     */
    public function setHighlighting(bool $highlighting): ISDSSearch2
    {
        $this->highlighting = $highlighting;
        return $this;
    }

}