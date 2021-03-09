<?php

namespace Core;

class View
{
    /**
     * @param $view
     * @param array $args
     * @throws \Exception
     */
    public static function render($view, $args = [])
    {
        extract($args, EXTR_SKIP);
        $file = "../App/Views/$view";// relative to Core directory
        if (is_readable($file)) {
            require $file;
        } else {
            throw new \Exception("$file not found");
        }
    }

    /**
     * @param $template
     * @param array $args
     * @throws \Exception
     */
    public static function renderTemplate($template, $args = [])
    {
        static $twig = null;
        if ($twig === null) {
            $loader = new \Twig\Loader\FilesystemLoader('../App/Views');
            $twig = new \Twig\Environment($loader, ['debug' => true]);
        }
        try {
            $template = $twig->load($template);
            echo $template->render($args);
        } catch (\Throwable $e) {
            throw new \Exception("Thrown an error: " . $e->getMessage());
        }
    }
}