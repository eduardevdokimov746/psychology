<?php

namespace App\Controllers;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\EntityManagerInterface;
use loophp\collection\Contract\Operation\Sortable;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use loophp\collection\Collection;

#[Route(path: 'consultations', name: 'consultations.')]
class ConsultationController extends AbstractController
{
    protected EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    #[Route(path: '/', name: 'index')]
    public function index(Request $request): Response
    {
        $consultationsArray = $this->entityManager->getRepository('Doc:Consultation')
            ->createQueryBuilder('c')
            ->addSelect('pp')
            ->leftJoin('c.psychologistProfile', 'pp')
            ->getQuery()
            ->getResult();



        $consultationRows = Collection::fromIterable($consultationsArray)
            ->sort(Sortable::BY_VALUES, function ($prev, $next) {
                return is_null($prev->getPsychologistProfile()) ? 1 : 0;
            })
            ->chunk(4)
            ->all();

        return $this->render(
            'consultations/index.html.twig',
            [
                'consultationRows' => $consultationRows
            ]
        );
    }

    #[Route(path: '/{consultation<\d+>}', name: 'show')]
    public function show(int $consultation): Response
    {
        $consultation = $this->entityManager->getRepository('Doc:Consultation')
            ->createQueryBuilder('c')
            ->addSelect('pp, wp, dwp')
            ->leftJoin('c.psychologistProfile', 'pp')
            ->leftJoin('pp.workWithProblems', 'wp')
            ->leftJoin('pp.dontWorkWithProblems', 'dwp')
            ->where('c.id = :id')
            ->setParameter('id', $consultation)
            ->getQuery()
            ->getOneOrNullResult();

        return $this->render(
            'consultations/show.html.twig',
            [
                'consultation' => $consultation
            ]
        );
    }
}
