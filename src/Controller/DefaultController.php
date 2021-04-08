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
     * @Route("/products/{productCode}", name="detroduct")
     * @param string $productCode
     * @param ProductRepository $productRepository
     * @return Response
     */

//    public function getProductByCode(Request $request): Response
//    {
//        $repo = $this->getDoctrine()->getRepository(Product::class);
//        $product=$this->$repo->findBy(['code'=> $request->request->get('code')]);
//        return $this->render('admin/details.html.twig', ['product' => $product]);
//    }

    public function getProductByCode(string $productCode,ProductRepository $productRepository): Response
    {
        $repo = $this->getDoctrine()->getRepository(Product::class);
        $product = $productRepository->findOneBy(['code'=>$productCode]);
        return $this->render('admin/details.html.twig', ['product' => $product]);
    }
}
