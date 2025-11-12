<?php

namespace App\Form;

use App\Entity\StressAssessment;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;

class StressAssessmentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('anxietyLevel', ChoiceType::class, [
                'label' => 'Anxiety Level (1 = Very Low, 10 = Very High)',
                'choices' => array_combine(range(1, 10), range(1, 10)),
                'constraints' => [new NotBlank()],
                'attr' => ['class' => 'form-select'],
            ])
            ->add('selfEsteem', ChoiceType::class, [
                'label' => 'Self-Esteem Level (1 = Very Low, 10 = Very High)',
                'choices' => array_combine(range(1, 10), range(1, 10)),
                'constraints' => [new NotBlank()],
                'attr' => ['class' => 'form-select'],
            ])
            ->add('mentalHealthHistory', ChoiceType::class, [
                'label' => 'Do you have a history of mental health issues?',
                'choices' => [
                    'No' => 'None',
                    'Mild Issues' => 'Mild',
                    'Moderate Issues' => 'Moderate',
                    'Severe Issues' => 'Severe',
                ],
                'constraints' => [new NotBlank()],
                'attr' => ['class' => 'form-select'],
            ])
            ->add('depression', ChoiceType::class, [
                'label' => 'Depression Level (1 = None, 10 = Severe)',
                'choices' => array_combine(range(1, 10), range(1, 10)),
                'constraints' => [new NotBlank()],
                'attr' => ['class' => 'form-select'],
            ])
            ->add('headache', ChoiceType::class, [
                'label' => 'Frequency of Headaches (1 = Rarely, 10 = Daily)',
                'choices' => array_combine(range(1, 10), range(1, 10)),
                'constraints' => [new NotBlank()],
                'attr' => ['class' => 'form-select'],
            ])
            ->add('bloodPressure', ChoiceType::class, [
                'label' => 'Blood Pressure Level (1 = Low, 10 = High)',
                'choices' => array_combine(range(1, 10), range(1, 10)),
                'constraints' => [new NotBlank()],
                'attr' => ['class' => 'form-select'],
            ])
            ->add('sleepQuality', ChoiceType::class, [
                'label' => 'Sleep Quality (1 = Poor, 10 = Excellent)',
                'choices' => array_combine(range(1, 10), range(1, 10)),
                'constraints' => [new NotBlank()],
                'attr' => ['class' => 'form-select'],
            ])
            ->add('breathingProblem', ChoiceType::class, [
                'label' => 'Do you experience breathing problems?',
                'choices' => [
                    'Never' => 0,
                    'Occasionally' => 1,
                    'Often' => 2,
                    'Always' => 3,
                ],
                'constraints' => [new NotBlank()],
                'attr' => ['class' => 'form-select'],
            ])
            ->add('noiseLevel', ChoiceType::class, [
                'label' => 'Noise Level in your environment',
                'choices' => [
                    'Quiet' => 1,
                    'Moderate' => 2,
                    'Noisy' => 3,
                    'Very Noisy' => 4,
                ],
                'constraints' => [new NotBlank()],
                'attr' => ['class' => 'form-select'],
            ])
            ->add('livingConditions', ChoiceType::class, [
                'label' => 'How would you rate your living conditions?',
                'choices' => array_combine(range(1, 5), [
                    'Very Poor',
                    'Poor',
                    'Average',
                    'Good',
                    'Excellent'
                ]),
                'constraints' => [new NotBlank()],
                'attr' => ['class' => 'form-select'],
            ])
            ->add('safety', ChoiceType::class, [
                'label' => 'Do you feel safe in your environment?',
                'choices' => [
                    'Never' => 0,
                    'Sometimes' => 1,
                    'Mostly' => 2,
                    'Always' => 3,
                ],
                'constraints' => [new NotBlank()],
                'attr' => ['class' => 'form-select'],
            ])
            ->add('basicNeeds', ChoiceType::class, [
                'label' => 'Are your basic needs (food, water, shelter) met?',
                'choices' => [
                    'Not at all' => 0,
                    'Partially' => 1,
                    'Mostly' => 2,
                    'Completely' => 3,
                ],
                'constraints' => [new NotBlank()],
                'attr' => ['class' => 'form-select'],
            ])
            ->add('academicPerformance', ChoiceType::class, [
                'label' => 'Academic Performance (1 = Poor, 10 = Excellent)',
                'choices' => array_combine(range(1, 10), range(1, 10)),
                'constraints' => [new NotBlank()],
                'attr' => ['class' => 'form-select'],
            ])
            ->add('studyLoad', ChoiceType::class, [
                'label' => 'Study Load (1 = Very Light, 10 = Extremely Heavy)',
                'choices' => array_combine(range(1, 10), range(1, 10)),
                'constraints' => [new NotBlank()],
                'attr' => ['class' => 'form-select'],
            ])
            ->add('teacherStudentRelationship', ChoiceType::class, [
                'label' => 'Teacher-Student Relationship (1 = Poor, 5 = Excellent)',
                'choices' => array_combine(range(1, 5), range(1, 5)),
                'constraints' => [new NotBlank()],
                'attr' => ['class' => 'form-select'],
            ])
            ->add('futureCareerConcerns', ChoiceType::class, [
                'label' => 'How concerned are you about your future career?',
                'choices' => [
                    'Not Concerned' => 'Low',
                    'Somewhat Concerned' => 'Moderate',
                    'Very Concerned' => 'High',
                ],
                'constraints' => [new NotBlank()],
                'attr' => ['class' => 'form-select'],
            ])
            ->add('socialSupport', ChoiceType::class, [
                'label' => 'Social Support (1 = None, 10 = Excellent)',
                'choices' => array_combine(range(1, 10), range(1, 10)),
                'constraints' => [new NotBlank()],
                'attr' => ['class' => 'form-select'],
            ])
            ->add('peerPressure', ChoiceType::class, [
                'label' => 'Peer Pressure (1 = None, 10 = Extreme)',
                'choices' => array_combine(range(1, 10), range(1, 10)),
                'constraints' => [new NotBlank()],
                'attr' => ['class' => 'form-select'],
            ])
            ->add('extracurricularActivities', ChoiceType::class, [
                'label' => 'Participation in Extracurricular Activities',
                'choices' => [
                    'None' => 0,
                    'Occasional' => 1,
                    'Regular' => 2,
                    'Very Active' => 3,
                ],
                'constraints' => [new NotBlank()],
                'attr' => ['class' => 'form-select'],
            ])
            ->add('bullying', ChoiceType::class, [
                'label' => 'Have you experienced bullying?',
                'choices' => [
                    'Never' => 0,
                    'Sometimes' => 1,
                    'Often' => 2,
                    'Always' => 3,
                ],
                'constraints' => [new NotBlank()],
                'attr' => ['class' => 'form-select'],
            ])
            ->add('copingMechanisms', TextareaType::class, [
                'label' => 'Coping Mechanisms (Optional)',
                'required' => false,
                'attr' => [
                    'class' => 'form-control',
                    'rows' => 3,
                    'placeholder' => 'e.g., meditation, journaling, talking to friends...',
                ],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => StressAssessment::class,
        ]);
    }
}
