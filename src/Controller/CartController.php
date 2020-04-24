<?php

namespace App\Controller;

use App\Entity\User;
use App\Entity\Orders;
use App\Entity\Product;
use App\Entity\CommandLine;
use App\Service\Cart\CartService;
use App\Repository\ProductRepository;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CartController extends AbstractController
{ 

    /**
     * @Route("/panier", name="cart_index")
     */
    public function index(CartService $cartService)
    {
        return $this->render('cart/index.html.twig', [
            'items' => $cartService->getFullCart(),
            'total' => $cartService->getTotal()
        ]);
    }

    /**
     * @Route("/panier/add/{id}", name="cart_add")
     */
    public function add($id, CartService $cartService) {
        $cartService->add($id);

        return $this->redirectToRoute("cart_index");
    }

    /**
     * @Route("/panier/remove/{id}", name="cart_remove")
     */
    public function remove($id, CartService $cartService) {
        $cartService->remove($id);

        return $this->redirectToRoute("cart_index");
    }

    /**
     * @Route("/panier/save", name="save_order")
     */
    public function saveOrder(SessionInterface  $session, CartService $cartService) {

        // deny access if not logged in

        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');

        // new order

        $order = new Orders();

        $order->setValid(1);
        $order->setOrderedAt(new \DateTime());
        $order->setUser($this->getUser());

        $today = date("Ymd");
        $rand = mt_rand(0.00, 99.99);
        $uniqueNumber = $today . $rand;
        
        $order->setOrderNumber($uniqueNumber);

        $doctrine = $this->getDoctrine();
        $entityManager = $doctrine->getManager();
        $entityManager->persist($order);
        // $entityManager->flush();

        // new commandLine

        $commandline = new CommandLine();

        var_dump($cartService->getFullCart());
        exit;

        foreach($cartService->getFullCart() as $item){
            $commandline->setName($item['product']);
            $commandline->setQuantity($item['quantity']);
            $commandline->setOrderNumber($order);
            $entityManager->persist($commandline);
            $entityManager->flush();
        }


        return $this->redirectToRoute('orders',[
            'order' => ' Your order have been saved',
         ]);
    }
}

