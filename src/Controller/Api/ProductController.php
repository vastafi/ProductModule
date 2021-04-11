<?php


namespace App\Controller\Api;

use App\Entity\Product;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

/**
 * @Route("/api/v1/products", name="product.")
 */
class ProductController extends AbstractController
{
    /**
     * @Route ("/create", name="create",methods={"POST"})
     */
    public function createProduct(Request $request){
        $product = new Product();
    }
}