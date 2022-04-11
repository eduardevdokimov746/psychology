<?php

namespace App\Controllers;

use App\Factories\TestFactory;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use function App\Helpers\lower;

#[Route(path: 'tests', name: 'tests.')]
class TestController extends AbstractController
{
    protected TestFactory $testFactory;

    public function __construct(TestFactory $testFactory)
    {
        $this->testFactory = $testFactory;
    }

    #[Route(path: '/', name: 'index')]
    public function index(): Response
    {
        return $this->render('tests/index.html.twig');
    }

    #[Route(path: '/{slug<\D+>}', name: 'show')]
    public function show(string $slug): Response
    {
        $testTitle = 'Тест 30 пословиц. Стратегия вашего поведения в конфликте (для подростков)';

        return $this->render($this->testFactory->makeTest($slug)->getContentLayout());
    }

    #[Route(path: '/{slug<\D+>}/result', name: 'result', priority: 1)]
    public function showResult(string $slug): Response
    {
        return $this->render($this->testFactory->makeTest($slug)->getResultLayout());
    }
}
