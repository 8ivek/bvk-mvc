<?php

namespace App\Controllers;

use Core\Controller;
use Core\View;

class Home extends Controller
{
    /**
     * calling url: https://bvkmvc.test/home/index
     */
    public function indexAction()
    {
        //echo 'Hello from the index action in the Home controller!';
        View::render('Home/index.php');
    }

    /**
     * calling url: https://bvkmvc.test/home/output-escaping
     */
    public function OutputEscapingAction()
    {
        View::render('OuputEscaping/index.php');
    }

    /**
     * calling url: https://bvkmvc.test/home/pass-variables
     */
    public function PassVariablesAction()
    {
        $data = ['name' => 'Bivek', 'colors' => ['red', 'green', 'blue']];
        // View::('PassVariables/index.php', $data);
        View::renderTemplate('PassVariables/index.html', $data);
    }

    protected function before()
    {
        //echo "(before) ";
        // return false; // useful for things like login check
    }

    protected function after()
    {
        //echo " (after)";
    }
}