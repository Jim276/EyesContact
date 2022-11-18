<?php

namespace App\Controller;

use App\Entity\Product;
use App\Entity\Category;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ProductController extends AbstractController
{

    #[Route('/products', name: 'app_products')]
    public function index(ManagerRegistry $doctrine): Response
    {
        $products = $doctrine->getRepository(Product::class)->findAll();

        return $this->render('home/index.html.twig', [
            'products' => $products,
        ]);
    }


    #[Route('/category/{id}', name: 'app_product')]
    public function showProductsByCategory(ManagerRegistry $doctrine, string $id): Response
    {
        $url_hero = "";
        if($id == '1'){
            $url_hero = "/images/product/hero-homme-lunette-vue.png";
        }else if($id == '2'){
            $url_hero = "/images/product/hero-femme-lunette-soleil.png";
        }else if($id == '3'){
            $url_hero = "/images/product/hero-lentille.png";
        }

        // $products = $doctrine->getRepository(Product::class)->findAll(
        //     // ['categories' => '1']
        // );

        
        //$products = $doctrine->getRepository(Category::class)->find($id); 
        
        //dd($product->getCategories());

        $products = $doctrine->getRepository(Category::class)->findOneByIdJoinedToProduct($id);
        

        return $this->render('product/lunette-de-vue.html.twig', [
            'products' => $products,
            'url_hero' => $url_hero
        ]);
    }




    #[Route('/product/{id}', name: 'app_product_single')]
    public function product_show(ManagerRegistry $doctrine, int $id): Response
    {
        $product = $doctrine->getRepository(Product::class)->find($id);

        $articles_similaire= $doctrine->getRepository(Category::class)->findOneByIdJoinedToProduct($id);

        return $this->render('product/product.html.twig', [
            'product' => $product, 
            'articles_similaire' => $articles_similaire
        ]);
    }

    
}

