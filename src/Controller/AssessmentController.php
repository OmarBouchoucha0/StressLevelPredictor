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
use Symfony\Component\HttpFoundation\RequestStack;

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

            $results = $mlService->predictCluster($assessment);

            $assessment->setCluster($results['cluster_id']);

            $assessment->setStressCategory($results['category']);

            $score = $mlService->predictStress($assessment);
            $assessment->setStressLevel($score);

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

    #[Route('/assessment/result/{id}', name: 'assessment_result')]
    public function result(
        int $id,
        EntityManagerInterface $em,
        RequestStack $requestStack
    ): Response {
        $assessment = $em->getRepository(StressAssessment::class)->find($id);

        if (!$assessment) {
            throw $this->createNotFoundException('Assessment not found');
        }

        // Access the session
        $session = $requestStack->getSession();
        $flash = $session->getFlashBag()->get('recommendations', []);

        $recommendations = [];
        if (!empty($flash)) {
            $recommendations = json_decode($flash[0], true);
        }

        return $this->render('assessment/result.html.twig', [
            'assessment' => $assessment,
            'recommendations' => $recommendations
        ]);
    }
}
