<?php

namespace App\Controllers;

use App\Entities\Doc\Order;
use App\Entities\Doc\OrderItem;
use Doctrine\ORM\EntityManagerInterface;
use loophp\collection\Contract\Collection;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route(path: 'cart', name: 'cart.')]
class CartController extends AbstractController
{
    protected EntityManagerInterface $entityManager;

    /**
     * @param EntityManagerInterface $entityManager
     */
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    #[Route(path: '/', name: 'index', methods: ['GET', 'HEAD'])]
    public function index(): Response
    {
        return $this->render('cart/index.html.twig');
    }

    #[Route(path: '/add', name: 'add', methods: ['POST'])]
    public function add(Request $request): Response
    {
        $consultationId = $request->request->get('consultation');

        $consultation =  $this->entityManager->getRepository('Doc:Consultation')->find($consultationId);

        if (is_null($cart = $request->getSession()->get('cart'))) {
            $cart = [$consultationId => $consultation];
        } else {
            $cart[$consultationId] = $consultation;
        }

        $request->getSession()->set('cart', $cart);

        return $this->redirectToRoute('consultations.show', ['consultation' => $consultationId]);
    }

    #[Route(path: '/delete', name: 'delete', methods: ['POST'])]
    public function delete(Request $request): Response
    {
        $consultationId = $request->request->get('consultation');

        $cart = $request->getSession()->get('cart');

        if (is_null($cart) || !isset($cart[$consultationId]))
            return $this->redirectToRoute('cart.index');

        unset($cart[$consultationId]);

        if (empty($cart))
            $request->getSession()->remove('cart');
        else
            $request->getSession()->set('cart', $cart);


        return $this->redirectToRoute('cart.index');
    }

    #[Route(path: '/order', name: 'order', methods: ['GET'])]
    public function createOrder(): Response
    {
        return $this->render('cart/order.html.twig');
    }

    #[Route(path: '/payment', name: 'payment', methods: ['POST'])]
    public function payment(Request $request): Response
    {
        $cart = $request->getSession()->get('cart');

        $sum = \loophp\collection\Collection::fromIterable($cart)->reduce(fn($sum, $item) => $sum + $item->getPrice())->current();

        $order = new Order($this->generateUniqueNumber(), $request->request->get('email'), $sum);

        if ($request->getSession()->has('auth')) {
            $clientProfile = $this->entityManager->getRepository('Doc:ClientProfile')->find(
                $request->getSession()->get('auth')->getClientProfile()->getId()
            );

            $order->setClientProfile($clientProfile);
        }

        $this->entityManager->persist($order);

        foreach ($cart as $item) {
            $this->entityManager->persist(new OrderItem($order, $item->getTitle(), $item->getPrice()));
        }

        $request->getSession()->remove('cart');

        $this->entityManager->flush();

        return $this->render('cart/payment.html.twig');
    }

    protected function generateUniqueNumber(): string
    {
        $str = '';

        foreach (range(0, 9) as $char) {
            $str .= array_rand(range(0, 9));
        }

        return $str;
    }
}
