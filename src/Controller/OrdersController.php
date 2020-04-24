<?php

namespace App\Controller;

use App\Entity\CommandLine;
use App\Entity\Orders;
use App\Repository\OrderRepository;
use Symfony\Bridge\PhpUnit\TextUI\Command;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class OrdersController extends AbstractController
{
    /**
     * @Route("/orders", name="orders")
     */
    public function index(OrderRepository $orderRepository)
    {

        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');

        return $this->render('orders/index.html.twig', [
            'orders' => $orderRepository->findAll(),
        ]);
    }

    /**
     * @Route("/orders/{id}", name="order_show")
     */
    public function show(Orders $order)
    {

        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');

        return $this->render('orders/show.html.twig', [
            'order' => $order,
        ]);
    }

    /**
     * @Route("/orders/add", name="order_add")
     */
    public function add(OrderRepository $orderRepository)
    {   
        
        return $this->render('orders/index.html.twig', [
            'orders' => $orderRepository->findAll(),
        ]);
    }
}
