<?php

namespace App\Controllers;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route(path: 'robot-psychologist', name: 'robot.')]
class RobotController extends AbstractController
{
    #[Route(path: '/', name: 'index')]
    public function index(): Response
    {
        return $this->render('robot/index.html.twig');
    }

    #[Route(path: '/problems', name: 'problems')]
    public function problems(): Response
    {
        return $this->render('robot/problems.html.twig');
    }

    #[Route(path: '/research', name: 'research')]
    public function showResearchForm(): Response
    {
        return $this->render('robot/research_form.html.twig');
    }

    #[Route(path: '/research/result', name: 'research.result')]
    public function showResearchResult(): Response
    {
        return $this->render('robot/research_result.html.twig');
    }
}
