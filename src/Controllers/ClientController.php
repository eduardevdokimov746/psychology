<?php

namespace App\Controllers;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route(path: 'client', name: 'client.')]
class ClientController extends AbstractController
{
    #[Route(path: '/', name: 'show')]
    public function show(): Response
    {
        return $this->render('client/show.html.twig');
    }

    #[Route(path: '/edit', name: 'edit')]
    public function edit(): Response
    {
        return $this->render('client/edit.html.twig');
    }
}
