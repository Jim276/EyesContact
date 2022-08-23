<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProductController extends AbstractController
{
    #[Route('/product/{id}', name: 'app_product_show')]
    public function product_show(int $id): Response
    {
        $data = ["name" => "Lunette de vue femme", "prix" => 75.00, "description" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed tincidunt est massa, et blandit erat pulvinar eget. Nulla et justo sit amet sapien tristique porttitor eu ornare metus. Phasellus orci justo, mollis ultricies felis nec, lacinia tincidunt lacus. Proin blandit mi odio, ac pellentesque urna aliquet eget."]; 

        $articles_similaire = [
            ["name" => "Lunette de vue femme", "prix" => 75.00],
            ["name" => "Lunette de vue homme", "prix" => 75.00],
            ["name" => "Lunette de vue enfant", "prix" => 75.00],
            ["name" => "Lunette de vue enfant", "prix" => 75.00],
            ["name" => "Lunette de vue enfant", "prix" => 75.00],
            ["name" => "Lunette de vue enfant", "prix" => 75.00],
        ];

        return $this->render('product/product.html.twig', [
            'product' => $data, 
            'articles_similaire' => $articles_similaire
        ]);
    }

    // tout les lunettes de vue 
    #[Route('/lunettes-de-vue', name: 'app_lunette_de_vue_all')]
    public function lunettes_de_vue_all(): Response
    {
        $data = [];
        $title = "";
        $url_hero = "";


        $data = [
            ["name" => "Lunette de vue femme", "prix" => 75.00],
            ["name" => "Lunette de vue homme", "prix" => 75.00],
            ["name" => "Lunette de vue enfant", "prix" => 75.00],
            ["name" => "Lunette de vue enfant", "prix" => 75.00],
            ["name" => "Lunette de vue homme", "prix" => 75.00],
            ["name" => "Lunette de vue enfant", "prix" => 75.00],
            ["name" => "Lunette de vue femme", "prix" => 75.00],
            ["name" => "Lunette de vue homme", "prix" => 75.00],
            ["name" => "Lunette de vue femme", "prix" => 75.00],
            ["name" => "Lunette de vue femme", "prix" => 75.00],
        ];

        $title = "Lunette de vue ";
        $url_hero = "/images/product/hero-femme.png";

        return $this->render('product/lunette-de-vue.html.twig', [
            'controller_name' => 'ProductController',
            'data' => $data,
            'title' => $title,
            'url_hero' => $url_hero
        ]);
    }

    // lunette de vue par sous-categorie
    #[Route('/lunettes-de-vue/{slug}', name: 'app_lunette_de_vue_slug')]
    public function lunettes_de_vue(string $slug): Response
    {
        $data = []; 
        $title = "";
        $url_hero = ""; 

        if($slug === "femmes"){
            $data = [ 
                ["name" => "Lunette de vue femme", "prix" => 75.00 ],
                ["name" => "Lunette de vue femme", "prix" => 75.00],
                ["name" => "Lunette de vue femme", "prix" => 75.00],
                ["name" => "Lunette de vue femme", "prix" => 75.00],
                ["name" => "Lunette de vue femme", "prix" => 75.00],
                ["name" => "Lunette de vue femme", "prix" => 75.00],
                ["name" => "Lunette de vue femme", "prix" => 75.00],
                ["name" => "Lunette de vue femme", "prix" => 75.00],
                ["name" => "Lunette de vue femme", "prix" => 75.00],
                ["name" => "Lunette de vue femme", "prix" => 75.00],
            ];

            $title = "Lunette de vue Femme";
            $url_hero = "/images/product/hero-femme.png"; 
        }


        if ($slug === "hommes") {
            $data = [
                ["name" => "Lunette de vue homme", "prix" => 75.00],
                ["name" => "Lunette de vue homme", "prix" => 75.00],
                ["name" => "Lunette de vue homme", "prix" => 75.00],
                ["name" => "Lunette de vue homme", "prix" => 75.00],
                ["name" => "Lunette de vue homme", "prix" => 75.00],
                ["name" => "Lunette de vue homme", "prix" => 75.00],
                ["name" => "Lunette de vue homme", "prix" => 75.00],
                ["name" => "Lunette de vue homme", "prix" => 75.00],
                ["name" => "Lunette de vue homme", "prix" => 75.00],
                ["name" => "Lunette de vue homme", "prix" => 75.00],
            ];

            $title = "Lunette de vue Homme";
            $url_hero = "/images/product/hero-homme-lunette-vue.png";
        }

        if ($slug === "enfants") {
            $data = [
                ["name" => "Lunette de vue enfant", "prix" => 75.00],
                ["name" => "Lunette de vue enfant", "prix" => 75.00],
                ["name" => "Lunette de vue enfant", "prix" => 75.00],
                ["name" => "Lunette de vue enfant", "prix" => 75.00],
                ["name" => "Lunette de vue enfant", "prix" => 75.00],
                ["name" => "Lunette de vue enfant", "prix" => 75.00],
                ["name" => "Lunette de vue enfant", "prix" => 75.00],
                ["name" => "Lunette de vue enfant", "prix" => 75.00],
                ["name" => "Lunette de vue enfant", "prix" => 75.00],
                ["name" => "Lunette de vue enfant", "prix" => 75.00],
            ];

            $title = "Lunette de vue Enfant";
            $url_hero = "/images/product/hero-enfant-lunnette-vue.png";
        }

        return $this->render('product/lunette-de-vue.html.twig', [
            'controller_name' => 'ProductController',
            'data' => $data,
            'title' => $title,
            'url_hero' => $url_hero
        ]);
    }


    // tous les lunettes de soleil 

    #[Route('/lunettes-de-soleil', name: 'app_lunette_de_soleil_all')]
    public function lunettes_de_soleil_all(): Response
    {
        $data = [];
        $title = "";
        $url_hero = "";

        
            $data = [
                ["name" => "Lunette de soleil femme", "prix" => 75.00],
                ["name" => "Lunette de soleil homme", "prix" => 75.00],
                ["name" => "Lunette de soleil enfant", "prix" => 75.00],
                ["name" => "Lunette de soleil enfant", "prix" => 75.00],
                ["name" => "Lunette de soleil homme", "prix" => 75.00],
                ["name" => "Lunette de soleil enfant", "prix" => 75.00],
                ["name" => "Lunette de soleil femme", "prix" => 75.00],
                ["name" => "Lunette de soleil homme", "prix" => 75.00],
                ["name" => "Lunette de soleil femme", "prix" => 75.00],
                ["name" => "Lunette de soleil femme", "prix" => 75.00],
            ];

            $title = "Lunette de soleil";
            $url_hero = "/images/product/hero-femme-lunette-soleil.png";
               
            return $this->render('product/lunette-de-soleil.html.twig', [
                'controller_name' => 'ProductController',
                'data' => $data,
                'title' => $title,
                'url_hero' => $url_hero
            ]);
    }

   

    // lunette de soleil par sous-categorie
    #[Route('/lunettes-de-soleil/{slug}', name: 'app_lunette_de_soleil_slug')]
    public function lunettes_de_soleil(string $slug): Response
    {
        $data = [];
        $title = "";
        $url_hero = "";

        if ($slug === "femmes") {
            $data = [
                ["name" => "Lunette de soleil femme", "prix" => 75.00],
                ["name" => "Lunette de soleil femme", "prix" => 75.00],
                ["name" => "Lunette de soleil femme", "prix" => 75.00],
                ["name" => "Lunette de soleil femme", "prix" => 75.00],
                ["name" => "Lunette de soleil femme", "prix" => 75.00],
                ["name" => "Lunette de soleil femme", "prix" => 75.00],
                ["name" => "Lunette de soleil femme", "prix" => 75.00],
                ["name" => "Lunette de soleil femme", "prix" => 75.00],
                ["name" => "Lunette de soleil femme", "prix" => 75.00],
                ["name" => "Lunette de soleil femme", "prix" => 75.00],
            ];

            $title = "Lunette de soleil Femme";
            $url_hero = "/images/product/hero-femme-lunette-soleil.png";
        }


        if ($slug === "hommes") {
            $data = [
                ["name" => "Lunette de soleil homme", "prix" => 75.00],
                ["name" => "Lunette de soleil homme", "prix" => 75.00],
                ["name" => "Lunette de soleil homme", "prix" => 75.00],
                ["name" => "Lunette de soleil homme", "prix" => 75.00],
                ["name" => "Lunette de soleil homme", "prix" => 75.00],
                ["name" => "Lunette de soleil homme", "prix" => 75.00],
                ["name" => "Lunette de soleil homme", "prix" => 75.00],
                ["name" => "Lunette de soleil homme", "prix" => 75.00],
                ["name" => "Lunette de soleil homme", "prix" => 75.00],
                ["name" => "Lunette de soleil homme", "prix" => 75.00],
            ];

            $title = "Lunette de soleil Homme";
            $url_hero = "/images/product/hero-homme-lunette-soleil.png";
        }

        if ($slug === "enfants") {
            $data = [
                ["name" => "Lunette de soleil enfant", "prix" => 75.00],
                ["name" => "Lunette de soleil enfant", "prix" => 75.00],
                ["name" => "Lunette de soleil enfant", "prix" => 75.00],
                ["name" => "Lunette de soleil enfant", "prix" => 75.00],
                ["name" => "Lunette de soleil enfant", "prix" => 75.00],
                ["name" => "Lunette de soleil enfant", "prix" => 75.00],
                ["name" => "Lunette de soleil enfant", "prix" => 75.00],
                ["name" => "Lunette de soleil enfant", "prix" => 75.00],
                ["name" => "Lunette de soleil enfant", "prix" => 75.00],
                ["name" => "Lunette de soleil enfant", "prix" => 75.00],
            ];

            $title = "Lunette de soleil Enfant";
            $url_hero = "/images/product/hero-enfant-lunnette-soleil.png";
        }

        return $this->render('product/lunette-de-soleil.html.twig', [
            'data' => $data,
            'title' => $title,
            'url_hero' => $url_hero
        ]);
    }



    #[Route('/lentille', name: 'app_lentille_all')]
    public function lentille_all(): Response
    {

        $data = [
            ["name" => "Lentille adulte", "prix" => 75.00],
            ["name" => "Lentille enfant", "prix" => 75.00],
            ["name" => "Lentille enfant", "prix" => 75.00],
            ["name" => "Lentille enfant", "prix" => 75.00],
            ["name" => "Lentille adulte", "prix" => 75.00],
            ["name" => "Lentille enfant", "prix" => 75.00],
            ["name" => "Lentille adulte", "prix" => 75.00],
            ["name" => "Lentille enfant", "prix" => 75.00],
            ["name" => "Lentille adulte", "prix" => 75.00],
            ["name" => "Lentille enfant", "prix" => 75.00],
        ];

        $title = "Lentille";
        $url_hero = "/images/product/hero-lentille.png";

        return $this->render('product/lentille.html.twig', [
            'data' => $data,
            'title' => $title,
            'url_hero' => $url_hero
        ]);
    }


    #[Route('/lentille/{slug}', name: 'app_lentille_slug')]
    public function lentille_slug(string $slug): Response
    {
        $data = [];
        $title = "";
        $url_hero = "";

        if($slug == "femmes" ){
            $data = [
                ["name" => "Lentille femme", "prix" => 75.00],
                ["name" => "Lentille femme", "prix" => 75.00],
                ["name" => "Lentille femme", "prix" => 75.00],
                ["name" => "Lentille femme", "prix" => 75.00],
                ["name" => "Lentille femme", "prix" => 75.00],
                ["name" => "Lentille femme", "prix" => 75.00],
                ["name" => "Lentille femme", "prix" => 75.00],
                ["name" => "Lentille femme", "prix" => 75.00],
                ["name" => "Lentille femme", "prix" => 75.00],

            ];

            $title = "Lentille pour femme";
            $url_hero = "/images/product/hero-lentille.png";

        }


        if ($slug == "hommes") {
            $data = [
                ["name" => "Lentille homme", "prix" => 75.00],
                ["name" => "Lentille homme", "prix" => 75.00],
                ["name" => "Lentille homme", "prix" => 75.00],
                ["name" => "Lentille homme", "prix" => 75.00],
                ["name" => "Lentille homme", "prix" => 75.00],
                ["name" => "Lentille homme", "prix" => 75.00],
                ["name" => "Lentille homme", "prix" => 75.00],
                ["name" => "Lentille homme", "prix" => 75.00],
                ["name" => "Lentille homme", "prix" => 75.00],

            ];

            $title = "Lentille pour homme";
            $url_hero = "/images/product/hero-lentille-homme.png";
        }


        if ($slug == "enfants") {
            $data = [
                ["name" => "Lentille enfant", "prix" => 75.00],
                ["name" => "Lentille enfant", "prix" => 75.00],
                ["name" => "Lentille enfant", "prix" => 75.00],
                ["name" => "Lentille enfant", "prix" => 75.00],
                ["name" => "Lentille enfant", "prix" => 75.00],
                ["name" => "Lentille enfant", "prix" => 75.00],
                ["name" => "Lentille enfant", "prix" => 75.00],
                ["name" => "Lentille enfant", "prix" => 75.00],
                ["name" => "Lentille enfant", "prix" => 75.00],

            ];

            $title = "Lentille pour enfant";
            $url_hero = "/images/product/hero-lentille-enfant.png";
        }
        
        return $this->render('product/lentille.html.twig', [
            'data' => $data,
            'title' => $title,
            'url_hero' => $url_hero
        ]);
    }
}

