<?php

namespace App\Controller;

use App\Entity\Structures;
use App\Form\StructuresType;
use App\Repository\ModulesRepository;
use App\Repository\PartnersRepository;
use App\Repository\RolesUsersRepository;
use App\Repository\StructuresRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/structures')]
class StructuresController extends AbstractController
{
    #[Route('/', name: 'app_structures_index', methods: ['GET'])]
    public function index(StructuresRepository $structuresRepository): Response
    {
        return $this->render('structures/index.html.twig', [
            'structures' => $structuresRepository->findAll(),
        ]);
    }
    #[Route('/new', name: 'app_structures_new', methods: ['GET', 'POST'])]

    public function new(Request $request, StructuresRepository $structuresRepository, EntityManagerInterface $entityManager, UserPasswordHasherInterface $userPasswordHasher, RolesUsersRepository $rolesUsersRepository): Response
    {
        // créer une structure et son user associé 
        $structure = new Structures();
        $form = $this->createForm(StructuresType::class, $structure);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            //on prend toute la partie qui est dans user
            $user = $form->get('users') -> getData();
            // dd($user -> getRolesUsers() -> getName());
            $r[]='ROLE_STRUCTURE';
            $user->setRoles($r);
            $user->setRolesUsers($rolesUsersRepository->find(3));        

            $structuresRepository->add($structure, true);

            $user->setPassword(
                $userPasswordHasher->hashPassword(
                    $user,
                    $user->getPassword(),
                )
            );
            $entityManager->persist($user);

            return $this->redirectToRoute('app_structures_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('structures/new.html.twig', [
            'structure' => $structure,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_structures_show', methods: ['GET'])]
    public function show(Structures $structure): Response
    {
        return $this->render('structures/show.html.twig', [
            'structure' => $structure,
        ]);
    }

// Structures / modules

    #[Route('/modules/{id}', name: 'app_structures_modules', methods: ['GET'])]
    public function showModules(Structures $structure, ModulesRepository $moduleRepository): Response
    {   $modules = $moduleRepository->findAll();
        return $this->render('structures/show_modules.html.twig', [
            'structure' => $structure,
            'modules' => $modules,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_structures_edit', methods: ['GET', 'POST'])]
    // public function edit(Request $request, Structures $structure, EntityManagerInterface $entityManager, RolesUsersRepository $rolesUsersRepository, StructuresRepository $structuresRepository, UserPasswordHasherInterface $userPasswordHasher): Response
    public function edit(Request $request, Structures $structure, StructuresRepository $structuresRepository, EntityManagerInterface $entityManager, RolesUsersRepository $rolesUsersRepository, UserPasswordHasherInterface $userPasswordHasher): Response
    {
        $form = $this->createForm(StructuresType::class, $structure);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

           //on prend toute la partie qui est dans user
           $user = $form->get('users') -> getData();
           // dd($user -> getRolesUsers() -> getName());
           $r[]='ROLE_STRUCTURE';
           $user->setRoles($r);
           $user->setRolesUsers($rolesUsersRepository->find(3));

           $user->setPassword(
            $userPasswordHasher->hashPassword(
                $user,
                $user->getPassword(),
            )
        );

            $entityManager->persist($user);

            $structuresRepository->add($structure, true);

                 // Gestion des modules
                // on prend les modules cochés dans le formulaire
                $modules = $form->get('modules')->getData();
            
                $structuresRepository->add($structure, true);

            return $this->redirectToRoute('app_structures_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('structures/edit.html.twig', [
            'structure' => $structure,
            'user' => $structure->getUsers(),
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_structures_delete', methods: ['POST'])]
    public function delete(Request $request, Structures $structure, StructuresRepository $structuresRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$structure->getId(), $request->request->get('_token'))) {
            $structuresRepository->remove($structure, true);
        }

        return $this->redirectToRoute('app_structures_index', [], Response::HTTP_SEE_OTHER);
    }
}
