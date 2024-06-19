<?php

namespace App\Controllers;

use App\Controllers\Controller;
use App\Middleware\Middleware;
use App\Models\Story;

class StoryController extends Controller
{
    public function index()
    {
        Middleware::forAuth();
        $stories = (new Story)->getFromUser($_SESSION['id']);
        $this->view('stories/index', ['stories' => $stories]);
    }

    public function create()
    {
        Middleware::forAuth();
        $this->view('stories/create');
    }

    public function store($data)
    {
        Middleware::forAuth();
        $result = (new Story)->store($data);
        if ($result) {
            $_SESSION['success'] = [
                'title' => "Your story has successfully posted.",
                'message' => "We hope it's a good story tho :D."
            ];
            return header('Location: /stories');
        } else {
            $_SESSION['error'] = [
                'title' => "Something went wrong.",
                'message' => "Please try again later."
            ];
            return header('Location: /stories/new');
        }
    }

    public function edit($data)
    {
        Middleware::forAuth();
        $story = (new Story)->showWithUser($data['id']);
        $this->view('stories/create', ['story' => $story]);
    }

    public function destroy($data)
    {
        Middleware::forAuth();
        $result = (new Story)->destroy($data['story_id']);
        if ($result) {
            $_SESSION['success'] = [
                'title' => "Your story has successfully deleted.",
                'message' => "Sometimes memories can be good or bad."
            ];
            return header('Location: /stories');
        } else {
            $_SESSION['error'] = [
                'title' => "Something went wrong when we trying to deleting your story.",
                'message' => "Please try again later."
            ];
            return header('Location: /stories');
        }
    }

    public function toggleStatus($data)
    {
        (new Story)->toggleStatus($data['id']);
    }
}
