<?php

namespace App\Controller;

use App\Entity\StressAssessment;
use App\Form\StressAssessmentType;
use App\Service\StressPredictionService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AssessmentController extends AbstractController
{
    #[Route('/assessment', name: 'app_assessment')]
    public function new(Request $request, StressPredictionService $mlService, EntityManagerInterface $em): Response
    {
        $assessment = new StressAssessment();
        $form = $this->createForm(StressAssessmentType::class, $assessment);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $assessment->setUser($this->getUser());
            $stressLevel = $mlService->predictStress($assessment);
            $assessment->setStressLevel($stressLevel);
            $cluster = $mlService->predictCluster($assessment);
            $assessment->setCluster($cluster);
            $recommendations = $mlService->getRecommendations($assessment);
            $em->persist($assessment);
            $em->flush();
            $this->addFlash('recommendations', json_encode($recommendations));
            return $this->redirectToRoute('assessment_result', [
                'id' => $assessment->getId(),
            ]);
        }

        return $this->render('assessment/index.html.twig', [
            'assessmentForm' => $form->createView()
        ]);
    }
}
