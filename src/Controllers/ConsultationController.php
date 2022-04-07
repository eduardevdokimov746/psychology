<?php

namespace App\Controllers;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route(path: 'consultations', name: 'consultations.')]
class ConsultationController extends AbstractController
{
    #[Route(path: '/', name: 'index')]
    public function index(Request $request): Response
    {
        return $this->render('consultations/index.html.twig');
    }

    #[Route(path: '/{consultation<\D+>}', name: 'show')]
    public function show(): Response
    {
        return $this->render('consultations/show.html.twig');
    }
}
