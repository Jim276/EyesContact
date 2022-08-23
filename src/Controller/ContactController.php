<?php

namespace App\Controller;

use App\Form\ContactType; 
use App\Services\MailerService; 
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{
    #[Route('/contact', name: 'app_contact')]
    public function index(Request $request/*, MailerService $mailer*/): Response
    {
        /*
        $form = $this->createForm(ContactType::class);
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {
            
            $contactFormData = $form->getData();

            $subject = 'Demande de contact sur le site Eyes contact  de ' . $contactFormData['email'];
            
            $content = '<br> <br> Message de ' . '<b>' . $contactFormData['prenom'] . ' '  . $contactFormData['nom'] . '</b>'. '<br> <br>'. 
            'Numéro de téléphone : ' . $contactFormData['mobile'] . '<br> <br>' 
             .'Vous a envoyé le message suivant : ' . '<br> <br>' . $contactFormData['message'];
            
            $mailer->sendEmail(
                subject: $subject, 
                content: $content
            );

            $this->addFlash('success', 'Votre message a été envoyé');
            return $this->redirectToRoute('app_contact');
        }
        */
        return $this->render('contact/index.html.twig', [
            /*'form' => $form->createView()*/
        ]);
    }
}
