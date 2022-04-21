<?php

namespace App\Controllers;

use App\Constants\Gender;
use App\Entities\Doc\ClientProfile;
use App\Entities\Doc\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route(path: 'client', name: 'client.')]
class ClientController extends AbstractController
{
    protected EntityManagerInterface $entityManager;

    /**
     * @param EntityManagerInterface $entityManager
     */
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    #[Route(path: '/', name: 'show', methods: ['GET'])]
    public function show(Request $request): Response
    {
        if (!$request->getSession()->has('auth'))
            return $this->redirectToRoute('showAuthForm');

        $user = $request->getSession()->get('auth');

        return $this->render('client/show.html.twig', ['user' => $user]);
    }

    #[Route(path: '/edit', name: 'edit')]
    public function edit(Request $request): Response
    {
        $liveWithTypes = $this->entityManager->getRepository('Book:LiveWithTypes')->findAll();
        $martialStatuses = $this->entityManager->getRepository('Book:MartialStatus')->findAll();
        $workTypes = $this->entityManager->getRepository('Book:WorkType')->findAll();

         if (!$request->getSession()->has('auth'))
            return $this->redirectToRoute('showAuthForm');

        $user = $request->getSession()->get('auth');

        return $this->render(
            'client/edit.html.twig',
            [
                'liveWithTypes' => $liveWithTypes,
                'martialStatuses' => $martialStatuses,
                'workTypes' => $workTypes,
                'user' => $user
            ]
        );
    }

    #[Route(path: '/', name: 'update', methods: ['POST'])]
    public function update(Request $request): Response
    {
        if (!$request->getSession()->has('auth'))
            return $this->redirectToRoute('showAuthForm');

        if (!is_null($request->request->get('liveWithType')))
            $liveWithType = $this->entityManager->getRepository('Book:LiveWithTypes')->find($request->request->get('liveWithType'));
        else
            $liveWithType = null;

        if (!is_null($request->request->get('martialStatus')))
            $martialStatus = $this->entityManager->getRepository('Book:MartialStatus')->find($request->request->get('martialStatus'));
        else
            $martialStatus = null;

        if (!is_null($request->request->get('workType')))
            $workType = $this->entityManager->getRepository('Book:WorkType')->find($request->request->get('workType'));
        else
            $workType = null;

        /** @var User $user */
        $user = $request->getSession()->get('auth');

        $clientProfile = $this->entityManager->getRepository('Doc:ClientProfile')->find($user->getClientProfile()->getId());

        $clientProfile
            ->setFirstName($request->request->get('firstName'))
            ->setLastName($request->request->get('lastName'))
            ->setDateOfBirth(\DateTime::createFromFormat('Y-m-d', $request->request->get('dateOfBirth')))
            ->setGender(Gender::tryFrom($request->request->get('gender')))
            ->setHasChildren($request->request->get('hasChildren'))
            ->setLiveWithType($liveWithType)
            ->setMartialStatus($martialStatus)
            ->setWorkType($workType)
            ->setWeight($request->request->get('weight') === '' ? null: $request->request->get('weight'))
            ->setHeight($request->request->get('height') === '' ? null : $request->request->get('height'));

        $this->entityManager->flush();

        $user->getClientProfile()->setFirstName($request->request->get('firstName'))
            ->setLastName($request->request->get('lastName'))
            ->setDateOfBirth(\DateTime::createFromFormat('Y-m-d', $request->request->get('dateOfBirth')))
            ->setGender(Gender::tryFrom($request->request->get('gender')))
            ->setHasChildren($request->request->get('hasChildren'))
            ->setLiveWithType($liveWithType)
            ->setMartialStatus($martialStatus)
            ->setWorkType($workType)
            ->setWeight($request->request->get('weight') === '' ? null: $request->request->get('weight'))
            ->setHeight($request->request->get('height') === '' ? null : $request->request->get('height'));

        $request->getSession()->set('auth', $user);

        return $this->redirectToRoute('client.edit');
    }

    #[Route(path: '/orders', name: 'orders')]
    public function orders(Request $request): Response
    {
        $orders = $this->entityManager->getRepository('Doc:Order')
            ->createQueryBuilder('o')
            ->addSelect('i')
            ->join('o.orderItems', 'i')
            ->where('o.clientProfile = :clientProfile')
            ->setParameter('clientProfile', $request->getSession()->get('auth')->getClientProfile())
            ->getQuery()
            ->getResult();

        return $this->render('client/orders.html.twig', ['orders' => $orders]);
    }

    #[Route(path: '/tests', name: 'tests')]
    public function tests(Request $request): Response
    {
        $tests = $this->entityManager->getRepository('Doc:TestResult')
            ->createQueryBuilder('tr')
            ->addSelect('t')
            ->join('tr.test', 't')
            ->where('tr.clientProfile = :clientProfile')
            ->setParameter('clientProfile', $request->getSession()->get('auth')->getClientProfile())
            ->getQuery()
            ->getResult();

        return $this->render('client/tests.html.twig', ['tests' => $tests]);
    }
}
