<?php
/**
 * Created by IntelliJ IDEA.
 * User: micha
 * Date: 28.01.19
 * Time: 09:40
 */
namespace base;
abstract class dataConnect
{
    private $dbName = 'chat';

    /**
     * @return string
     */
    public function getDbName()
    {
        return $this->dbName;
    }

    /**
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @return int
     */
    public function getPort()
    {
        return $this->port;
    }

    /**
     * @return string
     */
    public function getHost()
    {
        return $this->host;
    }

    /**
     * @return string
     */
    public function getDriverDB()
    {
        return $this->driverDB;
    }
    private $username = 'root';
    private $password = '';
    private $port = 3306;
    private $host = 'localhost';
    private $driverDB = 'mysql';
}
