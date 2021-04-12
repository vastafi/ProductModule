<?php


namespace App\Controller\Api;

use App\Entity\Product;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Config\Definition\Exception\DuplicateKeyException;
use Symfony\Component\HttpFoundation\Exception\BadRequestException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/api/v1/products", name="product.")
 */
class ProductController extends AbstractController
{
    /**
     * @Route ("/create", name="create",methods={"POST"})
     */
    public function createProduct(Request $request): Response
    {
        $em = $this->getDoctrine()->getManager();

        $content = $request->toArray();

        $repo = $this->getDoctrine()->getRepository(Product::class);

        $product = new Product();
        $product->setCode($content['code']);
        $product->setName($content['name']);
        $product->setCategory($content['category']);
        $product->setPrice($content['price']);
        $product->setDescription($content['description']);
        $product->setCreatedAt(new \DateTime(null, new \DateTimeZone('Europe/Athens')));

        if ($repo->count(['code'=> $product->getCode()]) > 0){
            throw new BadRequestException('A product with this code exists already!');
        }
        elseif (strlen($content['code']) == 0){
            throw new BadRequestException('Code cant be blank!');
        }
        elseif (strlen($content['name']) == 0){
            throw new BadRequestException('Name cant be blank!');
        }
        elseif (strlen($content['price']) == 0){
            throw new BadRequestException('Price cant be blank!');
        }
        elseif (strlen($content['category']) == 0){
            throw new BadRequestException('Category cant be blank!');
        }

        $em->persist($product);

        $em->flush();

        return new Response('Product created!');
    }


}