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
        $data = [
            'anxiety_level' => (int)$assessment->getAnxietyLevel(),
            'self_esteem' => (int)$assessment->getSelfEsteem(),
            'mental_health_history' => (int)$assessment->getMentalHealthHistory(),
            'depression' => (int)$assessment->getDepression(),
            'headache' => (int)$assessment->getHeadache(),
            'blood_pressure' => (int)$assessment->getBloodPressure(),
            'sleep_quality' => (int)$assessment->getSleepQuality(),
            'breathing_problem' => (int)$assessment->getBreathingProblem(),
            'noise_level' => (int)$assessment->getNoiseLevel(),
            'living_conditions' => (int)$assessment->getLivingConditions(),
            'safety' => (int)$assessment->getSafety(),
            'basic_needs' => (int)$assessment->getBasicNeeds(),
            'academic_performance' => (int)$assessment->getAcademicPerformance(),
            'study_load' => (int)$assessment->getStudyLoad(),
            'teacher_student_relationship' => (int)$assessment->getTeacherStudentRelationship(),
            'future_career_concerns' => (int)$assessment->getFutureCareerConcerns(),
            'social_support' => (int)$assessment->getSocialSupport(),
            'peer_pressure' => (int)$assessment->getPeerPressure(),
            'extracurricular_activities' => (int)$assessment->getExtracurricularActivities(),
            'bullying' => (int)$assessment->getBullying(),
        ];

        return $data;
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
        $response = $this->client->request('POST', 'http://127.0.0.1:5000/cluster', [
            'json' => $this->formatData($assessment)
        ]);

        $data = $response->toArray();
        return $data['cluster'];
    }

    public function getRecommendations(StressAssessment $assessment): array
    {
        $response = $this->client->request('POST', 'http://127.0.0.1:5000/recommend', [
            'json' => $this->formatData($assessment)
        ]);

        $data = $response->toArray();
        return $data['recommendations'] ?? [];
    }
}
