<?php

namespace App\Controllers;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route(path: 'articles', name: 'articles.')]
class ArticleController extends AbstractController
{
    #[Route(path: '/', name: 'index')]
    public function index(): Response
    {
        return $this->render('mails/restore_password.html.twig');
        // return $this->render('articles/index.html.twig');
    }

    #[Route(path: '/{article<\D+>}', name: 'show')]
    public function show(): Response
    {
        return $this->render('articles/show.html.twig');
    }
}
