<?php


namespace Controllers;


use Services\SessionService;
use Services\TwigService;
use Services\YamlParserService;

class AbstractController
{
    /** @var TwigService */
    protected $twigService;

    /**
     * @var YamlParserService
     */
    protected $parserService;

    /**
     * @var SessionService
     */
    protected $sessionService;

    protected $homeContent;

    protected $menu;

    protected $fontAwesome;

    public function __construct()
    {
        $this->twigService    = new TwigService();
        $this->parserService  = new YamlParserService();
        $this->sessionService = new SessionService();
//        $this->homeContent = $this->parserService->parseFile('content/home.yml');
//        $this->menu = $this->homeContent['menu'];
//        $this->fontAwesome = $this->parserService->parseFile('config/font-awesome.yml');
    }
}