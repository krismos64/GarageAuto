<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240219142527 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE schedules ADD opening_time VARCHAR(255) NOT NULL, ADD closing_time VARCHAR(255) NOT NULL, DROP opening, DROP closing, CHANGE user_id user_id INT DEFAULT NULL, CHANGE day day VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE schedules ADD opening VARCHAR(50) NOT NULL, ADD closing VARCHAR(50) NOT NULL, DROP opening_time, DROP closing_time, CHANGE user_id user_id INT NOT NULL, CHANGE day day VARCHAR(50) NOT NULL');
    }
}
