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

    public function getProductByCode(string $productCode,ProductRepository $productRepository): Response
    {
        $productRepository = $this->getDoctrine()->getRepository(Product::class);
        $product = $productRepository->findOneBy(['code' => $productCode]);
        {
            if (!$product) {
                return $this->render('Exception/errors404.html.twig',['product' => $product]);
            }
            return $this->render('admin/details.html.twig', ['product' => $product]);
        }
    }



//        if ($productRepository->count(['code'=>$productCode->getCode()])){
//            return $this->render('Exception/errors404.html.twig', ['errors'=>'not found code'],
//                'product'=$product,
//                'form'=>$form->createView(),
//            ]);

//        if (!$product) {
//            throw $this->createNotFoundException('Product code not found.');
//        }
//        return $this->render('Exception/errors404.html.twig', ['product' => $product]);
//    }


//    public function listAction(Request $request){
//        $em=$this->getDoctrine()->getManager();
//        $blogPosts =$em->getRepository()->findAll();
//        /**
//         * @var $paginator
//         */
//
//        $paginator=$this->get('');
//        $paginator->paginate()
//    }
}
