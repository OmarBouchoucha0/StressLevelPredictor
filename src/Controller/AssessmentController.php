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
use Symfony\Component\Security\Http\Attribute\IsGranted;

class AssessmentController extends AbstractController
{
    #[Route('/assessment', name: 'app_assessment')]
    #[IsGranted('ROLE_USER')]
    public function index(
        Request $request,
        EntityManagerInterface $entityManager,
        StressPredictionService $predictionService
    ): Response {
        $assessment = new StressAssessment();
        $assessment->setUser($this->getUser());

        $form = $this->createForm(StressAssessmentType::class, $assessment);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // Call your ML model here
            $result = $predictionService->predict($assessment);

            $assessment->setStressScore($result['score']);
            $assessment->setStressLevel($result['level']);

            $entityManager->persist($assessment);
            $entityManager->flush();

            return $this->redirectToRoute('app_result', ['id' => $assessment->getId()]);
        }

        return $this->render('assessment/index.html.twig', [
            'assessmentForm' => $form->createView(),
        ]);
    }

    #[Route('/result/{id}', name: 'app_result')]
    #[IsGranted('ROLE_USER')]
    public function result(StressAssessment $assessment): Response
    {
        if ($assessment->getUser() !== $this->getUser()) {
            throw $this->createAccessDeniedException();
        }

        $recommendations = $this->getRecommendations($assessment->getStressLevel());

        return $this->render('assessment/result.html.twig', [
            'assessment' => $assessment,
            'recommendations' => $recommendations,
        ]);
    }

    private function getRecommendations(string $stressLevel): array
    {
        $recommendations = [
            'Low' => [
                'Maintain your current healthy habits',
                'Continue regular exercise routine',
                'Keep up your good sleep schedule',
                'Practice gratitude daily',
            ],
            'Moderate' => [
                'Consider meditation or mindfulness practices (10-15 minutes daily)',
                'Ensure 7-8 hours of sleep per night',
                'Schedule regular breaks during work',
                'Talk to friends or family about your concerns',
                'Try progressive muscle relaxation',
            ],
            'High' => [
                'Prioritize sleep - aim for 8+ hours',
                'Reduce caffeine and alcohol intake',
                'Practice deep breathing exercises multiple times daily',
                'Consider professional counseling or therapy',
                'Limit work hours and take time off if possible',
                'Engage in physical activity for at least 30 minutes daily',
            ],
            'Very High' => [
                'Seek professional help immediately - consult a mental health professional',
                'Talk to your doctor about your stress levels',
                'Take immediate time off work if possible',
                'Reach out to your support network',
                'Practice emergency stress relief techniques (deep breathing, grounding)',
                'Avoid major life decisions until stress is managed',
                'Consider a stress management program',
            ],
        ];

        return $recommendations[$stressLevel] ?? $recommendations['Moderate'];
    }
}
