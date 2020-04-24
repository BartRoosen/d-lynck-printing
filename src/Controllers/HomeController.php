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
        $test = 1;
        return $this->twigService->render('home/index.html.twig', []);
    }
}