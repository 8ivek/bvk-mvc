<?php

namespace App\Controllers;

use Core\Controller;
use Core\View;

class Posts extends Controller
{
    public function indexAction()
    {
        $data = ['posts' => [
            [
                'title' => 'First post',
                'description' => 'First post description',
            ],
            [
                'title' => 'Second post',
                'description' => 'Second post description',
            ],
        ]];
        View::renderTemplate('Posts/index.html', $data);
    }

    public  function addNewAction()
    {
        echo "Hello from the addNew action in the Posts controller!";
    }

    public function editAction()
    {
        echo 'Hello from the edit action in the Posts controller!';

        echo '<p>Route parameters: <pre>'.htmlspecialchars(print_r($this->route_params, true)).'</pre></p>';
    }
}