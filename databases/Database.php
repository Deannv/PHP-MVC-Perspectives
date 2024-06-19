<?php

namespace Database;

class Database
{
    private $host = 'localhost';
    private $user = 'root';
    private $pass = '';
    private $name = 'project_backend';
    protected $db;

    public function __construct()
    {
        $this->db = mysqli_connect($this->host, $this->user, $this->pass, $this->name);
    }
}
