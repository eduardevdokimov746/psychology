<?php

namespace App\Controllers;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AffirmationController extends AbstractController
{
    #[Route(path: 'affirmation', name: 'affirmation')]
    public function show(): Response
    {
        $affirmation = 'Я достоин(а) своего уважения.';

        return $this->render('affirmation/show.html.twig',[
            'affirmation' => $affirmation
        ]);
    }
}
