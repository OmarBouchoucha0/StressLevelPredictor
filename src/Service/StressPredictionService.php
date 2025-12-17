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
            'depression' => (int)$assessment->getDepression(),
            'headache' => (int)$assessment->getHeadache(),
            'sleep_quality' => (int)$assessment->getSleepQuality(),
            'basic_needs' => (int)$assessment->getBasicNeeds(),
            'academic_performance' => (int)$assessment->getAcademicPerformance(),
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
        return (float)($data['stress_level_continuous'] ?? 0.0);
    }

    public function predictCluster(StressAssessment $assessment): array
    {
        $response = $this->client->request('POST', 'http://127.0.0.1:5000/cluster', [
            'json' => $this->formatData($assessment)
        ]);

        return $response->toArray();
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
