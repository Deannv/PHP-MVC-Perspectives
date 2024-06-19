<?php

namespace App\Models;

use Database\Database;

class Model extends Database
{
    public function __construct(public $table)
    {
        parent::__construct();
    }

    public function get()
    {
        $query = mysqli_query($this->db, "SELECT * FROM $this->table");
        $data = array();

        while ($temp = mysqli_fetch_object($query)) {
            $data[] = $temp;
        }

        return $data;
    }
}
