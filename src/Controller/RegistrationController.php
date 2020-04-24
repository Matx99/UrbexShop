<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegistrationFormType;
use App\Security\LoginFormAuthenticator;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Guard\GuardAuthenticatorHandler;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class RegistrationController extends AbstractController
{
    /**
     * @Route("/register", name="app_register")
     * @Route("/account/{id}/edit", name="account_edit")
     */
    public function register(Request $request, UserPasswordEncoderInterface $passwordEncoder, GuardAuthenticatorHandler $guardHandler, LoginFormAuthenticator $authenticator, User $user = null): Response
    {
        if(!$user){
            $user = new User();
        }

        $form = $this->createForm(RegistrationFormType::class, $user);
        $form->handleRequest($request);


        if ($form->isSubmitted() && $form->isValid()) {
            // encode the plain password
            $user->setPassword(
                $passwordEncoder->encodePassword(
                    $user,
                    $form->get('plainPassword')->getData()
                )
            );

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($user);
            $entityManager->flush();

            // redirection

            return $this->redirectToRoute('product_index');
            
        }

        return $this->render('registration/register.html.twig', [
            'registrationForm' => $form->createView(),
            'editMode' => $user->getId() !== null,
            'user' => $user
        ]);
    }

    /**
     * @Route("/register/master", name="create_admin")
     */
    public function master(UserPasswordEncoderInterface $passwordEncoder, ObjectManager $manager)
    {
        // user normal 
        $roles[] = 'ROLE_ADMIN';
        $role = array_unique($roles);

        $user = new User();
        $user->setEmail('admin@urbexshop.com')
                ->setRoles($role)
                ->setPassword(
                    $passwordEncoder->encodePassword(
                    $user,
                    'admin'
                ))
                ->setName("admin")
                ->setFirstName("admin")
                ->setPhone('0000000000')
                ->setAddress("admin")
                ->setPostalCode("00000")
                ->setCity("admin")
                ->setCountry("admin");
        $manager->persist($user);
        $manager->flush();

        return $this->redirectToRoute('app_login');
    }
}
