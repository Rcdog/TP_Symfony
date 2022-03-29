<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;


class ReglementController extends AbstractController
{
    /**
     * @Route("/reglement")
     */
    public function home(): Response
    {
        return $this->render('reglement.html.twig');
    }
}
