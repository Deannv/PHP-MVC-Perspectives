<?php

namespace App\Controllers;

use App\Controllers\Controller;
use App\Middleware\Middleware;
use App\Models\Comment;
use App\Models\Story;

class ExploreController extends Controller
{
    public function index()
    {
        $stories = (new Story)->getWithUser();
        $this->view('explore/index', ['stories' => $stories]);
    }

    public function show($data)
    {
        Middleware::forAuth();
        $story = (new Story)->showWithUser($data['id']);
        $comments = (new Comment)->getWithUser($data['id']);
        $total_comments = (new Comment)->getTotal($data['id']);
        $this->view('explore/show', [
            'story' => $story,
            'comments' => $comments,
            'total_comments' => $total_comments
        ]);
    }
}
