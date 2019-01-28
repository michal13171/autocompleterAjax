<?php
/**
 * Created by IntelliJ IDEA.
 * User: micha
 * Date: 28.01.19
 * Time: 11:38
 */
declare (strict_types=1);

namespace classes;

use PDO;
use PDOStatement;

require_once 'ConnectDB.php';

class Products extends ConnectDB
{
    /**
     * @return PDOStatement
     */
    public function getAllProducts(): PDOStatement
    {

        $sql = "SELECT * FROM products";
        $sth = $this->getConnection()->prepare($sql);
        $sth->execute();
        return $sth;
    }

    public function findNameProduct(string $name): PDOStatement
    {
        $sql = "SELECT * FROM products WHERE name LIKE :name";
        $sth = $this->getConnection()->prepare($sql);
        //$sth->bindValue(':name', $name, PDO::PARAM_INT);
        $sth->bindValue(':name', "$name%", PDO::PARAM_STR);
        $sth->execute();
        return $sth;
    }
}
