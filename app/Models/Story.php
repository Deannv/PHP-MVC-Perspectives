<?php

namespace App\Models;

use App\Models\Model;

class Story extends Model
{
    public $table = 'stories';

    public function __construct()
    {
        parent::__construct($this->table);
    }

    public function getWithUser()
    {
        $query = mysqli_query($this->db, "SELECT $this->table.id as story_id, $this->table.*, users.* FROM $this->table JOIN users ON users.id = $this->table.user_id ORDER BY $this->table.created_at DESC, $this->table.status ASC");
        $data = array();

        while ($temp = mysqli_fetch_object($query)) {
            $data[] = $temp;
        }

        return $data;
    }

    public function showWithUser($id)
    {
        return mysqli_fetch_object(mysqli_query($this->db, "SELECT $this->table.id as story_id, $this->table.*, users.* FROM $this->table JOIN users ON users.id = $this->table.user_id WHERE $this->table.id = '$id'"));
    }

    public function getFromUser($id)
    {
        $query = (mysqli_query($this->db, "SELECT $this->table.id as story_id, $this->table.*, users.* FROM $this->table JOIN users ON users.id = $this->table.user_id WHERE users.id = '$id'"));
        $data = array();

        while ($temp = mysqli_fetch_object($query)) {
            $data[] = $temp;
        }

        return $data;
    }

    public function store($data)
    {
        $title = $data['title'];
        $content = $data['content'];
        $user_id = $_SESSION['id'];
        $story_id = $data['story_id'];
        if ($story_id) $query = mysqli_query($this->db, "UPDATE $this->table SET title='$title', content='$content' WHERE id='$story_id'");
        else $query = mysqli_query($this->db, "INSERT INTO $this->table (title, content, user_id) VALUES ('$title', '$content', '$user_id')");
        return $query;
    }

    public function destroy($id)
    {
        return mysqli_query($this->db, "DELETE FROM $this->table WHERE id='$id'");
    }

    public function toggleStatus($id)
    {
        $status = mysqli_fetch_object(mysqli_query($this->db, "SELECT status FROM $this->table WHERE id='$id'"))->status;
        $status = ($status == 'Open') ? 'Solved' : 'Open';
        $query = mysqli_query($this->db, "UPDATE $this->table SET status='$status' WHERE id='$id'");
        return $query;
    }
}
