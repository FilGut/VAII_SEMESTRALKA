<?php

session_start();

/**
 * abstraktná trieda, slúži na to, aby nebolo potrebné sa viac ako len raz prihlasovať do datbázy,
 * väčšina php tried je o ňu rozšírená (extended)
 *
 * Class Storage
 */
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