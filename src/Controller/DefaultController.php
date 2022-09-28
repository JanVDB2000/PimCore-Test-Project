<?php

namespace App\Controller;

use Pimcore\Controller\FrontendController;
use Pimcore\Model\DataObject;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends FrontendController
{
    /**
     * @param Request $request
     * @return Response
     * @throws \Exception
     */
    public function defaultAction(Request $request): Response
    {
        $products = DataObject\Product::getList();

        $categories = DataObject\Category::getList();

        return $this->render('default/index.html.twig',[
            'products'=> $products,
            'categories'=> $categories,
        ]);
    }

    /**
     * @param Request $request
     * @return Response
     * @throws \Exception
     */
    public function categoryPage(Request $request): Response
    {
        $categories = DataObject\Category::getList();

        return $this->render('default/categories.html.twig', [
            'controller_name' => 'FrontEndController',
            'categories'=> $categories,
        ]);
    }


    /**
     * @param Request $request
     * @return Response
     * @throws \Exception
     */
    public function ProductPage(Request $request): Response
    {
        $products = DataObject\Product::getList();

        $categories = DataObject\Category::getList();

        return $this->render('default/products.html.twig',[
            'products'=> $products,
            'categories'=>$categories,
            ]);
    }

    /**
     * @param Request $request
     * @return Response
     * @throws \Exception
     */

    public function productInfoPage(Request $request/*, int $id*/): Response
    {
        $product = DataObject\Product::getById(/*$id*/ 6);

        return $this->render('default/product-info.html.twig', [
            'controller_name' => 'FrontEndController',
            'product'=> $product,
        ]);
    }






}
