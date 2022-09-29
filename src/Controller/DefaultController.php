<?php

namespace App\Controller;

use Pimcore\Controller\FrontendController;
use Pimcore\Model\DataObject;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

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
    #[Route('/product-info/{id}', name: 'productInfoPage')]
    public function productInfoPage(Request $request, int $id): Response
    {
        $product = DataObject\Product::getById($id);

        $category = $product->getCategories_product();

        return $this->render('default/product-info.html.twig', [
            'product'=> $product,
            'categories'=> $category,
        ]);
    }

    /**
     * @param Request $request
     * @return Response
     * @throws \Exception
     */

    #[Route('/product-category-info/{id}', name: 'productCategory')]
    public function productCategory(Request $request, int $id): Response
    {
        $repo = DataObject\Category::getById($id);

        $categories = $repo->getProducts_categories();

        return $this->render('default/products-cat.html.twig', [
          'categories'=> $categories,
            'category' => $repo
        ]);
    }






}
