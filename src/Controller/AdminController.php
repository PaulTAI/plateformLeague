<?php

namespace App\Controller;

use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin", name="admin_")
 */
class AdminController extends AbstractController
{
    /**
     * @Route("/", name="index", methods={"GET"})
     */
    public function index(): Response
    {
        return $this->render('admin/home.html.twig');
    }

    /**
     * @Route("/utilisateurs", name="userList", methods={"GET"})
     */
    public function userList(UserRepository $userRepository): Response
    {
        return $this->render('admin/userList.html.twig', [
            'users' => $userRepository->findBy([], [
                'id' => 'ASC'
            ])
        ]);
    }
}
