<?php

namespace App\Controllers;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route(path: 'info', name: 'info.')]
class InfoController extends AbstractController
{
    #[Route(path: '/faq', name: 'faq', methods: ['GET', 'HEAD'])]
    public function showFaq(): Response
    {
        return $this->render('info/faq.html.twig');
    }

    #[Route(path: '/about', name: 'about', methods: ['GET', 'HEAD'])]
    public function showAbout(): Response
    {
        return $this->render('info/about.html.twig');
    }
}
