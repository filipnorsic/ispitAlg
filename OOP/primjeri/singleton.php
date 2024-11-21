<?php

class Database {
    private static $instance = null;
    private function __construct() {
    // Inicijalizacija konekcije na bazu
    }
    public static function getInstance() {
    if (self::$instance == null) {
    self::$instance = new Database();
    }
    return self::$instance;
    }
    public function query($sql) {
    // Izvršavanje SQL upita
    }
    }
    // Primjer korištenja
    $db = Database::getInstance();
    $db->query("SELECT * FROM users");