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
    private ?int $anxietyLevel = null;

    #[ORM\Column]
    private ?int $moodLevel = null;

#[ORM\Column]
private ?int $studyHours = null;

#[ORM\Column]
private ?int $extraCurricularHours = null;

#[ORM\Column(length: 50)]
private ?string $physicalActivity = null;

#[ORM\Column(length: 100)]
private ?string $dietQuality = null;

#[ORM\Column]
private ?int $socialSupportLevel = null;

#[ORM\Column]
private ?int $relationshipStatus = null;

#[ORM\Column(length: 100)]
private ?string $futureCareerConcerns = null;

#[ORM\Column]
private ?int $financialStress = null;

#[ORM\Column]
private ?int $academicWorkload = null;

#[ORM\Column]
private ?int $examFrequency = null;

#[ORM\Column]
private ?int $teacherStudentRelationship = null;

#[ORM\Column]
private ?int $schoolType = null;

#[ORM\Column(length: 50)]
private ?string $peerInfluence = null;

#[ORM\Column]
private ?int $familyIncome = null;

#[ORM\Column]
private ?int $remoteVsInPerson = null;

#[ORM\Column(type: Types::TEXT, nullable: true)]
private ?string $copingMechanisms = null;


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
public function getStudyHours(): ?int
{
    return $this->studyHours;
}

public function setStudyHours(int $studyHours): static
{
    $this->studyHours = $studyHours;
    return $this;
}

public function getExtraCurricularHours(): ?int
{
    return $this->extraCurricularHours;
}

public function setExtraCurricularHours(int $extraCurricularHours): static
{
    $this->extraCurricularHours = $extraCurricularHours;
    return $this;
}

public function getPhysicalActivity(): ?string
{
    return $this->physicalActivity;
}

public function setPhysicalActivity(string $physicalActivity): static
{
    $this->physicalActivity = $physicalActivity;
    return $this;
}

public function getDietQuality(): ?string
{
    return $this->dietQuality;
}

public function setDietQuality(string $dietQuality): static
{
    $this->dietQuality = $dietQuality;
    return $this;
}

public function getSocialSupportLevel(): ?int
{
    return $this->socialSupportLevel;
}

public function setSocialSupportLevel(int $socialSupportLevel): static
{
    $this->socialSupportLevel = $socialSupportLevel;
    return $this;
}

public function getRelationshipStatus(): ?int
{
    return $this->relationshipStatus;
}

public function setRelationshipStatus(int $relationshipStatus): static
{
    $this->relationshipStatus = $relationshipStatus;
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

public function getFinancialStress(): ?int
{
    return $this->financialStress;
}

public function setFinancialStress(int $financialStress): static
{
    $this->financialStress = $financialStress;
    return $this;
}

public function getAcademicWorkload(): ?int
{
    return $this->academicWorkload;
}

public function setAcademicWorkload(int $academicWorkload): static
{
    $this->academicWorkload = $academicWorkload;
    return $this;
}

public function getExamFrequency(): ?int
{
    return $this->examFrequency;
}

public function setExamFrequency(int $examFrequency): static
{
    $this->examFrequency = $examFrequency;
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

public function getSchoolType(): ?int
{
    return $this->schoolType;
}

public function setSchoolType(int $schoolType): static
{
    $this->schoolType = $schoolType;
    return $this;
}

public function getPeerInfluence(): ?string
{
    return $this->peerInfluence;
}

public function setPeerInfluence(string $peerInfluence): static
{
    $this->peerInfluence = $peerInfluence;
    return $this;
}

public function getFamilyIncome(): ?int
{
    return $this->familyIncome;
}

public function setFamilyIncome(int $familyIncome): static
{
    $this->familyIncome = $familyIncome;
    return $this;
}

public function getRemoteVsInPerson(): ?int
{
    return $this->remoteVsInPerson;
}

public function setRemoteVsInPerson(int $remoteVsInPerson): static
{
    $this->remoteVsInPerson = $remoteVsInPerson;
    return $this;
}

public function getCopingMechanisms(): ?string
{
    return $this->copingMechanisms;
}

public function setCopingMechanisms(?string $copingMechanisms): static
{
    $this->copingMechanisms = $copingMechanisms;
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
