<?php

namespace App\Controllers;

use App\Factories\TestFactory;
use Doctrine\ORM\EntityManagerInterface;
use loophp\collection\Collection;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route(path: 'articles', name: 'articles.')]
class ArticleController extends AbstractController
{
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

        $qb = $this->entityManager->getRepository('Doc:Article')
            ->createQueryBuilder('a')
            ->addSelect('pp')
            ->join('a.psychologistProfile', 'pp');

        if (!is_null($search))
            $qb
                ->where('a.title LIKE :search')
                ->setParameter('search', '%' . $search . '%');

        $articleArray = $qb
            ->getQuery()
            ->getResult();

        $articleRows = Collection::fromIterable($articleArray)->chunk(4)->all();

        return $this->render(
            'articles/index.html.twig',
            [
                'articleRows' => $articleRows
            ]
        );
    }

    #[Route(path: '/{slug}', name: 'show')]
    public function show(string $slug): Response
    {
        $article = $this->entityManager->getRepository('Doc:Article')
            ->createQueryBuilder('a')
            ->addSelect('pp')
            ->join('a.psychologistProfile', 'pp')
            ->where('a.slug = :slug')
            ->setParameter('slug', $slug)
            ->getQuery()
            ->getOneOrNullResult();


        return $this->render('articles/show.html.twig', ['article' => $article]);
    }
}
