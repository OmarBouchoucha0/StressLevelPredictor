<?php

namespace App\Service;

use App\Entity\StressAssessment;

class StressPredictionService
{
public function predict(StressAssessment $assessment): array
{
    // This will be replaced with your actual ML model
    // For now, using a placeholder algorithm based on the dataset features

    $score = 0;

    // Sleep (weight: 15%)
    $sleepScore = match(true) {
        $assessment->getSleepHours() < 6 => 15,
        $assessment->getSleepHours() < 7 => 10,
        $assessment->getSleepHours() <= 8 => 3,
        default => 8
    };

    // Study hours (weight: 10%)
    $studyScore = match(true) {
        $assessment->getStudyHours() > 4 => 10,
        $assessment->getStudyHours() > 3 => 6,
        default => 2
    };

    // Anxiety level (weight: 25%) - most important
    $anxietyScore = ($assessment->getAnxietyLevel() / 21) * 25;

    // Self-esteem/Mood (weight: 15%) - inverse
    $moodScore = ((30 - $assessment->getMoodLevel()) / 30) * 15;

    // Academic workload (weight: 10%)
    $workloadScore = ($assessment->getAcademicWorkload() / 5) * 10;

    // Financial stress (weight: 10%)
    $financialScore = ($assessment->getFinancialStress() / 5) * 10;

    // Social support (weight: 10%) - inverse
    $socialScore = ((10 - $assessment->getSocialSupportLevel()) / 10) * 10;

    // Physical activity (weight: 5%) - inverse
    $activityScore = match($assessment->getPhysicalActivity()) {
        'Low' => 5,
        'Moderate' => 2,
        'High' => 0,
        default => 3
    };

    $score = $sleepScore + $studyScore + $anxietyScore + $moodScore +
             $workloadScore + $financialScore + $socialScore + $activityScore;

    // Determine stress level based on score
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
}}
