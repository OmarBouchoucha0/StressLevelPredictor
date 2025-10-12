<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20251012163019 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE recommendation (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL)');
        $this->addSql('CREATE TABLE stress_assessment (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, user_id INTEGER NOT NULL, sleep_hours INTEGER NOT NULL, anxiety_level INTEGER NOT NULL, mood_level INTEGER NOT NULL, study_hours INTEGER NOT NULL, extra_curricular_hours INTEGER NOT NULL, physical_activity VARCHAR(50) NOT NULL, diet_quality VARCHAR(100) NOT NULL, social_support_level INTEGER NOT NULL, relationship_status INTEGER NOT NULL, future_career_concerns VARCHAR(100) NOT NULL, financial_stress INTEGER NOT NULL, academic_workload INTEGER NOT NULL, exam_frequency INTEGER NOT NULL, teacher_student_relationship INTEGER NOT NULL, school_type INTEGER NOT NULL, peer_influence VARCHAR(50) NOT NULL, family_income INTEGER NOT NULL, remote_vs_in_person INTEGER NOT NULL, coping_mechanisms CLOB DEFAULT NULL, stress_score DOUBLE PRECISION DEFAULT NULL, stress_level VARCHAR(50) DEFAULT NULL, created_at DATETIME NOT NULL, CONSTRAINT FK_F8462E07A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('CREATE INDEX IDX_F8462E07A76ED395 ON stress_assessment (user_id)');
        $this->addSql('CREATE TABLE user (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles CLOB NOT NULL --(DC2Type:json)
        , password VARCHAR(255) NOT NULL, full_name VARCHAR(255) NOT NULL)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_IDENTIFIER_EMAIL ON user (email)');
        $this->addSql('CREATE TABLE messenger_messages (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, body CLOB NOT NULL, headers CLOB NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL --(DC2Type:datetime_immutable)
        , available_at DATETIME NOT NULL --(DC2Type:datetime_immutable)
        , delivered_at DATETIME DEFAULT NULL --(DC2Type:datetime_immutable)
        )');
        $this->addSql('CREATE INDEX IDX_75EA56E0FB7336F0 ON messenger_messages (queue_name)');
        $this->addSql('CREATE INDEX IDX_75EA56E0E3BD61CE ON messenger_messages (available_at)');
        $this->addSql('CREATE INDEX IDX_75EA56E016BA31DB ON messenger_messages (delivered_at)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE recommendation');
        $this->addSql('DROP TABLE stress_assessment');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
