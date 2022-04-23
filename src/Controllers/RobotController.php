<?php

namespace App\Controllers;

use App\Entities\Doc\RobotStep;
use App\Factories\RobotFactory;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route(path: 'robot-psychologist', name: 'robot.')]
class RobotController extends AbstractController
{
    protected RobotFactory $robotFactory;
    protected EntityManagerInterface $entityManager;

    public function __construct(RobotFactory $robotFactory, EntityManagerInterface $entityManager)
    {
        $this->robotFactory = $robotFactory;
        $this->entityManager = $entityManager;
    }

    #[Route(path: '/', name: 'index')]
    public function index(): Response
    {
        return $this->render('robot/index.html.twig');
    }

    #[Route(path: '/{slug}/{step}', name: 'show', defaults: ['step' => 'step1'])]
    public function showRobot(string $slug, string $step, Request $request): Response
    {
        if ($step === 'result' && $request->getSession()->has('auth')) {
            $clientProfile = $this->entityManager->getRepository('Doc:ClientProfile')->find(
                $request->getSession()->get('auth')->getClientProfile()->getId()
            );

            $robot = $this->entityManager->getRepository('Doc:Robot')->findOneBy(['slug' => $slug]);

            $this->entityManager->persist(new RobotStep($robot, $clientProfile, $step, []));

            $this->entityManager->flush();
        }

        return $this->render($this->robotFactory->makeRobot($slug)->getContentLayout($step), ['slug' => $slug]);
    }

    #[Route(path: '/{slug}/result', name: 'result')]
    public function showRobotResult(string $slug): Response
    {
        return $this->render($this->robotFactory->makeRobot($slug)->getResultLayout());
    }

    #[Route(path: '/problems', name: 'problems', priority: 1)]
    public function problems(): Response
    {
        $robots = $this->entityManager->getRepository('Doc:Robot')->findAll();

        return $this->render('robot/problems.html.twig', ['robots' => $robots]);
    }

    #[Route(path: '/research', name: 'research', priority: 1)]
    public function showResearchForm(): Response
    {
        return $this->render('robot/research_form.html.twig');
    }

    #[Route(path: '/research/result', name: 'research.result', priority: 1)]
    public function showResearchResult(): Response
    {
        $robots = $this->entityManager->getRepository('Doc:Robot')->findAll();

        return $this->render('robot/research_result.html.twig', ['robots' => $robots]);
    }
}
