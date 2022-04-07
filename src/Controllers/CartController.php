<?php

namespace App\Controllers;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route(path: 'cart', name: 'cart.')]
class CartController extends AbstractController
{
    #[Route(path: '/', name: 'index', methods: ['GET', 'HEAD'])]
    public function index(): Response
    {
        return $this->render('cart/index.html.twig');
    }

    #[Route(path: '/order', name: 'order', methods: ['GET'])]
    public function createOrder(): Response
    {
        return $this->render('cart/order.html.twig');
    }

    #[Route(path: '/payment', name: 'payment', methods: ['POST'])]
    public function payment(): Response
    {
        return $this->render('cart/payment.html.twig');
    }
}
