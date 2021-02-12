<?php

namespace App\Controllers;

class Posts extends AbstractController
{
    public function index()
    {
        echo "Hello from index action the Posts controller!";
    }

    public  function addNew()
    {
        echo "Hello from the addNew action in the Posts controller!";
    }
}