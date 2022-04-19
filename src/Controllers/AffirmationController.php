<?php

namespace App\Controllers;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AffirmationController extends AbstractController
{
    #[Route(path: 'affirmation', name: 'affirmation')]
    public function show(EntityManagerInterface $entityManager): Response
    {
        $result = $entityManager->getConnection()->executeQuery('SELECT name FROM doc_affirmations');

        $affirmation = array_rand($result->fetchAllAssociativeIndexed());

        return $this->render('affirmation/show.html.twig',[
            'affirmation' => $affirmation
        ]);
    }
}
