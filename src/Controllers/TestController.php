<?php

namespace App\Controllers;

use App\Factories\TestFactory;
use Doctrine\ORM\EntityManagerInterface;
use loophp\collection\Collection;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use function App\Helpers\slug;

#[Route(path: 'tests', name: 'tests.')]
class TestController extends AbstractController
{
    protected TestFactory $testFactory;
    protected EntityManagerInterface $entityManager;

    public function __construct(TestFactory $testFactory, EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
        $this->testFactory = $testFactory;
    }

    #[Route(path: '/', name: 'index')]
    public function index(Request $request): Response
    {
        $search = $request->get('search');

        $qb = $this->entityManager->getRepository('Doc:Test')
            ->createQueryBuilder('t');

        if (!is_null($search))
            $qb
                ->where('t.title LIKE :search')
                ->setParameter('search', '%' . $search . '%');

        $testsArray = $qb
            ->getQuery()
            ->getResult();

        $testRows = Collection::fromIterable($testsArray)->chunk(4)->all();

        return $this->render(
            'tests/index.html.twig',
            [
                'testRows' => $testRows
            ]
        );
    }

    #[Route(path: '/{slug}', name: 'show')]
    public function show(string $slug): Response
    {
        return $this->render($this->testFactory->makeTest($slug)->getContentLayout(), ['slug' => $slug]);
    }

    #[Route(path: '/{slug}/result', name: 'result', priority: 1)]
    public function showResult(string $slug, Request $request): Response
    {
        $test = $this->testFactory->makeTest($slug);

        $result = $test->getPayload();

        if ($request->getSession()->has('auth'))
            $test->save($result, $this->entityManager, $request->getSession()->get('auth'));

        return $this->render($test->getResultLayout(), $result);
    }
}
