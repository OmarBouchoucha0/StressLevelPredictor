<?php

namespace App\Form;

use App\Entity\StressAssessment;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Range;

class StressAssessmentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('sleepHours', ChoiceType::class, [
                'label' => 'How many hours do you sleep per night?',
                'choices' => [
                    'Less than 5 hours' => 4,
                    '5-6 hours' => 5,
                    '6-7 hours' => 6,
                    '7-8 hours' => 7,
                    '8-9 hours' => 8,
                    'More than 9 hours' => 9,
                ],
                'constraints' => [new NotBlank()],
                'attr' => ['class' => 'form-select'],
            ])
            ->add('studyHours', ChoiceType::class, [
                'label' => 'How many hours do you study per day?',
                'choices' => [
                    'Less than 1 hour' => 0,
                    '1-2 hours' => 1,
                    '2-3 hours' => 2,
                    '3-4 hours' => 3,
                    '4-5 hours' => 4,
                    'More than 5 hours' => 5,
                ],
                'constraints' => [new NotBlank()],
                'attr' => ['class' => 'form-select'],
            ])
            ->add('extraCurricularHours', ChoiceType::class, [
                'label' => 'Hours spent on extracurricular activities per week',
                'choices' => [
                    'None' => 0,
                    '1-3 hours' => 2,
                    '3-5 hours' => 4,
                    '5-10 hours' => 7,
                    'More than 10 hours' => 12,
                ],
                'constraints' => [new NotBlank()],
                'attr' => ['class' => 'form-select'],
            ])
            ->add('physicalActivity', ChoiceType::class, [
                'label' => 'Physical Activity Level',
                'choices' => [
                    'Low' => 'Low',
                    'Moderate' => 'Moderate',
                    'High' => 'High',
                ],
                'constraints' => [new NotBlank()],
                'attr' => ['class' => 'form-select'],
            ])
            ->add('dietQuality', ChoiceType::class, [
                'label' => 'Diet Quality',
                'choices' => [
                    'Poor' => 'Poor',
                    'Moderate' => 'Moderate',
                    'Healthy' => 'Healthy',
                ],
                'constraints' => [new NotBlank()],
                'attr' => ['class' => 'form-select'],
            ])
            ->add('anxietyLevel', ChoiceType::class, [
                'label' => 'Anxiety Level (1 = Very Low, 21 = Very High)',
                'choices' => array_combine(range(1, 21), range(1, 21)),
                'constraints' => [
                    new NotBlank(),
                    new Range(['min' => 1, 'max' => 21]),
                ],
                'attr' => ['class' => 'form-select'],
            ])
            ->add('moodLevel', ChoiceType::class, [
                'label' => 'Self-Esteem Level (1 = Very Low, 30 = Very High)',
                'choices' => array_combine(range(1, 30), range(1, 30)),
                'constraints' => [
                    new NotBlank(),
                    new Range(['min' => 1, 'max' => 30]),
                ],
                'attr' => ['class' => 'form-select'],
            ])
            ->add('socialSupportLevel', ChoiceType::class, [
                'label' => 'Social Support Level (1 = Very Low, 10 = Excellent)',
                'choices' => array_combine(range(1, 10), range(1, 10)),
                'constraints' => [new NotBlank()],
                'attr' => ['class' => 'form-select'],
            ])
            ->add('relationshipStatus', ChoiceType::class, [
                'label' => 'Relationship Status',
                'choices' => [
                    'Single' => 0,
                    'In a Relationship' => 1,
                    'Married' => 2,
                ],
                'constraints' => [new NotBlank()],
                'attr' => ['class' => 'form-select'],
            ])
            ->add('futureCareerConcerns', ChoiceType::class, [
                'label' => 'Future Career Concerns',
                'choices' => [
                    'Not Concerned' => 'Low',
                    'Somewhat Concerned' => 'Moderate',
                    'Very Concerned' => 'High',
                ],
                'constraints' => [new NotBlank()],
                'attr' => ['class' => 'form-select'],
            ])
            ->add('financialStress', ChoiceType::class, [
                'label' => 'Financial Stress Level (1 = Low, 5 = High)',
                'choices' => array_combine(range(1, 5), range(1, 5)),
                'constraints' => [new NotBlank()],
                'attr' => ['class' => 'form-select'],
            ])
            ->add('academicWorkload', ChoiceType::class, [
                'label' => 'Academic Workload (1 = Light, 5 = Very Heavy)',
                'choices' => array_combine(range(1, 5), range(1, 5)),
                'constraints' => [new NotBlank()],
                'attr' => ['class' => 'form-select'],
            ])
            ->add('examFrequency', ChoiceType::class, [
                'label' => 'Exam Frequency (1 = Rarely, 5 = Very Often)',
                'choices' => array_combine(range(1, 5), range(1, 5)),
                'constraints' => [new NotBlank()],
                'attr' => ['class' => 'form-select'],
            ])
            ->add('teacherStudentRelationship', ChoiceType::class, [
                'label' => 'Teacher-Student Relationship (1 = Poor, 5 = Excellent)',
                'choices' => array_combine(range(1, 5), range(1, 5)),
                'constraints' => [new NotBlank()],
                'attr' => ['class' => 'form-select'],
            ])
            ->add('schoolType', ChoiceType::class, [
                'label' => 'School Type',
                'choices' => [
                    'Public' => 0,
                    'Private' => 1,
                ],
                'constraints' => [new NotBlank()],
                'attr' => ['class' => 'form-select'],
            ])
            ->add('peerInfluence', ChoiceType::class, [
                'label' => 'Peer Influence',
                'choices' => [
                    'Positive' => 'Positive',
                    'Neutral' => 'Neutral',
                    'Negative' => 'Negative',
                ],
                'constraints' => [new NotBlank()],
                'attr' => ['class' => 'form-select'],
            ])
            ->add('familyIncome', ChoiceType::class, [
                'label' => 'Family Income Level',
                'choices' => [
                    'Low' => 1,
                    'Middle' => 2,
                    'High' => 3,
                ],
                'constraints' => [new NotBlank()],
                'attr' => ['class' => 'form-select'],
            ])
            ->add('remoteVsInPerson', ChoiceType::class, [
                'label' => 'Learning Mode',
                'choices' => [
                    'Remote Learning' => 0,
                    'In-Person Learning' => 1,
                    'Hybrid' => 2,
                ],
                'constraints' => [new NotBlank()],
                'attr' => ['class' => 'form-select'],
            ])
            ->add('copingMechanisms', TextareaType::class, [
                'label' => 'What coping mechanisms do you use? (Optional)',
                'required' => false,
                'attr' => [
                    'class' => 'form-control',
                    'rows' => 3,
                    'placeholder' => 'e.g., meditation, exercise, talking to friends...'
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
