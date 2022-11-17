<?php

namespace App\Controller;

use App\Entity\Product;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;

class ProductController extends AbstractController
{

    #[Route('/category/{id}', name: 'app_product')]
    public function index(ManagerRegistry $doctrine, string $id): Response
    {
        $url_hero = "";
        if($id == '1'){
            $url_hero = "/images/product/hero-homme-lunette-vue.png";
        }else if($id == '2'){
            $url_hero = "/images/product/hero-femme-lunette-soleil.png";
        }else if($id == '3'){
            $url_hero = "/images/product/hero-lentille.png";
        }

        $products = $doctrine->getRepository(Product::class)->findBy(
            ['categories' => '1']
        );


        return $this->render('product/lunette-de-vue.html.twig', [
            'products' => $products,
            'url_hero' => $url_hero
        ]);
    }




    #[Route('/product/{id}', name: 'app_product_show')]
    public function product_show(ManagerRegistry $doctrine, int $id): Response
    {
        $product = $doctrine->getRepository(Product::class)->find($slug);

        // $products = $doctrine->getRepository(Product::class)->findBy(
        //     ['category' => $product->()]
        // );


        // $data = ["name" => "Lunette de vue femme", "prix" => 75.00, "description" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed tincidunt est massa, et blandit erat pulvinar eget. Nulla et justo sit amet sapien tristique porttitor eu ornare metus. Phasellus orci justo, mollis ultricies felis nec, lacinia tincidunt lacus. Proin blandit mi odio, ac pellentesque urna aliquet eget."]; 

        // $articles_similaire = [
        //     ["name" => "Lunette de vue femme", "prix" => 75.00],
        //     ["name" => "Lunette de vue homme", "prix" => 75.00],
        //     ["name" => "Lunette de vue enfant", "prix" => 75.00],
        //     ["name" => "Lunette de vue enfant", "prix" => 75.00],
        //     ["name" => "Lunette de vue enfant", "prix" => 75.00],
        //     ["name" => "Lunette de vue enfant", "prix" => 75.00],
        // ];

        return $this->render('product/product.html.twig', [
            'product' => $product, 
            'articles_similaire' => $articles_similaire
        ]);
    }

    
}

