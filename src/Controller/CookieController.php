<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Cookie;

class CookieController extends AbstractController
{


    #[Route('/cookie', name: 'app_cookie')]
    public function index(): Response
    {
        return $this->render('cookie/index.html.twig', [
            'controller_name' => 'CookieController',
        ]);


        $cookie = new Cookie('eye_cookie', 'eye_contact', time() + 3600);
        $response = new Response();
        $response->headers->setCookie($cookie);

        $request = Request::createFromGlobals();
        $eye_cookie = $request->cookies->get('eye_cookie');
    }
}
