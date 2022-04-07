<?php

namespace App\Controllers;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route(path: 'tests', name: 'tests.')]
class TestController extends AbstractController
{
    #[Route(path: '/', name: 'index')]
    public function index(): Response
    {
        return $this->render('tests/index.html.twig');
    }

    #[Route(path: '/{test<\D+>}', name: 'show')]
    public function show(): Response
    {
        $testTitle = 'Тест 30 пословиц. Стратегия вашего поведения в конфликте (для подростков)';

        return $this->render('tests/show.html.twig', [
            'testTitle' => $testTitle
        ]);
    }
}
