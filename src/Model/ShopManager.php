<?php

namespace App\Model;

class ShopManager extends AbstractManager
{
    public const TABLE = 'store';

    public function __construct()
    {
        parent::__construct(self::TABLE);
    }

    /***
     * @param array $item
     */
    public function add(array $item): void
    {
        $statement = $this->pdo->prepare("INSERT INTO " . self::TABLE . " 
        (name, url)
        VALUES (:name, :url)");
        $statement->bindValue('name', $item['name'], \PDO::PARAM_STR);
        $statement->bindValue('url', $item['picture']);
        $statement->execute();
    }

    /**
     * @param int $id
     */
    public function delete(int $id): void
    {
        // prepared request
        $statement = $this->pdo->prepare("DELETE FROM " . self::TABLE . " WHERE id=:id");
        $statement->bindValue('id', $id, \PDO::PARAM_INT);
        $statement->execute();
    }
}
