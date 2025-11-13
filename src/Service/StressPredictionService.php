<?php

namespace App\Service;

use App\Entity\StressAssessment;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class StressPredictionService
{
    private HttpClientInterface $client;

    public function __construct(HttpClientInterface $client)
    {
        $this->client = $client;
    }

    private function formatData(StressAssessment $assessment): array
    {
        return [
            'anxiety_level' => $assessment->getAnxietyLevel(),
            'self_esteem' => $assessment->getSelfEsteem(),
            'mental_health_history' => $assessment->getMentalHealthHistory(),
            'depression' => $assessment->getDepression(),
            'headache' => $assessment->getHeadache(),
            'blood_pressure' => $assessment->getBloodPressure(),
            'sleep_quality' => $assessment->getSleepQuality(),
            'breathing_problem' => $assessment->getBreathingProblem(),
            'noise_level' => $assessment->getNoiseLevel(),
            'living_conditions' => $assessment->getLivingConditions(),
            'safety' => $assessment->getSafety(),
            'basic_needs' => $assessment->getBasicNeeds(),
            'academic_performance' => $assessment->getAcademicPerformance(),
            'study_load' => $assessment->getStudyLoad(),
            'teacher_student_relationship' => $assessment->getTeacherStudentRelationship(),
            'future_career_concerns' => $assessment->getFutureCareerConcerns(),
            'social_support' => $assessment->getSocialSupport(),
            'peer_pressure' => $assessment->getPeerPressure(),
            'extracurricular_activities' => $assessment->getExtracurricularActivities(),
            'bullying' => $assessment->getBullying(),
        ];
    }

    public function predictStress(StressAssessment $assessment): string
    {
        $response = $this->client->request('POST', 'http://127.0.0.1:5000/predict', [
            'json' => $this->formatData($assessment)
        ]);

        $data = $response->toArray();
        return $data['stress_level'];
    }

    public function predictCluster(StressAssessment $assessment): int
    {
        $response = $this->client->request('POST', 'http://127.0.0.1:5001/cluster', [
            'json' => $this->formatData($assessment)
        ]);

        $data = $response->toArray();
        return $data['cluster'];
    }

    public function getRecommendations(StressAssessment $assessment): array
    {
        $response = $this->client->request('POST', 'http://127.0.0.1:5002/recommend', [
            'json' => $this->formatData($assessment)
        ]);

        $data = $response->toArray();
        return $data['recommendations'] ?? [];
    }
}
