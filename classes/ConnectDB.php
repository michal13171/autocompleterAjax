<?php
namespace classes;

use base\dataConnect;
use PDO;
use PDOException;

/**
 * Created by IntelliJ IDEA.
 * User: micha
 * Date: 28.01.19
 * Time: 09:39
 */
abstract class ConnectDB extends dataConnect
{
    private $connection;

    /**
     * @return PDO
     */
    public function getConnection(): PDO
    {
        return $this->connection;
    }

    /**
     * connectDB constructor.
     */
    public function __construct()
    {
        try {
            $dsn = $this->getDriverDB() . ':host=' . $this->getHost() . ';port=' . $this->getPort() . ';dbname=' . $this->getDbName();
            $this->connection = new PDO($dsn,
                $this->getUsername(),
                $this->getPassword(),
                array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
            $this->connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->connection->query("SET NAMES 'utf8'");
        } catch (PDOException $e) {
            die("Database connection failed: " . $e->getMessage());
        }
    }

    public function __destruct()
    {
        $this->connection = null;
    }
}
