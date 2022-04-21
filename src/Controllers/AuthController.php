<?php

namespace App\Controllers;

use App\Entities\Book\Role;
use App\Entities\Doc\ClientProfile;
use App\Entities\Doc\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AuthController extends AbstractController
{
    protected EntityManagerInterface $entityManager;

    /**
     * @param EntityManagerInterface $entityManager
     */
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    #[Route(path: 'login', name: 'showAuthForm', methods: ['GET'])]
    public function showAuthForm(): Response
    {
        return $this->render('auth/authorization.html.twig');
    }

    #[Route(path: 'registration', name: 'showRegForm', methods: ['GET'])]
    public function showRegForm(): Response
    {
        return $this->render('auth/registration.html.twig');
    }

    #[Route(path: 'registration', name: 'register', methods: ['POST'])]
    public function register(Request $request): Response
    {
        $email = $request->request->get('email');
        $password = $request->request->get('password');

        $hasUser = $this->entityManager->getRepository('Doc:User')
            ->createQueryBuilder('u')
            ->where('u.email = :email')
            ->setParameter('email', $email)
            ->getQuery()
            ->getOneOrNullResult();

        if (!is_null($hasUser)) {
            $request->getSession()->set('email_exists', 1);

            return $this->redirectToRoute('showRegForm');
        }

        if (mb_strlen($password) < 3) {
            $request->getSession()->set('password_lenght', 1);

            return $this->redirectToRoute('showRegForm');
        }

        /** @var Role $role */
        $role = $this->entityManager->getRepository('Book:Role')->findOneBy(['name' => 'client']);

        $user = new User($email, $password, $role);

        $user->setClientProfile(new ClientProfile($user));

        $request->getSession()->set('auth', $user);

        $this->entityManager->persist($user);

        $this->entityManager->flush();

        return $this->redirectToRoute('client.show');
    }

    #[Route(path: 'logout', name: 'logout')]
    public function logout(Request $request): Response
    {
        $request->getSession()->remove('auth');

        return $this->redirectToRoute('showAuthForm');
    }

    #[Route(path: 'login', name: 'login', methods: ['POST'])]
    public function login(Request $request): Response
    {
        $email = $request->request->get('email');
        $password = $request->request->get('password');


        $user = $this->entityManager->getRepository('Doc:User')->findOneBy(['email' => $email]);


        if (is_null($user) || !password_verify($password, $user->getPassword())) {
            $request->getSession()->set('auth_error', 1);

            return $this->redirectToRoute('showAuthForm');
        }

        $request->getSession()->set('auth', $user);

        return $this->redirectToRoute('client.show');
    }

    #[Route(path: 'restore', name: 'showRestoreForm', methods: ['GET'])]
    public function showRestoreForm(): Response
    {
        return $this->render('auth/restore_password.html.twig');
    }

    #[Route(path: 'restore_mail', name: 'sendRestoreMail', methods: ['POST'])]
    public function sendRestoreMail(): Response
    {
        // получили почту, отправили код восстановления, показали форму ввода кода

        return $this->render('auth/confirm_restore_code.html.twig');
    }

    #[Route(path: 'confirm_restore_code', name: 'confirmRestoreCode', methods: ['POST'])]
    public function confirmRestoreCode(): Response
    {
        // получили код восстановления, показали форму ввода нового пароля

        return $this->render('auth/new_password.html.twig');
    }

    #[Route(path: 'save_new_password', name: 'saveNewPassword', methods: ['POST'])]
    public function saveNewPassword(): Response
    {
        // получили новый пароль, показали форму завершения восстановления

        return $this->render('auth/restore_complete.html.twig');
    }
}
