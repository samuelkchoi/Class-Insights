<?php

class Database {
    
    protected $pdo;
    protected $sth;
    
    const HOST = 'localhost';
    const USER = 'root';
    const PASS = '39632hd';
    const BDNAME = 'Database One';
    
    public function __construct() {
        $this->pdo = new PDO("mysql:host=" . Database::HOST . ";dbname=" . 
        Database::BDNAME, Database::USER, Database::PASS);
    }
}
