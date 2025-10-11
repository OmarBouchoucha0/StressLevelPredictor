<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class AssessmentController extends AbstractController
{
    #[Route('/assessment', name: 'app_assessment')]
    public function index(): Response
    {
        return $this->render('assessment/index.html.twig', [
            'controller_name' => 'AssessmentController',
        ]);
    }
}
