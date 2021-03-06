<?php


namespace Services;


use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class TwigService
{
    const REQUIRED_DATA = 'base_path';

    /** @var FilesystemLoader */
    private $loader;

    /** @var Environment */
    private $env;

    public function __construct()
    {
        $this->loader = new FilesystemLoader('views');
        $this->env    = new Environment($this->loader);
    }

    /**
     * @param $template
     * @param array $data
     * @return null
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     * @throws \Exception
     */
    public function render($template, array $data)
    {
        if (!isset($data[self::REQUIRED_DATA])) {
            throw new \Exception('Base path missing in controller');
        }
        echo $this->env->render($template, $data);
        return null;
    }
}