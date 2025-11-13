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

    #[ORM\Column(length: 100)]
    private ?int $mentalHealthHistory = null;

    #[ORM\Column]
    private ?int $depression = null;

    #[ORM\Column]
    private ?int $headache = null;

    #[ORM\Column]
    private ?int $bloodPressure = null;

    #[ORM\Column]
    private ?int $sleepQuality = null;

    #[ORM\Column]
    private ?int $breathingProblem = null;

    #[ORM\Column]
    private ?int $noiseLevel = null;

    #[ORM\Column]
    private ?int $livingConditions = null;

    #[ORM\Column]
    private ?int $safety = null;

    #[ORM\Column]
    private ?int $basicNeeds = null;

    #[ORM\Column]
    private ?int $academicPerformance = null;

    #[ORM\Column]
    private ?int $studyLoad = null;

    #[ORM\Column]
    private ?int $teacherStudentRelationship = null;

    #[ORM\Column(length: 100)]
    private ?int $futureCareerConcerns = null;

    #[ORM\Column]
    private ?int $socialSupport = null;

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

    public function getMentalHealthHistory(): ?string
    {
        return $this->mentalHealthHistory;
    }
    public function setMentalHealthHistory(string $mentalHealthHistory): static
    {
        $this->mentalHealthHistory = $mentalHealthHistory;
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

    public function getBloodPressure(): ?int
    {
        return $this->bloodPressure;
    }
    public function setBloodPressure(int $bloodPressure): static
    {
        $this->bloodPressure = $bloodPressure;
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

    public function getBreathingProblem(): ?int
    {
        return $this->breathingProblem;
    }
    public function setBreathingProblem(int $breathingProblem): static
    {
        $this->breathingProblem = $breathingProblem;
        return $this;
    }

    public function getNoiseLevel(): ?int
    {
        return $this->noiseLevel;
    }
    public function setNoiseLevel(int $noiseLevel): static
    {
        $this->noiseLevel = $noiseLevel;
        return $this;
    }

    public function getLivingConditions(): ?int
    {
        return $this->livingConditions;
    }
    public function setLivingConditions(int $livingConditions): static
    {
        $this->livingConditions = $livingConditions;
        return $this;
    }

    public function getSafety(): ?int
    {
        return $this->safety;
    }
    public function setSafety(int $safety): static
    {
        $this->safety = $safety;
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

    public function getStudyLoad(): ?int
    {
        return $this->studyLoad;
    }
    public function setStudyLoad(int $studyLoad): static
    {
        $this->studyLoad = $studyLoad;
        return $this;
    }

    public function getTeacherStudentRelationship(): ?int
    {
        return $this->teacherStudentRelationship;
    }
    public function setTeacherStudentRelationship(int $teacherStudentRelationship): static
    {
        $this->teacherStudentRelationship = $teacherStudentRelationship;
        return $this;
    }

    public function getFutureCareerConcerns(): ?string
    {
        return $this->futureCareerConcerns;
    }
    public function setFutureCareerConcerns(string $futureCareerConcerns): static
    {
        $this->futureCareerConcerns = $futureCareerConcerns;
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
