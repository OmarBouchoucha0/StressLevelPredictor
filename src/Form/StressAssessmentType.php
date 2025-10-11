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
                'label' => 'How many hours do you sleep per night on average?',
                'choices' => [
                    'Less than 4 hours' => 3,
                    '4-5 hours' => 4,
                    '5-6 hours' => 5,
                    '6-7 hours' => 6,
                    '7-8 hours' => 7,
                    'More than 8 hours' => 8,
                ],
                'constraints' => [new NotBlank()],
                'attr' => ['class' => 'form-select'],
            ])
            ->add('workHours', ChoiceType::class, [
                'label' => 'How many hours do you work per day?',
                'choices' => [
                    'Less than 4 hours' => 3,
                    '4-6 hours' => 5,
                    '6-8 hours' => 7,
                    '8-10 hours' => 9,
                    '10-12 hours' => 11,
                    'More than 12 hours' => 13,
                ],
                'constraints' => [new NotBlank()],
                'attr' => ['class' => 'form-select'],
            ])
            ->add('exerciseFrequency', ChoiceType::class, [
                'label' => 'How many days per week do you exercise?',
                'choices' => array_combine(
                    ['Never', '1 day', '2 days', '3 days', '4 days', '5 days', '6 days', 'Every day'],
                    range(0, 7)
                ),
                'constraints' => [new NotBlank()],
                'attr' => ['class' => 'form-select'],
            ])
            ->add('anxietyLevel', ChoiceType::class, [
                'label' => 'Rate your anxiety level (1 = Very Low, 10 = Very High)',
                'choices' => array_combine(range(1, 10), range(1, 10)),
                'constraints' => [
                    new NotBlank(),
                    new Range(['min' => 1, 'max' => 10]),
                ],
                'attr' => ['class' => 'form-select'],
            ])
            ->add('moodLevel', ChoiceType::class, [
                'label' => 'Rate your overall mood (1 = Very Poor, 10 = Excellent)',
                'choices' => array_combine(range(1, 10), range(1, 10)),
                'constraints' => [
                    new NotBlank(),
                    new Range(['min' => 1, 'max' => 10]),
                ],
                'attr' => ['class' => 'form-select'],
            ])
            ->add('socialSupport', ChoiceType::class, [
                'label' => 'Rate your social support system (1 = Very Poor, 10 = Excellent)',
                'choices' => array_combine(range(1, 10), range(1, 10)),
                'constraints' => [
                    new NotBlank(),
                    new Range(['min' => 1, 'max' => 10]),
                ],
                'attr' => ['class' => 'form-select'],
            ])
            ->add('additionalNotes', TextareaType::class, [
                'label' => 'Any additional information you\'d like to share? (Optional)',
                'required' => false,
                'attr' => [
                    'class' => 'form-control',
                    'rows' => 4,
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
