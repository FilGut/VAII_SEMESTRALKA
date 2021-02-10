<?php


abstract class Storage
{
    private const DB_HOST = 'localhost';
    private const DB_NAME = 'tutaj';
    private const DB_USER = 'root';
    private const DB_PASS = 'dtb456';

    protected $db;

    /**
     * Storage constructor.
     */
    public function __construct()
    {
        try {
            $this->db = new PDO('mysql:dbname=' . self::DB_NAME.';host=' . self::DB_HOST, self::DB_USER, self::DB_PASS);
        } catch (PDOException $e) {
            echo 'Connection failed: ' . $e->getMessage();
        }
    }
}