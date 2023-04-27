<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PolitiquesConfidentialitesController extends AbstractController
{
    #[Route('/politiques/confidentialites', name: 'app_politiques_confidentialites')]
    public function index(): Response
    {
        return $this->render('politiques_confidentialites/index.html.twig', [
            'controller_name' => 'PolitiquesConfidentialitesController',
        ]);
    }
}
