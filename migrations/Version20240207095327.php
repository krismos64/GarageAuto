<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240207095327 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE car (id INT AUTO_INCREMENT NOT NULL, brand VARCHAR(255) NOT NULL, model VARCHAR(255) NOT NULL, year INT NOT NULL, km VARCHAR(10) NOT NULL, price INT NOT NULL, description LONGTEXT NOT NULL, title VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE car_user (car_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_46F9C2E5C3C6F69F (car_id), INDEX IDX_46F9C2E5A76ED395 (user_id), PRIMARY KEY(car_id, user_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE car_image (id INT AUTO_INCREMENT NOT NULL, car_id INT NOT NULL, title VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, INDEX IDX_1A968188C3C6F69F (car_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE customer (id INT AUTO_INCREMENT NOT NULL, lastname VARCHAR(255) NOT NULL, firstname VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, phone VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE message (id INT AUTO_INCREMENT NOT NULL, customer_id INT NOT NULL, title VARCHAR(255) NOT NULL, message LONGTEXT NOT NULL, INDEX IDX_B6BD307F9395C3F3 (customer_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE message_user (message_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_24064D90537A1329 (message_id), INDEX IDX_24064D90A76ED395 (user_id), PRIMARY KEY(message_id, user_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reviews (id INT AUTO_INCREMENT NOT NULL, customer_id INT DEFAULT NULL, rating INT NOT NULL, content LONGTEXT NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', is_approved TINYINT(1) NOT NULL, UNIQUE INDEX UNIQ_6970EB0F9395C3F3 (customer_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reviews_user (reviews_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_B3564F048092D97F (reviews_id), INDEX IDX_B3564F04A76ED395 (user_id), PRIMARY KEY(reviews_id, user_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE schedules (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, day VARCHAR(50) NOT NULL, opening VARCHAR(50) NOT NULL, closing VARCHAR(50) NOT NULL, INDEX IDX_313BDC8EA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE service (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, title VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, INDEX IDX_E19D9AD2A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE service_image (id INT AUTO_INCREMENT NOT NULL, service_id INT NOT NULL, title VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, INDEX IDX_6C4FE9B8ED5CA9E6 (service_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, lastname VARCHAR(255) NOT NULL, firstname VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE car_user ADD CONSTRAINT FK_46F9C2E5C3C6F69F FOREIGN KEY (car_id) REFERENCES car (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE car_user ADD CONSTRAINT FK_46F9C2E5A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE car_image ADD CONSTRAINT FK_1A968188C3C6F69F FOREIGN KEY (car_id) REFERENCES car (id)');
        $this->addSql('ALTER TABLE message ADD CONSTRAINT FK_B6BD307F9395C3F3 FOREIGN KEY (customer_id) REFERENCES customer (id)');
        $this->addSql('ALTER TABLE message_user ADD CONSTRAINT FK_24064D90537A1329 FOREIGN KEY (message_id) REFERENCES message (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE message_user ADD CONSTRAINT FK_24064D90A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE reviews ADD CONSTRAINT FK_6970EB0F9395C3F3 FOREIGN KEY (customer_id) REFERENCES customer (id)');
        $this->addSql('ALTER TABLE reviews_user ADD CONSTRAINT FK_B3564F048092D97F FOREIGN KEY (reviews_id) REFERENCES reviews (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE reviews_user ADD CONSTRAINT FK_B3564F04A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE schedules ADD CONSTRAINT FK_313BDC8EA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE service ADD CONSTRAINT FK_E19D9AD2A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE service_image ADD CONSTRAINT FK_6C4FE9B8ED5CA9E6 FOREIGN KEY (service_id) REFERENCES service (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE car_user DROP FOREIGN KEY FK_46F9C2E5C3C6F69F');
        $this->addSql('ALTER TABLE car_user DROP FOREIGN KEY FK_46F9C2E5A76ED395');
        $this->addSql('ALTER TABLE car_image DROP FOREIGN KEY FK_1A968188C3C6F69F');
        $this->addSql('ALTER TABLE message DROP FOREIGN KEY FK_B6BD307F9395C3F3');
        $this->addSql('ALTER TABLE message_user DROP FOREIGN KEY FK_24064D90537A1329');
        $this->addSql('ALTER TABLE message_user DROP FOREIGN KEY FK_24064D90A76ED395');
        $this->addSql('ALTER TABLE reviews DROP FOREIGN KEY FK_6970EB0F9395C3F3');
        $this->addSql('ALTER TABLE reviews_user DROP FOREIGN KEY FK_B3564F048092D97F');
        $this->addSql('ALTER TABLE reviews_user DROP FOREIGN KEY FK_B3564F04A76ED395');
        $this->addSql('ALTER TABLE schedules DROP FOREIGN KEY FK_313BDC8EA76ED395');
        $this->addSql('ALTER TABLE service DROP FOREIGN KEY FK_E19D9AD2A76ED395');
        $this->addSql('ALTER TABLE service_image DROP FOREIGN KEY FK_6C4FE9B8ED5CA9E6');
        $this->addSql('DROP TABLE car');
        $this->addSql('DROP TABLE car_user');
        $this->addSql('DROP TABLE car_image');
        $this->addSql('DROP TABLE customer');
        $this->addSql('DROP TABLE message');
        $this->addSql('DROP TABLE message_user');
        $this->addSql('DROP TABLE reviews');
        $this->addSql('DROP TABLE reviews_user');
        $this->addSql('DROP TABLE schedules');
        $this->addSql('DROP TABLE service');
        $this->addSql('DROP TABLE service_image');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
