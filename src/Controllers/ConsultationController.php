<?php

namespace App\Controllers;

use App\Entities\Doc\Comment;
use App\Entities\Doc\Consultation;
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
    public function show(Request $request, int $consultation): Response
    {
        $consultation = $this->entityManager->getRepository('Doc:Consultation')
            ->createQueryBuilder('c')
            ->addSelect('pp, wp, dwp, com, comclient')
            ->leftJoin('c.psychologistProfile', 'pp')
            ->leftJoin('pp.workWithProblems', 'wp')
            ->leftJoin('pp.dontWorkWithProblems', 'dwp')
            ->leftJoin('c.comments', 'com')
            ->leftJoin('com.clientProfile', 'comclient')
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

    #[Route(path: '/{consultation<\d+>}/add-comment', name: 'addComment', methods: ['POST'])]
    public function addComment(Request $request, int $consultation): Response
    {

        /** @var Consultation $consultationObj */
        $consultationObj = $this->entityManager->getRepository('Doc:Consultation')->find($consultation);
        $clientProfile = $this->entityManager->getRepository('Doc:ClientProfile')->find($request->getSession()->get('auth')->getClientProfile()->getId());
        $comment = new Comment(
            $clientProfile,
            $consultationObj,
            $request->request->get('comment')
        );

        $this->entityManager->persist($comment);

        $consultationObj->addComment($comment);


        $this->entityManager->flush();

        return $this->redirectToRoute('consultations.show', ['consultation' => $consultation]);
    }
}
