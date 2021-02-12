<?php

namespace App\Controllers;

use Core\Controller;

class Home extends Controller
{
    public function indexAction()
    {
        echo 'Hello from the index action in the Home controller!';
    }

    protected function before()
    {
        echo "(before) ";
        // return false; // useful for things like login check
    }

    protected function after()
    {
        echo " (after)";
    }
}