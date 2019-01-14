<?php
/**
 * Created by PhpStorm.
 * User: vasily
 * Date: 28.12.18
 * Time: 10:32
 */

namespace App\Controller;


use App\Entity\FactorialResult;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Security\Core\User\UserInterface;

class DefaultController extends AbstractController
{
    public function index()
    {
        return $this->redirectToRoute('app_login');
    }

    public function showResult(UserInterface $user)
    {
        $repository = $this->getDoctrine()->getRepository(FactorialResult::class);
        $FRs = $repository->findBy(['userId' => $user]);

        return $this->render('factorial/result.html.twig', ['result' => $FRs]);
    }
}