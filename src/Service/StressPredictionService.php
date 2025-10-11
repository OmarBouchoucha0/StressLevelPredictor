<?php

namespace App\Service;

use App\Entity\StressAssessment;

class StressPredictionService
{
    public function predict(StressAssessment $assessment): array
    {
        // TODO: Replace this with your actual ML model integration
        // This is a placeholder algorithm

        $score = 0;

        // Sleep factor (0-30 points)
        $sleepScore = match(true) {
            $assessment->getSleepHours() < 5 => 25,
            $assessment->getSleepHours() < 6 => 15,
            $assessment->getSleepHours() < 7 => 10,
            $assessment->getSleepHours() <= 8 => 5,
            default => 10
        };

        // Work hours factor (0-20 points)
        $workScore = match(true) {
            $assessment->getWorkHours() > 10 => 20,
            $assessment->getWorkHours() > 8 => 12,
            $assessment->getWorkHours() > 6 => 5,
            default => 0
        };

        // Exercise factor (0-15 points, inverse)
        $exerciseScore = match(true) {
            $assessment->getExerciseFrequency() === 0 => 15,
            $assessment->getExerciseFrequency() < 3 => 10,
            $assessment->getExerciseFrequency() < 5 => 5,
            default => 0
        };

        // Anxiety level (0-20 points)
        $anxietyScore = ($assessment->getAnxietyLevel() / 10) * 20;

        // Mood level (0-15 points, inverse)
        $moodScore = ((10 - $assessment->getMoodLevel()) / 10) * 15;

        // Social support (0-10 points, inverse)
        $socialScore = ((10 - $assessment->getSocialSupport()) / 10) * 10;

        $score = $sleepScore + $workScore + $exerciseScore + $anxietyScore + $moodScore + $socialScore;

        // Determine stress level
        $level = match(true) {
            $score < 20 => 'Low',
            $score < 40 => 'Moderate',
            $score < 65 => 'High',
            default => 'Very High'
        };

        return [
            'score' => round($score, 2),
            'level' => $level
        ];
    }

    // Method to integrate your actual ML model
    public function predictWithModel(StressAssessment $assessment): array
    {
        // Example structure for calling your Python ML model via API or command line
        // You can use Symfony's HttpClient or Process component

        /*
        $data = [
            'sleep_hours' => $assessment->getSleepHours(),
            'work_hours' => $assessment->getWorkHours(),
            'exercise_frequency' => $assessment->getExerciseFrequency(),
            'anxiety_level' => $assessment->getAnxietyLevel(),
            'mood_level' => $assessment->getMoodLevel(),
            'social_support' => $assessment->getSocialSupport(),
        ];

        // Option 1: Call Python script
        $process = new Process(['python', 'path/to/your/model.py', json_encode($data)]);
        $process->run();
        $result = json_decode($process->getOutput(), true);

        // Option 2: Call API endpoint
        $response = $this->httpClient->request('POST', 'http://localhost:5000/predict', [
            'json' => $data
        ]);
        $result = $response->toArray();

        return [
            'score' => $result['stress_score'],
            'level' => $result['stress_level']
        ];
        */

        return $this->predict($assessment);
    }
}
