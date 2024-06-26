<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240207102749 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE car_user DROP FOREIGN KEY FK_46F9C2E5A76ED395');
        $this->addSql('ALTER TABLE car_user DROP FOREIGN KEY FK_46F9C2E5C3C6F69F');
        $this->addSql('DROP TABLE car_user');
        $this->addSql('ALTER TABLE car ADD user_id INT NOT NULL, CHANGE brand brand VARCHAR(50) NOT NULL, CHANGE model model VARCHAR(50) NOT NULL, CHANGE price price VARCHAR(10) NOT NULL');
        $this->addSql('ALTER TABLE car ADD CONSTRAINT FK_773DE69DA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_773DE69DA76ED395 ON car (user_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE car_user (car_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_46F9C2E5C3C6F69F (car_id), INDEX IDX_46F9C2E5A76ED395 (user_id), PRIMARY KEY(car_id, user_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE car_user ADD CONSTRAINT FK_46F9C2E5A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE car_user ADD CONSTRAINT FK_46F9C2E5C3C6F69F FOREIGN KEY (car_id) REFERENCES car (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE car DROP FOREIGN KEY FK_773DE69DA76ED395');
        $this->addSql('DROP INDEX IDX_773DE69DA76ED395 ON car');
        $this->addSql('ALTER TABLE car DROP user_id, CHANGE brand brand VARCHAR(255) NOT NULL, CHANGE model model VARCHAR(255) NOT NULL, CHANGE price price INT NOT NULL');
    }
}
