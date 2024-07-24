<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Entity\Projet;
use DateTime;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ProjetController extends AbstractController
{
    // #[Route('/projet', name: 'app_projet')]
    // public function index(): Response
    // {
    //     return $this->render('projet/index.html.twig', [
    //         'controller_name' => 'ProjetController',
    //     ]);
    // }

    #[Route('/projet', name: 'create_projet')]
    public function createProjet(EntityManagerInterface $entityManager): Response
    {
        $projet = new Projet();
        $projet->setName('Projet Test');
        $projet->setDescription('Description du projet test.');
        $date = new DateTime('now');
        $projet->setDateCreation($date);

        $entityManager->persist($projet);
        $entityManager->flush();

        return new Response("Sauvegarde du nouveau projet avec l'id : ".$projet->getId());


    }
}
