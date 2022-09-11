<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Form\ContactType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Config\Doctrine\Orm\EntityManagerConfig;

class ContactController extends AbstractController
{
    #[Route('/contact', name: 'app_contact')]
    public function index(Request $request, EntityManagerInterface $manager, MailerInterface $mailer): Response {
        
            $contact = new Contact();
            $form = $this->createForm(ContactType::class, $contact);

            $form->handleRequest($request);
            if($form->isSubmitted() && $form->isValid()) {
                $contact = $form->getData();

                $manager->persist($contact);
                // dd($contact);

                $manager->flush();

                //Email

                $email = (new TemplatedEmail())
                ->from($contact->getEmail())
                ->to('you@example.com')
                ->to('contact@greenfit.fr')
                ->subject($contact->getSubject())
                ->htmlTemplate('emails/contact.html.twig')

                    // pass variables (name => value) to the template
                    ->context([
                        'contact' => $contact
                    ]);
    
            $mailer->send($email);

                $this->addFlash(
                    'success',
                    'Votre message a bien été envoyé !'
                );
            }


                // return $this->render(FOrm'contact/index.html.twig', [
                //         'form'=> $form->createView(),
                //     ]);

                    
        return $this->renderForm('contact/index.html.twig', [
        
            'form' => $form,
        ]);
            }
        }

