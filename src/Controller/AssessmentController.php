<?php

namespace App\Controller;

use App\Entity\StressAssessment;
use App\Form\StressAssessmentType;
use App\Service\StressPredictor;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class AssessmentController extends AbstractController
{

    public function new(Request $request, StressMLService $mlService): Response
    {
        $assessment = new StressAssessment();
        $form = $this->createForm(StressAssessmentType::class, $assessment);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // Call predictive model
            $stressLevel = $mlService->predictStress($assessment);
            $assessment->setStressLevel($stressLevel);

            // Call clustering model
            $cluster = $mlService->predictCluster($assessment);
            $assessment->setCluster($cluster); // Add 'cluster' property in entity
            $recommendations = $mlService->getRecommendations($assessment);

            $em = $this->getDoctrine()->getManager();
            $em->persist($assessment);
            $em->flush();

            return $this->redirectToRoute('assessment_result', [
                'id' => $assessment->getId(),
                'recommendations' => $recommendations,
            ]);
        }

        return $this->render('assessment/new.html.twig', [
            'assessmentForm' => $form->createView()
        ]);
    }
}
