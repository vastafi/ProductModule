<?php

namespace App\Controller\API;

use App\Entity\Product;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class DefController extends AbstractController{

    /**
     * @Route("/api/v1/products/{productCode}", name="product.details")
     * @param string $productCode
     * @return JsonResponse
     */

    public function getProductByCode(string $productCode): JsonResponse
    {
        $repo=$this->getDoctrine()->getRepository(Product::class);
        return $this->json($repo->findBy(['code'=>$productCode]));
    }

}
