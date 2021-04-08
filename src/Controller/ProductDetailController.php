<?php


namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class  ProductDetailController extends AbstractController{
    /**
     * @Route("/products/details", name="index")
     */
    public function index() {
        return $this->render('admin/details.html.twig');
    }
}