<?php

namespace App\Controller;

use App\Entity\Product;
use App\Repository\ProductRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends AbstractController
{
     /**
     * @Route("/products", name="home.product")
     * @param ProductRepository $productRepository
     * @return Response
     */

    public function index(ProductRepository $productRepository): Response
    {
        return $this->render('admin/products.html.twig', [
            'products' => $productRepository->findAll(),
        ]);
    }

    /**
     * @Route("/products/{id}", name="detailsproduct")
     * @param string $product
     * @return Response
     */

    public function details(string $product):Response
    {
          return $this->render('admin/details.html.twig',['product' => $product]);
    }

}