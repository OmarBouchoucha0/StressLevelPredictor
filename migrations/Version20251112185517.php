<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20251112185517 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TEMPORARY TABLE __temp__stress_assessment AS SELECT id, user_id, anxiety_level, diet_quality, future_career_concerns, teacher_student_relationship, stress_score, stress_level, created_at FROM stress_assessment');
        $this->addSql('DROP TABLE stress_assessment');
        $this->addSql('CREATE TABLE stress_assessment (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, user_id INTEGER NOT NULL, anxiety_level INTEGER NOT NULL, mental_health_history VARCHAR(100) NOT NULL, future_career_concerns VARCHAR(100) NOT NULL, teacher_student_relationship INTEGER NOT NULL, stress_score DOUBLE PRECISION DEFAULT NULL, stress_level VARCHAR(50) DEFAULT NULL, created_at DATETIME NOT NULL, self_esteem INTEGER NOT NULL, depression INTEGER NOT NULL, headache INTEGER NOT NULL, blood_pressure INTEGER NOT NULL, sleep_quality INTEGER NOT NULL, breathing_problem INTEGER NOT NULL, noise_level INTEGER NOT NULL, living_conditions INTEGER NOT NULL, safety INTEGER NOT NULL, basic_needs INTEGER NOT NULL, academic_performance INTEGER NOT NULL, study_load INTEGER NOT NULL, social_support INTEGER NOT NULL, peer_pressure INTEGER NOT NULL, extracurricular_activities INTEGER NOT NULL, bullying INTEGER NOT NULL, CONSTRAINT FK_F8462E07A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON UPDATE NO ACTION ON DELETE NO ACTION NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO stress_assessment (id, user_id, anxiety_level, mental_health_history, future_career_concerns, teacher_student_relationship, stress_score, stress_level, created_at) SELECT id, user_id, anxiety_level, diet_quality, future_career_concerns, teacher_student_relationship, stress_score, stress_level, created_at FROM __temp__stress_assessment');
        $this->addSql('DROP TABLE __temp__stress_assessment');
        $this->addSql('CREATE INDEX IDX_F8462E07A76ED395 ON stress_assessment (user_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TEMPORARY TABLE __temp__stress_assessment AS SELECT id, user_id, anxiety_level, mental_health_history, teacher_student_relationship, future_career_concerns, stress_score, stress_level, created_at FROM stress_assessment');
        $this->addSql('DROP TABLE stress_assessment');
        $this->addSql('CREATE TABLE stress_assessment (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, user_id INTEGER NOT NULL, anxiety_level INTEGER NOT NULL, diet_quality VARCHAR(100) NOT NULL, teacher_student_relationship INTEGER NOT NULL, future_career_concerns VARCHAR(100) NOT NULL, stress_score DOUBLE PRECISION DEFAULT NULL, stress_level VARCHAR(50) DEFAULT NULL, created_at DATETIME NOT NULL, sleep_hours INTEGER NOT NULL, mood_level INTEGER NOT NULL, study_hours INTEGER NOT NULL, extra_curricular_hours INTEGER NOT NULL, physical_activity VARCHAR(50) NOT NULL, social_support_level INTEGER NOT NULL, relationship_status INTEGER NOT NULL, financial_stress INTEGER NOT NULL, academic_workload INTEGER NOT NULL, exam_frequency INTEGER NOT NULL, school_type INTEGER NOT NULL, peer_influence VARCHAR(50) NOT NULL, family_income INTEGER NOT NULL, remote_vs_in_person INTEGER NOT NULL, coping_mechanisms CLOB DEFAULT NULL, CONSTRAINT FK_F8462E07A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO stress_assessment (id, user_id, anxiety_level, diet_quality, teacher_student_relationship, future_career_concerns, stress_score, stress_level, created_at) SELECT id, user_id, anxiety_level, mental_health_history, teacher_student_relationship, future_career_concerns, stress_score, stress_level, created_at FROM __temp__stress_assessment');
        $this->addSql('DROP TABLE __temp__stress_assessment');
        $this->addSql('CREATE INDEX IDX_F8462E07A76ED395 ON stress_assessment (user_id)');
    }
}
