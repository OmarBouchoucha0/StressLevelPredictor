<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20251011130558 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TEMPORARY TABLE __temp__stress_assessment AS SELECT id FROM stress_assessment');
        $this->addSql('DROP TABLE stress_assessment');
        $this->addSql('CREATE TABLE stress_assessment (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, user_id INTEGER NOT NULL, sleep_hours INTEGER NOT NULL, work_hours INTEGER NOT NULL, exercise_frequency INTEGER NOT NULL, anxiety_level INTEGER NOT NULL, mood_level INTEGER NOT NULL, social_support INTEGER NOT NULL, additional_notes CLOB DEFAULT NULL, stress_score DOUBLE PRECISION DEFAULT NULL, stress_level VARCHAR(50) DEFAULT NULL, created_at DATETIME NOT NULL, CONSTRAINT FK_F8462E07A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO stress_assessment (id) SELECT id FROM __temp__stress_assessment');
        $this->addSql('DROP TABLE __temp__stress_assessment');
        $this->addSql('CREATE INDEX IDX_F8462E07A76ED395 ON stress_assessment (user_id)');
        $this->addSql('ALTER TABLE user ADD COLUMN full_name VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TEMPORARY TABLE __temp__stress_assessment AS SELECT id FROM stress_assessment');
        $this->addSql('DROP TABLE stress_assessment');
        $this->addSql('CREATE TABLE stress_assessment (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL)');
        $this->addSql('INSERT INTO stress_assessment (id) SELECT id FROM __temp__stress_assessment');
        $this->addSql('DROP TABLE __temp__stress_assessment');
        $this->addSql('CREATE TEMPORARY TABLE __temp__user AS SELECT id, email, roles, password FROM user');
        $this->addSql('DROP TABLE user');
        $this->addSql('CREATE TABLE user (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles CLOB NOT NULL --(DC2Type:json)
        , password VARCHAR(255) NOT NULL)');
        $this->addSql('INSERT INTO user (id, email, roles, password) SELECT id, email, roles, password FROM __temp__user');
        $this->addSql('DROP TABLE __temp__user');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_IDENTIFIER_EMAIL ON user (email)');
    }
}
