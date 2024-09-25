<?php
class Database {
    private const HOST = '10.30.7.35';
    private const DB_NAME = 'webshop_test1';
    private const USERNAME = 'webshop';
    private const PASSWORD = 'webshop';
    private const CHARSET = 'utf8mb4';

    private $conn;

    // Singleton instance
    private static $instance = null;

    private function __construct() {
        try {
            $dsn = 'mysql:host=' . self::HOST . ';dbname=' . self::DB_NAME . ';charset=' . self::CHARSET;
            $this->conn = new PDO($dsn, self::USERNAME, self::PASSWORD);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            // Consider logging the error message instead of echoing it
            throw new Exception('Database connection error: ' . $e->getMessage());
        }
    }

    // Get the PDO connection
    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance->conn;
    }

    // Prevent clone and wakeup
    private function __clone() {}
    private function __wakeup() {}
}
