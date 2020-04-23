<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200423175658 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE customer_address');
        $this->addSql('ALTER TABLE user ADD address VARCHAR(255) NOT NULL, ADD postal_code INT NOT NULL, ADD city VARCHAR(255) NOT NULL, ADD country VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE customer_address (id INT AUTO_INCREMENT NOT NULL, user_name_id INT NOT NULL, type TINYINT(1) NOT NULL, first_name VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, phone VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci, address VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, postal_code VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, city VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, country VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, name VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, INDEX IDX_1193CB3F291A82DC (user_name_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE customer_address ADD CONSTRAINT FK_1193CB3F291A82DC FOREIGN KEY (user_name_id) REFERENCES user (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE user DROP address, DROP postal_code, DROP city, DROP country');
    }
}
