<?php

declare(strict_types=1);

namespace App\Controller;

use App\Entity\Order;
use App\Repository\OrderRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class OrderController
 * @package App\Controller
 */
class OrderController extends AbstractController
{
    /**
     * @Route("/orders", name="app_orders")
     *
     * @return Response
     */
    public function list(): Response
    {
        /** @var OrderRepository $repository */
        $repository = $this->getDoctrine()->getRepository(Order::class);
        $orders = $repository->findAll();

        return new Response($this->renderView('orders/list.html.twig', [
            'orders' => $orders,
        ]));
    }
}