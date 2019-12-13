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
     * @Serializer\Type("string")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("p:searchText")
     */
    private string $searchText;
    /**
     * @Serializer\Type("string")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("p:searchType")
     */
    private string $searchType;
    /**
     * @Serializer\Type("string")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("p:searchScope")
     */
    private string $searchScope;

    /**
     * @Serializer\Type("int")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("p:page")
     */
    private int $page = 1;
    /**
     * @Serializer\Type("int")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("p:pageSize")
     */
    private int $pageSize = 20;
    /**
     * @Serializer\SkipWhenEmpty
     * @Serializer\Type("bool")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("p:highlighting")
     */
    private ?bool $highlighting;

    public function getSearchText(): string
    {
        return $this->searchText;
    }

    public function setSearchText(string $searchText): ISDSSearch2
    {
        $this->searchText = $searchText;
        return $this;
    }

    public function getSearchType(): string
    {
        return $this->searchType;
    }

    public function setSearchType(string $searchType): ISDSSearch2
    {
        $this->searchType = $searchType;
        return $this;
    }

    public function getSearchScope(): string
    {
        return $this->searchScope;
    }

    public function setSearchScope(string $searchScope): ISDSSearch2
    {
        $this->searchScope = $searchScope;
        return $this;
    }

    public function getPage(): int
    {
        return $this->page;
    }

    public function setPage(int $page): ISDSSearch2
    {
        $this->page = $page;
        return $this;
    }

    public function getPageSize(): int
    {
        return $this->pageSize;
    }

    public function setPageSize(int $pageSize): ISDSSearch2
    {
        $this->pageSize = $pageSize;
        return $this;
    }

    public function isHighlighting(): ?bool
    {
        return $this->highlighting;
    }

    public function setHighlighting(bool $highlighting): ISDSSearch2
    {
        $this->highlighting = $highlighting;
        return $this;
    }

}