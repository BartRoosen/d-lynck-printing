<?php


namespace Controllers;


use Config\Config;
use Services\SessionService;
use Services\TwigService;
use Services\YamlParserService;

class AbstractController
{
    /** @var TwigService */
    protected $twigService;

    /** @var YamlParserService */
    protected $parserService;

    /** @var SessionService */
    protected $sessionService;

    /** @var Config */
    protected $basePath;

    public function __construct()
    {
        $this->twigService    = new TwigService();
        $this->parserService  = new YamlParserService();
        $this->sessionService = new SessionService();
        $this->basePath       = Config::BASE_PATH;
    }
}