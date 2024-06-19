<?php

namespace App\Controllers;

use App\Controllers\Controller;
use App\Models\Comment;

class CommentController extends Controller
{
    public function store($data)
    {
        $result = (new Comment)->store($data);
        $story_id = $data['story_id'];
        if ($result) $_SESSION['success'] = [
            "title" => "Your thought has been sent.",
            "message" => "Thank you for taking part in this community"
        ];
        else $_SESSION['error'] = [
            "title" => "Sorry, failed to send your thought.",
            "message" => "Please try again later or contact our customer service."
        ];
        return header("Location: /explore/show?id=$story_id");
    }
}
