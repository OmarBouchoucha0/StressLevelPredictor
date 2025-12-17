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
    private ?int $anxietyLevel = null;

    #[ORM\Column]
    private ?int $selfEsteem = null;

    #[ORM\Column]
    private ?int $depression = null;

    #[ORM\Column]
    private ?int $headache = null;

    #[ORM\Column]
    private ?int $sleepQuality = null;

    #[ORM\Column]
    private ?int $basicNeeds = null;

    #[ORM\Column]
    private ?int $academicPerformance = null;

    #[ORM\Column]
    private ?int $peerPressure = null;

    #[ORM\Column]
    private ?int $extracurricularActivities = null;

    #[ORM\Column]
    private ?int $bullying = null;

    #[ORM\Column(nullable: true)]
    private ?int $stressScore = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?int $stressLevel = null;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $cluster;

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

    public function getAnxietyLevel(): ?int
    {
        return $this->anxietyLevel;
    }
    public function setAnxietyLevel(int $anxietyLevel): static
    {
        $this->anxietyLevel = $anxietyLevel;
        return $this;
    }

    public function getSelfEsteem(): ?int
    {
        return $this->selfEsteem;
    }
    public function setSelfEsteem(int $selfEsteem): static
    {
        $this->selfEsteem = $selfEsteem;
        return $this;
    }

    public function getDepression(): ?int
    {
        return $this->depression;
    }
    public function setDepression(int $depression): static
    {
        $this->depression = $depression;
        return $this;
    }

    public function getHeadache(): ?int
    {
        return $this->headache;
    }
    public function setHeadache(int $headache): static
    {
        $this->headache = $headache;
        return $this;
    }

    public function getSleepQuality(): ?int
    {
        return $this->sleepQuality;
    }
    public function setSleepQuality(int $sleepQuality): static
    {
        $this->sleepQuality = $sleepQuality;
        return $this;
    }

    public function getBasicNeeds(): ?int
    {
        return $this->basicNeeds;
    }
    public function setBasicNeeds(int $basicNeeds): static
    {
        $this->basicNeeds = $basicNeeds;
        return $this;
    }

    public function getAcademicPerformance(): ?int
    {
        return $this->academicPerformance;
    }
    public function setAcademicPerformance(int $academicPerformance): static
    {
        $this->academicPerformance = $academicPerformance;
        return $this;
    }





    public function getPeerPressure(): ?int
    {
        return $this->peerPressure;
    }
    public function setPeerPressure(int $peerPressure): static
    {
        $this->peerPressure = $peerPressure;
        return $this;
    }

    public function getExtracurricularActivities(): ?int
    {
        return $this->extracurricularActivities;
    }
    public function setExtracurricularActivities(int $extracurricularActivities): static
    {
        $this->extracurricularActivities = $extracurricularActivities;
        return $this;
    }

    public function getBullying(): ?int
    {
        return $this->bullying;
    }
    public function setBullying(int $bullying): static
    {
        $this->bullying = $bullying;
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

    public function getCluster(): ?int
    {
        return $this->cluster;
    }

    public function setCluster(int $cluster): self
    {
        $this->cluster = $cluster;
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
