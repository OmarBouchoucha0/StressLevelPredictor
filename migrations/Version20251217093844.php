<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20251217093844 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TEMPORARY TABLE __temp__stress_assessment AS SELECT id, user_id, anxiety_level, stress_score, stress_level, created_at, self_esteem, depression, headache, sleep_quality, basic_needs, academic_performance, peer_pressure, extracurricular_activities, bullying, cluster FROM stress_assessment');
        $this->addSql('DROP TABLE stress_assessment');
        $this->addSql('CREATE TABLE stress_assessment (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, user_id INTEGER NOT NULL, anxiety_level INTEGER NOT NULL, stress_score INTEGER DEFAULT NULL, stress_level INTEGER DEFAULT NULL, created_at DATETIME NOT NULL, self_esteem INTEGER NOT NULL, depression INTEGER NOT NULL, headache INTEGER NOT NULL, sleep_quality INTEGER NOT NULL, basic_needs INTEGER NOT NULL, academic_performance INTEGER NOT NULL, peer_pressure INTEGER NOT NULL, extracurricular_activities INTEGER NOT NULL, bullying INTEGER NOT NULL, cluster INTEGER DEFAULT NULL, CONSTRAINT FK_F8462E07A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON UPDATE NO ACTION ON DELETE NO ACTION NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO stress_assessment (id, user_id, anxiety_level, stress_score, stress_level, created_at, self_esteem, depression, headache, sleep_quality, basic_needs, academic_performance, peer_pressure, extracurricular_activities, bullying, cluster) SELECT id, user_id, anxiety_level, stress_score, stress_level, created_at, self_esteem, depression, headache, sleep_quality, basic_needs, academic_performance, peer_pressure, extracurricular_activities, bullying, cluster FROM __temp__stress_assessment');
        $this->addSql('DROP TABLE __temp__stress_assessment');
        $this->addSql('CREATE INDEX IDX_F8462E07A76ED395 ON stress_assessment (user_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE stress_assessment ADD COLUMN mental_health_history INTEGER NOT NULL');
        $this->addSql('ALTER TABLE stress_assessment ADD COLUMN future_career_concerns INTEGER NOT NULL');
        $this->addSql('ALTER TABLE stress_assessment ADD COLUMN teacher_student_relationship INTEGER NOT NULL');
        $this->addSql('ALTER TABLE stress_assessment ADD COLUMN blood_pressure INTEGER NOT NULL');
        $this->addSql('ALTER TABLE stress_assessment ADD COLUMN breathing_problem INTEGER NOT NULL');
        $this->addSql('ALTER TABLE stress_assessment ADD COLUMN noise_level INTEGER NOT NULL');
        $this->addSql('ALTER TABLE stress_assessment ADD COLUMN living_conditions INTEGER NOT NULL');
        $this->addSql('ALTER TABLE stress_assessment ADD COLUMN safety INTEGER NOT NULL');
        $this->addSql('ALTER TABLE stress_assessment ADD COLUMN study_load INTEGER NOT NULL');
        $this->addSql('ALTER TABLE stress_assessment ADD COLUMN social_support INTEGER NOT NULL');
    }
}
