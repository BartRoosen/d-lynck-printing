<?php


namespace Controllers;

class HomeController extends AbstractController
{
    /**
     * HomeController constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $lang         = $this->sessionService->getLanguage();
        $seoPath      = sprintf('content/%s/seo.yml', $lang);
        $carouselPath = sprintf('content/%s/carrousel.yml', $lang);
        $examplesPath = sprintf('content/%s/examples.yml', $lang);

        return $this->twigService->render('home/index.html.twig', [
            'base_path'      => $this->basePath,
            'pictures'       => $this->parserService->parseFile($carouselPath),
            'products'       => $this->parserService->parseFile($examplesPath),
            'seo'            => $this->parserService->parseFile($seoPath),
            'preferred_lang' => $lang,
        ]);
    }
}