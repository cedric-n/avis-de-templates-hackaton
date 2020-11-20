<?php

namespace App\Model;

class ShopManager extends AbstractManager
{
    public const TABLE = 'store';

    public function __construct()
    {
        parent::__construct(self::TABLE);
    }
}
