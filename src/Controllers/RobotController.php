<?php

namespace App\Controllers;

use App\Factories\RobotFactory;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use function App\Helpers\slug;

#[Route(path: 'robot-psychologist', name: 'robot.')]
class RobotController extends AbstractController
{
    protected RobotFactory $robotFactory;

    public function __construct(RobotFactory $robotFactory)
    {
        $this->robotFactory = $robotFactory;
    }

    #[Route(path: '/', name: 'index')]
    public function index(): Response
    {
        return $this->render('robot/index.html.twig');
    }

    #[Route(path: '/{slug}/{step}', name: 'show', defaults: ['step' => 'step1'])]
    public function showRobot(string $slug, string $step): Response
    {
        return $this->render($this->robotFactory->makeRobot($slug)->getContentLayout($step));
    }

    #[Route(path: '/{slug}/result', name: 'result')]
    public function showRobotResult(string $slug): Response
    {
        return $this->render($this->robotFactory->makeRobot($slug)->getResultLayout());
    }

    #[Route(path: '/problems', name: 'problems', priority: 1)]
    public function problems(): Response
    {
        return $this->render('robot/problems.html.twig');
    }

    #[Route(path: '/research', name: 'research', priority: 1)]
    public function showResearchForm(): Response
    {
        return $this->render('robot/research_form.html.twig');
    }

    #[Route(path: '/research/result', name: 'research.result', priority: 1)]
    public function showResearchResult(): Response
    {
        return $this->render('robot/research_result.html.twig');
    }
}
