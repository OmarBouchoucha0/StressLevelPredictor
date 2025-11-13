<?php

namespace App\Form;

use App\Entity\StressAssessment;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;

class StressAssessmentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('anxietyLevel', ChoiceType::class, [
                'label' => 'Anxiety Level (0 = Very Low, 20 = Very High)',
                'choices' => array_combine(range(0, 20), range(0, 20)),
                'constraints' => [new NotBlank()],
            ])
            ->add('selfEsteem', ChoiceType::class, [
                'label' => 'Self-Esteem Level (0 = Very Low, 30 = Very High)',
                'choices' => array_combine(range(0, 30), range(0, 30)),
                'constraints' => [new NotBlank()],
            ])
            ->add('mentalHealthHistory', ChoiceType::class, [
                'label' => 'History of Mental Health Issues(0 = None , 1 = Has)',
                'choices' => array_combine(range(0, 1), range(0, 1)),
                'constraints' => [new NotBlank()],
            ])
            ->add('depression', ChoiceType::class, [
                'label' => 'Depression Level (0 = None, 30 = Severe)',
                'choices' => array_combine(range(1, 30), range(1, 30)),
                'constraints' => [new NotBlank()],
            ])
            ->add('headache', ChoiceType::class, [
                'label' => 'Headache Frequency (0 = Rarely, 5 = Daily)',
                'choices' => array_combine(range(0, 5), range(0, 5)),
                'constraints' => [new NotBlank()],
            ])
            ->add('bloodPressure', ChoiceType::class, [
                'label' => 'Blood Pressure Level (1 = Low, 5 = High)',
                'choices' => array_combine(range(1, 5), range(1, 5)),
                'constraints' => [new NotBlank()],
            ])
            ->add('sleepQuality', ChoiceType::class, [
                'label' => 'Sleep Quality (0 = Poor, 5 = Excellent)',
                'choices' => array_combine(range(0, 5), range(0, 5)),
                'constraints' => [new NotBlank()],
            ])
            ->add('breathingProblem', ChoiceType::class, [
                'label' => 'Breathing Problems (0 = Poor , 5 = Excellent)',
                'choices' => array_combine(range(0, 5), range(0, 5)),
                'constraints' => [new NotBlank()],
            ])
            ->add('noiseLevel', ChoiceType::class, [
                'label' => 'Noise Level(0 = Poor , 5 = Excellent)',
                'choices' => array_combine(range(0, 5), range(0, 5)),
                'constraints' => [new NotBlank()],
            ])
            ->add('livingConditions', ChoiceType::class, [
                'label' => 'Living Conditions(0 = Poor , 5 = Excellent)',
                'choices' => array_combine(range(0, 5), range(0, 5)),
                'constraints' => [new NotBlank()],
            ])
            ->add('safety', ChoiceType::class, [
                'label' => 'safety(0 = Poor , 5 = Excellent)',
                'choices' => array_combine(range(0, 5), range(0, 5)),
                'constraints' => [new NotBlank()],
            ])

            ->add('basicNeeds', ChoiceType::class, [
                'label' => 'Basic Needs Met(0 = Poor , 5 = Excellent)',
                'choices' => array_combine(range(0, 5), range(0, 5)),
                'constraints' => [new NotBlank()],
            ])
            ->add('academicPerformance', ChoiceType::class, [
                'label' => 'Academic Performance (0 = Poor, 5 = Excellent)',
                'choices' => array_combine(range(0, 5), range(0, 5)),
                'constraints' => [new NotBlank()],
            ])
            ->add('studyLoad', ChoiceType::class, [
                'label' => 'Study Load (0 = Very Light, 5 = Extremely Heavy)',
                'choices' => array_combine(range(0, 5), range(0, 5)),
                'constraints' => [new NotBlank()],
            ])
            ->add('teacherStudentRelationship', ChoiceType::class, [
                'label' => 'Teacher-Student Relationship (0 = Poor, 5 = Excellent)',
                'choices' => array_combine(range(0, 5), range(0, 5)),
                'constraints' => [new NotBlank()],
            ])
            ->add('futureCareerConcerns', ChoiceType::class, [
                'label' => 'Future Career Concerns(0 = Poor, 5 = Excellent)',
                'choices' => array_combine(range(0, 5), range(0, 5)),
                'constraints' => [new NotBlank()],
            ])
            ->add('socialSupport', ChoiceType::class, [
                'label' => 'Social Support (0 = None, 3 = Excellent)',
                'choices' => array_combine(range(0, 3), range(0, 3)),
                'constraints' => [new NotBlank()],
            ])
            ->add('peerPressure', ChoiceType::class, [
                'label' => 'Peer Pressure (0 = None, 5 = Extreme)',
                'choices' => array_combine(range(0, 5), range(0, 5)),
                'constraints' => [new NotBlank()],
            ])
            ->add('extracurricularActivities', ChoiceType::class, [
                'label' => 'Extracurricular Activities(0 = None, 5 = Extreme)',
                'choices' => array_combine(range(0, 5), range(0, 5)),
                'constraints' => [new NotBlank()],
            ])
            ->add('bullying', ChoiceType::class, [
                'label' => 'Experienced Bullying(0 = None, 5 = Extreme)',
                'choices' => array_combine(range(0, 5), range(0, 5)),
                'constraints' => [new NotBlank()],
            ]);
    }
    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => StressAssessment::class,
        ]);
    }
}
