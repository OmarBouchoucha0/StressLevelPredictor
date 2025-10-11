<?php

namespace App\Entity;

use App\Repository\StressAssessmentRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: StressAssessmentRepository::class)]
class StressAssessment
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'stressAssessments')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $user = null;

    #[ORM\Column]
    private ?int $sleepHours = null;

    #[ORM\Column]
    private ?int $workHours = null;

    #[ORM\Column]
    private ?int $exerciseFrequency = null;

    #[ORM\Column]
    private ?int $anxietyLevel = null;

    #[ORM\Column]
    private ?int $moodLevel = null;

    #[ORM\Column]
    private ?int $socialSupport = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $additionalNotes = null;

    #[ORM\Column(nullable: true)]
    private ?float $stressScore = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $stressLevel = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $createdAt = null;

    public function __construct()
    {
        $this->createdAt = new \DateTime();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): static
    {
        $this->user = $user;
        return $this;
    }

    public function getSleepHours(): ?int
    {
        return $this->sleepHours;
    }

    public function setSleepHours(int $sleepHours): static
    {
        $this->sleepHours = $sleepHours;
        return $this;
    }

    public function getWorkHours(): ?int
    {
        return $this->workHours;
    }

    public function setWorkHours(int $workHours): static
    {
        $this->workHours = $workHours;
        return $this;
    }

    public function getExerciseFrequency(): ?int
    {
        return $this->exerciseFrequency;
    }

    public function setExerciseFrequency(int $exerciseFrequency): static
    {
        $this->exerciseFrequency = $exerciseFrequency;
        return $this;
    }

    public function getAnxietyLevel(): ?int
    {
        return $this->anxietyLevel;
    }

    public function setAnxietyLevel(int $anxietyLevel): static
    {
        $this->anxietyLevel = $anxietyLevel;
        return $this;
    }

    public function getMoodLevel(): ?int
    {
        return $this->moodLevel;
    }

    public function setMoodLevel(int $moodLevel): static
    {
        $this->moodLevel = $moodLevel;
        return $this;
    }

    public function getSocialSupport(): ?int
    {
        return $this->socialSupport;
    }

    public function setSocialSupport(int $socialSupport): static
    {
        $this->socialSupport = $socialSupport;
        return $this;
    }

    public function getAdditionalNotes(): ?string
    {
        return $this->additionalNotes;
    }

    public function setAdditionalNotes(?string $additionalNotes): static
    {
        $this->additionalNotes = $additionalNotes;
        return $this;
    }

    public function getStressScore(): ?float
    {
        return $this->stressScore;
    }

    public function setStressScore(?float $stressScore): static
    {
        $this->stressScore = $stressScore;
        return $this;
    }

    public function getStressLevel(): ?string
    {
        return $this->stressLevel;
    }

    public function setStressLevel(?string $stressLevel): static
    {
        $this->stressLevel = $stressLevel;
        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): static
    {
        $this->createdAt = $createdAt;
        return $this;
    }
}
