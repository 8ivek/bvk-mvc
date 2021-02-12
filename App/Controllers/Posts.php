<?php

namespace App\Controllers;

class Posts extends AbstractController
{
    public function indexAction()
    {
        echo "Hello from index action the Posts controller!";
        echo '<p>Query string parameters: <pre>'. htmlspecialchars(print_r($_GET, true)). '</pre></p>';
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