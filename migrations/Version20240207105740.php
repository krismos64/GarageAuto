<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240207105740 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE reviews_user DROP FOREIGN KEY FK_B3564F048092D97F');
        $this->addSql('ALTER TABLE reviews_user DROP FOREIGN KEY FK_B3564F04A76ED395');
        $this->addSql('ALTER TABLE message_user DROP FOREIGN KEY FK_24064D90537A1329');
        $this->addSql('ALTER TABLE message_user DROP FOREIGN KEY FK_24064D90A76ED395');
        $this->addSql('DROP TABLE reviews_user');
        $this->addSql('DROP TABLE message_user');
        $this->addSql('ALTER TABLE message ADD users_id INT NOT NULL');
        $this->addSql('ALTER TABLE message ADD CONSTRAINT FK_B6BD307F67B3B43D FOREIGN KEY (users_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_B6BD307F67B3B43D ON message (users_id)');
        $this->addSql('ALTER TABLE reviews DROP INDEX UNIQ_6970EB0F9395C3F3, ADD INDEX IDX_6970EB0F9395C3F3 (customer_id)');
        $this->addSql('ALTER TABLE reviews CHANGE customer_id customer_id INT NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE reviews_user (reviews_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_B3564F048092D97F (reviews_id), INDEX IDX_B3564F04A76ED395 (user_id), PRIMARY KEY(reviews_id, user_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE message_user (message_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_24064D90537A1329 (message_id), INDEX IDX_24064D90A76ED395 (user_id), PRIMARY KEY(message_id, user_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE reviews_user ADD CONSTRAINT FK_B3564F048092D97F FOREIGN KEY (reviews_id) REFERENCES reviews (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE reviews_user ADD CONSTRAINT FK_B3564F04A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE message_user ADD CONSTRAINT FK_24064D90537A1329 FOREIGN KEY (message_id) REFERENCES message (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE message_user ADD CONSTRAINT FK_24064D90A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE reviews DROP INDEX IDX_6970EB0F9395C3F3, ADD UNIQUE INDEX UNIQ_6970EB0F9395C3F3 (customer_id)');
        $this->addSql('ALTER TABLE reviews CHANGE customer_id customer_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE message DROP FOREIGN KEY FK_B6BD307F67B3B43D');
        $this->addSql('DROP INDEX IDX_B6BD307F67B3B43D ON message');
        $this->addSql('ALTER TABLE message DROP users_id');
    }
}
