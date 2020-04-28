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
        return $this->twigService->render('home/index.html.twig', [
            'base_path' => $this->basePath,
            'pictures'  => $this->pictureDAO->getCoverPictures(),
        ]);
    }
}