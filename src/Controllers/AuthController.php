<?php

namespace App\Controllers;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AuthController extends AbstractController
{
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
