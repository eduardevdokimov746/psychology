<?php

namespace App\Controllers;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\AsciiSlugger;
use Symfony\Component\String\Slugger\SluggerInterface;
use Symfony\Component\String\UnicodeString;

#[Route(path: 'tests', name: 'tests.')]
class TestController extends AbstractController
{
    #[Route(path: '/', name: 'index')]
    public function index(): Response
    {
        return $this->render('tests/index.html.twig');
    }

    #[Route(path: '/{test<\D+>}', name: 'show')]
    public function show(SluggerInterface $slugger): Response
    {
        $testTitle = 'Тест 30 пословиц. Стратегия вашего поведения в конфликте (для подростков)';

        dd($slugger->slug('Привет Мир!'));

        return $this->render('tests/show.html.twig', [
            'testTitle' => $testTitle
        ]);
    }
}
