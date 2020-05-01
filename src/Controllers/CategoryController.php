<?php


namespace Controllers;


use Data\CategoryDAO;
use Data\PictureDAO;
use Entities\Category;

class CategoryController extends AbstractController
{
    /** @var PictureDAO */
    private $pictureDAO;

    /** @var CategoryDAO */
    private $categoryDAO;

    /**
     * HomeController constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->categoryDAO = new CategoryDAO();
        $this->pictureDAO  = new PictureDAO();
    }

    public function index($categoryId)
    {
        $category = $this->categoryDAO->getCategoryById($categoryId);

        if (!$category instanceof Category) {
            // todo: redirect to error page
            $this->redirect('../home');
        }

        return $this->twigService->render('category/index.html.twig', [
            'base_path' => $this->basePath,
            'category'  => $category,
            'pictures' => $this->pictureDAO->getPicturesByCategotyId($category->getId()),
        ]);
    }
}