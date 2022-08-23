<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Services\MailerService;
use Symfony\Component\HttpFoundation\Request;
use App\Form\DashboardClientType;

class DashboardClientController extends AbstractController
{
    #[Route('/dashboard/client', name: 'app_dashboard_client')]
    public function index(Request $request, MailerService $mailer): Response
    {
        $form = $this->createForm(DashboardClientType::class);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            
            $dashboardClientFormData = $form->getData();

            $subject = 'Enregistrement de vos données de ' . $dashboardClientFormData['email'];
            
            $content = '<br> <br> Message de ' . '<b>' . $dashboardClientFormData['email'] . ' '  . $dashboardClientFormData['adress'] . '</b>'. '<br> <br>'. 
            'Numéro de téléphone : ' . $dashboardClientFormData['mobile'] . '<br> <br>'.$dashboardClientFormData['password'];

            
            $mailer->sendEmail(
                subject: $subject, 
                content: $content
            );

            $this->addFlash('success', 'Vos données ont bien été enregistrés');
            return $this->redirectToRoute('app_dashboard_client');
        }
        return $this->render('dashboard_client/index.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
