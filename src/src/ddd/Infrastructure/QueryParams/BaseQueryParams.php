<?php

namespace App\ddd\Infrastructure\QueryParams;

class BaseQueryParams
{
    public const ORDER_KEY = 'orderBy';
    public const ORDER_TYPE = 'orderType';
    public const PAGE = 'page';
    public const PAGE_SIZE = 'pageSize';

    private array $queryParams;
    private string $orderKey;
    private string $orderTypeKey;
    private string $order;
    private string $orderType;
    private int $page;
    private int $pageSize;
    private string $pageKey;
    private string $pageSizeKey;

    public function __construct(array $queryParams)
    {
        $this->queryParams = $queryParams;
        $this->orderKey = self::ORDER_KEY;
        $this->orderTypeKey = self::ORDER_TYPE;
        $this->pageKey = self::PAGE;
        $this->pageSizeKey = self::PAGE_SIZE;
    }

    public function getPageSize(): int
    {
        return $this->pageSize ?? 20;
    }

    public function getPage(): int
    {
        return $this->page ?? 1;
    }

    public function setOrderKey(string $orderKey): void
    {
        $this->orderKey = $orderKey;
    }

    public function getOrder()
    {

    }

}