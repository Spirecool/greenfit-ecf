<?php

namespace App\Controller;

use App\Entity\Partners;
use App\Entity\Users;
use App\Form\PartnersType;
use App\Repository\PartnersRepository;
use App\Repository\RolesUsersRepository;
use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;


#[Route('/partners')]
class PartnersController extends AbstractController
{   
    //Interdit l'affichage de l'index des partenaires au partenaire connecté
    #[Security("is_granted('ROLE_ADMIN')")]
    #[Route('/', name: 'app_partners_index', methods: ['GET'])]
    public function index(PartnersRepository $partnersRepository): Response
    {
        return $this->render('partners/index.html.twig', [
            'partners' => $partnersRepository->findAll(),
        ]);
    }
    //Seulement l'admin peut créer un nouveau partenaire
    #[Security("is_granted('ROLE_ADMIN')")]
    #[Route('/new', name: 'app_partners_new', methods: ['GET', 'POST'])]
    public function new(Request $request, PartnersRepository $partnersRepository, EntityManagerInterface $entityManager, UserPasswordHasherInterface $userPasswordHasher, RolesUsersRepository $rolesUsersRepository): Response
    {
        $partner = new Partners();
        $form = $this->createForm(PartnersType::class, $partner);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            //on prend toute la partie qui est dans user
            $user = $form->get('users') -> getData();
            // dd($user -> getRolesUsers() -> getName());
            // $r[]=$user -> getRolesUsers() -> getName();
            $r[]='ROLE_PARTNER';
            $user->setRoles($r);
            $user->setRolesUsers($rolesUsersRepository->find(2));
           
            $partnersRepository->add($partner, true);

            $user->setPassword(
                $userPasswordHasher->hashPassword(
                    $user,
                    $user->getPassword(),
                )
            );

            $entityManager->persist($user);

            return $this->redirectToRoute('app_partners_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('partners/new.html.twig', [
            'partner' => $partner,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_partners_show', methods: ['GET'])]
    public function show(Partners $partner): Response
    {
        return $this->render('partners/show.html.twig', [
            'partner' => $partner,
        ]);
    }

    // Partners / Structures

    // Interdit au partenaire connecté d'afficher la liste des structures associées aux autres partenaires, il ne verra que la sienne
    #[Security("is_granted('ROLE_PARTNER') and user === partner.getUsers()")]
    #[Route('/structures/{id}', name: 'app_partners_structures', methods: ['GET'])]
    public function showPartners(Partners $partner): Response
    {
        return $this->render('partners/show_structures.html.twig', [
            'partner' => $partner,
        ]);
    }
    
    
    #[Route('/{id}/edit', name: 'app_partners_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Partners $partner, PartnersRepository $partnersRepository, EntityManagerInterface $entityManager, RolesUsersRepository $rolesUsersRepository, UserPasswordHasherInterface $userPasswordHasher): Response
    {
        $form = $this->createForm(PartnersType::class, $partner);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $user = $form->get('users') -> getData();
            // dd($user -> getRolesUsers() -> getName());
            // $r[]=$user -> getRolesUsers() -> getName();
            $r[]='ROLE_PARTNER';
            $user->setRoles($r);
            $user->setRolesUsers($rolesUsersRepository->find(2));

            $user->setPassword(
                $userPasswordHasher->hashPassword(
                    $user,
                    $user->getPassword(),
                )
            );

            $entityManager->persist($user);

            $partnersRepository->add($partner, true);

            // Gestion des modules
                // on prend les modules cochés dans le formulaire
            $modules = $form->get('modules')->getData();
            
            $partnersRepository->add($partner, true);

            return $this->redirectToRoute('app_partners_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('partners/edit.html.twig', [
            'partner' => $partner,
            'user' => $partner->getUsers(),
            'form' => $form,
        ]);
    }
    
    #[Security("is_granted('ROLE_ADMIN')")]
    #[Route('/{id}', name: 'app_partners_delete', methods: ['POST'])]
    public function delete(Request $request, Partners $partner, PartnersRepository $partnersRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$partner->getId(), $request->request->get('_token'))) {
            $partnersRepository->remove($partner, true);
        }

        return $this->redirectToRoute('app_partners_index', [], Response::HTTP_SEE_OTHER);
    }
}
