<?php

class Posts extends Controller
{
    public function index()
    {
        # mandar para a view index de posts
        $this->view('posts/index');
    }
}