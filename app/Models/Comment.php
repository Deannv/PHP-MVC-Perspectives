<?php

namespace App\Models;

use App\Models\Model;

class Comment extends Model
{
    public $table = 'comments';

    public function __construct()
    {
        parent::__construct($this->table);
    }

    public function getWithUser($story_id)
    {
        $query = mysqli_query($this->db, "SELECT $this->table.id as story_id, $this->table.*, users.* FROM $this->table JOIN users ON users.id = $this->table.user_id WHERE $this->table.story_id = '$story_id' ORDER BY $this->table.created_at DESC");
        $data = array();

        while ($temp = mysqli_fetch_object($query)) {
            $data[] = $temp;
        }

        return $data;
    }

    public function getTotal($story_id)
    {
        $query = mysqli_query($this->db, "SELECT COUNT(*) as total_comments FROM $this->table WHERE story_id = '$story_id'");
        return mysqli_fetch_object($query)->total_comments;
    }

    public function store($data)
    {
        $story_id = $data['story_id'];
        $user_id = $_SESSION['id'];
        $message = $data['message'];

        $query = mysqli_query($this->db, "INSERT INTO $this->table (story_id, user_id, message) VALUES ('$story_id', '$user_id', '$message')");
        return $query;
    }
}
