<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use App\Form\ContactType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class MainController extends AbstractController
{
    #[Route('/accueil', name: 'app_accueil')]
    public function accueil(Request $request, EntityManagerInterface $em): Response
    {
        $user = new User();

        $form = $this->createForm(UserType::class, $user);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($user);
            $em->flush();
        }
        return $this->render('main/accueil.html.twig', [
            'form' => $form->createView()
        ]);
    }

    #[Route('/contact', name: 'app_contact')]
    public function contact(Request $request, MailerInterface $mailer): Response
    {

        $form = $this->createForm(ContactType::class);

        $contact = $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $from = $contact->get('email')->getData();
            $sujet = $contact->get('sujet')->getData();
            $message = $contact->get('message')->getData();
            $email = (new Email())
                ->from($from)
                ->to('b.bos@gmail.com')
                //->cc('cc@example.com')
                //->bcc('bcc@example.com')
                //->replyTo('fabien@example.com')
                //->priority(Email::PRIORITY_HIGH)
                ->subject($sujet)
                ->text($message)
                ->html('<p>Ceci est un bel envoi de mail !</p>');

            $mailer->send($email);

            $this->addFlash('success', 'Votre demande de contact a été envoyée.');

            return $this->redirectToRoute('app_accueil');
        }

        return $this->render('main/contact.html.twig', [
            'contact' => $form->createView(),
        ]);
    }

    #[Route('/infos', name: 'app_infos')]
    public function infos(): Response
    {
        return $this->render('main/infos.html.twig', [
            'controller_name' => 'MainController',
        ]);
    }
}
