<?php


namespace Services;


use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class TwigService
{
    /** @var FilesystemLoader */
    private $loader;

    /** @var Environment */
    private $env;

    public function __construct()
    {
        $this->loader = new FilesystemLoader('views');
        $this->env = new Environment($this->loader);
    }

    /**
     * @param $template
     * @param array $data
     * @return null
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function render($template, array $data)
    {
        echo $this->env->render($template, $data);
        return null;
    }
}