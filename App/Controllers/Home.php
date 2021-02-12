<?php

namespace App\Controllers;

class Home extends AbstractController
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