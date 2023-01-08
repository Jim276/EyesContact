<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Form\ContactType; 
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Doctrine\Persistence\ManagerRegistry;

use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{
    #[Route('/contact', name: 'app_contact')]
    public function index(Request $request, MailerInterface $mailer, ManagerRegistry $doctrine): Response
    {
        $contact = new Contact;
        $entityManager = $doctrine->getManager();
        $form = $this->createForm(ContactType::class, $contact);
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {
            
            $contactFormData = $form->getData();

            /*$subject = 'Demande de contact sur le site Eyes contact  de ' . $contactFormData['email'];
            
            $content = '<br> <br> Message de ' . '<b>' . $contactFormData['prenom'] . ' '  . $contactFormData['nom'] . '</b>'. '<br> <br>'. 
            'Numéro de téléphone : ' . $contactFormData['telephone'] . '<br> <br>' 
             .'Vous a envoyé le message suivant : ' . '<br> <br>' . $contactFormData['message'];

            $email = (new Email())
            ->from('mailtrap@example.com')
            ->to($contactFormData['email'])
            ->subject($subject)
            ->html($content);

            $mailer->send($email); */

            $entityManager->persist($contactFormData);
            $entityManager->flush();

           
            $this->addFlash('success', 'Votre message a été envoyé');
            return $this->redirectToRoute('app_contact');
        }
        
        return $this->render('contact/index.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
