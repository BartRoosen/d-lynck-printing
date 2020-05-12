<?php


namespace Controllers;

use Data\PictureDAO;

class HomeController extends AbstractController
{

    /** @var PictureDAO */
    private $pictureDAO;

    /**
     * HomeController constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->pictureDAO = new PictureDAO();
    }

    public function index()
    {
//        $test = $this->parserService->parseFile('content/more-info.yml');

        return $this->twigService->render('home/index.html.twig', [
            'base_path' => $this->basePath,
            'pictures'  => $this->parserService->parseFile('content/carrousel.yml'),
            'products'  => $this->parserService->parseFile('content/product-overview.yml'),
            'more_info' => $this->parserService->parseFile('content/more-info.yml'),
        ]);
    }
}